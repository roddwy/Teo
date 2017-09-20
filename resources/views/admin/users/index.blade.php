@extends('admin.template.main')

@section('title','Lista de Usuarios')

@section('content')
<div class="panel panel-default">
		<div class="panel-heading">LISTA DE TODOS LOS USUARIOS </div>
		<div class="panel-body">
			@include('flash::message')
			<a href="{{ route('admin.users.create') }}" class="btn btn-info">Registrar un nuevo Usuario</a>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<th>Id</th>
						<th>Nombres y Apellidos</th>						
						<th>Email</th>
						<th>Tipo de Usuario</th>
						<th>Acción</th>
					</thead>
					<tbody>
						@foreach($users as $user)
							<tr>
								<td>{{ $user->id }}</td>
								<td>{{ $user->first_name.' '.$user->last_name }}</td>
								<td>{{ $user->email }}</td>							
								@if($user->type == 'admin')
									<td>Administrador</td>
								@elseif($user->type == 'seller')
									<td>Cajero</td>
								@elseif($user->type == 'businessman')
									<td>Empresario</td>
								@endif
								<td>
									<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
									<a href="{{ route('admin.users.destroy', $user->id) }}" onclick="return confirm('¿Seguro que deseas Eliminarlo?')" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="text-center">
				{!! $users->render() !!}
			</div>
		</div>		
</div>
@endsection