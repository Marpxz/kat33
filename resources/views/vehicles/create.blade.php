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
                        <h3 class="box-title">Registrar un nuevo vehículo</h3>

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
                        {!! Form::open(['route' => 'vehicles.store']) !!}
                        <div class="form-group">
                            {!! Form::label('email', 'Patente') !!}
                            {!! Form::text('patent',null,['class' => 'form-control','placeholder' => 'Ingresa la patente...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Modelo') !!}
                            {!! Form::text('model',null,['class' => 'form-control','placeholder' => 'Ingresa el modelo...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Tipo') !!}
                            {!! Form::text('type',null,['class' => 'form-control','placeholder' => 'Ingresa el tipo...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('KAT33', 'KAT33') !!}
                            {{ Form::select('kat33_id', $kat33s,null,['class' => 'form-control']) }}
                        </div>

                        {!! Form::submit('Agregar',['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
    </div>
@endsection