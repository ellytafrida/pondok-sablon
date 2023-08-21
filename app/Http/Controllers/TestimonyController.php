<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class TestimonyController extends Controller
{
    function index(Request $request)
    {
        $data['title'] = 'Data Testimoni';

        if ($request->ajax()) {
            return DataTables::of(Testimony::all())
                ->addIndexColumn()
                ->addColumn('action', function (Testimony $category) {
                    $btn = '<button data-id="' . $category->id . '"  class="btn btn-sm btn-warning edit" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></button> ';
                    $btn .= '<button data-id="' . $category->id . '"  class="btn btn-sm btn-danger delete" title="Hapus"><i class="fa fa-trash" aria-hidden="true"></i></button> ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.testimony.index', $data);
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'from' => 'required',
                'body' => 'required',
            ],
            [
                'name.required' => 'Mohon isi kolom nama',
                'from.required' => 'Mohon isi kolom dari',
                'body.required' => 'Mohon isi kolom testimoni',
            ]
        );

        $photo = $request->hidden_photo;

        if ($request->file('photo')) {
            $path = 'public/testimony-photos/';
            $file = $request->file('photo');
            $file_name = Str::random(5) . time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs($path, $file_name);
            $photo = "storage/testimony-photos/" . $file_name;
        }

        $data = Testimony::updateOrCreate([
            'id' => $request->id,
        ], [
            'name' => $request->name,
            'from' => $request->from,
            'body' => $request->body,
            'photo' => $photo,
        ]);

        if ($request->id != $data->id) {
            return response()->json([
                'code' => 200,
                'status' => 'Berhasil!',
                'message' => 'Data telah ditambahkan',
            ]);
        } else {
            return response()->json([
                'code' => 200,
                'status' => 'Berhasil!',
                'message' => 'Data telah diperbaharui.',
            ]);
        }
    }

    function check(Request $request)
    {
        $data = Testimony::findOrFail($request->id);

        return response()->json($data);
    }

    function destroy(Request $request)
    {
        $data = Testimony::findOrFail($request->id);
        $data->delete();

        return response()->json([
            'code' => 200,
            'status' => 'Berhasil!',
            'message' => 'Data telah dihapus dari sistem.',
        ]);
    }
}
