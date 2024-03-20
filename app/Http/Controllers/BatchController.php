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
        $name = $request->input('name');
        // echo 'Batches';
        // $data= Batch::all();
        if($name==''){
            $batches=Batch::withCount('quizzes')->paginate(5);
        }else{
            $batches= Batch::withCount('quizzes')->where('course','like','%'.$name.'%')->paginate(4);
        }
        
        // return $batches;
        
       return view('batches.index',['batches' => $batches]);
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
