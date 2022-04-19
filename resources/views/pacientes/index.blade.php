@extends('layouts.layout')

@section('title')
    <title>Pacientes registrados | Ayelen</title>
@endsection

@section('content')
    <div class="bg-light text-dark px-3 my-4 border border-dark rounded mx-auto" style="max-width:1100px;">
        <h3 class="mt-3 border-bottom border-dark pb-2">Pacientes registrados</h3>

        <h5 class=" mb-3">Nuevo paciente</h5>

        <div class="row mb-3">
            <div class="col-lg-3 mb-3 mt-lg-0">
                <a href="{{route('pacientes.create')}}" class="btn btn-primary w-100">Propietario nuevo</a>
            </div>
            <div class="col-lg-3">
                <a href="{{route('pacientes.existente')}}" class="btn btn-primary w-100">Propietario existente</a>
            </div>
        </div>

        <h5 class=" mb-3">Opciones de búsqueda</h5>

        <!-- BUSCADORES -->
        <div class="row mb-3 justify-content-evenly">

            <form action="{{route('paciente.nombre')}}" method="POST" class="col-md-4 mb-3 d-flex">
                @csrf
                <div class="row">
                    <div class="col-9">
                        <input type="text" class="form-control me-2" name="paciente" placeholder="Nombre paciente" required>
                    </div>
                    <div class="col-3 text-end">
                        <button class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </form>

            <form action="{{route('propietario.nombre')}}" method="POST" class="col-md-4 mb-3 d-flex">
                @csrf
                <div class="row">
                    <div class="col-9">
                        <input type="text" class="form-control me-2" name="propietario" placeholder="Nombre propietario" required>
                    </div>
                    <div class="col-3 text-end">
                        <button class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </form>

            <form action="{{route('propietario.rut')}}" method="POST" class="col-md-4 mb-3 d-flex">
                @csrf

                <div class="row">
                    <div class="col-9">
                        <input type="text" class="form-control me-2 @error('rut') is-invalid @enderror" name="rut" value="{{ old('rut') }}"
                        placeholder="Rut sin puntos y con guión" id="rut" required>
                        @error('rut')
                            <div id="rut" class="invalid-feedback flex-column">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-3 text-end">
                        <button class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <!-- BUSCADORES -->

        @if ($message = Session::get('success'))
            <div class="col-md-12">
                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                        {{ $message }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

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

        <!-- VISTA EN PANTALLA GRANDE -->
        <div class="d-none d-sm-block">
            <table class="table table-responsive table-bordered border-dark table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Propietario</th>
                        <th>Rut</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($propietario = Session::get('npaciente'))
                        @foreach ($propietario as $prop)
                            @foreach ($prop->pacientes as $paci)
                                <tr>
                                    <td>{{$paci->id}}</td>
                                    <td>{{ucfirst($paci->nombre)}}</td>
                                    <td>{{ucwords($prop->nombre)}}</td>
                                    <td>{{$paci->propietario_rut}}</td>
                                    <td>
                                        <a href="{{route('pacientes.show', $paci->id)}}" class="text-decoration-none" style="color: rgba(66, 19, 101);">
                                            <i class="fa-solid fa-magnifying-glass me-2"></i>
                                            Revisar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach

                    @else
                        @if ($prop = Session::get('buscar'))
                            @foreach ($prop as $prop)
                                @foreach ($prop->pacientes as $p)
                                    <tr>
                                        <td>{{$p->id}}</td>
                                        <td>{{ucfirst($p->nombre)}}</td>
                                        <td>{{$prop->nombre}} </td>
                                        <td>{{$p->propietario_rut}}</td>
                                        <td>
                                            <a href="{{route('pacientes.show', $p->id)}}" class="text-decoration-none" style="color: rgba(66, 19, 101);">
                                                <i class="fa-solid fa-magnifying-glass me-2"></i>
                                                Revisar
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            @endforeach
                        @else
                            @foreach ($propietarios as $pr)
                                @foreach ($pr->pacientes as $pa)
                                    <tr>
                                        <td>{{$pa->id}}</td>
                                        <td>{{ucfirst($pa->nombre)}}</td>
                                        <td>{{ucwords($pr->nombre)}}</td>
                                        <td>{{$pa->propietario_rut}}</td>
                                        <td>
                                            <a href="{{route('pacientes.show', $pa->id)}}" class="text-decoration-none" style="color: rgba(66, 19, 101);">
                                                <i class="fa-solid fa-magnifying-glass me-2"></i>
                                                Revisar
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            @endforeach
                        @endif
                    @endif
                </tbody>
            </table>
        </div>
        <!-- VISTA EN PANTALLA GRANDE -->

        <!-- VISTA EN PANTALLA PEQUEÑA -->
        <div class="d-sm-none border-top border-dark">
            @if ($propietario = Session::get('npaciente'))
                @foreach ($propietario as $prop)
                    @foreach ($prop->pacientes as $paci)
                        <dl class="row border-bottom border-dark mt-2 pb-2">
                            <dt class="col-6">{{ucfirst($paci->nombre)}}</dt>
                            <dd class="col-6 fw-normal">{{ucwords($prop->nombre)}}</dd>
                            <dt class="col-6 fw-normal mt-2">{{$prop->rut}}</dt>
                            <dd class="col-6 fw-normal text-center">
                                <a href="{{route('pacientes.show', $paci->id)}}" class="text-decoration-none btn btn-outline-primary">
                                    <i class="fa-solid fa-magnifying-glass me-2"></i>
                                    Revisar
                                </a>
                            </dd>
                        </dl>
                    @endforeach
                @endforeach
            @else
                @if ($prop = Session::get('buscar'))
                    @foreach ($prop as $prop)
                        @foreach ($prop->pacientes as $p)
                            <dl class="row border-bottom border-dark mt-2 pb-2">
                                <dt class="col-6">{{ucfirst($p->nombre)}}</dt>
                                <dd class="col-6 fw-normal">{{ucwords($prop->nombre)}}</dd>
                                <dt class="col-6 fw-normal mt-2">{{$prop->rut}}</dt>
                                <dd class="col-6 fw-normal text-center">
                                    <a href="{{route('pacientes.show', $p->id)}}" class="text-decoration-none btn btn-outline-primary">
                                        <i class="fa-solid fa-magnifying-glass me-2"></i>
                                        Revisar
                                    </a>
                                </dd>
                            </dl>
                        @endforeach                       
                    @endforeach
                @else
                    @foreach ($propietarios as $pr)
                        @foreach ($pr->pacientes as $pa)
                            <dl class="row border-bottom border-dark mt-2 pb-2">
                                <dt class="col-6">{{ucfirst($pa->nombre)}}</dt>
                                <dd class="col-6 fw-normal">{{ucwords($pr->nombre)}}</dd>
                                <dt class="col-6 fw-normal mt-2">{{$pr->rut}}</dt>
                                <dd class="col-6 fw-normal text-center">
                                    <a href="{{route('pacientes.show', $pa->id)}}" class="text-decoration-none btn btn-outline-primary">
                                        <i class="fa-solid fa-magnifying-glass me-2"></i>
                                        Revisar
                                    </a>
                                </dd>
                            </dl>
                        @endforeach
                    @endforeach
                @endif
            @endif            
        </div>
        <!-- VISTA EN PANTALLA PEQUEÑA -->
        
    </div>
@endsection