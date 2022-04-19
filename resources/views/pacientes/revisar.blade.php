@extends('layouts.layout')

@section('title')
    <title>Historial de {{$paciente->nombre}} | Ayelen</title>
@endsection

@section('content')

<div class="row mt-4 justify-content-evenly">    
    <div class="col-md-4 mb-3">
        <div class="border border-dark py-2 px-3 shadow rounded bg-light">
            <h4 class="border-bottom pb-2 border-dark">Datos propietario</h4>
            <dl class="row">
                @foreach ($propietario as $prop)
                <dt class="col-3">Nombre</dt>
                <dd class="col-9">{{ucwords($prop->nombre)}}</dd>

                <dt class="col-3">Rut</dt>
                <dd class="col-9">{{$prop->rut}}</dd>

                <dt class="col-3">Teléfono</dt>
                <dd class="col-9">+56 9 {{$prop->telefono}}</dd>

                <dt class="col-sm-3">Dirección</dt>
                <dd class="col-sm-9">{{ucwords($prop->direccion)}}</dd>
                @endforeach
                
            </dl>
            <h4 class="border-bottom border-top py-2 border-dark">Datos paciente</h4>

            <dl class="row">
                <dt class="col-4">Nombre</dt>
                <dd class="col-8">{{ucfirst($paciente->nombre)}}</dd>

                <dt class="col-4">Nacimiento</dt>
                <dd class="col-8">{{date("d/m/Y", strtotime($paciente->nacimiento))}}</dd>

                <dt class="col-3">Especie</dt>
                <dd class="col-3 text-capitalize">{{ucfirst($paciente->especie)}}</dd>

                <dt class="col-3">Sexo</dt>
                <dd class="col-3 text-capitalize">{{ucfirst($paciente->sexo)}}</dd>

                <dt class="col-3">Raza</dt>
                <dd class="col-3 text-capitalize">{{ucfirst($paciente->raza)}}</dd>

                <dt class="col-3">Peso</dt>
                <dd class="col-3">{{$paciente->peso}} kg</dd>     
            </dl>
        </div>
    </div>

    <!-- HISTORIAL MEDICO -->
    <div class="col-md-7 border border-dark rounded-3 shadow bg-light">
        <div class="row border-bottom border-dark mt-2 py-2">
            <div class="col-6">
                <h4 class="">Historial médico</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{route('historial.registrar', $paciente->id)}}" class="btn btn-primary">
                    <i class="fa-solid fa-pencil pe-2"></i>
                    Registrar consulta
                </a>
            </div>
        </div>

        @foreach ($historial as $h)
            <dl class="row border-bottom border-dark mt-2">
                <dt class="col-sm-3 text-start text-md-end">{{date("d/m/Y", strtotime($h->fecha))}}</dt>
                <dd class="col-sm-9 fw-bold" style="text-align: justify;">{{$h->motivo}}</dd>
                <dd class="col-sm-3 d-none d-xl-block">
                    <dl class="row">
                        <dt class="col-7 text-end">T°:</dt>
                        <dd class="col-5">{{$h->temperatura}} °C</dd>
                        <dt class="col-7 text-end">Peso:</dt>
                        <dd class="col-5">{{$h->peso}}</dd>
                        <dt class="col-7 text-end">CC:</dt>
                        <dd class="col-5">{{$h->cc}}</dd>
                    </dl>
                </dd>
                <div class="row text-center my-2 d-xl-none">
                    <div class="col-4 text-nowrap">
                        <span class="fw-bold">T°:</span> {{$h->temperatura}} °C
                    </div>
                    <div class="col-4 text-nowrap">
                        <span class="fw-bold">Peso:</span> {{$h->peso}} kg
                    </div>
                    <div class="col-4 text-nowrap">
                        <span class="fw-bold">CC:</span>{{$h->cc}} (1-5)
                    </div>
                </div>
                <dd class="col-sm-9" style="text-align: justify;">
                    <figure>
                        <blockquote>
                            <p>{{$h->tratamiento}}</p>
                        </blockquote>
                        <figcaption class="blockquote-footer text-end text-dark fs-6">
                            Atendido por: {{$h->name}}
                        </figcaption>
                    </figure>
                </dd>
            </dl>
        @endforeach


    </div>
    <!-- HISTORIAL MEDICO -->
        
    
</div>
@endsection