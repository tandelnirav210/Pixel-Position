<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::latest()->with(['employer','tags'])->get()->groupBy('featured');
        return view('jobs.index', [
            'featuredJobs' => $jobs[1]??[],
            'jobs' => $jobs[0],
            'tags'=> Tag::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributs = $request->validate([
            'title' => 'required',
            'location' => 'required',
            'salary' => 'required',
            'schedule' => 'required|in:Full Time,Part Time,Contract',
            'url' => 'required|active_url',
            'tags' => 'nullable',
        ]);

        $attributs['featured'] = $request->has('featured');

        $job = Auth::user()->employer->jobs()->create(Arr::except($attributs, 'tags'));;

        if ($attributs['tags']??false) {
            foreach (explode(',',$attributs['tags']) as $tag) {
                $job->tag($tag);
            }
            /*$request->user()->employer->jobs()->createMany(
                collect($attributs['tags'])->map(fn($tag) => ['title' => $tag])->toArray()
            );*/
        }

        return redirect('/')->with('success', 'Job Posted Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
