@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Procesos de Titulación</div>
                    <div class="card-body">
                        <div class="container-fluid">
                            @isset($procesos)
                                <div class="accordion" id="accordion_procesos">
                                    @foreach($procesos as $proceso)
                                        <div class="card">
                                            <div class="card-header" id="head{{ $proceso->id }}">
                                                <button class="btn btn-link" type="button"
                                                        data-toggle="collapse"
                                                        data-target="#collapse{{ $proceso->id }}"
                                                        aria-expanded="true"
                                                        aria-controls="collapse{{ $proceso->id }}">
                                                    {{ $proceso->nombre }}
                                                </button>
                                            </div>
                                            <div id="collapse{{ $proceso->id }}"
                                                 class="collapse"
                                                 aria-labelledby="head{{ $proceso->id }}"
                                                 data-parent="#accordion_procesos">
                                                <div class="card-body">
                                                    <div class="alert alert-info">Estado: {{ $proceso->estado }}</div>
                                                    <hr>
                                                    <div class="accordion"
                                                         id="accordion_iniciativa{{ $proceso->id }}">
                                                        @foreach($proceso->iniciativas() as $iniciativa)
                                                            <div class="card">
                                                                <div class="card-header"
                                                                     id="head{{ $proceso->id . "_" . $iniciativa->id }}">
                                                                    <button class="btn btn-link" type="button"
                                                                            data-toggle="collapse"
                                                                            data-target="#collapse{{ $proceso->id . "_" . $iniciativa->id }}"
                                                                            aria-expanded="true"
                                                                            aria-controls="collapse{{ $proceso->id . "_" . $iniciativa->id }}">
                                                                        {{ $iniciativa->nombre }}
                                                                    </button>
                                                                </div>
                                                                <div
                                                                    id="collapse{{ $proceso->id . "_" . $iniciativa->id }}"
                                                                    class="collapse"
                                                                    aria-labelledby="head{{ $proceso->id . "_" . $iniciativa->id }}"
                                                                    data-parent="accordion{{ $proceso->id }}">
                                                                    {{--Cuerpo--}}
                                                                    <div class="card-body">
                                                                        <div class="row accordion"
                                                                             id="accordion_menu{{ $proceso->id . "_" . $iniciativa->id }}">
                                                                            {{--Menu--}}
                                                                            <div class="col-md-3">
                                                                                <div class="btn-group-vertical"
                                                                                     style="width: 100%;">
                                                                                    <button type="button" class="btn"
                                                                                            data-toggle="collapse"
                                                                                            data-target="#collapse_estado{{ $proceso->id . "_" . $iniciativa->id }}"
                                                                                            aria-expanded="true"
                                                                                            aria-controls="collapse_estado{{ $proceso->id . "_" . $iniciativa->id }}">
                                                                                        Ver Estado
                                                                                    </button>
                                                                                    <button type="button" class="btn"
                                                                                            data-toggle="collapse"
                                                                                            data-target="#collapse_editar{{ $proceso->id . "_" . $iniciativa->id }}"
                                                                                            aria-expanded="true"
                                                                                            aria-controls="collapse_editar{{ $proceso->id . "_" . $iniciativa->id }}">
                                                                                        Editar
                                                                                    </button>
                                                                                    <button type="button" class="btn"
                                                                                            data-toggle="collapse"
                                                                                            data-target="#collapse_val_dic{{ $proceso->id . "_" . $iniciativa->id }}"
                                                                                            aria-expanded="true"
                                                                                            aria-controls="collapse_vel_dic{{ $proceso->id . "_" . $iniciativa->id }}">
                                                                                        Validación DIC
                                                                                    </button>
                                                                                    <button type="button" class="btn"
                                                                                            data-toggle="collapse"
                                                                                            data-target="#collapse_val_ei{{ $proceso->id . "_" . $iniciativa->id }}"
                                                                                            aria-expanded="true"
                                                                                            aria-controls="collapse_val_ei{{ $proceso->id . "_" . $iniciativa->id }}">
                                                                                        Validación EI
                                                                                    </button>
                                                                                    <button type="button" class="btn"
                                                                                            data-toggle="collapse"
                                                                                            data-target="#collapse_publicar{{ $proceso->id . "_" . $iniciativa->id }}"
                                                                                            aria-expanded="true"
                                                                                            aria-controls="collapse_publicar{{ $proceso->id . "_" . $iniciativa->id }}">
                                                                                        Publicar
                                                                                    </button>
                                                                                    <button type="button" class="btn"
                                                                                            data-toggle="collapse"
                                                                                            data-target="#collapse_eliminar{{ $proceso->id . "_" . $iniciativa->id }}"
                                                                                            aria-expanded="true"
                                                                                            aria-controls="collapse_eliminar{{ $proceso->id . "_" . $iniciativa->id }}">
                                                                                        Eliminar
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-9 border">
                                                                                {{--Contenedor Ver Estado--}}
                                                                                <div
                                                                                    id="collapse_estado{{ $proceso->id . "_" . $iniciativa->id }}"
                                                                                    class="collapse alert alert-info"
                                                                                    aria-labelledby="collapse_estado{{ $proceso->id . "_" . $iniciativa->id }}"
                                                                                    data-parent="accordion_menu{{ $proceso->id . "_" . $iniciativa->id }}">
                                                                                    Estado: {{ $iniciativa->estado }}
                                                                                    <br>
                                                                                    Descripcion: {{ 'TODO' }}
                                                                                </div>
                                                                                {{--Contenedor Editar--}}
                                                                                <div
                                                                                    id="collapse_editar{{ $proceso->id . "_" . $iniciativa->id }}"
                                                                                    class="collapse alert alert-info"
                                                                                    aria-labelledby="collapse_editar{{ $proceso->id . "_" . $iniciativa->id }}"
                                                                                    data-parent="accordion_menu{{ $proceso->id . "_" . $iniciativa->id }}">
                                                                                    Editar
                                                                                    <hr>
                                                                                </div>
                                                                                {{--Vaidacion DIC--}}
                                                                                <div
                                                                                    id="collapse_val_dic{{ $proceso->id . "_" . $iniciativa->id }}"
                                                                                    class="collapse alert alert-info"
                                                                                    aria-labelledby="collapse_val_dic{{ $proceso->id . "_" . $iniciativa->id }}"
                                                                                    data-parent="accordion_menu{{ $proceso->id . "_" . $iniciativa->id }}">
                                                                                    Validación DIC
                                                                                    <hr>
                                                                                </div>
                                                                                {{--Vaidacion EI--}}
                                                                                <div
                                                                                    id="collapse_val_ei{{ $proceso->id . "_" . $iniciativa->id }}"
                                                                                    class="collapse alert alert-info"
                                                                                    aria-labelledby="collapse_val_ei{{ $proceso->id . "_" . $iniciativa->id }}"
                                                                                    data-parent="accordion_menu{{ $proceso->id . "_" . $iniciativa->id }}">
                                                                                    Validación EI
                                                                                    <hr>
                                                                                </div>
                                                                                {{--Publicar--}}
                                                                                <div
                                                                                    id="collapse_publicar{{ $proceso->id . "_" . $iniciativa->id }}"
                                                                                    class="collapse alert alert-info"
                                                                                    aria-labelledby="collapse_publicar{{ $proceso->id . "_" . $iniciativa->id }}"
                                                                                    data-parent="accordion_menu{{ $proceso->id . "_" . $iniciativa->id }}">
                                                                                    Publicar
                                                                                    <hr>
                                                                                </div>
                                                                                {{--Eliminar--}}
                                                                                <div
                                                                                    id="collapse_eliminar{{ $proceso->id . "_" . $iniciativa->id }}"
                                                                                    class="collapse alert alert-info"
                                                                                    aria-labelledby="collapse_eliminar{{ $proceso->id . "_" . $iniciativa->id }}"
                                                                                    data-parent="accordion_menu{{ $proceso->id . "_" . $iniciativa->id }}">
                                                                                    Eliminar
                                                                                    <hr>
                                                                                    ¿ Esta seguro que desea eliminar la iniciativa ?<br>
                                                                                    {!! Form::open(['route' => ['iniciativa.destroy', $iniciativa->id], 'method' => 'DELETE']) !!}
                                                                                    {!! Form::hidden('eliminar', true) !!}
                                                                                    {!! Form::submit('Aceptar!', ['class' => 'btn btn-primary']) !!}
                                                                                    {!! Form::close() !!}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="alert alert-danger">No existen procesos de titulación.</div>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
