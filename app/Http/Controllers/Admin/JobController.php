<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobFormRequest;

class JobController extends Controller
{
    public function index(){
        $jobs = Job::orderBy('id', 'DESC')->paginate('10');
        return view('admin.job.index', compact('jobs'));
    }

    public function create(){
        return view('admin.job.create');
    }

    public function store(JobFormRequest $request){
        $validatedData = $request->validated();

        $job = new Job;

        $validatedData['status'] = $request->status == true ? '1' : '0';

        $job->title = $validatedData['title'];
        $job->small_description = $validatedData['small_description'];
        $job->description = $validatedData['description'];
        $job->location = $validatedData['location'];
        $job->position = $validatedData['position'];
        $job->slug = Str::slug($validatedData['slug']);
        $job->status = $validatedData['status'];
        $job->type = $validatedData['type'];
        $job->closing_date = $validatedData['closing_date'];
        $job->eligibility = $validatedData['eligibility'];
        $job->save();

        return redirect('admin/jobs')->with('message','Your job have been created successfully');
    }

    public function edit(int $job){
        $jobs = Job::findOrFail($job);
        return view('admin.job.edit', compact('jobs'));
    }

    public function update(JobFormRequest $request, $job){
        $validatedData = $request->validated();

        $job = Job::findOrFail($job);

        $validatedData['status'] = $request->status == true ? '1' : '0';

        $job->title = $validatedData['title'];
        $job->small_description = $validatedData['small_description'];
        $job->description = $validatedData['description'];
        $job->location = $validatedData['location'];
        $job->position = $validatedData['position'];
        $job->slug = $validatedData['slug'];
        $job->status = $validatedData['status'];
        $job->type = $validatedData['type'];
        $job->closing_date = $validatedData['closing_date'];
        $job->eligibility = $validatedData['eligibility'];

        $job->update();

        return redirect('admin/jobs')->with('message', 'Job updated successfully');

    }

    public function view(int $job){
        $jobs = Job::findOrFail($job);
        return view('admin.job.view', compact('jobs'));
    }

    public function destroy(Job $job){
        if($job->count() > 0){
            $job->delete();
            return redirect('admin/jobs')->with('message', 'Job deleted successfully'); 
            
        }
        return redirect('admin/jobs')->with('message', 'Something went wrong'); 
    }

}
