<?php

namespace App\Http\Controllers;

use App\Models\WebConfig;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    function index()
    {
        $data['title'] = 'Informasi';
        $data['web'] = WebConfig::first();

        return view('admin.information.index', $data);
    }

    function update(Request $request)
    {
        $data = WebConfig::first();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone_number = $request->phone_number;
        $data->about = $request->about;
        $data->address = $request->address;
        $data->instagram = $request->instagram;
        $data->facebook = $request->facebook;
        $data->save();

        return response()->json([
            'status' => 'Berhasil!',
            'message' => 'Data telah diperbaharui',
        ]);
    }
}
