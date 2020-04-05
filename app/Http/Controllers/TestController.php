<?php

namespace App\Http\Controllers;

use App\Questions;
use App\QuestionsTest;
use App\Reading;
use App\Tests;
use App\Pregunta_test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class TestController extends Controller
{
    
    public function testboys($id)
    {
        $id_test = $id;
        return view('tests.boys.index', compact('id_test'));
    }
    public function obtenerTestEspesifica($id)
    {
        $t = Tests::where('id', $id)->with('preguntasAsociadas', 'preguntasAsociadas.opcionesAsociadas')->first();
        return $t;
    }
    // public function testyoungs()
    // {
    //     $test=Reading::select('id','title','reading','time','test_id')->where('range_age','jovenes')->get();
    //     return view('tests.young.index',compact('test'));
    // }

    // public function testadults()
    // {
    //     $test=Reading::select('id','title','reading','time','test_id')->where('range_age','adultos')->get();
    //     return view('tests.adults.index',compact('test'));
    // }

    // public function getTest($id)
    // {   
    //     $test=Reading::find($id);
    //     //dd($test);

    //     $questions = DB::table('questions_tests')
    //                 ->join('questions', 'questions_tests.questions_id', '=', 'questions.id')
    //                 ->select('questions_tests.option_one','questions_tests.option_two',
    //                 'questions_tests.option_three','questions_tests.option_four','questions.id','questions.title_question')
    //                 ->where('questions.id',$id)
    //                 ->get();
    //     $time = Reading::select('id','time')->where('id',$id)->get();
    //     return view('tests.tests_global',compact('test','questions','time'));
    //     //dd($questions);

    // }

    public function store(Request $request)
    {
        QuestionsTest::create($request->all());
        return view('wellcome');
    }

    public function guardarTest(Request $request,Tests $test)
    {
        try {
            return DB::transaction(function() use ($request, $test){
                    $test->title = $request->titulo;
                    $test->lectura_completa = $request->lectura;
                    $test->tiempo_lectura = $request->tiempo;
                    $test->rango = $request->rango;
                    $test->rango = $request->rango;
                    $test->save();

                foreach ($request->preguntas as $key => $value) {
                    $t = Tests::find($test->id);
                    $t->preguntasAsociadas()->attach($value['id']);
                }

            });
        } catch (Exception $e) {
            throw new Exception($e, 1);
            
        }

    }
    public function mostrarTest(Tests $test)
    {
        $a = $test->with('preguntasAsociadas','preguntasAsociadas.opcionesAsociadas')->get();
        return $a;
    }

   
}
