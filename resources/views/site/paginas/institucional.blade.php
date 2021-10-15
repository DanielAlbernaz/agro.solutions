@include('site.main.header')



<div class="clearfix"></div>

<body onload="javascript: inicializar();">

	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="../connect.facebook.net/pt_BR/sdk.jslistings-list-with-sidebar.htmlxfbml=1&version=v7.0" nonce="nJIxcUT4"></script>

	<div id="wrapper">


		<div class="clearfix"></div>
		<!--/FIM TOP -->

        <!-- INCIO INTERNAS -->
		<!-- migalha -->
<div class="migalhaMBI imgMigalha" style="background-size: cover; background-image: url('{{ urlImg() . $bannerInstitucional->imagem}}');">
	<h1>{{$bannerInstitucional->title}}</h1>

</div>
    <!-- About page one start here -->
    <div class="about-page-one-area">
        <div class="container">
			<!-- video institucional -->
			<h3 class="about-font">
				<p>
                   {!! $institucional->text !!}
				</p>
			</h3>

            <!--/fim video institucional -->


            <div class="row">

                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                    <div class="about-content">
                        <h2 class="title-bar">{{$institucional->title}}</h2>
                        <p style="text-align: justify;">
                        	{{$institucional->sub_title}}                        </p>
                        <p>
                        	{{-- <strong>{{$empresa->endereco}}  </strong><br/> --}}
                        	<a href="tel:55{{ formatPhone($telefones[0]['telefone']) }}"><strong>Telefone: {{ $telefones[0]->telefone }}</strong></a><br/>
                        	<a target="_blank" href="https://web.whatsapp.com/send?phone=55{{ formatPhone($empresa->whatsapp) }}&amp;text=Olá, gostaria de saber mais informações!"><strong>Whatsapp: {{$empresa->whatsapp}}</strong></a><br/>

        					<ul class="social-icons">
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
                        </p>

                    </div>
                </div>

                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
					<img class="img-responsive" src="{{urlImg() . $institucional->imagem}}  " alt="video">
                </div>
                            	            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            		<div  style="border-bottom:listings-list-with-sidebar.htmlEFEFEF 1px solid; height: 1px; width: 97%; margin: auto; margin-top: 35px; margin-bottom: 35px;"></div>
            	</div>
            </div>
        </div>
    </div>
    <!-- About page one End here -->

<div class="clearfix"></div>

<div class="container">
	<div class="row">
	   <!-- Mensagem -->
		<div class="col-md-4">
			<h4 class="headline margin-bottom-30">Sinta-se à vontade para falar conosco.</h4>
			<div class="sidebar-textbox">
				<p style="text-align: justify; font-style: normal;">Utilize este espaço para falar conosco sobre suas dúvidas, suas recomendações, instruções de trabalho ou sobre qualquer outro assunto.<br />
Críticas construtivas são muito bem vindas. Elas receberão toda a nossa atenção e fazemos questão de lhe dar um retorno sobre elas. Por isso precisamos que você se identifique e nos informe como prefere receber relatos sobre nossas providências.</p>
			</div>
		</div>
		<!--/fim Mensagem -->
		<!-- Formulário -->
		<div class="col-md-8">
			<section id="contact">
				<h4 class="headline margin-bottom-35">Fale Conosco</h4>
				<div id="contact-message"></div>
				<form action="javascript:void(0);" id="frmContato" name="frmContato" autocomplete="on">
                    @csrf
					<!-- nome -->
					<div>
						<input class="inputLogin" name="nome" type="text" id="nome" placeholder="Nome" required="required" />
					</div>
					<div class="row">
						<div class="col-md-6">
							<!-- email -->
							<div>
								<input name="email" type="email" id="email" placeholder="E-mail" required="required" class="inputLogin" />
							</div>
						</div>
						<div class="col-md-6">
        					<!-- Telefone -->
        					<div>
        						<input class="inputLogin" name="telefone" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" type="text" id="telefone" placeholder="Telefone" required="required" />
        					</div>
						</div>
					</div>
					<!-- Mensagem -->
					<div>
						<textarea class="inputLogin" name="mensagem" cols="40" rows="3" id="mensagem" placeholder="Mensagem" spellcheck="true" required="required"></textarea>
					</div>

					<label>
                        <span class="text-input">
                            <div class="g-recaptcha" data-sitekey="6LeM_b0aAAAAAJ6odvZd6MBcOSvZX3ge28WlgjNJ"></div><br/>
                        </span>
                    </label>
					<input type="button"  onclick="formularioContato()" class="submit button" id="submit" value="ENVIAR" />
				</form>
			</section>
		</div>
		<!--/fim Formulário -->
	</div>
</div>
<div class="margin-bottom-40"></div>       <!--/FIM INTERNAS  -->


@include('site.main.footer')
