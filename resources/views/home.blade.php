@extends('layouts.layout')

@section('title')
    <title>Inicio | Ayelen</title>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-5 bg-light mt-4 border border-dark p-md-4 p-2 rounded mx-auto justify-content-evenly" style="max-width: 900px;">
        <h4 class="pb-3 border-bottom mb-4 border-dark">Consultas de hoy</h4>

        <div class="d-none d-sm-block">
            <table class="table caption-top table-responsive table-bordered border-dark table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Hora</th>
                        <th>Paciente</th>
                        <th>Propietario</th>
                        <th>Contacto</th>

                    </tr>
                </thead>
                <tbody>
                    <!--FOREACH-->
                    @foreach ($consultas as $c)
                        <tr>
                            <td>{{$c->hora}}</td>
                            <td>{{$c->paciente}}</td>
                            <td>{{$c->propietario}}</td>
                            <td>+56 9 {{$c->telefono}}</td>
                        </tr>
                    @endforeach
                    <!--FOREACH--> 
                </tbody>
            </table>
            <div class="text-end">
                <a href="{{route('consultas.index')}}" class="btn btn-primary">
                    <i class="fa-solid fa-stethoscope"></i>
                    Ver todas
                </a>
            </div>
        </div>

        <div class="d-sm-none">
            <!--FOREACH-->
            @foreach ($consultas as $c)
                <dl class="row border-bottom border-dark mt-2 pb-2 px-3">
                    <dt class="col-6">{{$c->hora}}</dt>
                    <dd class="col-6 fw-bold">{{$c->paciente}}</dd>
                    <dt class="col-6 fw-normal">{{$c->propietario}}</dt>
                    <dd class="col-6 fw-normal">+56 9 {{$c->telefono}}</dd>
                </dl>
            @endforeach
            <!--FOREACH-->

            <div class="text-end">
                <a href="{{route('consultas.index')}}" class="btn btn-primary">
                    <i class="fa-solid fa-stethoscope"></i>
                    Ver todas
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-5 bg-light mt-4 border border-dark p-md-4 p-2 rounded mx-auto justify-content-evenly" style="max-width: 900px;">
        <h4 class="pb-3 border-bottom mb-4 border-dark">Cirugías de hoy</h4>

        <div class="d-none d-sm-block">
            <table class="table caption-top table-responsive table-bordered bg-light border-dark table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Paciente</th>
                        <th>Especie</th>
                        <th>Propietario</th>
                        <th>Contacto</th>
                    </tr>
                </thead>
                <tbody>
                    <!--FOREACH-->
                    @foreach ($cirugias as $c)
                        <tr class="text-capitalize">
                            <td>{{$c->paciente}}</td>
                            <td>{{$c->especie}}</td>
                            <td>{{$c->propietario}}</td>
                            <td>+56 9 {{$c->telefono}}</td>

                        </tr>
                    @endforeach
                    <!--FOREACH-->
                </tbody>
            </table>
            <div class="text-end">
                <a href="{{route('cirugias.index')}}" class="btn btn-primary">
                    <i class="fa-solid fa-heart-pulse"></i>
                    Ver todas
                </a>
            </div>
        </div>

        <div class="d-sm-none">
            <!--FOREACH-->
            @foreach ($cirugias as $c)
                <dl class="row border-bottom border-dark mt-2 pb-2 px-3 text-capitalize">
                    <dt class="col-6">{{$c->paciente}}</dt>
                    <dd class="col-6 fw-bold">{{$c->especie}}</dd>
                    <dt class="col-6 fw-normal">{{$c->propietario}}</dt>
                    <dd class="col-6 fw-normal">+56 9 {{$c->telefono}}</dd>
                </dl>
            @endforeach
                
            <!--FOREACH-->
            <div class="text-end">
                <a href="{{route('cirugias.index')}}" class="btn btn-primary">
                    <i class="fa-solid fa-heart-pulse"></i>
                    Ver todas
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
