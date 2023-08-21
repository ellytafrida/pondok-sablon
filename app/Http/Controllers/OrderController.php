<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    function index(Request $request)
    {
        $data['title'] = 'Data Pesanan';

        if ($request->ajax()) {
            return DataTables::of(Order::all())
                ->addIndexColumn()
                ->addColumn('user', function (Order $order) {
                    return $order->user->name;
                })
                ->addColumn('total_price', function (Order $order) {
                    return 'Rp. ' . str_replace(',', '.', number_format($order->total_price));
                })
                ->addColumn('status', function (Order $order) {
                    $badgeColor = '';

                    if ($order->status == 'Belum Dibayar') {
                        $badgeColor = 'badge-danger';
                    } else if ($order->status == 'Sudah Dibayar') {
                        $badgeColor = 'badge-primary';
                    } else if ($order->status == 'Sedang Diproses') {
                        $badgeColor = 'badge-dark';
                    } else {
                        $badgeColor = 'badge-success';
                    }
                    return '<span class="badge ' . $badgeColor . '">' . $order->status . '</span>';
                })
                ->addColumn('action', function (Order $order) {
                    $btn = '<a href="orders/detail/' . $order->id . '"  class="btn btn-sm btn-dark" title="Detail"><i class="fa fa-eye" aria-hidden="true"></i></a> ';
                    $btn .= '<button data-id="' . $order->id . '"  class="btn btn-sm btn-warning change-status" title="Ganti Status"><i class="fa fa-edit" aria-hidden="true"></i></button> ';
                    $btn .= '<button data-id="' . $order->id . '"  class="btn btn-sm btn-danger delete" title="Hapus"><i class="fa fa-trash" aria-hidden="true"></i></button> ';
                    return '<div class="btn-group">' . $btn . '</div>';
                })
                ->rawColumns(['user', 'total_price', 'status', 'action'])
                ->make(true);
        }

        return view('admin.order.index', $data);
    }

    function detail(Request $request)
    {
        $data['title'] = 'Detail Pesanan';
        $data['order'] = Order::findOrFail($request->id);
        $data['user'] = User::findOrFail($data['order']->user_id);

        return view('admin.order.detail', $data);
    }

    function changeStatus(Request $request)
    {
        $data = Order::findOrFail($request->id);

        $services = '';

        foreach (json_decode($data->services, true) as $service) {
            $product = Service::findOrFail($service['product_id']);
            $services .= "- ".$product->name.' = '.$service['quantity']." Buah\n";
        }

        if ($request->status == 'Sedang Diproses') {
            $response = Http::asForm()->post('https://wa.srv2.wapanels.com/send-message', [
                'api_key' => '0GxB0JURoGbukwlxok6sY9DKhnyjQTvy',
                'sender' => '6285171121070',
                'number' => $data->user->phone_number,
                'message' => "Halo! kami ingin menyampaikan bahwa saat ini pesanan anda:\n\n" . $services . "\n*sedang dalam proses* pengerjaan dengan estimasi selesai dalam 2-3 hari.\n\n*Admin Pondok Sablon*",
            ]);
        }

        if ($request->status == 'Selesai') {
            $response = Http::asForm()->post('https://wa.srv2.wapanels.com/send-message', [
                'api_key' => '0GxB0JURoGbukwlxok6sY9DKhnyjQTvy',
                'sender' => '6285171121070',
                'number' => $data->user->phone_number,
                'message' => "Halo! kami ingin menyampaikan bahwa pesanan anda:\n\n" . $services . "\n*sudah selesai* dikerjakan. Mohon kirimkan alamat lokasi pengantaran kepada kami. Terima kasih\n\n*Admin Pondok Sablon*",
            ]);
        }

        $data->status = $request->status;
        $data->save();

        return response()->json([
            'code' => 200,
            'status' => 'Berhasil!',
            'message' => 'Data telah diperbaharui.',
        ]);
    }

    function check(Request $request)
    {
        $data = Order::findOrFail($request->id);

        return response()->json($data);
    }

    function destroy(Request $request)
    {
        $data = Order::findOrFail($request->id);
        $data->delete();

        return response()->json([
            'code' => 200,
            'status' => 'Berhasil!',
            'message' => 'Data telah dihapus dari sistem.',
        ]);
    }
}
