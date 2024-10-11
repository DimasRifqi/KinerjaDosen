<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Pengajuan_User;
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

    public function pengajuan(){
        try {
           $user = Auth::user();
            $pengajuan = Pengajuan_User::with('pengajuan', 'pengajuan.periode')->where('id', $user->id)->get();

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

    public function auditor(){
        try {
           $user = Auth::user();
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

}
