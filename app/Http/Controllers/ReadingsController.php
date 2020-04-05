<?php

namespace App\Http\Controllers;

use App\Questions;
use App\Reading;
use Illuminate\Http\Request;

class ReadingsController extends Controller
{
    public function index()
    {
        $readings=Reading::all();
        $questions=Questions::select('id','title_question')->get();
        return view('readings.index',compact('readings','questions'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
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
