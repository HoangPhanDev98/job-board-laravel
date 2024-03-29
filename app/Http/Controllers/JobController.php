<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $jobs = Job::query();

        $jobs
            ->when(request('search'), function ($query) {
                $query->where(function ($query) {
                    $query->where('title', 'like', '%' . request('search') . '%')->orWhere('description', 'like', '%' . request('search') . '%');
                });
            })
            ->when(request('minSalary'), function ($query) {
                $query->where('salary', '>=', request('minSalary'));
            })
            ->when(request('maxSalary'), function ($query) {
                $query->where('salary', '<=', request('maxSalary'));
            })
            ->when(request('experience'), function ($query) {
                $query->where('experience', request('experience'));
            })
            ->when(request('category'), function ($query) {
                $query->where('category', request('category'));
            });

        return view('job.index', ['jobs' => $jobs->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('job.show', ['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
