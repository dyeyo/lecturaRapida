@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row">
                @foreach ($testR as $key => $value)
                @if ($value['rango'] === 1)
                <div class="col-md-4 m-1">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Prueba para niños de 8 a 15 años</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                            <a href="{{ route('asdd', ['id' => $value['id']]) }}"  class="btn btn-primary" @click="irRuta(test.id)" >Mirar Prueba</a>
                        </div>
                    </div>
                </div>
                 @endif
                   @if ($value['rango'] === 2)
                <div class="col-md-4 m-1">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Prueba para Jovenes de 16 a 25 años</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                            <a href="{{ route('asdd', ['id' => $value['id']]) }}" class="btn btn-primary">Mirar Prueba</a>
                        </div>
                    </div>
                </div>
                 @endif
                 @if ($value['rango'] === 3)
                <div class="col-md-4 m-1">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Prueba para Adultos 26 años en adelante</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                            <a href="{{ route('asdd', ['id' => $value['id']]) }}" class="btn btn-primary">Mirar Prueba</a>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
        </div>
    </div>
</section>

@endsection

        