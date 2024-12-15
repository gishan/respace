<?php

namespace App\Services;

use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;
use App\Models\Contact;

class GoogleSheetsService
{
    protected $client;
    protected $service;
    protected $spreadsheetId;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setAuthConfig(storage_path('app/google-credentials.json'));
        $this->client->setScopes([Sheets::SPREADSHEETS]);
        
        $this->service = new Sheets($this->client);
        $this->spreadsheetId = config('services.google.sheets.contact_spreadsheet_id');
    }

    public function appendContact(Contact $contact): bool
    {
        try {
            $range = 'Contacts!A:H'; // Adjust based on your sheet structure
            $values = [
                [
                    $contact->created_at->format('Y-m-d H:i:s'),
                    $contact->first_name,
                    $contact->last_name,
                    $contact->email,
                    $contact->phone,
                    $contact->company_name,
                    $contact->message,
                ]
            ];

            $body = new ValueRange([
                'values' => $values
            ]);

            $this->service->spreadsheets_values->append(
                $this->spreadsheetId,
                $range,
                $body,
                ['valueInputOption' => 'RAW']
            );

            $contact->update(['is_synced_to_sheets' => true]);
            return true;
        } catch (\Exception $e) {
            \Log::error('Google Sheets sync failed: ' . $e->getMessage());
            return false;
        }
    }
}
