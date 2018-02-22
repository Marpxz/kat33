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
                        <h3 class="box-title">Registrar un nuevo usuario</h3>

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
                        {!! Form::open(['route' => 'users.store']) !!}
                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Ingresa el nombre...']) !!}
                        </div>
                        @if(Auth::user()->level == 1)
                        <div class="form-group">
                            {!! Form::label('nivel', 'Nivel') !!}
                            {!! Form::select('level', ['1' => 'Administrador', '2' => 'Supervisor', '3' => 'Conductor'], null, ['placeholder' => 'Escoge un nivel..', 'class' => 'form-control']) !!}
                        </div>
                        @endif
                        @if(Auth::user()->level == 2)
                            <div class="form-group">
                                {!! Form::label('nivel', 'Nivel') !!}
                                {!! Form::select('level', ['2' => 'Supervisor', '3' => 'Conductor'], null, ['placeholder' => 'Escoge un nivel..', 'class' => 'form-control']) !!}
                            </div>
                        @endif
                        <div class="form-group">
                            {!! Form::label('correo', 'Email') !!}
                            {!! Form::email('email',null,['class' => 'form-control','placeholder' => 'Ingresa el correo...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('contraseña', 'Contraseña') !!}
                            {!! Form::password('password',['class' => 'form-control','placeholder' => 'Ingresa la contraseña...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('empresa', 'Empresa') !!}

                            {{ Form::select('business_id', $businesses,null,['class'=>'form-control']) }}

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