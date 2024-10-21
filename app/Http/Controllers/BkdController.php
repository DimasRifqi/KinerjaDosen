<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BkdController extends Controller
{
   public function importBkd(Request $request)
{
    try {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt'
        ]);

        $file = fopen($request->file('csv_file'), 'r');

        // Skip the header row
        $isHeader = true;

        while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
            if ($isHeader) {
                $isHeader = false;
                continue;
            }

            // Log the data being processed for debugging purposes
            Log::info('Processing row: ', $data);

            if (count($data) < 16) {
                Log::warning('Row skipped due to insufficient columns.', $data);
                continue;
            }

            // Insert only the relevant fields into the database
            DB::table('bkd')->insert([
                'nidn' => trim($data[2]),  // nidn column
                'name' => trim($data[3], " \t\n\r\0\x0B;,"),  // name column
                'kesimpulan_bkd' => trim($data[13], " \t\n\r\0\x0B;,"),  // kesimpulan_bkd column
            ]);

            // Log the successful insertion
            Log::info('Row inserted successfully: ', ['nidn' => $data[2], 'name' => $data[3]]);
        }

        fclose($file);

        return back()->with('success', 'Data imported successfully.');
    } catch (\Throwable $th) {
        Log::error('Error importing BKD data: ', ['error' => $th->getMessage()]);
        return response()->json(['error' => $th->getMessage()]);
    }
}


}
