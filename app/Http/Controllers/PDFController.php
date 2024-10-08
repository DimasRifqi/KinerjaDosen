<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;


class PDFController extends Controller
{
    public function sptjmPDF($id)
    {
        // Retrieve the 'pengajuan' data by ID
        $pengajuan = Pengajuan::findOrFail($id);
        $jumlah = $pengajuan->user()->wherePivot('status', 'diajukan')->count();

        // Load the view with the necessary data
        $pdf = PDF::loadView('testing.oppt.template', ['pengajuan' => $pengajuan, 'jumlah' => $jumlah])->setPaper('a4', 'landscape');

        // Optional: Set options for the PDF generation (if needed)
        // $pdf->setOptions([
        //     'enable-local-file-access' => true, // Enable local file access for assets
        //     'orientation' => 'landscape' // Change 'landscape' to 'portrait' if needed
        // ]);

        // Return the generated PDF for download
        return $pdf->download('lampiran_sptjm.pdf');
    }

}