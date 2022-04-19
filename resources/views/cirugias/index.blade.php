@extends('layouts.layout')

@section('title')
    <title>Cirugias | Ayelen</title>
@endsection

@section('content')
<div class="bg-light text-dark p-3 my-4 border border-dark rounded mx-auto" style="max-width:1300px;">
    <h4 class="pb-3 border-bottom mb-4 border-dark">Cirugias</h4>

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


    <form action="{{route('cirugias.filtrar')}}" method="POST">
        @csrf
        <div class="mb-3 row" style="max-width:500px;">
            <label for="fecha" class="col-md-4 form-label me-3 mt-1">Filtrar por fecha</label>
            <div class="col-md-7 d-flex">
                <input type="date" id="fecha" class="form-control me-2" name="fecha" style="max-width: 200px;" required>
                <button class="btn btn-primary"><i class="fa-solid fa-filter"></i></button>
            </div>
        </div>
    </form>

    <div class="">

        <table class="table caption-top table-responsive table-bordered border-dark table-hover align-middle bg-light">
            <thead class="table-dark">
                <tr>
                    <th>Fecha</th>
                    <th>Tipo</th>
                    <th>Paciente</th>
                    <th>Especie</th>
                    <th>Propietario</th>
                    <th>Contacto</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if ($filtro = Session::get('filtro'))
                    @foreach ($filtro as $c)
                    <tr>
                        <td class="col-1">{{date("d/m/Y", strtotime($c->fecha))}}</td>
                        <td class="col-1">{{$c->tipo}}</td>
                        <td class="col-2">{{$c->paciente}}</td>
                        <td>{{$c->especie}}</td>
                        <td>{{$c->propietario}}</td>
                        <td>+56 9 {{$c->telefono}}</td>
                        <td class="d-flex justify-content-around">
                            <a href="{{route('cirugias.edit',$c->id)}}" style="color: rgba(66, 19, 101);" class="btn btn-link text-decoration-none text-decoration-none">
                                <i class="fa-solid fa-pen"></i>
                                Editar
                            </a>
                            <button type="button" class="btn btn-link link-danger text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal{{$c->id}}">
                                <i class="fa-solid fa-xmark"></i>
                                Cancelar
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$c->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">¿Cancelar la cirugia de {{$c->paciente}} del día {{date("d/m/Y", strtotime($c->fecha))}}?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                            
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Volver</button>
                                            <form action="{{route('cirugias.edit',$c->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="delete" class="btn btn-danger btn-sm">Cancelar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                        </td>
                    </tr>
                @endforeach
                @else
                    @foreach ($cirugias as $c)
                        <tr>
                            <td class="col-1">{{date("d/m/Y", strtotime($c->fecha))}}</td>
                            <td class="col-1">{{$c->tipo}}</td>
                            <td class="col-2">{{$c->paciente}}</td>
                            <td>{{$c->especie}}</td>
                            <td>{{$c->propietario}}</td>
                            <td>+56 9 {{$c->telefono}}</td>
                            <td class="d-flex justify-content-around">
                                <a href="{{route('cirugias.edit', $c->id)}}" style="color: rgba(66, 19, 101);" class="btn btn-link text-decoration-none text-decoration-none">
                                    <i class="fa-solid fa-pen"></i>
                                    Editar
                                </a>
                                <button type="button" class="btn btn-link link-danger text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal{{$c->id}}">
                                    <i class="fa-solid fa-xmark"></i>
                                    Cancelar
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$c->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">¿Cancelar la cirugia de {{$c->paciente}} del día {{date("d/m/Y", strtotime($c->fecha))}}?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                                
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Volver</button>
                                                <form action="{{route('cirugias.destroy', $c->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" title="delete" class="btn btn-danger btn-sm">Cancelar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                            </td>
                        </tr>
                    @endforeach
                @endif
                
            
            </tbody>
        </table>
    </div>
</div>
@endsection