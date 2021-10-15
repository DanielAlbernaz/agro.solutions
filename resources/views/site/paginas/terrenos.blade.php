@include('site.main.header')

<div class="clearfix"></div>
<!-- Header Container / End -->



<!-- Titlebar
================================================== -->
<div class="parallax titlebar"
	data-background="{{ urlImg() .  $bannerTerreno->imagem }}"
	data-color="#333333"
	data-color-opacity="0.7"
	data-img-width="800"
	data-img-height="505">

	<div id="titlebar">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<h2>{{ $bannerTerreno->title }}</h2>

					<!-- Breadcrumbs -->


				</div>
			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row sticky-wrapper">

		<div class="col-md-8">

			<!-- Main Search Input -->


			<!-- Sorting / Layout Switcher -->
			<div class="row margin-bottom-15">

				<div class="col-md-6">
					<!-- Sort by -->

				</div>

				<div class="col-md-6">
					<!-- Layout Switcher -->
					<div class="layout-switcher">
						<a href="#" class="list"><i class="fa fa-th-list"></i></a>
						<a href="#" class="grid"><i class="fa fa-th-large"></i></a>
					</div>
				</div>
			</div>


			<!-- Listings -->
			<div class="listings-container list-layout">


            @if (count($imoveis) > 0)
                @for ($i = 0; $i < count($imoveis); $i++)
                    <!-- Listing Item -->
                    <div class="listing-item">

                        <a href="{{ pathSite() }}terrenoView/{{ $imoveis[$i]->id }}" class="listing-img-container">

                            <div class="listing-badges">
                                <span>{{ $imoveis[$i]->finalidade }}</span>
                            </div>

                            @if ($imoveis[$i]->valor != 0.00)
                                <div class="listing-img-content">
                                    <span class="listing-price">R$ {{ number_format($imoveis[$i]->valor, 2, ',', '.') }} </span>
                                </div>
                            @endif

                            <div class="listing-carousel">
                                <div><img src="{{ urlImg() . $imoveis[$i]->imagem }}" alt=""></div>
                                <?php $galleria = galleriaImovel($imoveis[$i]->id)?>
                                @if (count($galleria) > 0)
                                    @for ($f = 0; $f < count($galleria); $f++)
                                        <div><img src="{{ urlImg() . $galleria[$f]->imagem }}" alt=""></div>
                                    @endfor
                                @endif
                            </div>

                        </a>

                        <div class="listing-content">

                            <div class="listing-title">
                                <h4><a href="{{ pathSite() }}terrenoView/{{ $imoveis[$i]->id }}">{{ $imoveis[$i]->tipo_imovel }}</a></h4>
                                <a href="{{ pathSite() }}terrenoView/{{ $imoveis[$i]->id }}" class="listing-address popup-gmaps">
                                    <i class="fa fa-map-marker"></i>
                                    {{ $imoveis[$i]->cidade_estado }}
                                </a>

                                <a href="{{ pathSite() }}terrenoView/{{ $imoveis[$i]->id }}" class="details button border">Detalhes</a>
                            </div>

                        </div>

                    </div>
                    <!-- Listing Item / End -->
                @endfor
            @else

                <h3>Não foi encontrado nenhum imóvel com os filtros usado na pesquisa. Tente novamente com novos filtros.</h3>

            @endif






			</div>
			<!-- Listings Container / End -->


			<!-- Pagination -->

			<!-- Pagination / End -->

		</div>


		<!-- Sidebar
		================================================== -->
		<div class="col-md-4">
			<div class="sidebar sticky right">

				<!-- Widget -->
				<div class="widget margin-bottom-40">
					<h3 class="margin-top-0 margin-bottom-35">Encontre um novo terreno</h3>

                    <form action="busca-imoveis" method="post">
                        @csrf
                        <!-- Row -->
                        <div class="row with-forms">

                            <!-- Dodigo Area -->
                            <label class="col-md-12" for="">Código Terreno</label>
                            <div class="col-md-12">
                                <input type="text" id="codigo" name="codigo" >
                            </div>
                        </div>
                        <!-- Row / End -->

                         <!-- Row -->
                         <div class="row with-forms">

                            <div class="col-md-12">
                                <select name="finalidade" id="finalidade">
                                    <option value="">Finalidade</option>
                                    <option value="Compra">Compra</option>
                                    <option value="À Venda">À Venda</option>
                                    <option value="Arrendamento">Arrendamento</option>
                                </select>
                            </div>

                        </div>

                        <!-- Row -->
                        <div class="row with-forms">

                            <div class="col-md-12">
                                <select name="tipo_imovel" id="tipo_imovel">
                                    <option value="">Tipo Imóvel</option>
                                    <option value="Fazenda">Fazenda</option>
                                    <option value="Terreno">Terreno</option>
                                    <option value="Sítio">Sítio</option>
                                    <option value="Chácara">Chácara</option>
                                    <option value="Casa">Casa</option>
                                    <option value="Casa Comercial">Casa Comercial</option>
                                    <option value="Cobertura">Cobertura</option>
                                    <option value="Flat">Flat</option>
                                    <option value="Imovel Comercial">Imovel Comercial</option>
                                    <option value="Kitinete">Kitinete</option>
                                    <option value="Loja">Loja</option>
                                    <option value="Lote">Lote</option>
                                    <option value="Prédio">Prédio</option>
                                    <option value="Salas">Salas</option>
                                    <option value="Sobrado">Sobrado</option>
                                </select>
                            </div>

                        </div>

                        {{-- <div class="row with-forms">
                            <label class="col-md-12" for="">Tamanho | Hectare</label>
                            <!-- Min Area -->
                            <div class="col-md-6">
                                <input type="text" placeholder="Min" id="min" name="min">
                            </div>

                            <!-- Max Area -->
                            <div class="col-md-6">
                                <input type="text" placeholder="Max" id="max" name="max">
                            </div>

                        </div> --}}


                        <!-- Valor por Hectare -->
                        {{-- <div class="row with-forms">
                            <label class="col-md-12" for="">Valor por Hectare</label>
                            <!--Valor -->
                            <div class="col-md-12">
                                <input type="text" id="max" name="max">
                            </div>
                        </div> --}}



                        <!-- Tipo solo -->
                        <div class="row with-forms">
                            <label class="col-md-12" for="">Tipo Solo</label>
                            <!-- Dodigo Area -->
                            <div class="col-md-12">
                                <input type="text" id="tipo_solo" name="tipo_solo">
                            </div>
                        </div>


                        <!-- Row -->
                        {{-- <div class="row with-forms">

                            <!-- Dodigo Area -->
                            <label class="col-md-12" for="">Endereço</label>
                            <div class="col-md-12">
                                <input type="text" >
                            </div>
                        </div> --}}

                        <!-- Row -->
                        <div class="row with-forms">

                            <!-- Dodigo Area -->
                            <label class="col-md-12" for="">Município </label>
                            <div class="col-md-12">
                                <input type="text" id="municipio" name="municipio">
                            </div>
                        </div>


                        <!-- Row -->
                        <div class="row with-forms">

                            <div class="col-md-12">
                                <select name="aptidao" id="aptidao">
                                    <option value="">Aptidão</option>
                                    <option value="Pecuária">Pecuária</option>
                                    <option value="Agricultura">Agricultura</option>
                                </select>
                            </div>

                        </div>

                        <!-- Row -->
                        <div class="row with-forms">

                            <div class="col-md-12">
                                <select name="negociacao" id="negociacao">
                                    <option value="">Tipo de Negociação</option>
                                    <option value="Dinheiro">Dinheiro</option>
                                    <option value="Permuta">Permuta</option>
                                </select>
                            </div>

                        </div>



                        <!-- Row -->
                        <div class="row with-forms">

                            <div class="col-md-12">
                                <select name="aguadas" id="aguadas">
                                    <option value="">Aguadas</option>
                                    <option value="">Artificial</option>
                                    <option value="">Natural</option>
                                </select>
                            </div>

                        </div>

                        <button class="button fullwidth margin-top-30">Pesquisar</button>
                    </form>


				</div>
				<!-- Widget / End -->

			</div>
		</div>
		<!-- Sidebar / End -->
	</div>
</div>


@include('site.main.footer')
