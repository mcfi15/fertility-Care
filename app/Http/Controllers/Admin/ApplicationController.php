<?php

namespace App\Http\Controllers\Admin;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ApplicationController extends Controller
{
    public function index(){
        $apps = Application::latest()->paginate(10);
        return view('admin.application.index', compact('apps'));
    }

    public function view(int $job){
        $jobs = Application::findOrFail($job);
        return view('admin.application.view', compact('jobs'));
    }

    public function destroy(Application $job){
        if($job->count() > 0){
            $destination = $job->cv;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $destination2 = $job->other;
            if(File::exists($destination2)){
                File::delete($destination2);
            }

            $job->delete();
            return redirect('admin/applications')->with('message', 'Application deleted successfully'); 
            
        }
        return redirect('admin/application')->with('message', 'Something went wrong'); 
    }
}
