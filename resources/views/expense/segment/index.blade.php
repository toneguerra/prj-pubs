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
<div class="col-md-12 col-md-12">
	<a href="{{ route('expense.segment.create') }}" class="btn btn-primary pull-right" role="button">Novo Relatório</a>
</div>

<div class="col-md-12 col-lg-12">
	<table class="table table-condensed table-bordered">
		<thead>
		<tr class="success">
			<th>Nome</th>
			<th>Abrev</th>
			<th>Tipo</th>
			<th>Período</th>
		</tr>
		</thead>

		@foreach($segmentos as $typeGroup=>$segmentos)
			<thead>
			<tr>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
			</thead>
			<tbody>
			@foreach($segmentos as $segmento)
				<tr>
					<td>{{$segmento->name}}</td>
					<td>{{$segmento->abrev}}</td>
					<td>{{$segmento->type->abrev}}</td>
					<td>{{$segmento->period->name}}</td>
				</tr>
			@endforeach
			</tbody>
		@endforeach
	</table>
</div>
@endsection
