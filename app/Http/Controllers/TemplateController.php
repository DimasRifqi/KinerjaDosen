<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class TemplateController extends Controller
{
    public function generatePDF()
    {
        // Use the correct method to load the view into the PDF
        $pdf = PDF::loadView('testing.template.surat_pernyataan_kebenaran_dokumen');

        // Return the generated PDF as a download
        return $pdf->download('surat pernyataan kebenaran dan keaslian dokumen.pdf');
    }
}