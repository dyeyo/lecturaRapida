@extends('layouts.nav')

@section('content')
    <div class="container">
        <div class="row" id="reading">
                <div class="col-lg-12">
                   <h1>Bienvenido, esta prueba durará {{$test->time}} segundos</h1>
                   <input type="hidden" id="seg" value="{{$test->time}}">
                   <button class="btn btn-primary"  id="btn-comenzar">Comenzar</button>
                </div>
        </div>
        <div class="row" id="test" style="display: none">
            <div class="col-lg-12">
                <h2>{{$test->title}}</h2>
                <p>{{$test->reading}}</p>
                <button class="btn btn-primary"  id="btn-finalizar">Finalizar</button>
            </div>
        </div>
        <div class="row" id="questions" style="display: none">
            <div class="col-lg-12">
                <h2>Preguntas</h2>
                <form method="POST" action="{{route('testsave')}}">
                    @csrf()
                    @foreach ($questions as $ques)
                        <label class="form-check-label">{{$ques->title_question}}</label>
                        <input type="hidden" name="title" value="{{$ques->title_question}}">
                        <div  style="position:absolute;">
                            <div class="form-check form-check-block">
                                <input class="form-check-input" type="radio" name="response_one" id="response_one" value="{{$ques->option_one}}">
                                <label class="form-check-label" for="response_one">{{$ques->option_one}}</label>
                            </div>
                            <div class="form-check form-check-block">
                                <input class="form-check-input" type="radio" name="response_two" id="response_two" value="{{$ques->option_two}}">
                                <label class="form-check-label" for="response_two">{{$ques->option_two}}</label>
                            </div>
                            <div class="form-check form-check-block">
                                <input class="form-check-input" type="radio" name="response_three" id="response_three" value="{{$ques->option_three}}">
                                <label class="form-check-label" for="response_three">{{$ques->option_three}}</label>
                            </div>
                            <div class="form-check form-check-block">
                                <input class="form-check-input" type="radio" name="response_four" id="response_four" value="{{$ques->option_four}}">
                                <label class="form-check-label" for="response_four">{{$ques->option_four}}</label>
                            </div>
                        </div>
                    @endforeach
                    <button class="btn btn-primary" type="submit"  id="btn-finalizar">Enviar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {	
            let timesseg= $('#seg').val()*1000    
            $("#btn-comenzar").on("click", function(){
                setTimeout(timeLimit, timesseg);
              });
            $("#btn-comenzar").click(function() {
                $('#test').show()
                $('#btn-comenzar').css('display','none')
            });
            $("#btn-finalizar").click(function() {
                $('#test').css('display','none')
                $('#questions').show()
            });

            function timeLimit(){
                $('#test').css('display','none')  
                alert('Se termino el Tiempo')
            }
                
            
            
        });
    </script>
@endsection