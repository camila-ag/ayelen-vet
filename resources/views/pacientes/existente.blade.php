@extends('layouts.layout')

@section('title')
    <title>Nuevo paciente | Ayelen</title>
@endsection

@section('content')

<div class="row bg-light mt-4 border border-dark p-md-4 p-2 rounded mx-auto justify-content-evenly" style="max-width: 1000px;">
    <h4 class="pb-3 border-bottom mb-4 border-dark">Datos propietario</h4>

    <form action="{{route('propietario.existente')}}" method="POST">
        @csrf
        <div class="mb-3 row">
            <label for="rut" class="col-sm-2 col-form-label">Buscar propietario</label>
            <div class="col-sm-5">
                <input class="form-control @error('rut') is-invalid @enderror" list="datalistOptions" id="rut" name="rut" placeholder="Rut sin puntos y con guión" autocomplete="off">
                <datalist id="datalistOptions">
                    @foreach ($propietarios as $p)
                        <option value="{{$p->rut}}">{{$p->rut}}</option>
                    @endforeach
                </datalist>
                @error('rut')
                    <div id="rut" class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-sm-5  mt-2 mt-md-0">
                <button class="btn btn-primary " style="max-width: 400px;">Buscar</button>
            </div>
        </div>
    </form>

    @if ($prop = Session::get('prop'))
        <form action="{{route('store.existente')}}" method="POST" class="row">
            @csrf
            @foreach ($prop as $p)
                <div class="justify-content-evenly row">
                    <div class="col-md-5">
                        <dl class="row">
                            <dt class="col-3 fw-normal">Nombre</dt>
                            <dd class="col-9">{{$p->nombre}}</dd>
                        </dl>
                    </div>
                    <div class="col-md-5">
                        <dl class="row">
                            <dt class="col-3 fw-normal">Rut</dt>
                            <dd class="col-9">{{$p->rut}}</dd>
                        </dl>
                    </div>
                    <div class="col-md-5">
                        <dl class="row">
                            <dt class="col-3 fw-normal">Teléfono</dt>
                            <dd class="col-9">+56 9 {{$p->telefono}}</dd>
                        </dl>
                    </div>
                    <div class="col-md-5">
                        <dl class="row">
                            <dt class="col-3 fw-normal">Dirección</dt>
                            <dd class="col-9">{{$p->direccion}}</dd>
                        </dl>
                    </div>
                </div>

                <input type="hidden" name="propietario_rut" value="{{$p->rut}}">

            @endforeach

            <div class="row justify-content-evenly">
                <h4 class="py-3 border-bottom border-top my-4 border-dark">Datos paciente</h4>
                <div class="col-md-5">
                    <div class="mb-3 row">
                        <label for="pac" class="col-sm-3 col-form-label">Nombre</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('nombrepac') is-invalid @enderror" value="{{ old('nombrepac') }}" name="nombre" id="nombrepac"
                            placeholder="Ingrese nombre" required>
                            @error('nombrepac')
                                <div id="nombrepac" class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="mb-3 row">
                        <label for="nac" class="col-sm-3 col-form-label">Nacimiento</label>
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
    @endif
</div>

@endsection