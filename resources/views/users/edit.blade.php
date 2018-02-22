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
                        <h3 class="box-title">Editar el usuario {{$user->name}}</h3>

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
                        {!! Form::open(array('route' => array('users.update', $user->id),'method' => 'PUT')) !!}
                        <div class="form-group">
                            {!! Form::label('email', 'Nombre') !!}
                            {!! Form::text('name',$user->name,['class' => 'form-control','placeholder' => $user->name]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email',$user->email,['class' => 'form-control','placeholder' => $user->email,'disabled']) !!}
                        </div>
                        @if(Auth::user()->level == 1)
                        <div class="form-group">
                            {!! Form::label('nivel', 'Nivel') !!}
                            {!! Form::select('level', ['1' => 'Administrador', '2' => 'Supervisor', '3' => 'Conductor'], $user->level, ['placeholder' => 'Escoge un nivel..','class' => 'form-control']) !!}
                        </div>
                        @endif
                        @if(Auth::user()->level == 2)
                            <div class="form-group">
                                {!! Form::label('nivel', 'Nivel') !!}
                                {!! Form::select('level', ['2' => 'Supervisor', '3' => 'Conductor'], $user->level, ['placeholder' => 'Escoge un nivel..','class' => 'form-control']) !!}
                            </div>
                        @endif

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