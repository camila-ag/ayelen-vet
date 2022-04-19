@extends('layouts.layout')

@section('title')
    <title>Nuevo paciente | Ayelen</title>
@endsection

@section('content')
<form action="{{route('pacientes.store')}}" method="POST">
    @csrf
    <div class="row mt-4 bg-light border border-dark p-md-4 p-2 rounded mx-auto justify-content-evenly" style="max-width: 1000px;">
        <h4 class="pb-3 border-bottom mb-4 border-dark">Datos propietario</h4>
        <div class="col-md-5">
            <div class="mb-3 row">
                <label for="prop" class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('nombreprop') is-invalid @enderror" value="{{ old('nombreprop') }}" name="nombreprop" id="nprop"
                    placeholder="Ingrese nombre" required>
                    @error('nombreprop')
                        <div id="nprop" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="mb-3 row">
                <label for="rut" class="col-sm-3 col-form-label">Rut</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('rut') is-invalid @enderror" value="{{ old('rut') }}" name="rut" id="rut" 
                    placeholder="Rut sin puntos y con guión" required>
                    @error('rut')
                        <div id="rut" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="mb-3 row">
                <label for="num" class="col-sm-3 col-form-label">Telefono</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono') }}" name="telefono" id="telefono"
                    placeholder="Ingrese teléfono" required>
                    @error('telefono')
                        <div id="telefono" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="mb-3 row">
                <label for="prop" class="col-sm-3 col-form-label">Dirección</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('direccion') is-invalid @enderror" value="{{ old('direccion') }}" name="direccion" id="direccion"
                    placeholder="Ingrese dirección" required>
                    @error('direccion')
                        <div id="direccion" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </div>
    
        <h4 class="py-3 border-bottom border-top my-4 border-dark">Datos paciente</h4>
        <div class="col-md-5">
            <div class="mb-3 row">
                <label for="nombrepac" class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('nombrepac') is-invalid @enderror" value="{{ old('nombrepac') }}" name="nombrepac" id="nombrepac"
                    placeholder="Ingrese nombre" required>
                    @error('nombrepac')
                        <div id="nombrepac" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="mb-3 row">
                <label for="nacimiento" class="col-sm-3 col-form-label">Nacimiento</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control @error('nacimiento') is-invalid @enderror" value="{{ old('nacimiento') }}" name="nacimiento" id="nacimiento" required>
                    @error('nacimiento')
                        <div id="nacimiento" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="mb-3 row">
                <label for="es" class="col-sm-3 col-form-label">Especie</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('especie') is-invalid @enderror" value="{{ old('especie') }}" name="especie" id="especie"
                    placeholder="Ingrese especie" required>
                    @error('especie')
                        <div id="especie" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="mb-3 row">
                <label for="raza" class="col-sm-3 col-form-label">Raza</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('raza') is-invalid @enderror" value="{{ old('raza') }}" name="raza" id="raza"
                    placeholder="Ingrese raza" required>
                    @error('raza')
                        <div id="raza" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="mb-3 row">
                <label for="sexo" class="col-sm-3 col-form-label">Sexo</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('sexo') is-invalid @enderror" value="{{ old('sexo') }}" name="sexo" id="sexo"
                    placeholder="Ingrese sexo"required>
                    @error('sexo')
                        <div id="sexo" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="mb-3 row">
                <label for="peso" class="col-sm-3 col-form-label">Peso</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('peso') is-invalid @enderror" value="{{ old('peso') }}" name="peso" id="peso"
                    placeholder="Ingrese peso (ej: 4.5)" required>
                    @error('peso')
                        <div id="peso" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </div>
        <button class="btn btn-primary mt-4" style="max-width: 400px;">Registrar</button>
    
    </div>
</form>


@endsection