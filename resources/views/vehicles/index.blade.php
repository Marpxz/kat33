@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <!-- Default box -->
                <div class="box box-default">
                    @if (Session::has('message'))
                        @if(Session::get('message') == 'editar')
                            <div class="alert alert-warning fade in">Elemento editado correctamente</div>
                        @endif
                        @if(Session::get('message') == 'eliminar')
                            <div class="alert alert-danger fade in">Elemento eliminado correctamente</div>
                        @endif
                        @if(Session::get('message') == 'agregar')
                            <div class="alert alert-success fade in">Elemento agregado correctamente</div>
                        @endif
                    @endif
                    <div class="box-header with-border">
                        <h3 class="box-title">Consultar vehículoss</h3>

                        <div class="box-tools pull-right">
                            <a href="{{ route('vehicles.create') }}" class="btn btn-primary">Agregar</a>

                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Cerrar">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>&nbsp;</tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th width="20px">ID</th>
                                <th>Patente</th>
                                <th>Modelo</th>
                                <th>Tipo</th>
                                <th>KAT33</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>

                            @foreach($vehicles as $vehicle)
                                <tr>
                                    <th>{!! $vehicle->id !!}</th>
                                    <th>{!! $vehicle->patent !!}</th>
                                    <th>{!! $vehicle->model !!}</th>
                                    <th>{!! $vehicle->type !!}</th>
                                    <th>{!! $vehicle->kat33->imei !!}</th>
                                    <th width="40px"><a href="{{ route('vehicles.edit',['id' => $vehicle->id]) }}" class="btn btn-warning pull-right">Editar</a></th>
                                    <th width="40px">
                                        {{ Form::open(['method' => 'DELETE', 'route' => ['vehicles.destroy', $vehicle->id]]) }}
                                        {{ Form::submit('Eliminar', ['class' => 'btn btn-danger']) }}
                                        {{ Form::close() }}
                                    </th>
                                </tr>
                            @endforeach


                            </tbody>

                        </table>
                        {{ $vehicles->render() }}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
    </div>
@endsection