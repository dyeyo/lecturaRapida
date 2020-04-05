<?php

namespace App\Http\Controllers;

use App\Questions;
use App\QuestionsTest;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    
    public function index(Questions $questions)
    {
        return view('questions.index');
    }
     public function preguntas(Questions $questions)
    {
        $questions = $questions->with('preguntasAsociadas')->get();
        return $questions;
    }
     public function preguntasEspesifica(Questions $questions, $id)
    {
        $questions = $questions->where('id', $id)->with('preguntasAsociadas')->first();
        return $questions;
    }


    public function store(Request $request)
    {
        $head_questions=new Questions();
        $head_questions->title_question=$request->title_question;
        $head_questions->save();

        $questions = Questions::all();

        return  view('questions.index',compact('questions'));
    }

    public function guardarOpcionDePregunta(Request $request, $id_pregunta)
    {
        $opcion =  new QuestionsTest();
        $opcion->option = $request->opcion_pregunta;
        $opcion->questions_id = $id_pregunta;
        $opcion->save(); 

        return $opcion;
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
