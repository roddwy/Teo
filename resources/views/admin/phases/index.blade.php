@extends('admin.template.main')

@section('title','Lista de las Fases')

@section('content')
<div class="panel panel-default">
		<div class="panel-heading">FASES</div>
		<div class="panel-body">
			@include('flash::message')
			<a href="{{ route('admin.phases.create') }}" class="btn btn-info">Registrar un nueva fase</a>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<th>Id</th>
						<th>Nombre</th>						
						<th>Descripción</th>
						<th>Acción</th>						
					</thead>
					<tbody>
						@foreach($phases as $phase)
							<tr>
								<td>{{ $phase->id }}</td>
								<td>{{ $phase->name }}</td>
								<td>{{ $phase->description }}</td>
								<td>
									<a href="{{ route('admin.phases.edit', $phase->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
									<a href="{{ route('admin.phases.destroy', $phase->id) }}" onclick="return confirm('¿Seguro que deseas Eliminarlo?')" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="text-center">
				{!! $phases->render() !!}
			</div>
		</div>		
</div>
@endsection