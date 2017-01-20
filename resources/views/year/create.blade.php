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

	<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 div-form">
		<h3>Novo Ano Base</h3>
		<hr>

		{{ Form::open(['route'=>'year.store','class'=>'form']) }}
		<div class="form-group">
			{!! Form::number('year', null,['class'=>'form-control', 'placeholder'=>'Ano']) !!}
			{!! Form::date('name', \Carbon\Carbon::year()) !!}
		</div>

		{!! Form::submit('Enviar',['class'=>'btn btn-primary']) !!}
		{{ Form::close() }}
		</br>
	</div>

@endsection