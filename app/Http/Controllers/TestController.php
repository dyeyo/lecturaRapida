<?php

namespace App\Http\Controllers;

use App\Questions;
use App\QuestionsTest;
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
        return view('tests.boys.index',compact('test','questions'));
    }
    public function testyoungs()
    {
        $test=Reading::select('id','title','reading','time','test_id')->where('range_age','jovenes')->get();
        return view('tests.young.index',compact('test'));
    }

    public function testadults()
    {
        $test=Reading::select('id','title','reading','time','test_id')->where('range_age','adultos')->get();
        return view('tests.adults.index',compact('test'));
    }

    public function getTest($id)
    {   
        $test=Reading::find($id);
        //dd($test);

        $questions = DB::table('questions_tests')
                    ->join('questions', 'questions_tests.questions_id', '=', 'questions.id')
                    ->select('questions_tests.option_one','questions_tests.option_two',
                    'questions_tests.option_three','questions_tests.option_four','questions.id','questions.title_question')
                    ->where('questions.id',$id)
                    ->get();
        $time = Reading::select('id','time')->where('id',$id)->get();
        return view('tests.tests_global',compact('test','questions','time'));
        //dd($questions);

    }

    public function store(Request $request)
    {
        QuestionsTest::create($request->all());
        return view('wellcome');
    }

   
}
