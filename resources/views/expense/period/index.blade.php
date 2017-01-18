@extends('../layouts.app')

@section('content')
	<div class="page-header">
		<h3>Contas Públicas <small>- Auxiliar/Períodos</small></h3>
	</div>

	@foreach($periodos as $periodo)
		<div class="col-md-2 col-lg-2">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">{{ $periodo->name }}</h3>
				</div>

				<!-- Table -->
				<table class="table table-condensed">
					<thead>
					<tr class="active">
						<th>Nome</th>
						<th>Abrev</th>
					</tr>
					</thead>
					<tbody>
					@foreach($periodo->periodDetails as $periodDetail)
						<tr>
							<td>{{ $periodDetail->name }}</td>
							<td>{{ $periodDetail->abrev }}</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	@endforeach
@endsection
