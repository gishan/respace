<?php

namespace App\Http\Controllers;

use App\Models\SpaceSubmission;
use Illuminate\Http\Request;
use Revolution\Google\Sheets\Facades\Sheets;

class SpaceSubmissionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'space_name' => 'required|string|max:255',
            'location' => 'required|string',
            'space_type' => 'required|string',
            'space_type_other' => 'required_if:space_type,other|nullable|string',
            'primary_motivation' => 'required|string',
            'target_demographics' => 'required|array',
            'collaboration_style' => 'required|string',
            'supported_events' => 'required|array',
            'contact_name' => 'required|string|max:255',
            'contact_email' => 'required|email',
            'contact_phone' => 'required|string',
        ]);

        // Create space submission
        $submission = SpaceSubmission::create($validated);

        // Add to Google Sheets
        try {
            $this->addToGoogleSheets($submission);
        } catch (\Exception $e) {
            // Log the error but don't fail the submission
            \Log::error('Failed to add submission to Google Sheets: ' . $e->getMessage());
        }

        return response()->json([
            'message' => 'Space submission received successfully',
            'submission' => $submission
        ], 201);
    }

    private function addToGoogleSheets(SpaceSubmission $submission)
    {
        $values = [
            [
                $submission->space_name,
                $submission->location,
                $submission->space_type,
                $submission->space_type_other,
                $submission->primary_motivation,
                implode(', ', $submission->target_demographics),
                $submission->collaboration_style,
                implode(', ', $submission->supported_events),
                $submission->contact_name,
                $submission->contact_email,
                $submission->contact_phone,
                $submission->created_at->format('Y-m-d H:i:s'),
            ]
        ];

        Sheets::spreadsheet(config('services.google.sheets.spreadsheet_id'))
            ->sheet('Spaces')
            ->append($values);
    }
}
