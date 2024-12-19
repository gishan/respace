<?php

namespace App\Http\Controllers;

use App\Models\BrandInquiry;
use Illuminate\Http\Request;
use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;

class BrandInquiryController extends Controller
{
    private $spreadsheetId;
    private $client;
    private $service;

    public function __construct()
    {
        $this->spreadsheetId = config('services.google.sheets.inquiry_spreadsheet_id');
        
        $this->client = new Client();
        $this->client->setAuthConfig(storage_path('app/google-credentials.json'));
        $this->client->addScope(Sheets::SPREADSHEETS);
        
        $this->service = new Sheets($this->client);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required|string',
            'product_category' => 'required|string',
            'product_category_other' => 'nullable|string',
            'brand_stage' => 'required|string',
            'activation_purpose' => 'required|string',
            'experience_type' => 'required|string',
            'showcase_preference' => 'required|string',
            'target_demographic' => 'required|array',
            'target_demographic_specific' => 'nullable|string',
            'location_type' => 'required|string',
            'space_size' => 'required|string',
            'amenities' => 'required|array',
            'budget' => 'required|string',
            'timeline' => 'required|string',
            'duration' => 'required|string',
            'special_requirements' => 'nullable|string',
            'contact_name' => 'required|string',
            'contact_email' => 'required|email',
            'contact_phone' => 'required|string',
            'contact_company' => 'required|string',
            'contact_role' => 'required|string',
        ]);

        try {
            // Save to database
            $inquiry = BrandInquiry::create($validated);

            // Prepare data for Google Sheets
            $values = [
                [
                    $inquiry->brand_name,
                    $inquiry->product_category,
                    $inquiry->product_category_other,
                    $inquiry->brand_stage,
                    $inquiry->activation_purpose,
                    $inquiry->experience_type,
                    $inquiry->showcase_preference,
                    is_array($inquiry->target_demographic) ? implode(', ', $inquiry->target_demographic) : $inquiry->target_demographic,
                    $inquiry->target_demographic_specific,
                    $inquiry->location_type,
                    $inquiry->space_size,
                    is_array($inquiry->amenities) ? implode(', ', $inquiry->amenities) : $inquiry->amenities,
                    $inquiry->budget,
                    $inquiry->timeline,
                    $inquiry->duration,
                    $inquiry->special_requirements,
                    $inquiry->contact_name,
                    $inquiry->contact_email,
                    $inquiry->contact_phone,
                    $inquiry->contact_company,
                    $inquiry->contact_role,
                    $inquiry->created_at->format('Y-m-d H:i:s')
                ]
            ];

            if ($this->spreadsheetId) {
                $body = new ValueRange([
                    'values' => $values
                ]);

                $this->service->spreadsheets_values->append(
                    $this->spreadsheetId,
                    'A1',
                    $body,
                    ['valueInputOption' => 'RAW']
                );
            }

            return response()->json([
                'message' => 'Brand inquiry submitted successfully',
                'data' => $inquiry
            ], 201);
        } catch (\Exception $e) {
            \Log::error('Brand inquiry submission error: ' . $e->getMessage());
            return response()->json([
                'message' => 'Failed to submit brand inquiry',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
