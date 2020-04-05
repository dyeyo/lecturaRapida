<?php

namespace App\Http\Controllers;

use App\Questions;
use App\QuestionsTest;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    
    public function index()
    {
        $questions=Questions::all();
        return view('questions.index',compact('questions'));
    }

    public function store(Request $request)
    {
        $head_questions=new Questions();
        $head_questions->title_question=$request->title_question;
        $head_questions->save();

        $body_questions=new QuestionsTest();
        $body_questions->option_one=$request->option_one;
        $body_questions->option_two=$request->option_two;
        $body_questions->option_three=$request->option_three;
        $body_questions->option_four=$request->option_four;
        $body_questions->questions_id=$head_questions->id;
        $body_questions->save();

        return redirect()->route('questions');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
