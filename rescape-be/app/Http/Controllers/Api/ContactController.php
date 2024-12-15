<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Notifications\NewContactSubmission;
use App\Services\GoogleSheetsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        Log::info('Contact form submission received', $request->all());

        try {
            $validated = $request->validate([
                'firstName' => 'required|string|max:255',
                'lastName' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:255',
                'companyName' => 'nullable|string|max:255',
                'message' => 'required|string',
            ]);

            Log::info('Validation passed', $validated);

            $contact = Contact::create([
                'first_name' => $validated['firstName'],
                'last_name' => $validated['lastName'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'company_name' => $validated['companyName'] ?? null,
                'message' => $validated['message'],
            ]);

            Log::info('Contact created', ['contact_id' => $contact->id]);

            // Send email notification
            try {
                Notification::route('mail', config('mail.contact_form.to'))
                    ->notify(new NewContactSubmission($contact));
                Log::info('Email notification sent');
            } catch (\Exception $e) {
                Log::error('Failed to send email notification: ' . $e->getMessage());
            }

            // Sync to Google Sheets
            try {
                $sheetsService = app(GoogleSheetsService::class);
                $sheetsService->appendContact($contact);
                Log::info('Contact synced to Google Sheets');
            } catch (\Exception $e) {
                Log::error('Failed to sync contact to Google Sheets: ' . $e->getMessage());
            }

            return response()->json([
                'message' => 'Contact form submitted successfully',
                'contact' => $contact
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed', ['errors' => $e->errors()]);
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Contact form submission failed: ' . $e->getMessage());
            return response()->json([
                'message' => 'Failed to process contact form',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
