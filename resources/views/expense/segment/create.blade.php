@extends('../layouts.app')

@section('content')

    <div class="page-header">
        <h3>Contas Públicas
            <small>- Auxiliar/Segmentos/Novo Relatório</small>
        </h3>
    </div>

    @if(isset($errors) && count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif

<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 div-form">
    <h3>Novo Relatório</h3>
    <hr>

    {{ Form::open(['route'=>'expense.segment.store','class'=>'form']) }}
    <div class="form-group">
        {!! Form::text('name', null,['class'=>'form-control', 'placeholder'=>'Título do Relatório']) !!}
    </div>

    <div class="form-group">
        {!! Form::text('abrev', null,['class'=>'form-control', 'placeholder'=>'Abreviatura']) !!}
    </div>

    <div class="form-group">
        {!! Form::select('expense_type_id',$types,null,['class'=>'form-control', 'placeholder'=>'Selecione o Tipo']) !!}
    </div>

    <div class="form-group">
        {!! Form::select('expense_period_id',$periods,null,['class'=>'form-control', 'placeholder'=>'Selecione o Período']) !!}
    </div>

    {!! Form::submit('Enviar',['class'=>'btn btn-primary']) !!}
    {{ Form::close() }}
    </br>
</div>


@endsection
