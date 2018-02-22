@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <!-- Default box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cambiar el vehículo {{$vehicle->patent}}</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="box-body">
                        {!! Form::open(array('route' => array('vehicles.update', $vehicle->id),'method' => 'PUT')) !!}
                        <div class="form-group">
                            {!! Form::label('email', 'Patente') !!}
                            {!! Form::text('patent',$vehicle->patent,['disabled', 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('modelo', 'Modelo') !!}
                            {!! Form::text('model',$vehicle->model,['class' => 'form-control','placeholder' => $vehicle->model]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('tipo', 'Tipo') !!}
                            {!! Form::text('type',$vehicle->type,['class' => 'form-control','placeholder' => $vehicle->type]) !!}
                        </div>
                        {!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
    </div>
@endsection