@extends('layouts.nav')

@section('content')
    <div class="container">
        <div class="row">
            Pruebas para Jovenes
            @foreach ($test as $item )
                <div class="com-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Prueba {{$item->title}}</h5>
                            <p class="card-text"></p>
                            <a href="{{ route('gettest', $item->id) }}" class="btn btn-primary">Hacer Prueba</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection