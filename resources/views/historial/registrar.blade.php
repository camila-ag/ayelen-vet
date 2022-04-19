@extends('layouts.layout')

@section('title')
    <title>Registrar visita | Ayelen</title>
@endsection

@section('content')

<div class="bg-light mt-4 border border-dark p-md-4 p-2 rounded mx-auto justify-content-evenly" style="max-width: 900px;">
    <h4 class="pb-3 border-bottom mb-4 border-dark">Registrar consulta</h4>
    
    <form action="{{route('historial.store')}}" method="POST">
        @csrf
        <div class="row mt-4 mx-auto" style="max-width:800px;">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="paciente_id" value="{{$paciente->id}}">
            <label for="mot" class="col-md-2 col-form-label">Paciente</label>
            <div class="col-md-4 mb-3">
                <input type="text" readonly class="form-control" id="pac" value="{{ucfirst($paciente->nombre)}}">
            </div>

            <label for="fecha" class="col-md-2 col-form-label">Fecha</label>
            <div class="col-md-4 mb-3">
                <input type="date" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha') }}" name="fecha" id="fecha"
                required>
                @error('fecha')
                    <div id="fecha" class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
    
            <label for="mot" class="col-md-2 col-form-label">Motivo</label>
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control @error('motivo') is-invalid @enderror" value="{{ old('motivo') }}" name="motivo" id="motivo"
                placeholder="Ingrese motivo" required>
                @error('motivo')
                    <div id="motivo" class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
    
            <label for="temperatura" class="col-md-2 col-form-label">T°</label>
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control @error('temperatura') is-invalid @enderror" value="{{ old('temperatura') }}" name="temperatura" id="temperatura"
                placeholder="Ingrese temperatura ej: 33.8" required>
                @error('temperatura')
                    <div id="temperatura" class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
    
            <label for="peso" class="col-md-2 col-form-label">Peso</label>
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control @error('peso') is-invalid @enderror" value="{{ old('peso') }}" name="peso" id="peso"
                placeholder="Ingrese peso ej: 4.5" required>
                @error('peso')
                    <div id="peso" class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
    
            <label for="cc" class="col-md-2 col-form-label">C.C</label>
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control @error('cc') is-invalid @enderror" value="{{ old('cc') }}" name="cc" id="cc"
                placeholder="Ingrese CC" required>
                @error('cc')
                    <div id="cc" class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
    
            <label for="tratamiento" class="col-md-2 col-form-label">Tratamiento</label>
            <div class="col-md-10 mb-3">
                <textarea name="tratamiento" id="tratamiento" class="form-control @error('cc') is-invalid @enderror"
                placeholder="Ingrese tratamiento">{{old('cc')}}</textarea>
                @error('tratamiento')
                    <div id="tratamiento" class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
    
            <div class="text-center">
                <button class="btn btn-primary">Registrar consulta</button>
            </div>
        </div>
    </form>


</div>

@endsection