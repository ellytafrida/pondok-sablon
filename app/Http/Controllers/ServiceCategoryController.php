<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ServiceCategoryController extends Controller
{
    function index(Request $request)
    {
        $data['title'] = 'Data Kategori Layanan';

        if ($request->ajax()) {
            return DataTables::of(ServiceCategory::all())
                ->addIndexColumn()
                ->addColumn('action', function (ServiceCategory $category) {
                    $btn = '<button data-id="' . $category->id . '"  class="btn btn-sm btn-warning edit" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></button> ';
                    $btn .= '<button data-id="' . $category->id . '"  class="btn btn-sm btn-danger delete" title="Hapus"><i class="fa fa-trash" aria-hidden="true"></i></button> ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.service-category.index', $data);
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'category' => 'required',
            ],
            [
                'category.required' => 'Mohon isi kolom kategori',
            ]
        );

        $data = ServiceCategory::updateOrCreate([
            'id' => $request->id,
        ], [
            'category' => $request->category,
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
        $data = ServiceCategory::findOrFail($request->id);

        return response()->json($data);
    }

    function destroy(Request $request)
    {
        $data = ServiceCategory::findOrFail($request->id);

        foreach ($data->services as $article) {
            $article->category_id = null;
            $article->update();
        }

        $data->delete();

        return response()->json([
            'code' => 200,
            'status' => 'Berhasil!',
            'message' => 'Data telah dihapus dari sistem.',
        ]);
    }
}
