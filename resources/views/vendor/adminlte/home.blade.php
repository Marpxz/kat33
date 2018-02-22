@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">
				<!-- USERS LIST -->
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Ranking de Conductores</h3>

						<div class="box-tools pull-right">
							<span class="label label-danger">{{$users->count()}}</span>
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
							</button>
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body no-padding" style="">
						<ul class="users-list clearfix">
							@foreach($users as $user)
							<li>
								<img src="{{Storage::url($user->pic)}}" alt="{{$user->name}}">
								<a class="users-list-name" href="#">{{$user->name}}</a>
								<span class="users-list-date">Hoy</span>
							</li>
							@endforeach
						</ul>
						<!-- /.users-list -->
					</div>
					<!-- /.box-body -->

					<!-- /.box-footer -->
				</div>
				<!--/.box -->
			</div>
		</div>
		<div class="row">

			<div class="col-md-12">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Mapa Conductores</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Cerrar">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div id="map"></div>

					</div>
					<!-- /.box-body -->
				</div>

				<!-- /.box -->

			</div>
		</div>
	</div>
@endsection
