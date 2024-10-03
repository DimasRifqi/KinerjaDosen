<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use League\Csv\Reader;

class CsvImportController extends Controller
{

    public function index(){
        return view('import_csx');
    }

    public function import(Request $request)
{

    $request->validate([
        'csv_file' => 'required|mimes:csv,txt'
    ]);


    $file = fopen($request->file('csv_file'), 'r');


    $isHeader = true;

    while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
        if ($isHeader) {
            $isHeader = false;
            continue;
        }

        if (count($data) < 3) {
            continue;
        }


        DB::table('users')->insert([
            'name' => trim($data[0]),
            'email' => trim($data[1], " \t\n\r\0\x0B;,"),
            'password' => Hash::make(trim($data[2], " \t\n\r\0\x0B;,"))
        ]);
    }

    fclose($file);

    return back()->with('success', 'Data imported successfully.');
}

}
