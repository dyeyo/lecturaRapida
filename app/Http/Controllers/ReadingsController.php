<?php

namespace App\Http\Controllers;

use App\Questions;
use App\Reading;
use Illuminate\Http\Request;

class ReadingsController extends Controller
{
    public function index()
    {
      
        return view('readings.index');
    }

    public function preguntas(){
        $readings=Reading::all();
        $questions=Questions::select('id','title_question')->get();
    }

    public function store(Request $request)
    {
        Reading::create($request->all());
        return redirect()->route('readings');
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
