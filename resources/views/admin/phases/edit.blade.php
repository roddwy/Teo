@extends('admin.template.main')

@section('title','Editar Fase')

@section('content')
	
	{!! Form::open(['route'=>['admin.phases.update',$phase],'method'=>'PUT']) !!}
	<div class="panel panel-default">
		<div class="panel-heading">CREACIÓN DE NUEVA FASE</div>
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
					{!! Form::label('name','Nombre :',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('name',$phase->name,['class'=>'form-control','placeholder'=>'Nombre de la fase','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('description','Descripción :',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::textarea('description',$phase->description,['class'=>'form-control','placeholder'=>'Descripción','required']) !!}
					</div>
				</div>				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						{!! Form::submit('Modificar Fase', ['class' => 'btn btn-primary']) !!}
					</div>
				</div>
			</div>
		</div>		
	</div>
	{!! Form::close() !!}
@endsection