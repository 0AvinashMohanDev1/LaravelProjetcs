<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Batch;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $quizzes= Quiz::all();
        // echo $quizzes;
        $title = $request->input('title');

        // Check if title parameter is provided
        if ($title !== null && $title !== '') {
            $quizzes = Quiz::where('title', 'like', '%' . $title . '%')->get();
        } else {
            $quizzes = Quiz::all();
        }

        return view('quizzes.index', ['quizzes' => $quizzes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $batches= Batch::all();
        // return $batches;
       return view('quizzes.create',['batches' => $batches]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $quiz = new Quiz;
        $quiz ->title = $request->title;
        $quiz ->starting = $request->starting;
        $quiz ->ending = $request->ending;
        $quiz ->batch_id = $request -> batch_id;
        $quiz ->duration = $request ->duration;
        $quiz ->user_id =Auth::id();
        
        $quiz->save();
        echo $quiz;
        // return redirect()->route('quizzes.index');
        // echo "you are here";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $questions= Question::whereIn('quiz_id',[$id])->get();
        
        // echo $questions;
        $quiz=Quiz::find($id);
        // echo $quiz;

        // return view('quizzes.show',['quiz'=>$quiz]);
        return view('quizzes.show',['questions' => $questions,'quiz'=>$quiz]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        echo "quizzes";
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
        echo $id;
        // Quiz::delete($id);
        // return view("quizzes.index");
    }
}
