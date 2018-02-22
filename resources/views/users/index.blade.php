@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">

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
                        <h3 class="box-title">Consultar usuarios</h3>

                        <div class="box-tools pull-right">
                            <a href="{{ route('users.create') }}" class="btn btn-primary">Agregar</a>

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
                                <th>Nombre</th>
                                <th>Empresa</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                            @foreach($users as $user)
                                <tr>
                                    <th>{!! $user->id !!}</th>
                                    <th>{!! $user->name !!}</th>
                                    <th>{!! $user->business->name !!}</th>
                                    <th width="40px"><button type="button" class="btn btn-info" data-toggle="modal" data-whatever="{!! $user->id !!}" data-nombre="{!! $user->name !!}" data-target="#asignarVehiculo">Asignar Vehículo</button></th>
                                    <th width="40px"><a href="{{ route('users.edit',['id' => $user->id]) }}" class="btn btn-warning pull-right">Editar</a></th>
                                    <th width="40px">
                                        {{ Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id]]) }}
                                        {{ Form::submit('Eliminar', ['class' => 'btn btn-danger']) }}
                                        {{ Form::close() }}
                                    </th>
                                    <th width="40px"><a href="{{ url('users/reset',['id' => $user->id]) }}" class="btn btn-success pull-right">Modificar Contraseña</a></th>

                                </tr>
                            @endforeach



                            </tbody>

                        </table>
                        <!-- Modal -->
                        <div id="asignarVehiculo" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Asigna Vehiculo a </h4>
                                    </div>
                                    <div class="modal-body">
                                        {{ Form::open() }}
                                        {{ Form::select('vehicle_id', $vehicles) }}

                                    </div>
                                    <div class="modal-footer">
                                        {{ Form::submit('Agregar', ['class' => 'btn btn-success']) }}
                                        {{ Form::close() }}
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{ $users->render() }}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
    </div>
@endsection