<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class JobApiController extends Controller
{
    public function index()
    {
        return Job::all();
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'company_name' => 'required',
            'location' => 'required',
            'salary' => 'nullable',
            'job_type' => 'required|in:دوام كامل,دوام جزئي,عمل حر',
        ]);

        return Job::create($data);
    }

    public function show($id)
    {
        return Job::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->update($request->all());
        return $job;
    }

    public function destroy($id)
    {
        Job::destroy($id);
        return response()->json(['message' => 'Job deleted']);
    }
}
