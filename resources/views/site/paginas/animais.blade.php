@include('site.main.header')

<div class="clearfix"></div>
<!-- Header Container / End -->



<!-- Titlebar
================================================== -->
<div class="parallax titlebar"
	data-background="{{ urlImg() . $bannerAnimal->imagem }}"
	data-color="#333333"
	data-color-opacity="0.7"
	data-img-width="800"
	data-img-height="505">

	<div id="titlebar">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<h2>{{ $bannerAnimal->title }}</h2>

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
            @if (count($animais) > 0)
                <div class="listings-container list-layout">

                    <!-- Listing Item -->
                    @for ($i = 0; $i < count($animais); $i++)
                        <div class="listing-item">

                            <a href="{{ pathSite() }}animalView/{{ $animais[$i]->id }}" class="listing-img-container">

                                <div class="listing-badges">
                                    <span>{{ $animais[$i]->finalidade_tipo }}</span>
                                </div>

                                @if ($animais[$i]->valor_unitario != 0.00)
                                    <div class="listing-img-content">
                                        <span class="listing-price">R$ {{ number_format($animais[$i]->valor_unitario, 2, ',', '.') }} </span>
                                    </div>
                                @endif

                                <div class="listing-carousel">
                                    <div><img src="{{ urlImg() . $animais[$i]->imagem }}" alt=""></div>
                                    <?php $galleria = galleriaAnimal($animais[$i]->id)?>
                                    @if (count($galleria) > 0)
                                        @for ($f = 0; $f < count($galleria); $f++)
                                            <div><img src="{{ urlImg() . $galleria[$f]->imagem }}" alt=""></div>
                                        @endfor
                                    @endif
                                </div>
                            </a>

                            <div class="listing-content">

                                <div class="listing-title">
                                    <h4><a href="{{ pathSite() }}animalView/{{ $animais[$i]->id }}">{{ $animais[$i]->categoria_animal }}</a></h4>
                                    <a href="{{ pathSite() }}animalView/{{ $animais[$i]->id }}" class="listing-address popup-gmaps">
                                        {{ $animais[$i]->raca }}
                                    </a>

                                    <a href="{{ pathSite() }}animalView/{{ $animais[$i]->id }}" class="details button border">Detalhes</a>
                                </div>

                            </div>

                        </div>
                        <!-- Listing Item / End -->
                    @endfor




                </div>
                <!-- Listings Container / End -->
            @else

                <h3>Não foi encontrado nenhum animal com os filtros usado na pesquisa. Tente novamente com novos filtros.</h3>

            @endif


		</div>


		<!-- Sidebar
		================================================== -->
		<div class="col-md-4">
			<div class="sidebar sticky right">

				<!-- Widget -->
				<div class="widget margin-bottom-40">
					<h3 class="margin-top-0 margin-bottom-35">Encontre um animal</h3>


                    <form action="busca-animais" method="post">
                        @csrf

                        <div class="row with-forms">
                            <div class="col-md-12">
                                <select name="finalidade_tipo" id="finalidade_tipo">
                                    <option value="">Negociação</option>
                                    <option value="Compra">Compra</option>
                                    <option value="À Venda">À Venda</option>
                                </select>
                            </div>
                        </div>

                        <div class="row with-forms">
                            <div class="col-md-12">
                                <select name="categoria" id="categoria">
                                    <option value="">Categoria animal</option>
                                    @for ($r = 0; $r < count($categoria); $r++)
                                        <option value="{{ $categoria[$r]->title }}">{{ $categoria[$r]->title }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <!-- Row -->
                        <div class="row with-forms">
                            <div class="col-md-12">
                                <select name="raca" id="raca">
                                    <option value="">Raça</option>
                                    @for ($r = 0; $r < count($raca); $r++)
                                        <option value="{{ $raca[$r]->title }}">{{ $raca[$r]->title }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <!-- Row -->
                        <div class="row with-forms">

                            <div class="col-md-12">
                                <select name="tipo_animal" id="tipo_animal">
                                    <option value="">Tipo Animal</option>
                                    <option value="Reprodutor">Reprodutor</option>
                                    <option value="Matriz">Matriz</option>
                                    <option value="Potro">Potro</option>
                                </select>
                            </div>

                        </div>

                         <!-- Row -->
                         <div class="row with-forms">

                            <div class="col-md-12">
                                <select name="finalidade" id="finalidade">
                                    <option value="">Finalidade</option>
                                    <option value="Corte">Corte</option>
                                    <option value="Leitero">Leitero</option>
                                </select>
                            </div>

                        </div>

                         <!-- Row -->
                         <div class="row with-forms">

                            <div class="col-md-12">
                                <select name="vacinacao" id="vacinacao">
                                    <option value="">Vacinação</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                </select>
                            </div>

                        </div>

                        <!-- Row -->
                        <div class="row with-forms">

                            <div class="col-md-12">
                                <select name="criacao" id="criacao">
                                    <option value="">Criação</option>
                                    <option value="Haras">Haras</option>
                                    <option value="Fazenda">Fazenda</option>
                                </select>
                            </div>

                        </div>

                        <!-- Row -->
                        <div class="row with-forms">

                            <div class="col-md-12">
                                <select name="sexo" id="sexo">
                                    <option value="">Sexo</option>
                                    <option value="Macho">Macho</option>
                                    <option value="Fêmea">Fêmea</option>
                                </select>
                            </div>

                        </div>

                        <!-- Row -->
                        <div class="row with-forms">
                            <!-- Dodigo Area -->
                            <label class="col-md-12" for="">Pelagem</label>
                            <div class="col-md-12">
                                <input type="text" id="pelagem" name="pelagem" >
                            </div>
                        </div>

                        <!-- Row -->
                        {{-- <div class="row with-forms">

                            <!-- Dodigo Area -->
                            <label class="col-md-12" for="">Data de Nascimento</label>
                            <div class="col-md-12">
                                <input type="text" >
                            </div>
                        </div> --}}

                        <!-- Row -->
                        <div class="row with-forms">

                            <!-- Dodigo Area -->
                            <label class="col-md-12" for="">Idade</label>
                            <div class="col-md-12">
                                <input type="text" id="idade" name="idade" >
                            </div>
                        </div>

                        <div class="row with-forms">

                            <!-- Dodigo Area -->
                            <label class="col-md-12" for="">Peso</label>
                            <div class="col-md-12">
                                <input type="text" id="peso" name="peso">
                            </div>
                        </div>
                        <div class="row with-forms">

                            <!-- Dodigo Area -->
                            <label class="col-md-12" for="">Quantidade</label>
                            <div class="col-md-12">
                                <input type="text" id="qtd" name="qtd" >
                            </div>
                        </div>

                        {{-- <div class="row with-forms">

                            <!-- Dodigo Area -->
                            <label class="col-md-12" for="">Valor Unitário</label>
                            <div class="col-md-12">
                                <input type="text" id="qtd" name="qtd" >
                            </div>
                        </div> --}}

                        <div class="row with-forms">

                            <!-- Dodigo Area -->
                            <label class="col-md-12" for="">Lactação</label>
                            <div class="col-md-12">
                                <input type="text" id="lactacao" name="lactacao" >
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
