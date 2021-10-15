


<?php

$empresa = exibirInfoEmpresa();
$telefones = exibirTelefone();
?>
<!-- Footer
================================================== -->
<div id="footer" class="sticky-footer">
	<!-- Main -->
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-12">
                <a href="{{ pathSite() }}">
                    <img class="footer-logo" src="images/agro.png" alt="">
                </a>
				<br><br>

				<ul class="footer-links">
					<li><a href="{{ pathSite() }}institucional">Quem Somos</a></li>
					<li><a href="{{ pathSite() }}terrenos">Terrenos</a></li>
					<li><a href="{{ pathSite() }}animais">Animais</a></li>
					<li><a href="{{ pathSite() }}equipamentos">Equipamentos</a></li>
					<li><a href="{{ pathSite() }}blog">Blog</a></li>
					<li><a href="{{ pathSite() }}politica-privacidade">Politica de privacidade</a></li>
					<li><a href="{{ pathSite() }}termo-uso">Termo de uso</a></li>
				</ul>


			</div>

			<div class="col-md-4 col-sm-12 ">
				<h4>Central de atendimento</h4>
				<ul class="footer-links ">
                    @if ($empresa->facebook)
                        <span style="padding: 4px; margin-bottom: 2px;"><a class="" href="{{ $empresa->facebook }}" target="_blank"><img src="images/facebook.png" alt=""></a></span>
                    @endif

                    @if ($empresa->instagram)
                        <span style="padding: 4px; margin-bottom: 2px;"><a class="" href="{{ $empresa->instagram }}" target="_blank"><img src="images/instagram.png" alt=""></a></span>
                    @endif

                    @if ($empresa->youtube)
                        <span style="padding: 4px; margin-bottom: 2px;"><a class="" href="{{ $empresa->youtube }}" target="_blank"><img src="images/youtube.png" alt=""></a></span>
                    @endif

                    @if ($empresa->linkedIn)
                        <span style="padding: 4px; margin-bottom: 2px;"><a class="" href="{{ $empresa->linkedIn }}" target="_blank"><img src="images/linkedin.png" alt=""></a></span>
                    @endif
					<li style="margin-top: 28px;" ><a href="mailto:{{ $empresa->email }}">Atendimento por email</a></li>
					<li><a target="_blank" href="https://web.whatsapp.com/send?phone=55{{ formatPhone($empresa->whatsapp) }}&amp;text=Olá, gostaria de saber mais informações!">Atendimento Whatsapp</a></li>
					<li><a href="{{ pathSite() }}institucional">Ligamos para você</a></li>
				</ul>
			</div>

			<div class="col-md-4  col-sm-12">
				<h4>Endereço</h4>
				<div class="text-widget">
					<span>{{ $empresa->endereco }}<br/>
					Telefone: <span><a style="color: #707070" href="tel:55{{ formatPhone($telefones[0]['telefone']) }}">{{ $telefones[0]->telefone }}</a> / <a style="color: #707070" target="_blank" href="https://web.whatsapp.com/send?phone=55{{ formatPhone($empresa->whatsapp) }}&amp;text=Olá, gostaria de saber mais informações!">{{ $empresa->whatsapp }}</a></span><br>
					Email:<span> <a href="mailto:{{ $empresa->email }}"><span class="__cf_email__" data-cfemail="c0afa6a6a9a3a580a5b8a1adb0aca5eea3afad">{{ $empresa->email }}</span></a> </span><br>
				</div>
			</div>

		</div>

		<!-- Copyright -->
		<div class="row">
			<div class="col-md-12">
				<div class="copyrights">© 2021 AGRO SOLUTIONS. Todos os direitos reservados.</div>
			</div>
		</div>

	</div>

</div>
<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href=""></a></div>


  <div class="atendimento  ">
      <a target="_blank" href="https://web.whatsapp.com/send?phone=55{{ formatPhone($empresa->whatsapp) }}&amp;text=Olá, gostaria de saber mais informações!"><img src="images/whatsapp.png" /></a>

  </div>

<!-- Scripts
================================================== -->
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script type="text/javascript" src="{{asset('assests/site/js/scripts/jquery-2.2.0.min.js')}}"></script>

<script type="text/javascript" src="{{asset('assests/site/js/scripts/chosen.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assests/site/js/scripts/magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assests/site/js/scripts/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assests/site/js/scripts/rangeSlider.js')}}"></script>
<script type="text/javascript" src="{{asset('assests/site/js/scripts/sticky-kit.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assests/site/js/scripts/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assests/site/js/scripts/masonry.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assests/site/js/scripts/mmenu.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assests/site/js/scripts/tooltips.min.js')}}"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<script type="text/javascript" src="scripts/custom.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<script type="text/javascript" src="{{asset('assests/site/js/scripts/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('assests/site/js/contatoForm.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript" src="{{asset('assests/site/js/sharer/sharer.min.js')}}"></script>


<!-- Google Autocomplete -->
<script>
  function initAutocomplete() {
    var input = document.getElementById('autocomplete-input');
    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.addListener('place_changed', function() {
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        window.alert("No details available for input: '" + place.name + "'");
        return;
      }
    });
}
</script>

<!-- Style Switcher
================================================== -->
<script type="text/javascript" src="{{asset('assests/site/js/scripts/witcher.js')}}"></script>



</div>
<!-- Wrapper / End -->


</body>

</html>
