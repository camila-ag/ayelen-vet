@extends('layouts.layout')

@section('title')
    <title>Actualizar consulta | Ayelen</title>
@endsection

@section('content')
<div class="bg-light mt-4 border border-dark p-md-4 p-2 rounded mx-auto justify-content-evenly" style="max-width: 900px;">
    <h4 class="pb-3 border-bottom mb-4 border-dark">Actualizar consulta</h4>
    
    <form action="{{route('consultas.update', $consulta->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mt-4 mx-auto" style="max-width:800px;">
            <label for="mot" class="col-md-2 col-form-label">Fecha</label>
            <div class="col-md-4 mb-3">
                <input type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" id="fecha" value="{{$consulta->fecha}}">
                @error('fecha')
                    <div id="fecha" class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
    
            <label for="hora" class="col-md-2 col-form-label">Hora</label>
            <div class="col-md-4 mb-3">
                <select class="form-select @error('hora') is-invalid @enderror" name="hora" aria-label="Default select example" id="hora" required>
                    <option value="{{$consulta->hora}}" selected>{{$consulta->hora}}</option>
                    <option value="09:30">09:30</option>
                    <option value="10:00">10:00</option>
                    <option value="10:30">10:30</option>
                    <option value="11:00">11:00</option>
                    <option value="11:30">11:30</option>
                    <option value="12:00">12:00</option>
                    <option value="12:30">12:30</option>
                    <option value="15:00">15:00</option>
                    <option value="15:30">15:30</option>
                    <option value="16:00">16:00</option>
                    <option value="16:30">16:30</option>
                    <option value="17:00">17:00</option>
                    <option value="17:30">17:30</option>
                    <option value="18:00">18:00</option>
                    <option value="18:30">18:30</option>
                </select>
                @error('hora')
                    <div id="hora" class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
    
            <label for="motivo" class="col-md-2 col-form-label">Motivo</label>
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control @error('motivo') is-invalid @enderror" name="motivo" id="motivo" value="{{$consulta->motivo}}">
                @error('motivo')
                    <div id="motivo" class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
    
            <label for="paciente" class="col-md-2 col-form-label">Paciente</label>
            <div class="col-md-4 mb-3">
                <input type="text" name="paciente" id="paciente" class="form-control @error('paciente') is-invalid @enderror" value="{{$consulta->paciente}}">
                @error('paciente')
                    <div id="paciente" class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
    
            <label for="propietario" class="col-md-2 col-form-label">Propietario</label>
            <div class="col-md-4 mb-3">
                <input type="text" name="propietario" id="propietario" class="form-control @error('propietario') is-invalid @enderror" value="{{$consulta->propietario}}">
                @error('propietario')
                    <div id="propietario" class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
    
            <label for="telefono" class="col-md-2 col-form-label">Telefono</label>
            <div class="col-md-4 mb-3">
                <input type="text" name="telefono" id="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{$consulta->telefono}}">
                @error('telefono')
                    <div id="telefono" class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
    
            <div class="col-2 mt-2">
                <a href="{{URL::previous()}}" class="btn btn-outline-primary">Volver</a>
            </div>
    
            <div class="col-4 mx-auto mt-2">
                <button class="btn btn-primary">Actualizar</button>
            </div>

            @if ($message = Session::get('error'))
                <div class="col-md-12">
                    <div class="alert alert-warning d-flex align-items-center alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-3" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill" /></svg>
                        <div>
                            {{ $message }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

        </div>
    </form>

</div>
@endsection