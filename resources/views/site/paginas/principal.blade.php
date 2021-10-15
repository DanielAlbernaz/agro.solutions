@include('site.main.header')



<!-- Banner
================================================== -->
@if (count($banner) > 0)
    <div class="parallax" data-background="{{ urlImg() . $banner[0]->imagem }}" style="height: 405px;"  data-img-width="2500" data-img-height="1600">
        <div class="parallax-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Main Search Container -->
                        <div class="main-search-container" style="    margin-top: 43px;">
                            <h2>{{ $banner[0]->title }}</h2>
                            <!-- Main Search -->
                        </div>
                        <!-- Main Search Container / End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif


<!-- Content
================================================== -->

@if (count($imoveisRecentes) > 0)
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3 class="headline margin-bottom-25 margin-top-65">Oportunidades recentes</h3>
            </div>

            <!-- Carousel -->
                <div class="col-md-12">
                    <div class="carousel">
                        @for ($i = 0; $i < count($imoveisRecentes); $i++)
                        <!-- Listing Item -->
                            <div class="carousel-item">
                            <div class="listing-item">
                                <a href="{{ pathSite() }}terrenoView/{{ $imoveisRecentes[$i]->id }}" class="listing-img-container">
                                    <div class="listing-badges">
                                        <span class="featured">Destaque</span>
                                        <span>{{ $imoveisRecentes[$i]->finalidade }}</span>
                                    </div>
                                    @if ($imoveisRecentes[$i]->valor != 0.00)
                                        <div class="listing-img-content">
                                            <span class="listing-price">R$ {{ number_format($imoveisRecentes[$i]->valor, 2, ',', '.') }} </span>
                                        </div>
                                    @endif

                                    <div class="listing-carousel">
                                        <div><img src="{{ urlImg() . $imoveisRecentes[$i]->imagem }}" alt=""></div>
                                        <?php $galleria = galleriaImovel($imoveisRecentes[$i]->id)?>
                                        @if (count($galleria) > 0)
                                            @for ($f = 0; $f < count($galleria); $f++)
                                                <div><img src="{{ urlImg() . $galleria[$f]->imagem }}" alt=""></div>
                                            @endfor
                                        @endif
                                    </div>
                                </a>

                                <div class="listing-content">
                                    <div class="listing-title">
                                        <h4><a href="{{ pathSite() }}terrenoView/{{ $imoveisRecentes[$i]->id }}">{{ $imoveisRecentes[$i]->tipo_imovel }}</a></h4>
                                        <a href="{{ pathSite() }}terrenoView/{{ $imoveisRecentes[$i]->id }}" class="listing-address popup-gmaps">
                                            <i class="fa fa-map-marker"></i>
                                            {{ $imoveisRecentes[$i]->cidade_estado }}
                                        </a>
                                    </div>
                                    <div class="listing-footer">
                                        <a href="{{ pathSite() }}terrenoView/{{ $imoveisRecentes[$i]->id }}" style="color: #353D72;"> Código do imóvel: {{ $imoveisRecentes[$i]->codigo_imovel }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Listing Item / End -->
                        @endfor
                    </div>
                </div>
                <!-- Carousel / End -->
                <div class="col-md-12" style="text-align: center;">
                    <a href="{{ pathSite() }}terrenos" class="button">TODOS OS TERRENOS</a>
                </div>

        </div>
    </div>
@endif


<!-- Fullwidth Section -->

@if (count($animaisRecentes) > 0)
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3 class="headline margin-bottom-25 margin-top-65">Compra e venda de animais</h3>
            </div>

            <!-- Carousel -->
                <div class="col-md-12">
                    <div class="carousel">
                        @for ($a = 0; $a < count($animaisRecentes); $a++)
                        <!-- Listing Item -->
                            <div class="carousel-item">
                            <div class="listing-item">
                                <a href="{{ pathSite() }}animalView/{{ $animaisRecentes[$a]->id }}" class="listing-img-container">
                                    <div class="listing-badges">
                                        <span class="featured">Destaque</span>
                                        <span>{{ $animaisRecentes[$a]->finalidade_tipo }}</span>
                                    </div>
                                    @if ($animaisRecentes[$a]->valor_unitario != 0.00)
                                        <div class="listing-img-content">
                                            <span class="listing-price">R$ {{ number_format($animaisRecentes[$a]->valor_unitario, 2, ',', '.') }} </span>
                                        </div>
                                    @endif

                                    <div class="listing-carousel">
                                        <div><img src="{{ urlImg() . $animaisRecentes[$a]->imagem }}" alt=""></div>
                                        <?php $galleria = galleriaAnimal($animaisRecentes[$a]->id)?>
                                        @if (count($galleria) > 0)
                                            @for ($t = 0; $t < count($galleria); $t++)
                                                <div><img src="{{ urlImg() . $galleria[$t]->imagem }}" alt=""></div>
                                            @endfor
                                        @endif
                                    </div>
                                </a>

                                <div class="listing-content">
                                    <div class="listing-title">
                                        <h4><a href="{{ pathSite() }}animalView/{{ $animaisRecentes[$a]->id }}">{{ $animaisRecentes[$a]->categoria_animal }}</a></h4>
                                        <a href="{{ pathSite() }}animalView/{{ $animaisRecentes[$a]->id }}" class="listing-address popup-gmaps">

                                            {{ $animaisRecentes[$a]->raca }}
                                        </a>
                                    </div>
                                    @if ( $animaisRecentes[$a]->codigo_animal)
                                        <div class="listing-footer">
                                            <a href="{{ pathSite() }}animalView/{{ $animaisRecentes[$a]->id }}" style="color: #353D72;"> Código do animal: {{ $animaisRecentes[$a]->codigo_animal }}</a>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <!-- Listing Item / End -->
                        @endfor
                    </div>
                </div>
                <!-- Carousel / End -->
        </div>
    </div>

    <!-- Carousel / End -->
		<div class="col-md-12" style="text-align: center;">
			<a href="{{ pathSite() }}animais" class="button">TODOS OS ANIMAIS</a>
		</div>
	</div>
</div>
@endif




<!-- Content
================================================== -->
<div style="background-color: #F7F7F7;">

@if (count($equipamentosRecentes) > 0)
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3 class="headline margin-bottom-25 margin-top-60">Peças Agrícolas</h3>
            </div>

            <!-- Carousel -->
            <div class="col-md-12">

                <div class="col-md-4">
                </div>

                <div class="carousel">
                    @for ($b = 0; $b < count($equipamentosRecentes); $b++)
                        <!-- Listing Item -->
                            <div class="carousel-item">
                            <div class="listing-item">

                                <a href="{{ pathSite() }}equipamentoView/{{ $equipamentosRecentes[$b]->id }}" class="listing-img-container">
                                    <div class="listing-badges">
                                        <span class="featured">Destaque</span>
                                        <span>{{ $equipamentosRecentes[$b]->finalidade }}</span>
                                    </div>

                                    @if ($equipamentosRecentes[$b]->valor != 0.00)
                                        <div class="listing-img-content">
                                            <span class="listing-price">R$ {{ number_format($equipamentosRecentes[$b]->valor, 2, ',', '.') }} </span>
                                        </div>
                                    @endif

                                    <div class="listing-carousel">
                                        <div><img src="{{ urlImg() . $equipamentosRecentes[$b]->imagem }}" alt=""></div>

                                        <?php $galleria = galleriaEquipamento($equipamentosRecentes[$b]->id)?>
                                        @if (count($galleria) > 0)
                                            @for ($y = 0; $y < count($galleria); $y++)
                                                <div><img src="{{ urlImg() . $galleria[$y]->imagem }}" alt=""></div>
                                            @endfor
                                        @endif
                                    </div>
                                </a>

                                <div class="listing-content">

                                    <div class="listing-title">
                                        <h4><a href="{{ pathSite() }}equipamentoView/{{ $equipamentosRecentes[$b]->id }}">{{ $equipamentosRecentes[$b]->nome  }} </a></h4>
                                        <a href="{{ pathSite() }}equipamentoView/{{ $equipamentosRecentes[$b]->id }}" class="listing-address popup-gmaps">

                                            {{ $equipamentosRecentes[$b]->marca }}
                                        </a>
                                    </div>
                                    @if ( $equipamentosRecentes[$b]->codigo_equipamento)
                                        <div class="listing-footer">
                                            <a href="{{ pathSite() }}equipamentoView/{{ $equipamentosRecentes[$b]->id }}" style="color: #353D72;"> Código do equipamento: {{ $equipamentosRecentes[$b]->codigo_equipamento }}</a>
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <!-- Listing Item / End -->
                    @endfor
                </div>
            </div>
            <!-- Carousel / End -->

            <div class="col-md-12" style="text-align: center;">
                <a href="{{ pathSite() }}equipamentos" class="button">TODAS AS PEÇAS</a>
            </div>

        </div>
    </div>
@endif


<!-- Fullwidth Section -->
@if (count($blogRecentes) > 0)
    <section class="fullwidth margin-top-95 margin-bottom-0">

        <!-- Box Headline -->
        <h3 class="headline-box">Blog</h3>

        <div class="container">
            <div class="row">


                @for ($r = 0; $r < count($blogRecentes); $r++)
                    <div class="col-md-4">
                        <!-- Blog Post -->
                        <div class="blog-post">
                            <!-- Img -->
                            <a href="{{ pathSite() }}blogView/{{ $blogRecentes[$r]->id }}" class="post-img">
                                <img src="{{ urlImg() . $blogRecentes[$r]->imagem }}" alt="">
                            </a>
                            <!-- Content -->
                            <div class="post-content">
                                <h3><a href="{{ pathSite() }}blogView/{{ $blogRecentes[$r]->id }}">{{ $blogRecentes[$r]->title }}</a></h3>
                                <p>{!! Str::substr(strip_tags($blogRecentes[$r]->text), 0, 70)  !!}... </p>

                                <a href="{{ pathSite() }}blogView/{{ $blogRecentes[$r]->id }}" class="read-more">Saiba Mais <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <!-- Blog Post / End -->
                    </div>
                @endfor

            </div>
        </div>
    </section>
<!-- Fullwidth Section / End -->
@endif



<!-- Flip banner -->
<a href="{{ $frase[0]->link }}" class="flip-banner parallax" data-background="images/flip-banner-bg.jpg" data-color="##ed7d2f" data-color-opacity="0.9" data-img-width="2500" data-img-height="1600">
	<div class="flip-banner-content">
		<h2 class="flip-visible">{{ $frase[0]->title }}</h2>
		<h2 class="flip-hidden">{{ $frase[0]->second_title }}<i class="sl sl-icon-arrow-right"></i></h2>
	</div>
</a>
<!-- Flip banner / End -->



@include('site.main.footer')
