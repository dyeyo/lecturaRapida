@extends('layouts.nav')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($test as $item )
                <div class="col-lg-12">
                   <h1>Bienvenido, esta prueba durará {{$item->time}} segundos</h1>
                   <button class="btn btn-primary">Comenzar</button>
                </div>
                <div class="jumbotron">
                    <h2>{{$item->title}}</h2>
                    <p>{{$item->reading}}</p>
                   <button class="btn btn-primary">Terminar</button>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h2>Preguntas</h2>
                @foreach ($questions as $ques)
                    <label class="form-check-label">{{$ques->title_question}}</label>
                    <div  style="position:absolute;">
                        <div class="form-check form-check-block">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="option_one" value="{{$item->option_one}}">
                            <label class="form-check-label">{{$ques->option_one}}</label>
                        </div>
                        <div class="form-check form-check-block">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="option_two" value="{{$item->option_two}}">
                            <label class="form-check-label">{{$ques->option_two}}</label>
                        </div>
                        <div class="form-check form-check-block">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="option_three" value="{{$item->option_three}}">
                            <label class="form-check-label">{{$ques->option_three}}</label>
                        </div>
                        <div class="form-check form-check-block">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="option_four" value="{{$item->option_four}}">
                            <label class="form-check-label">{{$ques->option_four}}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
@endsection