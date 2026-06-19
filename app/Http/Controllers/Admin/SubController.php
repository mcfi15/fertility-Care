<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubController extends Controller
{
    public function index(){
        $subscribers = Subscriber::latest()->paginate(10);
        return view('admin.subscriber.index', compact('subscribers'));
    }

    public function destroy(Subscriber $subscriber){
        if($subscriber->count() > 0){
            $subscriber->delete();
            return redirect('admin/subscribers')->with('message', 'Subscriber deleted successfully'); 
            
        }
        return redirect('admin/subscribers')->with('message', 'Something went wrong'); 
    }
}
