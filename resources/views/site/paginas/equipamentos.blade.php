@include('site.main.header')

<div class="clearfix"></div>
<!-- Header Container / End -->



<!-- Titlebar
================================================== -->
<div class="parallax titlebar"
	data-background="{{ urlImg() . $bannerEquipamento->imagem }}"
	data-color="#333333"
	data-color-opacity="0.7"
	data-img-width="800"
	data-img-height="505">

	<div id="titlebar">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<h2>{{$bannerEquipamento->title }}</h2>

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

				@if (count($equipamentos) > 0)
                @for ($i = 0; $i < count($equipamentos); $i++)
                    <!-- Listing Item -->
                    <div class="listing-item">

                        <a href="{{ pathSite() }}equipamentoView/{{ $equipamentos[$i]->id }}" class="listing-img-container">

                            <div class="listing-badges">
                                <span>{{ $equipamentos[$i]->finalidade }}</span>
                            </div>

                            @if ($equipamentos[$i]->valor != 0.00)
                                <div class="listing-img-content">
                                    <span class="listing-price">R$ {{ number_format($equipamentos[$i]->valor, 2, ',', '.') }} </span>
                                </div>
                            @endif

                            <div class="listing-carousel">
                                <div><img src="{{ urlImg() . $equipamentos[$i]->imagem }}" alt=""></div>
                                <?php $galleria = galleriaEquipamento($equipamentos[$i]->id)?>
                                @if (count($galleria) > 0)
                                    @for ($f = 0; $f < count($galleria); $f++)
                                        <div><img src="{{ urlImg() . $galleria[$f]->imagem }}" alt=""></div>
                                    @endfor
                                @endif
                            </div>

                        </a>

                        <div class="listing-content">

                            <div class="listing-title">
                                <h4><a href="{{ pathSite() }}equipamentoView/{{ $equipamentos[$i]->id }}">{{ $equipamentos[$i]->nome }}</a></h4>
                                <a href="{{ pathSite() }}equipamentoView/{{ $equipamentos[$i]->id }}" class="listing-address popup-gmaps">
                                    <i class="fa fa-map-marker"></i>
                                    {{ $equipamentos[$i]->marca }}
                                </a>

                                <a href="{{ pathSite() }}equipamentoView/{{ $equipamentos[$i]->id }}" class="details button border">Detalhes</a>
                            </div>

                        </div>

                    </div>
                    <!-- Listing Item / End -->
                @endfor
            @else

            <h3>Não foi encontrado nenhum equipamento com os filtros usado na pesquisa. Tente novamente com novos filtros.</h3>

            @endif


			</div>
			<!-- Listings Container / End -->


		</div>


		<!-- Sidebar
		================================================== -->
		<div class="col-md-4">
			<div class="sidebar sticky right">

				<!-- Widget -->
				<div class="widget margin-bottom-40">
					<h3 class="margin-top-0 margin-bottom-35">Encontre um equipamento</h3>

                    <form action="busca-equipamentos" method="post">
                        @csrf

                        <!-- Row -->
                        <div class="row with-forms">
                            <div class="col-md-12">
                                <select name="finalidade" id="finalidade">
                                    <option value="">Finalidade</option>
                                    <option value="Aluguel">Aluguel</option>
                                    <option value="Venda">Venda</option>
                                </select>
                            </div>

                        </div>

                        <!-- Row -->
                        <div class="row with-forms">
                            <div class="col-md-12">
                                <select name="marca" id="marca">
                                    <option value="">Marca</option>
                                    @for ($r = 0; $r < count($categoria); $r++)
                                        <option value="{{ $categoria[$r]->title }}">{{ $categoria[$r]->title }}</option>
                                    @endfor
                                </select>
                            </div>

                        </div>

					<!-- Row -->
					<div class="row with-forms">

						<!-- Dodigo Area -->
						<label class="col-md-12" for="">Modelo</label>
						<div class="col-md-12">
							<input type="text" id="modelo" name="modelo" >
						</div>
					</div>

                    <!-- Row -->
					<div class="row with-forms">

						<!-- Dodigo Area -->
						<label class="col-md-12" for="">Nome</label>
						<div class="col-md-12">
							<input type="text" id="nome" name="nome" >
						</div>
					</div>

					<!-- Row -->
					{{-- <div class="row with-forms">

						<!-- Dodigo Area -->
						<label class="col-md-12" for="">Plataforma</label>
						<div class="col-md-12">
							<input type="text" id="modelo" name="modelo" >
						</div>
					</div> --}}

					<!-- Row -->
					<div class="row with-forms">

						<!-- Dodigo Area -->
						<label class="col-md-12" for="">Capacidade</label>
						<div class="col-md-12">
							<input type="text" id="capacidade" name="capacidade" >
						</div>
					</div>

					<!-- Row -->
					{{-- <div class="row with-forms">

						<!-- Dodigo Area -->
						<label class="col-md-12" for="">Reservatórios</label>
						<div class="col-md-12">
							<input type="text" >
						</div>
					</div> --}}

					<!-- Row -->
					<div class="row with-forms">

						<!-- Dodigo Area -->
						<label class="col-md-12" for="">Qtd. de Linhas</label>
						<div class="col-md-12">
							<input type="text" id="qtd_linhas" name="qtd_linhas" >
						</div>
					</div>

					<!-- Row -->
					<div class="row with-forms">

						<!-- Dodigo Area -->
						<label class="col-md-12" for="">Tamanho</label>
						<div class="col-md-12">
							<input type="text" id="tamanho" name="tamanho" >
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
