<?php namespace App\Http\Controllers;

use App\Models\job_postings;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class JobController extends Controller 
{
    public function index()
    {
        $jobs = job_postings::all();
        return view('Action.jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('Action.jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_title' => 'required|string',
            'job_name' => 'required|string',
            'job_description' => 'required|string',
            'job_qualification' => 'required|string',
            'job_location' => 'required|string',
            'job_amount' => 'required|numeric',
            
        ]);

        job_postings::create($request->all());

        return redirect('/jobs')->with('status', 'Job created successfully');
    }

    public function edit($id)
    {
        $job = job_postings::findOrFail($id);
        return view('Action.jobs.edit', ['job' => $job]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'job_title' => 'required|string',
            'job_name' => 'required|string',
            'job_duration' => 'required|string',
            'job_type' => 'required|string',
            'job_description' => 'required|string',
            'job_qualification' => 'required|string',
            'job_location' => 'required|string',
            'job_amount' => 'required|numeric',
        ]);

        $job = job_postings::findOrFail($id);
        $job->update($request->all());

        return redirect('/jobs')->with('status', 'Job updated successfully');
    }

    public function destroy($id)
    {
        $job = job_postings::findOrFail($id);
        $job->delete();

        return redirect('/jobs')->with('status', 'Job deleted successfully');
    }
}
