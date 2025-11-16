<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke()
    {
        $jobs =Job::with(['employer','tags'])->where('title','like','%'.request('query').'%')->get();
        return view('search.index',[
            'jobs'=>$jobs
        ]);
    }
}
