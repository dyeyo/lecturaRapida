@extends('layouts.nav')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Prueba para niños de 8 a 15 años</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                        <a href="{{ route('testboys')}}" class="btn btn-primary">Hacer Prueba</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Prueba para Jovenes de 16 a 25 años</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                        <a href="{{ route('testyoungs')}}" class="btn btn-primary">Hacer Prueba</a>
                    </div>
                    </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Prueba para Adultos 26 años en adelante</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                        <a href="{{ route('testadults')}}" class="btn btn-primary">Hacer Prueba</a>
                    </div>
                    </div>
            </div>
        </div>
    </div>
@endsection

        