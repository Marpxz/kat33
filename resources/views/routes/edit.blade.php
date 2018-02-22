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
                        <h3 class="box-title">Cambiar el nombre de la empresa {{$route->identification}}</h3>

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
                        {!! Form::open(['route' => array('routes.update', $route->id),'files' => true,'method' => 'PUT']) !!}
                        <div class="form-group">
                            {!! Form::label('iden', 'Identificación') !!}
                            {!! Form::text('identification',$route->identification,['class' => 'form-control','placeholder' => 'Ingresa la identificación...','disabled']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('inicio', 'Inicio') !!}
                            {!! Form::text('start',$route->start,['class' => 'form-control','placeholder' => 'Ingresa el inicio...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('fin', 'Final') !!}
                            {!! Form::text('end',$route->end,['class' => 'form-control','placeholder' => 'Ingresa el fin...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('ob', 'Observación') !!}
                            {!! Form::text('observation',$route->observation,['class' => 'form-control','placeholder' => 'Ingresa la observación...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('foto', 'Foto') !!}
                            {!! Form::file('pic') !!}
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