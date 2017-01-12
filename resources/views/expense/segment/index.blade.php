@extends('../layouts.app')

@section('content')

<div class="page-header">
	<h3>Contas Públicas <small>- Auxiliar/Segmentos</small></h3>
</div>

<table class="table table-condensed table-hover">
	<a href="{{ route('expense.segment.create') }}" class="btn btn-primary pull-right" role="button">Novo Relatório</a>
	<thead>
		<tr>
			<th>Id</th>
			<th>Nome</th>
			<th>Abrev</th>
			<th>Tipo</th>
			<th>Período</th>
		</tr>
	</thead>
	<tbody>
		@foreach($segmentos as $segmento)
		<tr>
			<th scope="row">{{ $segmento->id }}</th>
			<td>{{ $segmento->name }}</td>
			<td>{{ $segmento->abrev }}</td>
			<td>{{ $segmento->expense_type_id }}</td>
			<td>{{ $segmento->expense_period_id }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
