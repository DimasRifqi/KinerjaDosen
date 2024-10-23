<?php

namespace App\Http\Controllers;

use App\Imports\BkdImport;
use App\Imports\DosenImport;
use App\Imports\GajiImport;
use App\Imports\SpanImport;
use App\Imports\UniversitasImport;
use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

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

    public function showImport(){
        $periode = Periode::all();
        return view('testing.bkd.import-excel', ['periode' => $periode]);
    }

    public function importExcelBkd(Request $request){

            $request->validate([
                'file' => 'required|mimes:xls,xlsx',
                'id_periode' => 'required'
            ]);

            $id_periode = $request->input('id_periode');

            try {
                Excel::import(new BkdImport($id_periode), $request->file('file'));

                return redirect()->back()->with('success', 'Data berhasil diimpor.');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', $th->getMessage());
            }
        }

    public function importExcelDosen(Request $request){

        try {
            $request->validate([
                'file' => 'required|mimes:xls,xlsx'
            ]);

            Excel::import(new DosenImport(), $request->file('file'));

            return redirect()->back()->with('success', 'Data dosen berhasil di import');
        } catch (\Throwable $th) {
           return response()->json(['err' => $th->getMessage()]);
        }

    }

    public function importExcelGapok(Request $request){

        try {
            $request->validate([
                'file' => 'required|mimes:xls,xlsx'
            ]);

            Excel::import(new GajiImport(), $request->file('file'));

            return redirect()->back()->with('success', 'Data Gapok berhasil di import');
        } catch (\Throwable $th) {
           return response()->json(['err' => $th->getMessage()]);
        }

    }

    public function importExcelSpan(Request $request){

        try {
            $request->validate([
                'file' => 'required|mimes:xls,xlsx'
            ]);

            Excel::import(new SpanImport(), $request->file('file'));

            return redirect()->back()->with('success', 'Data Span berhasil di import');
        } catch (\Throwable $th) {
           return response()->json(['err' => $th->getMessage()]);
        }

    }

    public function importExcelUniv(Request $request){

        try {
            $request->validate([
                'file' => 'required|mimes:xls,xlsx'
            ]);

            Excel::import(new UniversitasImport(), $request->file('file'));

            return redirect()->back()->with('success', 'Data Univ berhasil di import');
        } catch (\Throwable $th) {
           return response()->json(['err' => $th->getMessage()]);
        }

    }




}
