@extends('../layouts.app')

@section('content')
	<div class="page-header">
		<h3>Ano Base <small>- Criar/Definir Novo Ano</small></h3>
	</div>

	@if(isset($errors) && count($errors)>0)
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				<p>{{$error}}</p>
			@endforeach
		</div>
	@endif

	@if (session('success'))
		<div class="alert alert-success">
			{{ session('success') }}
		</div>
	@endif

	<div class="col-md-12 col-lg-12">
		<ul>
			@foreach($years as $year)
				<li>{{ $year->year }}</li>
			@endforeach
		</ul>
	</div>

	<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 div-form">
		<h3>Novo Ano Base</h3>
		<hr>

		{{ Form::open(['route'=>'year.store','class'=>'form']) }}
		<div class="form-group">
			{!! Form::number('year', 2017,['class'=>'form-control', 'placeholder'=>'Ano', 'min'=>2016, 'max'=>2020]) !!}

		</div>

		{!! Form::submit('Enviar',['class'=>'btn btn-primary']) !!}
		{{ Form::close() }}
		</br>
	</div>

@endsection