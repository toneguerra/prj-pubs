@extends('../layouts.app')

@section('content')

<div class="page-header">
	<h3>Contas Públicas <small>- Auxiliar/Segmentos</small></h3>
</div>

@if (session('success'))
	<div class="alert alert-success">
		{{ session('success') }}
	</div>
@endif
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
		@foreach($segmentos as $typeGroup=>$segmentos)

			@foreach($segmentos as $segmento)
				<tr>
					<th scope="row">{{$segmento->id}}</th>
					<td>{{$segmento->name}}</td>
					<td>{{$segmento->abrev}}</td>
					<td>{{$segmento->type->abrev}}</td>
					<td>{{$segmento->period->name}}</td>
				</tr>
			@endforeach
		@endforeach
		</tbody>
	</table>
@endsection
