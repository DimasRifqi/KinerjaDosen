<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OPPTController extends Controller
{
    public function allDosen(){
        $oppt = Auth::user();
        $dosen = User::with('universitas')
        ->where('id_role', 5)
        ->where('id_universitas', $oppt->id_universitas)
        ->get();
        return response()->json(['Dosen' => $dosen]);
    }
}
