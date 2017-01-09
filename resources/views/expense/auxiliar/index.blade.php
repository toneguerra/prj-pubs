@extends('../layouts.app')

@section('content')
	<div class="page-header">
		<h3>Contas Públicas <small>- Auxiliar/Tipos</small></h3>
	</div>


	<table class="table">
		<caption>Optional table caption.</caption>
		<thead>
			<tr>
				<th>#</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Username</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tipos as $tipo)
			<tr>
				<th scope="row">1</th>
				<td>{{ $tipo->name }}</td>
				<td>Otto</td>
				<td>@mdo</td>
			</tr>
			@endforeach
			<tr>
				<th scope="row">2</th>
				<td>Jacob</td>
				<td>Thornton</td>
				<td>@fat</td>
			</tr>
			<tr>
				<th scope="row">3</th>
				<td>Larry</td>
				<td>the Bird</td>
				<td>@twitter</td>
			</tr>
		</tbody>
	</table>
@endsection
