@extends('../layouts.app')

@section('content')
	<div class="page-header">
		<h3>Contas Públicas <small>- Auxiliar/Períodos</small></h3>
	</div>


	<table class="table table-condensed table-hover">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
			</tr>
		</thead>
		<tbody>
			@foreach($periodos as $periodo)
			<tr>
				<th scope="row">{{ $periodo->id }}</th>
				<td>{{ $periodo->name }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection
