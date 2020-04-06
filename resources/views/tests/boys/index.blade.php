@extends('layouts.nav')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="col-lg-12">
                   <h1>Bienvenido, esta prueba durará {{$test->tiempo_lectura}} segundos</h1>
                   <input type="hidden" id="seg" value="{{$test->time}}">
                   <button class="btn btn-primary"  id="btn-comenzar">Comenzar</button>
                </div>
            </div>
        </div>
        <div class="row m-5" id="test" >
            <div class="col-sm-12">
                <div class="card" >
                  <div class="card-body">
                    <h5 class="card-title">{{$test->title}}</h5>
                    <p class="card-text">{{$test->lectura_completa}}</p>
                  </div>
                </div>
            </div>
        </div>
        <div class="row" id="questions" >
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                 @foreach ($test->preguntasAsociadas as $key => $value)
                        <p class="font-weight-bold"> #{{$key+1}} - {{$value->title_question}}</p>
                        @foreach ($value->opcionesAsociadas as $value2)
                        <div class="custom-control custom-radio mb-2">
                            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio1"> {{$value2->option}}</label>
                        </div>
                        @endforeach
                 @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> 
</section>
@endsection
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