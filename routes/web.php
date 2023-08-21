<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthAdminController;
use App\Http\Controllers\Auth\AuthUserController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\InformationController;
use Illuminate\Support\Facades\Route;

Route::group(['domain' => 'admin.' . env('DOMAIN')], function () {
    Route::controller(AuthAdminController::class)->group(function () {
        Route::get('login', 'login')->name('login')->middleware('guest:admin');
        Route::post('login', 'loginProcess');
        Route::get('forgot-password', 'forgotPassword');
        Route::post('forgot-password', 'forgotPasswordProcess');
        Route::get('reset-password', 'resetPassword');
        Route::post('reset-password', 'resetPasswordProcess');
        Route::post('otp', 'otp');
        Route::get('logout', 'logout');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [DashboardController::class, 'dashboard']);
        Route::get('dashboard', [DashboardController::class, 'dashboard']);
        Route::get('profile', [ProfileController::class, 'profile']);
        Route::post('change-password', [ProfileController::class, 'changePassword']);

        Route::prefix('administrators')->controller(AdminController::class)->group(function () {
            Route::get('/', 'index');
            Route::post('check', 'check');
            Route::post('store', 'store');
            Route::delete('destroy', 'destroy');
        });

        Route::prefix('users')->controller(UserController::class)->group(function () {
            Route::get('/', 'index');
            Route::post('check', 'check');
            Route::post('store', 'store');
            Route::delete('destroy', 'destroy');
        });

        Route::prefix('orders')->controller(OrderController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('detail/{id}', 'detail');
            Route::post('check', 'check');
            Route::post('change-status', 'changeStatus');
            Route::delete('destroy', 'destroy');
        });

        Route::prefix('service-categories')->controller(ServiceCategoryController::class)->group(function () {
            Route::get('/', 'index');
            Route::post('check', 'check');
            Route::post('store', 'store');
            Route::delete('destroy', 'destroy');
        });

        Route::prefix('services')->controller(ServiceController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('create', 'create');
            Route::get('detail/{id}', 'detail');
            Route::get('edit/{id}', 'edit');
            Route::post('check', 'check');
            Route::post('store', 'store');
            Route::delete('destroy', 'destroy');
        });

        Route::prefix('blog-categories')->controller(BlogCategoryController::class)->group(function () {
            Route::get('/', 'index');
            Route::post('check', 'check');
            Route::post('store', 'store');
            Route::delete('destroy', 'destroy');
        });

        Route::prefix('blogs')->controller(BlogController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('create', 'create');
            Route::get('detail/{id}', 'detail');
            Route::get('edit/{id}', 'edit');
            Route::post('store', 'store');
            Route::post('check', 'check');
            Route::post('publish', 'publish');
            Route::post('cancel-publish', 'cancelPublish');
            Route::delete('destroy', 'destroy');
        });

        Route::prefix('testimonies')->controller(TestimonyController::class)->group(function () {
            Route::get('/', 'index');
            Route::post('check', 'check');
            Route::post('store', 'store');
            Route::delete('destroy', 'destroy');
        });

        Route::prefix('information')->controller(InformationController::class)->group(function () {
            Route::get('/', 'index');
            Route::post('update', 'update');
        });
    });
});



/*
|--------------------------------------------------------------------------
| Landing Page and Website Routes
|--------------------------------------------------------------------------
*/
Route::controller(AuthUserController::class)->group(function () {
    Route::get('login', 'login')->name('login')->middleware('guest:user');
    Route::post('login', 'loginProcess');
    Route::get('register', 'register');
    Route::post('register', 'registerProcess');
    Route::get('logout', 'logout');
});

Route::controller(LandingPageController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('about', 'about');

    Route::post('testimony', 'testimony');

    Route::get('blogs', 'blogs');
    Route::get('blogs/category/{category}', 'blogsCategory');
    Route::get('blogs/{slug}', 'detailBlog');

    Route::get('services', 'services');
    Route::get('services/category/{category}', 'servicesCategory');
    Route::get('services/detail/{id}', 'servicesDetail');

    Route::middleware('auth:user')->group(function () {
        Route::get('profile', 'profile');
        Route::get('orders', 'orders');
        Route::get('cart', 'cart');
        Route::post('add-to-cart', 'addToCart');
        Route::post('delete-to-cart', 'deleteToCart');

        Route::post('checkout', 'checkout');
        Route::post('change-order-status', 'changeStatus');
    });
});


Route::prefix('auth')->controller(SocialiteController::class)->group(function () {
    Route::get('{provider}', 'redirectToProvider');
    Route::get('{provider}/callback', 'handleProviderCallback');
});
