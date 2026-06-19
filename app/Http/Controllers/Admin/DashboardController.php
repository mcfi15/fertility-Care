<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\Offer;
use App\Models\Orders;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subscriber;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $allapp = Application::count();
        $alljobs = Job::count();
        $alloffers = Offer::count();
        $allcategories = Category::count();
        $subscribers = Subscriber::count();
        $allsliders = Slider::count();
        return view('admin.dashboard', compact('allapp', 'alljobs', 'alloffers', 'allcategories', 'allsliders', 'subscribers'));
    }
}
