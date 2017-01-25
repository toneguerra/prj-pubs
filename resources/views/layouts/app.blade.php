<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

   
   
    {{ Html::style('dist/css/bootstrap-submenu.css') }}

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
    </script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <!--
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            !-->
            <span class="glyphicon glyphicon-tasks"></span>
        </button>
        <!--<a class="navbar-brand" href="#">Menu:</a>!-->
    </div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul class="nav navbar-nav">
    <!--
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        !-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class='glyphicon glyphicon-usd'></span>
            Contas Públicas <span class="caret"></span></a>
            <ul class="dropdown-menu">
                @if (Auth::guest())
                <li role="presentation"><a href="#">Adicionar Publicação</a></li>
                <li role="presentation"><a href="#">Listar Publicações</a></li>
                @else
                <li role="presentation"><a href="{{route('expense.create')}}">Adicionar Publicação</a></li>
                <li role="presentation"><a href="{{route('expense.index')}}">Listar Publicações</a></li>

                <li class="divider"></li>
                <li class="dropdown-submenu">
                    <a tabindex="-1" href="#">Cadastros Auxiliares</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('expense.segment.index') }}">Relatórios Segmentados</a></li>
                        <li><a href="{{ route('expense.type.index') }}">Tipos</a></li>
                        <li><a href="{{ route('expense.period.index') }}">Períodos</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class='glyphicon glyphicon-piggy-bank'></span>
            Licitações <span class="caret"></span></a>
            <ul class="dropdown-menu">
                @if (Auth::guest())
                <li role="presentation"><a href="#">Listar</a></li>
                <li role="presentation"><a href="#">Adicionar Nova</a></li>
                @else
                <li role="presentation"><a href="{{route('expense.index')}}">Listar</a></li>
                <li role="presentation"><a href="#">Adicionar Nova</a></li>
                @endif
            </ul>
        </li>

      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class='glyphicon glyphicon-calendar'></span>
              Ano Base <span class="caret"></span></a>
          <ul class="dropdown-menu">
              @if (Auth::guest())
                  <li><a href="#">Criar e Definir</a></li>
              @else
                  <li><a href="{{ route('year.create') }}">Criar e Definir</a></li>
              @endif
          </ul>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
        @if (Auth::guest())
        <li><a href="{{ url('/login') }}">Login</a></li>
        <li><a href="{{ url('/register') }}">Register</a></li>
        @else
        <li class="dropdown active">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="{{ url('/logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </li>
    @endif
</ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>


<div class="col-md-12 col-lg-12" >
    @yield('content')
</div>

</body>

<!-- Latest compiled and minified JavaScript -->
<!-- <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>!-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>!-->


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<script>
    $(document).ready(function($) {
        $('#expense_segment').on('change', function(){
            $.ajax({
                url:'filtro',
                type:'GET',
                data: {expense_segment : $('#expense_segment').val()},
                success: function (data){
                    $('#expense_period_detail').empty();
                    $.each(data, function(index, jsonReturn){
                         $('#expense_period_detail').append('<option value="'+jsonReturn.id +'">'+jsonReturn.name+'</option>');
                    });
                }
            });
        });
    });
</script>


</html>
