<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    use ValidatesRequests;
    public function index() {
        $data = User::all();
        if ($data->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak Ditemukan.',
                'data' => []
            ], 404);
        }
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Ditemukan.',
            'data' => $data
        ], 200);
    }
    public function store(Request $data) {
        $this->validate($data, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $hash_password = Hash::make($data->password);

        $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => $hash_password
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Ditambah!',
            'data' => $user
        ],200);
    }
    public function view($id) {
        
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak Ditemukan!',
                'data' => []
            ],404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Ditemukan!',
            'data' => $user
        ],200);
    }
    public function update(Request $data, $id)
    {
        // return response()->json($data);
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Data pengguna tidak ditemukan.',
                'data' => null
            ], 404);
        }

        $this->validate($data, [
            'name' => 'sometimes',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'password' => 'sometimes',
        ]);

        if ($data->filled('name')) {
        $user->name = $data->name;
        }
        if ($data->filled('email')) {
            $user->email = $data->email;
        }
        if ($data->filled('password')) {
            $user->password = Hash::make($data->password);
        }

        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diperbarui.',
            'data' => $user
        ], 200);
    }
    public function delete($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak Ditemukan.',
                'data' => null
            ], 404);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus.',
            'data' => null
        ], 200);
    }
}
