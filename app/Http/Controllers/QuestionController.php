<?php

namespace App\Http\Controllers;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions= Question::paginate(3);
        return $questions;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $quizzes= Quiz::all();
        echo $quizzes;
        return view("questions.create",['quizzes' => $quizzes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $question=new Question;
        $question ->question = $request->question;
        $question ->option_A = $request->option_A;
        $question ->option_B = $request->option_B;
        $question ->option_C = $request ->option_C;
        $question ->option_D = $request ->option_D;
        $question ->correct = $request ->correct;
        $question ->answer = $request ->correct;
        $question ->quiz_id =$request ->quiz_id;
        $question ->type =$request ->type;
        echo($question);
        $question->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        echo $id;
        $question=Question::find($id);
        $question->delete();
        echo Question::all();
        // Assuming authentication is required for this action
        // You can customize this according to your application's authorization logic
        // if (!Auth::check()) {
            // Redirect the user to login if not authenticated
            // return redirect()->route('login');
        // }

        // Check if the authenticated user owns the quiz that the question belongs to
        // if ($question->quiz->user_id !== Auth::user()->id) {
            // Unauthorized access, redirect the user to a relevant page or return an error message
            // return redirect()->route('home')->with('error', 'Unauthorized access');
        // }

        // Delete the question
        // $question->delete();

        // Redirect back with a success message
        // return redirect()->back()->with('success', 'Question deleted successfully');
    }
}
