<?php

namespace App\Http\Controllers;

use App\Questions;
use App\Reading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class TestController extends Controller
{
    
    public function testboys()
    {
        $test=Reading::select('id','title','reading','time','test_id')->where('range_age','ninos')->get();
        // $questions =DB::table('questions')
        //             ->join('questions_tests', 'questions.id', '=', ' questions_tests.questions_id')
        $questions =DB::table('questions_tests')
                    ->join('questions', 'questions_tests.questions_id', '=', 'questions.id')
                    ->select('questions_tests.option_one','questions_tests.option_two',
                    'questions_tests.option_three','questions_tests.option_four','questions.id','questions.title_question')
                    ->get();
                    //dd($questions);
        return view('tests.tests_global',compact('test','questions'));
    }
    public function testyoungs()
    {
        $test=Reading::select('id','title','reading','time','test_id')->where('range_age','jovenes')->get();
        //return view('tests.young.index',compact('test'));
        return view('tests.tests_global',compact('test'));
    }

    public function testadults()
    {
        $test=Reading::select('id','title','reading','time','test_id')->where('range_age','adultos')->get();
        //return view('tests.adults.index',compact('test'));
        return view('tests.tests_global',compact('test'));
    }

    public function getTest($id)
    {   
    }

    public function store(Request $request)
    {
        //
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
