@extends('../layouts.app')

@section('content')

    <div class="page-header">
        <h3>Contas Públicas
            <small>- Nova Publicação</small>
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
    <h3>Nova Publicação</h3>
    <hr>

    {{ Form::open(['route'=>'expense.store','class'=>'form', 'enctype'=>'multipart/form-data']) }}


    <div class="form-group">
        {!! Form::select('expense_year',$years,null,['class'=>'form-control', 'placeholder'=>'Selecione o Ano']) !!}
    </div>

    <div class="form-group">
        {!! Form::select('expense_segment',$segments,null,['class'=>'form-control', 'placeholder'=>'Selecione Segmento da Publicação','id'=>'expense_segment']) !!}
    </div>

    <div class="form-group">
        {!! Form::select('expense_period_detail',[],null,[
                'class'=>'form-control', 'placeholder'=>'Selecione o Período','id'=>'expense_period_detail']) !!}
    </div>

    <div class="form-group">
        {!! Form::file('path',['accept'=>'.pdf']) !!}
    </div>

    {!! Form::submit('Enviar',['class'=>'btn btn-primary']) !!}

    {{ Form::close() }}
    </br>
</div>


@endsection
