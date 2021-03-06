@extends('layouts.nav')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="col-lg-12">
                   <h1>Bienvenido, esta prueba durará {{$test->tiempo_lectura}} segundos</h1>
                   <input type="hidden" id="seg" value="{{$test->tiempo_lectura}}">
                   <button class="btn btn-primary"  id="btn-comenzar">Comenzar</button>
                </div>
            </div>
        </div>
        <div class="row m-5" id="test"  style="display: none" >
            <div class="col-sm-12">
                <div class="card" >
                  <div class="card-body">
                    <h5 class="card-title">{{$test->title}}</h5>
                    <p class="card-text">{{$test->lectura_completa}}</p>
                  </div>
                </div>
            </div>

        </div>
        <div class="row" id="questions" style="display: none" >
            <div class="col-sm-12">
                <div class="card">
                    <form method="POST" action="{{route('testsave')}}">
                        @csrf()
                        <div class="card-body">
                            @foreach ($test->preguntasAsociadas as $key => $value)
                                <p class="font-weight-bold"> #{{$key+1}} - {{$value->title_question}}</p>
                                @foreach ($value->opcionesAsociadas as $value2)
                                <div class="custom-control custom-radio mb-2">
                                    <input type="radio" id="question-{{$value2->id}}-{{$value->id}}" name="question-{{$value2->id}}-{{$value->id}}" 
                                    class="custom-control-input" value="{{$value->id}}, {{$value2->id}}" >
                                    <label class="custom-control-label" for="question-{{$value2->id}}-{{$value->id}}"> {{$value2->option}}</label>
                                </div>
                                @endforeach
                            @endforeach
                        </div>
                        <button type="submit">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</section>
@endsection
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    
<script>
        $(document).ready(function() {  
            let timesseg= $('#seg').val()*1000  
            $("#btn-comenzar").click(function() {
                $('#test').show()
                $('#btn-comenzar').css('display','none')
                setTimeout(timeLimit, timesseg);
            });
            $("#btn-finalizar").click(function() {
                $('#test').css('display','none')
                $('#questions').show()
            });

            function timeLimit(){
                $('#test').css('display','none')  
                alert('Se termino el Tiempo')
                $('#questions').show()
            }
        });
    </script>