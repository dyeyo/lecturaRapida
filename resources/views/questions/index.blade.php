@extends('layouts.nav')

@section('content')
<div class="container mt-5">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Crear Test
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
        <h5 class="modal-title" id="exampleModalLabel">Creación del Test</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('questions_create') }}">
            @csrf()
            <div class="form-group">
              <label for="title_question">Enunciado de la Pregunta</label>
              <input type="text" class="form-control" name="title_question" id="title_question" placeholder="¿Cuales son los colores de la bandera Colombiana? ">
            </div>
            <div class="form-group">
              <label for="option_one">Primera Pregunta</label>
              <input type="text" class="form-control" name="option_one" id="option_one">
            </div>
            <div class="form-group">
              <label for="option_two">Segunda Pregunta</label>
              <input type="text" class="form-control" name="option_two" id="option_two">
            </div>
            <div class="form-group">
              <label for="option_three">Tercera Pregunta</label>
              <input type="text" class="form-control" name="option_three" id="option_three">
            </div>
            <div class="form-group">
              <label for="option_four">Cuarta Pregunta</label>
              <input type="text" class="form-control" name="option_four" id="option_four">
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