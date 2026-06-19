<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Admin\SettingController;

/* 
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::controller(App\Http\Controllers\Admin\SettingController::class)->group(function () {
        Route::get('/settings','index');
        Route::post('settings', 'store');
    });

    Route::controller(App\Http\Controllers\Admin\PasswordController::class)->group(function () {
        Route::get('/change-password','passwordCreate');
        Route::post('change-password', 'changePassword');
    });

    Route::controller(App\Http\Controllers\Admin\SubController::class)->group(function () {
        Route::get('subscribers','index');
        Route::get('subscribers/{subscriber}/delete','destroy');
    });

    Route::controller(App\Http\Controllers\Admin\ApplicationController::class)->group(function () {
        Route::get('applications','index');
        Route::get('applications/{job}/view','view');
        Route::get('applications/{job}/delete','destroy');
    });

    Route::controller(App\Http\Controllers\Admin\AppointmentController::class)->group(function () {
        Route::get('appointments','index');
        Route::get('appointments/{appointment}/view','view');
        Route::get('appointments/{appointment}/delete','destroy');
    });

    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('sliders','index');
        Route::get('sliders/create','create');
        Route::post('sliders/create','store');
        Route::get('sliders/{slider}/edit','edit');
        Route::put('sliders/{slider}','update');
        Route::get('sliders/{slider}/delete','destroy');
    });

    Route::controller(App\Http\Controllers\Admin\AboutController::class)->group(function () {
        Route::get('about','index');
        Route::put('about/{about}','update');
    });

    Route::controller(App\Http\Controllers\Admin\BoardMemberController::class)->group(function () {
        Route::get('board','index');
        Route::get('board/create','create');
        Route::post('board/create','store');
        Route::get('board/{board}/edit','edit');
        Route::put('board/{board}','update');
        Route::get('board/{board}/delete','destroy');
    });

    Route::controller(App\Http\Controllers\Admin\TestimonialController::class)->group(function () {
        Route::get('testimonials','index');
        Route::get('testimonials/create','create');
        Route::post('testimonials/create','store');
        Route::get('testimonials/{testimonial}/edit','edit');
        Route::put('testimonials/{testimonial}','update');
        Route::get('testimonials/{testimonial}/delete','destroy');
    });

    Route::controller(App\Http\Controllers\Admin\JobController::class)->group(function () {
        Route::get('jobs','index');
        Route::get('jobs/create','create');
        Route::post('jobs/create','store');
        Route::get('jobs/{job}/edit','edit');
        Route::put('jobs/{job}','update');
        Route::get('jobs/{job}/view','view');
        Route::get('jobs/{job}/delete','destroy');
    });

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('category','index');
        Route::get('category/create','create');
        Route::post('category/create','store');
        Route::get('category/{category}/edit','edit');
        Route::put('category/{category}','update');
        Route::get('category/{category}/delete','destroy');
    });

    Route::controller(App\Http\Controllers\Admin\OfferController::class)->group(function () {
        Route::get('offers','index');
        Route::get('offers/create','create');
        Route::post('offers/create','store');
        Route::get('offers/{offer}/edit','edit');
        Route::put('offers/{offer}','update');
        Route::get('offers/{offer}/delete','destroy');
    });

    Route::controller(App\Http\Controllers\Admin\ProductsController::class)->group(function () {
        Route::get('products','index');
        Route::get('products/create','create');
        Route::post('products/create','store');
        Route::get('products/{product}/edit','edit');
        Route::put('products/{product}','update');
        Route::get('product-image/{product_image_id}/delete','destroyImage');
        Route::get('products/{product}/delete','destroy');

        Route::get('/search', 'searchProducts');
    });

    Route::controller(App\Http\Controllers\Admin\FaqController::class)->group(function () {
        Route::get('faqs','index');
        Route::get('faqs/create','create');
        Route::post('faqs/create','store');
        Route::get('faqs/{faq_id}/edit','edit');
        Route::put('faqs/{faq_id}','update');
        Route::get('faqs/{faq_id}/delete','destroy');
    });

    Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function () {
        Route::get('orders','index');
        Route::get('orders/{order}/delete','destroy');
    });

});



Route::get('/sitemap.xml', [App\Http\Controllers\Frontend\FrontendController::class, 'sitemap']);

Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {
    Route::get('/','index');
    Route::get('{category_slug}/{product_slug}','proView');
    Route::post('/sub', 'storeEmail');
    Route::get('/about', 'about');
    Route::get('/contact', 'contact');
    Route::get('/testimonials', 'testimonials');
    Route::get('/appointment', 'appointment');
    Route::post('/appointment/store', 'storeAppointment');
    Route::post('/post-message', 'postMessage');
    Route::get('/offers', 'offer');
    Route::get('/worker', 'worker');
    Route::get('/hr-services', 'hrservice');
    Route::get('/jobs', 'jobs');
    Route::get('/view/{slug}', 'jobView');
    Route::get('/application/{slug}', 'jobApplication');
    Route::post('/application', 'storeApplication');

    // Route::get('/categories', 'product');
    // Route::get('/product-view/{category_slug}/{product_slug}', 'productView');
    // Route::get('/place-order/{category_slug}/{product_slug}', 'placeOrder');
    // Route::post('/place-order', 'storeOrder');

    Route::get('/search', 'searchProducts');
    
});

