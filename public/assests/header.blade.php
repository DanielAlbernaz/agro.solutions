<!DOCTYPE html>
<html lang="pt-BR">
    <?php
    $empresa = exibirInfoEmpresa();
    $telefones = exibirTelefone();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta property="og:locale" content="pt_BR" />
<meta property="og:url" content="http://104.214.71.107/Seven-imobiliaria/public/detalhes-imovel?id=4" />
<meta property="og:title" content="Seven - Imobiliaria" />
<meta property="og:site_name" content="" />
<meta property="og:type" content="website" />
<meta property="og:description" content='Teste ' />
<meta property="og:image" content="http://104.214.71.107/Seven-imobiliaria/public/storage/imovel/4/photo_1619412631880.jpeg" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />

<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:title" content="">
<meta property="twitter:description" content='Teste '>
<meta property="twitter:image:src" content="http://104.214.71.107/Seven-imobiliaria/public/storage/imovel/4/photo_1619412631880.jpeg">
<meta property="twitter:image:width" content="1291">
<meta property="twitter:image:height" content="315">


    
    <link href="{{asset('assests/site/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assests/site/css/main.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assests/site/css/style2.css')}}" rel="stylesheet" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    {{-- css banner --}}
    <link rel="stylesheet" href="{{asset('assests/site/js/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assests/site/js/slider/css/nivo-slider.css')}}" />
    <link rel="stylesheet" href="{{asset('assests/site/js/slider/css/preview.css')}}" />
    <link rel="stylesheet" href="{{asset('assests/site/js/slider/css/style.css')}}" />

    <title>Seven | Imóbiliaria</title>
</head>
<body>
    <header>
        <div class="cabecalho">

            <div class="rectangle">

                <div class="rec">

                    <div class="telphone">
                        <ul class="icontel">
                            <li class="telwidth">
                                <a href="">
                                    <p><i style="color:white" class="fa fa-phone"></i> <a style="color:white" href="tel:55{{ formatPhone($telefones[0]['telefone']) }}">{{ $telefones[0]['telefone'] }} </a></p>

                                </a>
                            </li>
                            <li>
                                <a style="cursor:pointer">
                                    <font color="white">
                                        <i  class="fa fa-envelope"></i> {{ $empresa->email }}
                                    </font>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="iconredes">
                        <dd>
                            <a href="{{ $empresa->facebook }}" target="_blank"><i style="font-size: 25px;" class="fa fa-facebook"></i></a>
                        </dd>
                        <dd>
                            <a href="{{ $empresa->instagram }}" target="_blank"><i style="font-size: 25px;" class="fa fa-instagram"></i></a>
                        </dd>
                    </div>

                </div>

            </div>

        </div>

        <nav>

            <div class="topnav" id="myTopnav" style="cursor :pointer;" >
                    <label onclick="redirect()" style="cursor :pointer;"  for="" class="logo">
                            <img style="cursor :pointer;" src="./images/marca2.png" alt="">
                    </label>
                <ul>
                    <a href="institucional">CONTATO</a>
                    <a href="imoveis">IMÓVEIS</a>
                    <a href="institucional" class="">QUEM SOMOS</a>
                    <a href="http://104.214.71.107/Seven-imobiliaria/public/" class="">HOME</a>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <i class="fa fa-bars"></i>
                      </a>
                </ul>
              </div>
        </nav>

        <script>
            function myFunction() {
              var x = document.getElementById("myTopnav");
              if (x.className === "topnav") {
                x.className += " responsive";
              } else {
                x.className = "topnav";
              }
            }
        </script>

    </header>
