@include('site.main.header')

<!-- Wrapper -->
<div id="wrapper">

    <!-- Titlebar
    ================================================== -->
    <div id="titlebar" class="property-titlebar margin-bottom-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <a href="{{ pathSite() }}animais" class="back-to-listings"></a>
                    <div class="property-title">
                        <h2>{{ $animal[0]->categoria_animal }}<span class="property-badge">{{ $animal[0]->finalidade_tipo }}</span></h2>
                        <span>
                            <a href="{{ pathSite() }}animalView/{{ $animal[0]->id }}" class="listing-address">
                                {{ $animal[0]->raca }}
                            </a>
                        </span>
                    </div>

                    @if ($animal[0]->valor_unitario != 0.00)
                        <div class="property-pricing">
                            <div class="property-price"> R$ {{ number_format($animal[0]->valor_unitario, 2, ',', '.') }}</div>
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>


    <!-- Content
    ================================================== -->
    <div class="container">
        <div class="row margin-bottom-50">
            <div class="col-md-12">

                <!-- Slider -->
                <div class="property-slider default">

                    @if ($animal[0]->url_video)
                        <a class="item mfp-gallery">
                            <iframe width="100%" height="595" src="<?= urlVideoYoutube($animal[0]->url_video)?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </a>
                    @endif

                    <a href="{{ urlImg() . $animal[0]->imagem }}" data-background-image="{{ urlImg() . $animal[0]->imagem }}" class="item mfp-gallery"></a>
                    <?php $galleria = galleriaAnimal($animal[0]->id)?>
                    @if (count($galleria) > 0)
                        @for ($f = 0; $f < count($galleria); $f++)
                            <a href="{{ urlImg() . $galleria[$f]->imagem }}" data-background-image="{{ urlImg() . $galleria[$f]->imagem }}" class="item mfp-gallery"></a>
                        @endfor
                    @endif
                </div>

                <!-- Slider Thumbs -->
                <div class="property-slider-nav">
                    <div style="width: 121px; !important" class="item"><img src="{{ urlImg() . $animal[0]->imagem }}" alt=""></div>

                    <?php $galleria = galleriaAnimal($animal[0]->id)?>
                    @if (count($galleria) > 0)
                        @for ($f = 0; $f < count($galleria); $f++)
                            <div style="width: 121px; !important" class="item"><img src="{{ urlImg() . $galleria[$f]->imagem }}" alt=""></div>
                        @endfor
                    @endif
                </div>

            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">

            <!-- Property Description -->
            <div class="col-lg-8 col-md-7">
                <div class="property-description">

                     <!-- Details -->
                     <h3 class="desc-headline">Detalhes</h3>
                     <ul class="property-features margin-top-0">
                        @if ($animal[0]->codigo_animal)
                            <li>Código animal: <span>{{ $animal[0]->codigo_animal }}</span></li>
                        @endif
                        @if ($animal[0]->pelagem)
                            <li>Pelagem: <span>{{ $animal[0]->pelagem }}</span></li>
                        @endif
                        @if ($animal[0]->finalidade_tipo)
                            <li>Finalidade: <span>{{ $animal[0]->finalidade_tipo }}</span></li>
                        @endif
                        @if ($animal[0]->tipo_animal)
                            <li>Tipo Animal: <span>{{ $animal[0]->tipo_animal }}</span></li>
                        @endif
                        @if ($animal[0]->criacao)
                            <li>Criação: <span>{{ $animal[0]->criacao }}</span></li>
                        @endif
                        @if ($animal[0]->data_nascimento)
                            <li>Data de Nascimento: <span>{{ converteData($animal[0]->data_nascimento)  }}</span></li>
                        @endif
                        @if ($animal[0]->idade)
                            <li>Idade: <span>{{ $animal[0]->idade }}</span></li>
                        @endif
                        @if ($animal[0]->raca)
                            <li>Raça: <span>{{ $animal[0]->raca }}</span></li>
                        @endif
                        @if ($animal[0]->sexo)
                            <li>Sexo: <span>{{ $animal[0]->sexo }}</span></li>
                        @endif
                        @if ($animal[0]->peso)
                            <li>Peso: <span>{{ $animal[0]->peso }}</span></li>
                        @endif
                        @if ($animal[0]->qtd)
                            <li>Quantidade: <span>{{ $animal[0]->qtd }}</span></li>
                        @endif
                        @if ($animal[0]->valor_unitario)
                            <li>Valor Unitário: <span>{{ $animal[0]->valor_unitario }}</span></li>
                        @endif
                        @if ($animal[0]->lactacao)
                            <li>Lactação: <span>{{ $animal[0]->lactacao }}</span></li>
                        @endif
                        @if ($animal[0]->vacinacao)
                            <li>Vacinação: <span>{{ $animal[0]->vacinacao }}</span></li>
                        @endif

                     </ul>
                     <!-- Details -->

                    @if ( $animal[0]->observacoes)
                        <h3 class="desc-headline">Descrição</h3>
                        <div class="show-more">
                            <p>
                            <b>{!! $animal[0]->observacoes !!}</b>
                            </p>

                            <a href="#" class="show-more-button">Saiba mais <i class="fa fa-angle-down"></i></a>
                        </div>
                    @endif
                    <!-- Description -->


                </div>
            </div>
            <!-- Property Description / End -->


            <!-- Sidebar -->
            <div class="col-lg-4 col-md-5">
                <div class="sidebar sticky right">


                    <!-- Widget -->
                    <div class="widget margin-bottom-30">
                        <input type="text" id="link" alt="Compartilhar link" style="opacity: 0; cursor: default" value="{{pathSite()}}animalView/{{$animal[0]->id}}" name="link" >
                        <a class="iconeCompartilharLink" title="Compartilhar página">
                            <img style="margin-top: 10px;" onClick="copiarTexto()" src="images/compartilhar.png" alt="">
                        </a>

                        <a style="cursor:pointer" href="https://www.facebook.com/sharer/sharer.php?u={{pathSite()}}animalView/{{$animal[0]->id}}" title="Facebook">
                            <button class="compartilhar with-tip" data-tip-content="facebook"><i class="fa fa-facebook"></i></button>
                        </a>
                        <a class="sharer" data-sharer="twitter" data-title="<?= utf8_decode('Agro Solutions')?> - " data-hashtags="AGROSOLUTIONS" data-url="<?php print 'http://' . $_SERVER['SERVER_NAME'] . '/animalView/' . $animal[0]->id; ?>">
                            <button class="compartilhar with-tip" data-tip-content="Twitter"><i class="fa fa-twitter"></i></button>
                        </a>

                        <a style="cursor:pointer" class="sharer iconCompartilhar colorWhat compRdW mobile" target="_blank" rel="nofollow" data-title="Conheça nossas oportunidades:" href="https://api.whatsapp.com/send?l=pt&text=<?=utf8_decode('Agro Solutions')?>: http://<?= $_SERVER['SERVER_NAME']. '/animalView/' . $animal[0]->id; ?>" data-whatsapp-wpusb="https://web.whatsapp.com/">
                            <button class="compartilhar with-tip" data-tip-content="Whatsapp"><i class="fa fa-whatsapp"></i></button>
                        </a>

                        <div class="clearfix"></div>
                    </div>
                    <!-- Widget / End -->


                    <!-- Widget -->
                    <div class="widget">

                        <!-- Agent Widget -->
                        <div class="agent-widget">
                            <div class="agent-title">
                                <div class="agent-photo"><img src="images/agrologo.png" alt="" /></div>
                                <div class="agent-details">
                                    <h4><a  href="tel:55{{ formatPhone($telefones[0]['telefone']) }}">Tenho Interesse</a></h4>
                                    <span><i class="sl sl-icon-call-in"></i> <a style="color: #707070" href="tel:55{{ formatPhone($telefones[0]['telefone']) }}">{{ $telefones[0]->telefone }}</a> </span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <form action="javascript:void(0);" id="frmContato" name="frmContato" autocomplete="on">
                                @csrf
                            <input type="text" id="nome" name="nome" placeholder="Nome">
                            <input type="text" placeholder="Email" id="email" name="email" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$">
                            <input type="text" id="telefone" name="telefone" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" placeholder="Telefone">
                            <input type="text" style="display: none" value="Tenho interesse nesse animal código {{ $animal[0]->codigo_animal }} e gostaria de saber mais detalhes" name="mensagem" id="mensagem">
                            <textarea class="inputLogin validate[required]"  cols="40" rows="4" placeholder="Tenho interesse nesse animal código {{ $animal[0]->codigo_animal }} , e gostaria de saber mais detalhes." spellcheck="true" required="required" readonly></textarea>
                            <label>
                                <span class="text-input">
                                    <div class="g-recaptcha" data-sitekey="6LeM_b0aAAAAAJ6odvZd6MBcOSvZX3ge28WlgjNJ"></div><br/>
                                </span>
                            </label>
                            </form>
                            <button type="button"  onclick="formularioContato()" class="button fullwidth margin-top-5">Enviar Mensagem</button>
                        </div>
                        <!-- Agent Widget / End -->

                    </div>
                    <!-- Widget / End -->


                    <!-- Widget -->

                    <!-- Widget / End -->


                    <!-- Widget -->
                    @if (count($animaisRecentes) > 0)
                    <div class="widget">
                        <h3 class="margin-bottom-35">Oportunidades recentes</h3>

                        <div class="listing-carousel outer">
                            <!-- Item -->

                            @for ($i = 0; $i < count($animaisRecentes); $i++)
                                <div class="item">
                                    <div class="listing-item compact">

                                        <a href="{{ pathSite() }}animalView/{{ $animaisRecentes[$i]->id }}" class="listing-img-container">

                                            <div class="listing-badges">
                                                <span class="featured">Recentes</span>
                                                <span>{{ $animaisRecentes[$i]->finalidade_tipo }}</span>
                                            </div>

                                            <div class="listing-img-content">
                                                <span class="listing-compact-title">{{ $animaisRecentes[$i]->raca }}

                                                    @if ($animaisRecentes[$i]->valor_unitario != 0.00)
                                                        <i> R$ {{ number_format($animaisRecentes[0]->valor_unitario, 2, ',', '.') }}</i></span>
                                                    @endif


                                            </div>

                                            <img src="{{ urlImg() .  $animaisRecentes[$i]->imagem }}" alt="">
                                        </a>

                                    </div>
                                </div>
                                <!-- Item / End -->
                            @endfor


                        </div>

                    </div>
                    <!-- Widget / End -->
                @endif

                </div>
            </div>
            <!-- Sidebar / End -->

        </div>
    </div>


@include('site.main.footer')
