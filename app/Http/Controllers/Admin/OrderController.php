<?php

namespace App\Http\Controllers\Admin;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){
        $orders = Orders::orderBy('id', 'DESC')->paginate('10');
        return view('admin.order.index', compact('orders')); 
    }

    public function destroy(Orders $order){
        if($order->count() > 0){
            $order->delete();
            return redirect('admin/orders')->with('message', 'Order deleted successfully'); 
            
        }
        return redirect('admin/orders')->with('message', 'Something went wrong'); 
    }
}
