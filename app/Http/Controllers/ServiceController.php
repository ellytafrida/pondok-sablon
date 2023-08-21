<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    function index(Request $request)
    {
        $data['title'] = 'Data Produk Layanan';

        if ($request->ajax()) {
            return DataTables::of(Service::all())
                ->addIndexColumn()
                ->addColumn('action', function (Service $product) {
                    $btn = '<a href="services/detail/' . $product->id . '"  class="dropdown-item info">Lihat</a> ';
                    $btn .= '<a href="services/edit/' . $product->id . '"  class="dropdown-item edit">Edit</a> ';

                    $btn .= '<button data-id="' . $product->id . '"  class="dropdown-item delete">Hapus</button> ';

                    $btnColor = 'btn-dark';
                    return '<div role="group" class="dropup">
                                <button id="btnDropdown" type="button" class="btn ' . $btnColor . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnDropdown">' .
                        $btn
                        . '</div>
                            </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.service.index', $data);
    }

    function create()
    {
        $data['title'] = 'Buat Produk Layanan';
        $data['service_categories'] = ServiceCategory::all();

        return view('admin.service.form-modal', $data);
    }

    function detail(Request $request)
    {
        $data['title'] = 'Detail Produk Layanan';
        $data['service'] = Service::findOrFail($request->id);

        return view('admin.service.detail', $data);
    }

    function edit(Request $request)
    {
        $data['title'] = 'Edit Produk Layanan';
        $data['service'] = Service::findOrFail($request->id);
        $data['service_categories'] = ServiceCategory::all();

        return view('admin.service.form-modal', $data);
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'name' => ($request->id) ? 'required' : 'required|unique:services',
                'unit_price' => 'required',
                'minimum_order' => 'required',
                'category_id' => 'required',
                'description' => 'required',
            ],
            [
                'name.required' => 'Mohon isi kolom nama',
                'unit_price.required' => 'Mohon lengkapi harga produk',
                'minimum_order.required' => 'Mohon lengkapi kolom minimal order',
                'category_id.required' => 'Mohon isi kolom kategori produk',
                'description.required' => 'Mohon lengkapi deskripsi',
            ],
        );

        $image = $request->hidden_image;

        if ($request->file('image')) {
            $path = 'public/service-images/';
            $file = $request->file('image');
            $file_name = Str::random(5) . time() . '_' . $file->getClientOriginalName();

            $file->storeAs($path, $file_name);
            $image = "storage/service-images/" . $file_name;
        }

        $slide1 = $request->hidden_slide_1;

        if ($request->file('slide_1')) {
            $path = 'public/service-images/';
            $file = $request->file('slide_1');
            $file_name = Str::random(5) . time() . 'slide_1_' . $file->getClientOriginalName();

            $file->storeAs($path, $file_name);
            $slide1 = "storage/service-images/" . $file_name;
        }

        $slide2 = $request->hidden_slide_2;

        if ($request->file('slide_2')) {
            $path = 'public/service-images/';
            $file = $request->file('slide_2');
            $file_name = Str::random(5) . time() . 'slide_2_' . $file->getClientOriginalName();

            $file->storeAs($path, $file_name);
            $slide2 = "storage/service-images/" . $file_name;
        }

        $slide3 = $request->hidden_slide_3;

        if ($request->file('slide_3')) {
            $path = 'public/service-images/';
            $file = $request->file('slide_3');
            $file_name = Str::random(5) . time() . 'slide_3_' . $file->getClientOriginalName();

            $file->storeAs($path, $file_name);
            $slide3 = "storage/service-images/" . $file_name;
        }

        $slide4 = $request->hidden_slide_4;

        if ($request->file('slide_4')) {
            $path = 'public/service-images/';
            $file = $request->file('slide_4');
            $file_name = Str::random(5) . time() . 'slide_4_' . $file->getClientOriginalName();

            $file->storeAs($path, $file_name);
            $slide4 = "storage/service-images/" . $file_name;
        }

        $slide5 = $request->hidden_slide_5;

        if ($request->file('slide_5')) {
            $path = 'public/service-images/';
            $file = $request->file('slide_5');
            $file_name = Str::random(5) . time() . 'slide_5_' . $file->getClientOriginalName();

            $file->storeAs($path, $file_name);
            $slide5 = "storage/service-images/" . $file_name;
        }

        $data = Service::updateOrCreate([
            'id' => $request->id,
        ], [
            'image' => $image,
            'name' => $request->name,
            'minimum_order' => $request->minimum_order,
            'unit_price' => $request->unit_price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'slide_1' => $slide1,
            'slide_2' => $slide2,
            'slide_3' => $slide3,
            'slide_4' => $slide4,
            'slide_5' => $slide5,
        ]);

        if ($request->id != $data->id) {
            return response()->json([
                'code' => 200,
                'status' => 'Berhasil!',
                'message' => 'Produk telah ditambahkan.',
            ]);
        } else {
            return response()->json([
                'code' => 200,
                'status' => 'Berhasil!',
                'message' => 'Data telah diperbaharui.',
            ]);
        }
    }

    function destroy(Request $request)
    {
        $data = Service::findOrFail($request->id);
        $data->delete();

        return response()->json([
            'code' => 200,
            'status' => 'Berhasil!',
            'message' => 'Data telah dihapus dari sistem.',
        ]);
    }
}
