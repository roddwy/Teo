@extends('admin.template.main')

@section('title','Crear Producto')

@section('content')
	
	{!! Form::open(['route'=>'admin.products.store','method'=>'POST','files'=>true]) !!}
	<div class="panel panel-default">
		<div class="panel-heading">CREACIÓN DE NUEVO PRODUCTO</div>
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
					{!! Form::label('cod','Codigo :',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('cod',null,['class'=>'form-control','placeholder'=>'Codigo','required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('name','Nombre :',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre','required']) !!}
					</div>
				</div>
							
				<div class="form-group">
					{!! Form::label('description', 'Descripción :',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::textarea('description', null, ['class' => 'form-control','placeholder' =>'description','required']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('image','Seleccione una imagen: ',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::file('image') !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('punctuation','Puntuación :',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::number('punctuation',null,['class'=>'form-control','placeholder'=>'Introduzca el puntaje del producto','required']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('price_business_bol','Precio en Bolivianos para empresarios :',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						<input class="form-control" type="text" name="price_business_bol" placeholder="Precio empresario en Bs." aria-describedby="sizing-addon2" required title="Solo se acepta números. Ejem: 500.00" pattern="[0-9]+(\.[0-9][0-9]?)?" >
					</div>
				</div>
				
				<div class="form-group">
					{!! Form::label('price_customers_bol','Precio en Bolivianos para el público : ',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						<input class="form-control" type="text" name="price_customers_bol" placeholder="Precio publico en Bs." aria-describedby="sizing-addon2" required title="Solo se acepta números. Ejem: 500.00" pattern="[0-9]+(\.[0-9][0-9]?)?" >
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('price_business_sol','Precio en Nuevos Soles para empresarios :',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						<input class="form-control" type="text" name="price_business_sol" placeholder="Precio empresario en Soles" aria-describedby="sizing-addon2" required title="Solo se acepta números. Ejem: 500.00" pattern="[0-9]+(\.[0-9][0-9]?)?" >
					</div>
				</div>
				
				<div class="form-group">
					{!! Form::label('price_customers_sol','Precio en Nuevos Soles para el público : ',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						<input class="form-control" type="text" name="price_customers_sol" placeholder="Precio público en Soles" aria-describedby="sizing-addon2" required title="Solo se acepta números. Ejem: 500.00" pattern="[0-9]+(\.[0-9][0-9]?)?" >
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('price_business_dollar','Precio en Dolares para empresarios :',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						<input class="form-control" type="text" name="price_business_dollar" placeholder="Precio empresario en Dolar" aria-describedby="sizing-addon2" required title="Solo se acepta números. Ejem: 500.00" pattern="[0-9]+(\.[0-9][0-9]?)?" >
					</div>
				</div>
				
				<div class="form-group">
					{!! Form::label('price_customers_dollar','Precio en Dolares para el público : ',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						<input class="form-control" type="text" name="price_customers_dollar" placeholder="Precio público en Dolar" aria-describedby="sizing-addon2" required title="Solo se acepta números. Ejem: 500.00" pattern="[0-9]+(\.[0-9][0-9]?)?" >
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('phase_id','Fase a la que pertence: ',['class'=>'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::select('phase_id',$phases,null,['class'=>'form-control','placeholder'=>'Seleccione una fase','required']) !!}
					</div>
				</div>
				
				
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						{!! Form::submit('Registrar Producto', ['class' => 'btn btn-primary']) !!}
					</div>
				</div>
			</div>
		</div>		
	</div>
	{!! Form::close() !!}
@endsection