<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Painel Administrativo | Login</title>

    <link href="{{asset('assests/painel/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assests/painel/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('assests/painel/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assests/painel/css/style.css')}}" rel="stylesheet">
    <meta name="csrf" value="{{ csrf_token() }}">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div style="    width: 340px;
                background: #f9f9f9;
                border: 1px solid #cdcdcd;
                display: inline-table;
                height: 236px;
                padding: 14px;
                margin-top: 79%;">
            <div>
                <h1  ></h1>
                <h1  class="logo-name"></h1>

            </div>
            <h3>Sistema Administrativo </h3>
            <form class="m-t"  method="POST" action="{{ route('logar') }}">
                @csrf

                @if ($errors->any())
                <div class="alert alert-warning">
                    <i class="fa fa-warning"></i> {{$errors->first()}}
                </div>
                @endif

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email"  name="email" id="email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Senha" name="password" id="password" required>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                {{-- <a href="#"><small>Esqueceu sua senha?</small></a> --}}
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('assests/painel/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('assests/painel/js/popper.min.js')}}"></script>
    <script src="{{asset('assests/painel/js/bootstrap.js')}}"></script>


</body>

</html>
