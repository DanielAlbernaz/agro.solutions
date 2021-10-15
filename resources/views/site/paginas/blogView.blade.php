@include('site.main.header')






<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Blog</h2>
				<span>Mantenha-se atualizado com as últimas notícias</span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Início</a></li>
						<li>Blog</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>



<!-- Content
================================================== -->
<div class="container">

	<!-- Blog Posts -->
	<div class="blog-page">
	<div class="row">


		<!-- Post Content -->
		<div class="col-md-8">


			<!-- Blog Post -->
			<div class="blog-post single-post">

				<!-- Img -->
				<img class="post-img" src="{{ urlImg() . $blog[0]->imagem }}" alt="">


				<!-- Content -->
				<div class="post-content">
					<h3>{{ $blog[0]->title }}</h3>

					<ul class="post-meta">
                        <?php
                            $data2 = converteDataHora($blog[0]->created_at);
                            $data2 = explode(' ', $data2);

                        ?>
						<li>{{ $data2[0] }}</li>
					</ul>

					<p>{!! $blog[0]->text !!}</p>


					<!-- Share Buttons -->
					<ul class="share-buttons margin-top-40 margin-bottom-0">
                        <input type="text" id="link" alt="Compartilhar link" style="opacity: 0; cursor: default" value="{{pathSite()}}blogView/{{$blog[0]->id}}" name="link" >
                        <li><img  style="cursor: pointer" onClick="copiarTexto()" src="images/compartilhar.png" alt="Compartilhar link"></li>
						<li><a style="cursor:pointer" href="https://www.facebook.com/sharer/sharer.php?u={{pathSite()}}blogView/{{$blog[0]->id}}" title="Facebook"><img src="images/facebook.png" alt=""></a></li>
						<li><a style="cursor:pointer" class="sharer" data-sharer="twitter" data-title="<?= utf8_decode('Agro Solutions')?> - " data-hashtags="AGROSOLUTIONS" data-url="<?php print 'http://' . $_SERVER['SERVER_NAME'] . '/blogView/' . $blog[0]->id; ?>"><img src="images/twitter.png"></a></li>
						<li><a style="cursor:pointer" class="sharer iconCompartilhar colorWhat compRdW mobile" target="_blank" rel="nofollow" data-title="Conheça nossas oportunidades:" href="https://api.whatsapp.com/send?l=pt&text=<?=utf8_decode('Agro Solutions')?>: http://<?= $_SERVER['SERVER_NAME']. '/blogView/' . $blog[0]->id; ?>" data-whatsapp-wpusb="https://web.whatsapp.com/"><img src="images/whatsapp2.png"></a></li>
					</ul>
					<div class="clearfix"></div>

				</div>
			</div>
			<!-- Blog Post / End -->



			<div class="margin-top-50"></div>


			<div class="clearfix"></div>
			<div class="margin-top-55"></div>




	</div>
	<!-- Content / End -->



	<!-- Sidebar
	================================================== -->

	<!-- Widgets -->
	<div class="col-md-4">
		<div class="sidebar right">

			<!-- Widget -->
			{{-- <div class="widget">
				<h3 class="margin-top-0 margin-bottom-25">Procurar Blog</h3>
				<div class="search-blog-input">
					<div class="input"><input class="search-field" type="text" placeholder="Type and hit enter" value=""/></div>
				</div>
				<div class="clearfix"></div>
			</div> --}}
			<!-- Widget / End -->



			<!-- Widget -->
			<div class="widget">

				<h3>Posts Populares</h3>
				<ul class="widget-tabs">

					@for ($t = 0; $t < count($blogRecentes); $t++)
                        <!-- Post #1 -->
                        <li>
                            <div class="widget-content">
                                    <div class="widget-thumb">
                                    <a href="{{ pathSite() }}blogView/{{ $blogRecentes[$t]->id }}"><img src="{{ urlImg() . $blogRecentes[$t]->imagem }}" alt=""></a>
                                </div>

                                <div class="widget-text">
                                    <h5><a href="{{ pathSite() }}blogView/{{ $blogRecentes[$t]->id }}">{{ $blogRecentes[$t]->title }}</a></h5>
                                    <?php
                                    $data2 = converteDataHora($blogRecentes[$t]->created_at);
                                        $data2 = explode(' ', $data2);

                                    ?>
                                    <span>{{ $data2[0] }}</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </li>
                    @endfor

				</ul>

			</div>
			<!-- Widget / End-->


			<!-- Widget -->
			<div class="widget">
				<h3 class="margin-top-0 margin-bottom-25">Social</h3>
				<ul class="social-icons rounded">
					@if ($empresa[0]->facebook)
                        <li><a class="facebook" href="{{ $empresa[0]->facebook }}" target="_blank"><i class="icon-facebook"></i></a></li>
                    @endif
                    @if ($empresa[0]->instagram)
                        <li><a class="instagram" href="{{ $empresa[0]->instagram }}" target="_blank"><i class="icon-instagram"></i></a></li>
                    @endif
                    @if ($empresa[0]->youtube)
                        <li><a class="youtube" href="{{ $empresa[0]->youtube }}" target="_blank"><i class="icon-youtube"></i></a></li>
                    @endif
                    @if ($empresa[0]->linkedIn)
                        <li><a class="linkedin" href="{{ $empresa[0]->linkedIn }}" target="_blank"><i class="icon-linkedin"></i></a></li>
                    @endif
				</ul>

			</div>
			<!-- Widget / End-->

			<div class="clearfix"></div>
			<div class="margin-bottom-40"></div>
		</div>
	</div>
	</div>
	<!-- Sidebar / End -->


</div>
</div>


@include('site.main.footer')
