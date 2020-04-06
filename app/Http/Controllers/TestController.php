<?php

namespace App\Http\Controllers;

use App\Questions;
use App\QuestionsTest;
use App\Reading;
use App\Results;
use App\Tests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class TestController extends Controller
{
    
    public function testboys($id)
    {
         $test = Tests::where('id', $id)->with('preguntasAsociadas', 'preguntasAsociadas.opcionesAsociadas')->first();

            foreach ($test->preguntasAsociadas as $key => $value) {
                foreach ($value->opcionesAsociadas as $key => $value2) {
                    $value2->marcada = false;
                }
                
            }

        
        return view('tests.boys.index', compact('test'));
    }

    public function store(Request $request)
    {
        dd($request->all());
        // $result=new Results();
        // $result->question = $request->question;
        // $result->id_user = Auth::id();
        // $result->save();

        // return redirect()->route('getTest');
    }

    public function guardarTest(Request $request,Tests $test)
    {
        try {
            return DB::transaction(function() use ($request, $test){
                    $test->title = $request->title;
                    $test->lectura_completa = $request->lectura;
                    $test->tiempo_lectura = $request->tiempo;
                    $test->rango = $request->rango;
                    $test->id_user = Auth::id();
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

    public function getTest()
    {
        $tests=Results::all();        
        return view('tests.results',compact('tests'));
    }

   
}
