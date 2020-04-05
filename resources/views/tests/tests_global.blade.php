@extends('layouts.nav')

@section('content')
    <div class="container">
        <div class="row" id="reading">
                <div class="col-lg-12">
                   <h1>Bienvenido, esta prueba durará {{$test->time}} segundos</h1>
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
        <div class="row" id="test">
            <div class="col-lg-12">
                <h2>Preguntas</h2>
                @foreach ($questions as $ques)
                    <label class="form-check-label">{{$ques->title_question}}</label>
                    <div  style="position:absolute;">
                        <div class="form-check form-check-block">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="option_one" value="{{$ques->option_one}}">
                            <label class="form-check-label">{{$ques->option_one}}</label>
                        </div>
                        <div class="form-check form-check-block">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="option_two" value="{{$ques->option_two}}">
                            <label class="form-check-label">{{$ques->option_two}}</label>
                        </div>
                        <div class="form-check form-check-block">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="option_three" value="{{$ques->option_three}}">
                            <label class="form-check-label">{{$ques->option_three}}</label>
                        </div>
                        <div class="form-check form-check-block">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="option_four" value="{{$ques->option_four}}">
                            <label class="form-check-label">{{$ques->option_four}}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script>
        $("#btn-comenzar").click(function() {
            $('#test').show()
            $('#btn-comenzar').css('display','none')
        });
        $("#btn-finalizar").click(function() {
            $('#test').css('display','none')
        });
    </script>
@endsection