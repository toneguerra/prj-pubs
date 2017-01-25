@extends('../layouts.app')

@section('content')
	<div class="page-header">
		<h3>Contas Públicas <small>- Listar</small></h3>
	</div>

	@if (session('success'))
		<div class="alert alert-success">
			{{ session('success') }}
		</div>
	@endif

	<ul>
		@foreach($relat as $item)
			<li>{!! link_to($item->path,'titulo') !!}</li>
		@endforeach
	</ul>


@endsection