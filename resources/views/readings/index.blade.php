@extends('layouts.nav')

@section('content')
<div class="container mt-5">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Crear Lectura
    </button>
      
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
    
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Creación del Lectura</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('readings_create') }}">
            @csrf()
            <div class="form-group">
              <label for="reading">titulo de la Completa</label>
              <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="form-group">
              <label for="reading">Lectura Completa</label>
              <textarea class="form-control" id="reading" name="reading" style="resize: none"></textarea>
            </div>
            <div class="form-group">
              <label for="time">Tiempo Limite en Segundos</label>
              <input type="text" class="form-control" name="time" id="time" placeholder="60">
            </div>
            <div class="form-group">
              <label for="range_age">Rango de Edades</label>
              <select class="form-control" id="range_age" name="range_age">
                <option value="ninos">Niños de 8 a 15 años</option>
                <option value="jovenes">Jovenes de 16 a 25 años</option>
                <option value="adultos">Adultos 26 años en adelante</option>
              </select>
            </div>
            <label for="test_id">Seleccione la Prueba acorde para la lectura</label>
            <div class="form-group">
              @foreach($questions as $item)
                <input type="checkbox" style="font-size: 3px;" class="form-control" value="{{$item->id}}" name="test_id" id="test_id">
                <label for="test_id">{{$item->title_question}}</label>
              @endforeach
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Pregunta</button>
      </div>
    </form>

    </div>
  </div>
</div>
@endsection