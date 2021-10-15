<!DOCTYPE html>

<?php

    $empresa = exibirInfoEmpresa();
    $telefones = exibirTelefone();
    $metaTagCompartilhar = metaTag(session('pagina'), session('id'));
?>

<head>

<!-- Basic Page Needs
================================================== -->
<title>AGRO SOLUTIONS</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="pt-BR" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="pragma" content="no-cache" />
<meta name="robots" content="ALL" />
<meta name="keywords" content="Agro Solutions, Imóveis, Terrenos, Animais, Equipamentos, aluguel de equipamentos agriculas, Agro, Solutions" />
<meta name="description" content="Agro Solutions, Imóveis, Terrenos, Animais, Equipamentos, aluguel de equipamentos agriculas, Agro, Solutions" />
<meta name="resource-types" content="document" />
<meta name="revisit-after" content="1 day" />
<meta name="distribution" content="Global" />
<meta name="rating" content="General" />
<meta name="author" content="MadeFy" />
<meta name="language" content="pt-br" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

@if ($metaTagCompartilhar)
    <meta property="og:locale" content="pt_BR" />
    <meta property="og:url" content="{{ pathSite() . session('pagina') }}View/{{ $metaTagCompartilhar->id }}" />
    <meta property="og:title" content="Agro Solutions" />
    <meta property="og:site_name" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content='Acesse nosso site para ficar por dentro de nossas oportunidades.' />
    <meta property="og:image" content="{{ urlImg() . $metaTagCompartilhar->imagem}}" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="Agro Solutions">
    <meta property="twitter:description" content='Acesse nosso site para ficar por dentro de nossas oportunidades.''>
    <meta property="twitter:image:src" content="{{ urlImg() . $metaTagCompartilhar->imagem}}">
    <meta property="twitter:image:width" content="1291">
    <meta property="twitter:image:height" content="315">
@endif

<!-- CSS
================================================== -->
<link href="{{asset('assests/site/css/style.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assests/site/css/colors/main.css')}}" rel="stylesheet" type="text/css" id="colors">
<link rel="shortcut icon" href="images/agro1.png" />
</head>

<body>

<!-- Wrapper -->
<div id="wrapper">





<!-- Header Container
================================================== -->
<header id="header-container">

	<!-- Topbar -->
	<div id="top-bar">
		<div class="container">

			<!-- Left Side Content -->
			<div class="left-side">

				<!-- Top bar -->
				<ul class="top-bar-menu">
					<li><i class="fa fa-phone"></i> <a href="tel:55{{ formatPhone($telefones[0]['telefone']) }}">{{ $telefones[0]->telefone }}</a>  / <a target="_blank" href="https://web.whatsapp.com/send?phone=55{{ formatPhone($empresa->whatsapp) }}&amp;text=Olá, gostaria de saber mais informações!">{{ $empresa->whatsapp }}</a> </li>
					<li><i class="fa fa-envelope"></i> <a href="mailto:{{ $empresa->email }}"><span class="__cf_email__" data-cfemail="553a33333c363015302d34382539307b363a38">{{ $empresa->email }}</span></a></li>
				</ul>

			</div>
			<!-- Left Side Content / End -->


			<!-- Left Side Content -->
			<div class="right-side">

				<!-- Social Icons -->
				<ul class="social-icons ocutarMobile">
                    @if ($empresa->facebook)
					    <li><a class="facebook" href="{{ $empresa->facebook }}" target="_blank"><i class="icon-facebook"></i></a></li>
                    @endif
                    @if ($empresa->instagram)
                        <li><a class="instagram" href="{{ $empresa->instagram }}" target="_blank"><i class="icon-instagram"></i></a></li>
                    @endif
                    @if ($empresa->youtube)
                        <li><a class="youtube" href="{{ $empresa->youtube }}" target="_blank"><i class="icon-youtube"></i></a></li>
                    @endif
                    @if ($empresa->linkedIn)
                        <li><a class="linkedin" href="{{ $empresa->linkedIn }}" target="_blank"><i class="icon-linkedin"></i></a></li>
                    @endif

				</ul>

			</div>
			<!-- Left Side Content / End -->

		</div>
	</div>
	<div class="clearfix"></div>
	<!-- Topbar / End -->


	<!-- Header -->
	<div id="header">
		<div class="container">

			<!-- Left Side Content -->
			<div class="left-side">

				<!-- Logo -->
				<div id="logo">
					<a href="{{ pathSite() }}"><img src="images/logo.png" alt=""></a>
				</div>


				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>


				<!-- Main Navigation -->
				<nav id="navigation" class="style-1">
					<ul id="responsive">
						<li><a href="{{ pathSite() }}">INÍCIO</a></li>

						<li><a href="{{ pathSite() }}institucional">QUEM SOMOS</a></li>

						<li><a href="{{ pathSite() }}terrenos">TERRENOS</a></li>

						<li><a href="{{ pathSite() }}animais">ANIMAIS</a></li>

						<li><a href="{{ pathSite() }}equipamentos">EQUIPAMENTOS</a></li>

                        <li><a href="{{ pathSite() }}blog">BLOG</a></li>

					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->

			</div>
			<!-- Left Side Content / End -->

			<!-- Right Side Content / End -->


		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->


