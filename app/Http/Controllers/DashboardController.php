<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Blog;
use App\Models\Testimony;
use App\Models\User;

class DashboardController extends Controller
{
    function dashboard()
    {
        $data['title'] = 'Beranda';
        $data['orders_count'] = Order::count();
        $data['blogs_count'] = Blog::count();
        $data['testimonies_count'] = Testimony::count();
        $data['users_count'] = User::count();

        return view('admin.dashboard', $data);
    }
}
