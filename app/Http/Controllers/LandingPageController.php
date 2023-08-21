<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\BlogCategory;
use App\Models\Blog;
use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\Testimony;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LandingPageController extends Controller
{
    function index()
    {
        $data['random_blogs'] = Blog::whereNotNull('published_at')->take(3)->inRandomOrder()->get();

        return view('landing-page.index', $data);
    }

    function profile()
    {
        return view('landing-page.profile');
    }

    function orders()
    {
        $data['orders'] = Order::where('user_id', Auth::user()->id)->get();

        return view('landing-page.orders', $data);
    }

    function about()
    {
        return view('landing-page.about');
    }

    function testimony(Request $request)
    {
        $request->validate([
            'from' => 'required',
            'body' => 'required',
        ]);

        $data = new Testimony;
        $data->name = Auth::user()->name;
        $data->from = $request->from;
        $data->body = $request->body;
        $data->save();

        return response()->json([
            'status' => 'Berhasil!',
            'message' => 'Ulasan berhasil dikirim.',
        ]);
    }

    function blogs()
    {
        $data['blogs'] = Blog::whereNotNull('published_at')->orderBy('published_at', 'desc')->get();
        $data['blog_categories'] = BlogCategory::all();
        $data['random_blogs'] = Blog::whereNotNull('published_at')->take(3)->inRandomOrder()->get();

        return view('landing-page.blogs', $data);
    }

    function blogsCategory(Request $request)
    {
        $data['category_selected'] = BlogCategory::where('category', Str::slug($request->category, ' '))->first();
        $data['blogs'] = Blog::where('category_id', $data['category_selected']->id)->whereNotNull('published_at')->orderBy('published_at', 'desc')->get();
        $data['blog_categories'] = BlogCategory::all();
        $data['random_blogs'] = Blog::whereNotNull('published_at')->take(3)->inRandomOrder()->get();

        return view('landing-page.blogs', $data);
    }

    function detailBlog(Request $request)
    {
        $data['blog'] = Blog::where('slug', $request->slug)->firstOrFail();
        $data['related_blogs'] = Blog::whereNotNull('published_at')->whereNot('id', $data['blog']->id)->where('category_id', $data['blog']->category_id)->take(3)->get();

        return view('landing-page.detail-blog', $data);
    }

    function services()
    {
        $data['services'] = Service::all();
        $data['service_categories'] = ServiceCategory::all();

        return view('landing-page.services', $data);
    }

    function servicesCategory(Request $request)
    {
        $data['category_selected'] = ServiceCategory::where('category', Str::slug($request->category, ' '))->first();
        $data['services'] = Service::where('category_id', $data['category_selected']->id)->get();
        $data['service_categories'] = ServiceCategory::all();

        return view('landing-page.services', $data);
    }

    function servicesDetail(Request $request)
    {
        $data['service'] = Service::findOrFail($request->id);
        $data['related_services'] = Service::where('category_id', $data['service']->category_id)->get();

        return view('landing-page.detail-service', $data);
    }

    function cart()
    {
        $data['carts'] = Cart::where('user_id', Auth::user()->id)->get();
        return view('landing-page.cart', $data);
    }

    function addToCart(Request $request)
    {
        $data = Service::findOrFail($request->service_id);
        $checkCart = Cart::where('service_id', $request->service_id)->first();

        if ($checkCart) {
            $checkCart->quantity += $request->quantity;
            $checkCart->save();
        } else {
            $cart = new Cart;
            $cart->user_id = Auth::user()->id;
            $cart->service_id = $request->service_id;
            $cart->quantity = $request->quantity;
            $cart->save();
        }

        return response()->json([
            'code' => 200,
            'status' => 'Berhasil!',
            'message' => 'Produk berhasil ditambahkan ke keranjang.',
            'data' => $data,
        ]);
    }

    function deleteToCart(Request $request)
    {
        $data = Cart::findOrFail($request->id);
        $data->delete();

        return response()->json([
            'code' => 200,
            'status' => 'Berhasil!',
            'message' => 'Produk telah dihapus dari keranjangmu.',
        ]);
    }

    function checkout(Request $request)
    {
        $data['user'] = User::findOrFail($request->user_id);

        for ($i = 0; $i < count($request->service_id); $i++) {
            $services[] = [
                'product_id' => $request->service_id[$i],
                'quantity' => $request->quantities[$i],
            ];

            $cart = Cart::where('user_id', $data['user']->id)->where('service_id', $request->service_id[$i])->first();
            $cart->quantity = $request->quantities[$i];
            $cart->save();
        }

        if ($request->file('image')) {
            $path = 'public/order-images/';
            $file = $request->file('image');
            $file_name = Str::random(5) . time() . '_' . $file->getClientOriginalName();

            $file->storeAs($path, $file_name);
            $image = "storage/order-images/" . $file_name;
        }

        $data['order'] = new Order;
        $data['order']->user_id = $request->user_id;
        $data['order']->total_price = $request->total_price;
        $data['order']->services = json_encode($services);
        $data['order']->status = "Belum Dibayar";
        $data['order']->note = $request->note;
        $data['order']->image = $image;
        $data['order']->save();

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => Str::random(5),
                'gross_amount' => $request->total_price,
            ),
            'customer_details' => array(
                'name' => $data['user']->name,
                'email' => $data['user']->email,
            ),
        );

        $data['snapToken'] = \Midtrans\Snap::getSnapToken($params);

        return response()->json($data);
    }

    function changeStatus(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $order = Order::findOrFail($request->order_id);
        $order->update(['status' => 'Sudah Dibayar']);

        $response = Http::asForm()->post('https://wa.srv2.wapanels.com/send-message', [
            'api_key' => '0GxB0JURoGbukwlxok6sY9DKhnyjQTvy',
            'sender' => '6285171121070',
            'number' => $user->phone_number,
            'message' => "Pembayaran anda sudah diterima sebesar Rp. " . number_format($order->total_price) . ".\nMohon kirim desain yang ingin disablon kepada kami melalui nomor ini.\nTerima kasih telah percaya kepada *Pondok Sablon*",
        ]);

        return response()->json([
            'status' => 'Pembayaran Berhasil',
            'message' => 'Terima kasih telah percaya pada kami.',
        ]);
    }

    public function checkoutCallback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $order = Order::findOrFail($request->order_id);
                $order->update(['status' => 'Paid']);

                return response()->json('Berhasil');
            }
            return response()->json('Gagal');
        }
        return response()->json('gagal');
    }
}
