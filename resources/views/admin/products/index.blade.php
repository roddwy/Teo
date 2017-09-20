@extends('admin.template.main')

@section('title','Lista de Productos')

@section('content')
<div class="panel panel-default">
		<div class="panel-heading">FASES</div>
		<div class="panel-body">
			@include('flash::message')
			<a href="{{ route('admin.products.create') }}" class="btn btn-info">Registrar un nuevo producto</a>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<th>Id</th>
						<th>Cod</th>						
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Imagen</th>
						<th>Puntuación</th>
						<th>Precio Bs</th>
						<th>Precio Soles</th>
						<th>Precio $</th>
						<th>Fase</th>
						<th>Acción</th>					
					</thead>
					<tbody>
						@foreach($products as $product)
							<tr>
								<td>{{ $product->id }}</td>
								<td>{{ $product->cod }}</td>
								<td>{{ $product->name }}</td>
								<td>{{ $product->description }}</td>
								<td>
									<img src="../images/products/{{$product->image}}" class="img-rounded" alt="Cinque Terre" width="60" height="80">
								</td>
								<td>{{ $product->punctuation }}</td>
								<td>{{ $product->price_business_bol }}</td>
								<td>{{ $product->price_business_sol }}</td>
								<td>{{ $product->price_business_dollar }}</td>
								<td>{{ $product->phase->name }}</td>
								<td>
									<a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
									<a href="{{ route('admin.products.destroy', $product->id) }}" onclick="return confirm('¿Seguro que deseas Eliminarlo?')" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="text-center">
				{!! $products->render() !!}
			</div>
		</div>		
</div>
@endsection