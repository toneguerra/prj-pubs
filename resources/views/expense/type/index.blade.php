@extends('../layouts.app')

@section('content')
	<div class="page-header">
		<h3>Contas Públicas <small>- Auxiliar/Tipos</small></h3>
	</div>


	<table class="table table-condensed table-hover table-bordered">
		<h4>Lista de Tipos de Relatórios</h4>
		<thead>
			<tr class="success">
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

	<hr>

	<h4>Detalhe de Segmentos por Tipo:</h4>
	@foreach($tipos as $tipo)
		<div class="col-md-6 col-lg-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">{{ $tipo->name }} - {{ $tipo->abrev }}</h3>
				</div>

				<!-- Table -->
				<table class="table table-condensed">
					<thead>
					<tr class="active">
						<th>Nome</th>
						<th>Abrev</th>
						<th>Periodo</th>
					</tr>
					</thead>
					<tbody>
					@foreach($tipo->segments as $segment)
						<tr>
							<td>{{ $segment->name }}</td>
							<td>{{ $segment->abrev }}</td>
							<td>{{ $segment->period->name }}</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	@endforeach
@endsection
