<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\Quiz;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Check if the 'count' parameter is present in the request
    if ($request->has('count')) {
        // Check the value of the 'count' parameter
        $count = $request->input('count');
        
        // Based on the value of 'count', perform appropriate actions
        if ($count === 'empty') {
            // Handle the case when 'Empty' button was clicked
            // For example, retrieve batches where quizzes count is 0
            $batches = Batch::withcount('quizzes')->has('quizzes', '=', 0)->paginate(5);
        } elseif ($count === 'non-empty') {
            // Handle the case when 'Non-Empty' button was clicked
            // For example, retrieve batches where quizzes count is greater than 0
            $batches = Batch::withcount('quizzes')->has('quizzes', '>', 0)->paginate(5);
        } elseif ($count === 'all') {
            // Handle the case when 'Non-Empty' button was clicked
            // For example, retrieve batches where quizzes count is greater than 0
            $batches = Batch::withcount('quizzes')->paginate(5);
        }  else {
            // Handle the case when 'count' parameter has an unexpected value
            // You can add appropriate error handling or default behavior here
            // For example, redirect back with an error message
            return redirect()->back()->with('error', 'Invalid count parameter value');
        }
    } else {
        // Handle the case when 'count' parameter is not present
        // This could be the initial request or a request without the 'count' parameter
        // For example, retrieve all batches with or without filtering by name
        $name = $request->input('name');
        if ($name === '') {
            $batches = Batch::withCount('quizzes')->paginate(5);
        } else {
            $batches = Batch::withCount('quizzes')->where('course', 'like', '%' . $name . '%')->paginate(4);
        }
    }

    return view('batches.index', ['batches' => $batches]);
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // echo 'create batch';
        return view('batches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $batch = new Batch;
        $batch ->name = $request->batch;
        $batch ->created_at = $request->created_at;
        $batch ->type = $request -> type;
        $batch ->course = $request ->course;
        
        $batch->save();
        echo $batch;
        return redirect()->route('batches.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $batch=Batch::find($id);
        // $quizzes=Quiz::whereIn("batch_id",[$id])->get();
        // echo $quizzes;
        // return view('batches.show',['batch'=>$batch,'quizzes'=>$quizzes]);
        return view('batches.show',['batch'=>$batch]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $batch=Batch::find($id);
        return view('batches.edit',['batch'=>$batch]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Fetch the batch from the database
        $batch = Batch::findOrFail($id);

        // Update the batch attributes only if they have changed
        if ($request->name !== $batch->name) {
            $batch->name = $request->name;
        }
        if ($request->type !== $batch->type) {
            $batch->type = $request->type;
        }
        if ($request->course !== $batch->course) {
            $batch->course = $request->course;
        }
        if ($request->created_at !== $batch->created_at) {
            $batch->created_at = $request->created_at;
        }

        // Save the updated batch
        $batch->save();

        // Redirect to the show page for the updated batch
        return redirect()->route('batches.show', ['batch' => $batch]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $batch=Batch::find($id);
        $batch->delete();
        return redirect()->route('batches.index');
    }
}
