@extends('../layouts.app')

@section('content')
	<div class="page-header">
		<h3>Contas Públicas <small>- Auxiliar/Tipos</small></h3>
	</div>


	<table class="table table-condensed table-hover">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>Abrev</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tipos as $tipo)
			<tr>
				<th scope="row">{{ $tipo->id }}</th>
				<td>{{ $tipo->name }}</td>
				<td>{{ $tipo->abrev }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection
