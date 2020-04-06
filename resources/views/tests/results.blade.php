@extends('layouts.nav')

@section('content')
    <div class="container">
        <div class="row m-1">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Pregunta</th>
                        <th scope="col">Respuesta</th>
                        <th scope="col">Usuario Resposable</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tests as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->question}}</td>
                        <td>{{$item->question}}</td>
                        <td>{{$item->id_user}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection