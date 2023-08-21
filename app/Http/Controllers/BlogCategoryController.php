<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class BlogCategoryController extends Controller
{
    function index(Request $request)
    {
        $data['title'] = 'Data Kategori Blog';

        if ($request->ajax()) {
            return DataTables::of(BlogCategory::all())
                ->addIndexColumn()
                ->addColumn('action', function (BlogCategory $category) {
                    $btn = '<button data-id="' . $category->id . '"  class="btn btn-sm btn-warning edit" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></button> ';
                    $btn .= '<button data-id="' . $category->id . '"  class="btn btn-sm btn-danger delete" title="Hapus"><i class="fa fa-trash" aria-hidden="true"></i></button> ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.blog-category.index', $data);
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

        $data = BlogCategory::updateOrCreate([
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
        $data = BlogCategory::findOrFail($request->id);

        return response()->json($data);
    }

    function destroy(Request $request)
    {
        $data = BlogCategory::findOrFail($request->id);

        foreach ($data->blogs as $article) {
            $article->category_id = null;
            $article->published_at = null;
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
