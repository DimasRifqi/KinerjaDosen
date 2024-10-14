<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Pengajuan;
use App\Models\Pengajuan_User;
use App\Models\Prodi;
use App\Models\Universitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    public function register(Request $request){

        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6']
        ]);

        $user = User::create($data);

        $token = $user->createToken('auth_token')->plainTextToken;
        return [
            'user' => $user,
            'token' => $token
        ];
    }

    public function login(Request $request){
        try {
            $data = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required', 'min:6']
            ]);

            $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response([
                'message' => 'Not valid',
            ], 401);
        }
        $token = $user->createToken('auth_token')->plainTextToken;
            // return [
            //     'user' => $user,
            //     'token'=> $token,
            //     'status'=> 200,
            //     'message' => 'Sukses login'
            // ];

            return response()->json([
            'data' => $user,
            'token' => $token,
            'meta' => ['status_code' => 200,
                        'success' => true,
                        'message' => 'Success Login',
                        ]
            ]);
        } catch (\Throwable $th) {
           return response()->json(['error' => $th]);
        }
    }

    public function userProfile(){
        $userData = auth()->user();
        return response()->json([
            'status' => true,
            'message' => 'User login profile ',
            'data' => $userData,
            'id' => auth()->user()->id
        ], 200);
    }

    public function logout(){
        auth()->user()->tokens()->delete();

        return response()->json([
            'status' => true,
            'message' => 'User logged out',
            'data' => []
        ], 200);
    }

    public function index(){
        $user = User::all();
        return response()->json([
            'data' => $user
        ], 200);
    }

    public function pengajuan() {
        try {
            $user = Auth::user();

            $pengajuan = Pengajuan_User::with(['user','pengajuan', 'pengajuan.periode', 'pengajuan.pengajuan_dokumen'])
                ->where('id', $user->id)
                ->get();

            return response()->json([
                'data' => $pengajuan,
                'userLogin' => $user,
                'meta' => [
                    'status_code' => 200,
                    'success' => true,
                    'message' => 'Success tampilkan data pengajuan',
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json(['err' => $th->getMessage()]);
        }
    }


    public function auditor(){
        try {
           //$user = Auth::user();
            $pengajuan = Pengajuan::with('user', 'periode', 'pengajuan_dokumen')->get();

            return response()->json([
                'data' => $pengajuan,
            'meta' => ['status_code' => 200,
                        'success' => true,
                        'message' => 'Success tampilkan data pengajuan ',
                        ]
            ]);
        } catch (\Throwable $th) {
            return response()->json(['err' => $th->getMessage()]);
        }
    }

    public function allData(){
        $kota = Kota::pluck('nama_kota');
        $universitas = Universitas::pluck('nama_universitas');
        $prodi = Prodi::pluck('nama_prodi');
        $dosen = User::where('id_role', 5)->pluck('name');
       // $user = User::with('universitas.kota', 'pangkat_dosen', 'jabatan_fungsional', 'pangkat_dosen', 'gelar_depan', 'gelar_belakang', 'prodi', 'pengajuan')->get();
        return response()->json([
            'message' => 'Success',
            'status' => 200,
            'kota' => $kota,
            'universitas' => $universitas,
            'prodi' => $prodi,
            'dosen' => $dosen,
        ]);
    }

    public function searchDosen(Request $request)
{
    // Ambil parameter dari request
    $kota = $request->input('kota'); // Misalnya, 'kota' bisa dikirim melalui query string
    $universitas = $request->input('universitas');
    $prodi = $request->input('prodi');

    try {
        // Query untuk mencari dosen
        $query = User::where('id_role', 5); // 5 adalah id_role untuk dosen

        // Filter berdasarkan kota jika ada
        if ($kota) {
            $query->whereHas('universitas.kota', function ($q) use ($kota) {
                $q->where('nama_kota', 'like', '%' . $kota . '%');
            });
        }

        // Filter berdasarkan universitas jika ada
        if ($universitas) {
            $query->whereHas('universitas', function ($q) use ($universitas) {
                $q->where('nama_universitas', 'like', '%' . $universitas . '%');
            });
        }

        // Filter berdasarkan prodi jika ada
        if ($prodi) {
            $query->whereHas('prodi', function ($q) use ($prodi) {
                $q->where('nama_prodi', 'like', '%' . $prodi . '%');
            });
        }

        // Ambil dosen yang sesuai dengan kriteria pencarian
        $dosen = $query->pluck('name');

        return response()->json([
            'message' => 'Success',
            'status' => 200,
            'dosen' => $dosen,
        ]);
    } catch (\Throwable $th) {
        return response()->json(['err' => $th->getMessage()]);
    }
}


}