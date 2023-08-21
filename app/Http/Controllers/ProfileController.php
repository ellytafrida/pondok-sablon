<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class ProfileController extends Controller
{
    function profile(){
        $data['title'] = 'Profil Saya';
        return view('admin.profile', $data);
    }

    function changePassword(Request $request)
    {
        $request->validate(
            [
                'old_password' => 'required',
                'new_password' => 'required|min:8',
                'confirm_password' => 'required|same:new_password',
            ],
            [
                'old_password.required' => 'Mohon isi kolom kata sandi lama',
                'new_password.required' => 'Mohon isi kolom kata sandi baru',
                'confirm_password.required' => 'Mohon isi kolom konfirmasi kata sandi',
                'confirm_password.same' => 'Konfirmasi kata sandi tidak sesuai',
            ]
        );

        $data = Admin::findOrFail($request->id);
        $data->password = bcrypt($request->new_password);
        $data->save();

        return response()->json([
            'code' => 200,
            'status' => 'Berhasil!',
            'message' => 'Kata sandi telah diganti.',
        ]);
    }
}
