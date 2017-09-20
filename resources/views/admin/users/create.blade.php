@extends('admin.template.main')

@section('title','Crear Usuarios')

@section('content')
	
	{!! Form::open(['route'=>'admin.users.store','method'=>'POST']) !!}
	<div class="panel panel-default">
		<div class="panel-heading">CREACIÓN DE NUEVO USUARIO</div>
		<div class="panel-body">
			@if(count($errors) > 0)
				<div class="alert alert-danger" role="alert">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>			
				</div>
			@endif
			<div class="form-horizontal">				
				<div class="form-group">
					{!! Form::label('first_name','Nombres :',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('first_name',null,['class'=>'form-control','placeholder'=>'Nombres','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('last_name','Apellidos :',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('last_name',null,['class'=>'form-control','placeholder'=>'Apellidos','required']) !!}
					</div>
				</div>
							
				<div class="form-group">
					{!! Form::label('email', 'Email :',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::email('email', null, ['class' => 'form-control','placeholder' =>'ejemplo@gmail.com','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('password', 'Contraseña :',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::password('password', ['class' => 'form-control','placeholder' =>'************','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('type','Tipo de usuario: ',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::select('type', ['admin'=>'Adminisrador','seller'=>'Cajero','businessman'=>'Empresario'],null, ['class'=>'form-control', 'placeholder'=>'Seleccione un tipo de usuario', 'required']) !!}
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						{!! Form::submit('Registrar Usuario', ['class' => 'btn btn-primary']) !!}
					</div>
				</div>
			</div>
		</div>		
	</div>
	{!! Form::close() !!}
@endsection