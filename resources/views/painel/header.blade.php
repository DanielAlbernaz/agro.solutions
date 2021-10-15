<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PAINEL ADM | DASHBOARD</title>
    <script src="{{asset('assests/painel/js/jquery-3.1.1.min.js')}}"></script>
    <link href="{{asset('assests/painel/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assests/painel/font-awesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css">


    <link href="{{asset('assests/painel/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('assests/painel/js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('assests/painel/css/animate.css')}}" rel="stylesheet" type="text/css">

    {{-- Crop Indiano --}}
    <link href="{{asset('assests/painel/crop/cropper.min.css')}}" rel="stylesheet" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    {{-- Table list Indiano --}}
    <link href="{{asset('assests/painel/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assests/painel/css/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assests/painel/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.1/dropzone.css" rel="stylesheet" type="text/css">

    <script src="https://cdn.tiny.cloud/1/bhivvpzxh2vxllhxysw5xfv6zrzckbi70ium07ecngf8owpo/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.1/dropzone.js" referrerpolicy="origin"></script>

    <!-- Inclusão do Plugin jQuery Validation-->
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>



    <link href="{{asset('assests/painel/css/plugins/steps/jquery.steps.css')}}" rel="stylesheet" type="text/css">


    <script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>

    <script>
        tinymce.init({
          selector: '#text',
         language: 'pt_BR',
         menu: {
            file: { title: 'File', items: 'newdocument restoredraft | preview | print ' },
            edit: { title: 'Edit', items: 'undo redo | cut copy paste | selectall | searchreplace' },
            view: { title: 'View', items: 'code | visualaid visualchars visualblocks | spellchecker | preview fullscreen' },
            insert: { title: 'Insert', items: 'image link media template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor toc | insertdatetime' },
            format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript codeformat | formats blockformats fontformats fontsizes align lineheight | forecolor backcolor | removeformat' },
            tools: { title: 'Tools', items: 'spellchecker spellcheckerlanguage | code wordcount' },
            table: { title: 'Table', items: 'inserttable | cell row column | tableprops deletetable' },
            help: { title: 'Help', items: 'help' }
        },
        plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'table emoticons template paste help',
        'lists'
        ],
         toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright alignjustify | bullist numlist outdent indent'
        });

        tinymce.init({
          selector: '#infra_fazenda',
         language: 'pt_BR',
        });

        tinymce.init({
          selector: '#valores',
         language: 'pt_BR',
        });

        tinymce.init({
          selector: '#observacoes',
         language: 'pt_BR',
        });
      </script>

</head>

<body>

    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            @if (auth()->user()->imagem)
                                @isset(auth()->user()->imagem)
                                <img alt="image" class="rounded-circle" src="{{session('URL_IMG') .  auth()->user()->imagem }}"/>
                                @endisset
                            @endif


                            <a data-toggle="dropdown" class="dropdown-toggle" href="">
                                <span class="block m-t-xs font-bold">
                                    @isset(auth()->user()->name)
                                    {{ 'Olá ' . auth()->user()->name }}
                                    @endisset

                                </span>
                            </a>
                        </div>
                        <div class="logo-element">
                            SA
                        </div>
                    </li>

                   <li>
                        <a href="/sistema" ><i class="fa fa-home"></i> <span class="nav-label">Principal</span> <span class="fa arrow"></span></a>
                    </li>

                    @if (auth()->user()->nivel_acesso == 1)
                        @if (
                            Route::getCurrentRoute()->getName() == 'usuario.cadastrar' ||
                            Route::getCurrentRoute()->getName() == 'usuario.listar'
                            )
                        <li class="active" >
                    @else
                        <li class="" >
                        @endif
                            <a href="#" ><i class="fa fa-users"></i> <span class="nav-label">Usuários</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level  {{ Route::getCurrentRoute()->getName() == 'banner.listar' ? 'collapse in' : ''}}">
                                <li class=""><a href="{{ route('usuario.cadastrar') }}">Cadastrar</a></li>
                                <li class=""><a href="{{ route('usuario.listar') }}">Listar</a></li>
                            </ul>
                        </li>
                    @endif



                    @if (
                            Route::getCurrentRoute()->getName() == 'banner.listar' ||
                            Route::getCurrentRoute()->getName() == 'bannerInstitucional.find'||

                            Route::getCurrentRoute()->getName() == 'bannerTerreno.find' ||
                            Route::getCurrentRoute()->getName() == 'bannerAnimal.find' ||

                            Route::getCurrentRoute()->getName() == 'bannerEquipamento.find' ||
                            Route::getCurrentRoute()->getName() == 'bannerBlog.find'

                            )
                        <li class="active" >
                    @else
                        <li class="" >
                    @endif
                        <a href="#"><i class="fa fa-window-restore"></i> <span class="nav-label">Banners</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">

                            <li>
                                <a href="#" id="damian">Principal <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level {{ Route::getCurrentRoute()->getName() == 'banner.listar' ? 'collapse in' : ''}}">
                                    <li class=""><a href="{{ route('banner.listar') }}">Listar</a></li>
                                </ul>
                            </li>

                            <li class="">
                                <a href="#" ></i><span class="nav-label">Quem Somos</span> <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level {{ Route::getCurrentRoute()->getName() == 'bannerInstitucional.find' ? 'collapse in' : ''}}">
                                    <li class=""><a href="{{ url('sistema/editar-bannerInstitucional/1') }}">Alterar</a></li>
                                </ul>
                            </li>

                            <li class="">
                                <a href="#" ><span class="nav-label">Imóveis</span> <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level  {{ Route::getCurrentRoute()->getName() == 'bannerTerreno.find' ? 'collapse in' : ''}}">
                                    <li class=""><a href="{{ url('sistema/editar-bannerTerreno/1') }}">Alterar</a></li>
                                </ul>
                            </li>

                            <li class="">
                                <a href="#" ><span class="nav-label">Animal</span> <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level  {{ Route::getCurrentRoute()->getName() == 'bannerAnimal.find' ? 'collapse in' : ''}}">
                                    <li class=""><a href="{{ url('sistema/editar-bannerAnimal/1') }}">Alterar</a></li>
                                </ul>
                            </li>

                            <li class="">
                                <a href="#" ><span class="nav-label">Equipamento</span> <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level  {{ Route::getCurrentRoute()->getName() == 'bannerEquipamento.find' ? 'collapse in' : ''}}">
                                    <li class=""><a href="{{ url('sistema/editar-bannerEquipamento/1') }}">Alterar</a></li>
                                </ul>
                            </li>

                            <li class="">
                                <a href="#" ><span class="nav-label">Blog</span> <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level  {{ Route::getCurrentRoute()->getName() == 'bannerBlog.find.find' ? 'collapse in' : ''}}">
                                    <li class=""><a href="{{ url('sistema/editar-bannerBlog/1') }}">Alterar</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>

                    @if (
                            Route::getCurrentRoute()->getName() == 'institucional.find'

                            )
                        <li class="active" >
                    @else
                        <li class="" >
                    @endif
                        <a href="#" ><i class="fa fa-users"></i></i><span class="nav-label">Quem Somos</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class=""><a href="{{ url('sistema/editar-institucional/1') }}">Alterar</a></li>
                        </ul>
                    </li>


                    @if (
                            Route::getCurrentRoute()->getName() == 'categoriaMarca.listar' ||
                            Route::getCurrentRoute()->getName() == 'categoriaMarca.cadastrar'||

                            Route::getCurrentRoute()->getName() == 'equipamento.listar' ||
                            Route::getCurrentRoute()->getName() == 'equipamento.cadastrar' ||

                            Route::getCurrentRoute()->getName() == 'imovel.cadastrar' ||
                            Route::getCurrentRoute()->getName() == 'imovel.listar' ||


                            Route::getCurrentRoute()->getName() == 'animal.cadastrar' ||
                            Route::getCurrentRoute()->getName() == 'animal.listar' ||

                            Route::getCurrentRoute()->getName() == 'categoriaAnimal.cadastrar' ||
                            Route::getCurrentRoute()->getName() == 'categoriaAnimal.listar' ||

                            Route::getCurrentRoute()->getName() == 'categoriaRaca.cadastrar' ||
                            Route::getCurrentRoute()->getName() == 'categoriaRaca.listar'

                            )
                        <li class="active" >
                    @else
                        <li class="" >
                    @endif

                        <a href="#"><i class="fa fa-cubes "></i> <span class="nav-label">Produtos</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">

                            <li class="">
                                <a href="#" ><i class="fa fa-building-o "></i><span class="nav-label">Imóveis</span> <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level {{ Route::getCurrentRoute()->getName() == 'imovel.cadastrar' ? 'collapse in' : ''}}"">
                                    <li class=""><a href="{{ route('imovel.cadastrar') }}">Cadastrar</a></li>
                                    <li class=""><a href="{{ route('imovel.listar') }}">Listar</a></li>
                                </ul>
                            </li>

                            @if (
                                Route::getCurrentRoute()->getName() == 'animal.cadastrar' ||
                                Route::getCurrentRoute()->getName() == 'animal.listar' ||

                                Route::getCurrentRoute()->getName() == 'categoriaAnimal.cadastrar' ||
                                Route::getCurrentRoute()->getName() == 'categoriaAnimal.listar' ||

                                Route::getCurrentRoute()->getName() == 'categoriaRaca.cadastrar' ||
                                Route::getCurrentRoute()->getName() == 'categoriaRaca.listar'

                            )
                                <li class="active" >
                            @else
                                <li class="" >
                            @endif
                                <a href="#"><i class="fa fa-paw"></i> <span class="nav-label">Animal</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level {{ Route::getCurrentRoute()->getName() == 'animal.cadastrar' ? 'collapse in' : ''}} ">

                                    <li class=""><a href="{{ route('animal.cadastrar') }}">Cadastrar</a></li>
                                    <li class=""><a href="{{ route('animal.listar') }}">Listar</a></li>


                                    <li class="">
                                        <a href="#" ><i class="fa fa-sitemap"></i><span class="nav-label">Categoria Animal</span> <span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level {{ Route::getCurrentRoute()->getName() == 'categoriaAnimal.cadastrar' ? 'collapse in' : ''}}">
                                            <li class=""><a href="{{ route('categoriaAnimal.cadastrar') }}">Cadastrar</a></li>
                                            <li class=""><a href="{{ route('categoriaAnimal.listar') }}">Listar</a></li>
                                        </ul>
                                    </li>

                                    <li class="">
                                        <a href="#" ><i class="fa fa-sitemap"></i><span class="nav-label">Raça</span> <span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level {{ Route::getCurrentRoute()->getName() == 'categoriaRaca.cadastrar' ? 'collapse in' : ''}} ">
                                            <li class=""><a href="{{ route('categoriaRaca.cadastrar') }}">Cadastrar</a></li>
                                            <li class=""><a href="{{ route('categoriaRaca.listar') }}">Listar</a></li>
                                        </ul>
                                    </li>


                                </ul>
                            </li>


                            @if (
                                Route::getCurrentRoute()->getName() == 'categoriaMarca.listar' ||
                                Route::getCurrentRoute()->getName() == 'categoriaMarca.cadastrar'||

                                Route::getCurrentRoute()->getName() == 'equipamento.listar' ||
                                Route::getCurrentRoute()->getName() == 'equipamento.cadastrar'
                                )
                                <li class="active" >
                            @else
                                <li class="" >
                            @endif
                                <a href="#"><i class="fa fa-wrench"></i> <span class="nav-label">Equipamento</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level {{ Route::getCurrentRoute()->getName() == 'equipamento.cadastrar' ? 'collapse in' : ''}}">

                                    <li class=""><a href="{{ route('equipamento.cadastrar') }}">Cadastrar</a></li>
                                    <li class=""><a href="{{ route('equipamento.listar') }}">Listar</a></li>


                                    @if (
                                        Route::getCurrentRoute()->getName() == 'categoriaMarca.listar' ||
                                        Route::getCurrentRoute()->getName() == 'categoriaMarca.cadastrar'
                                        )
                                        <li class="active" >
                                    @else
                                        <li class="" >
                                    @endif
                                        <a href="#" ><span class="nav-label">Marca</span> <span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level {{ Route::getCurrentRoute()->getName() == 'categoriaMarca.cadastrar' ? 'collapse in' : ''}}">
                                            <li class=""><a href="{{ route('categoriaMarca.cadastrar') }}">Cadastrar</a></li>
                                            <li class=""><a href="{{ route('categoriaMarca.listar') }}">Listar</a></li>
                                        </ul>
                                    </li>

                                </ul>
                            </li>

                        </ul>
                    </li>

                    @if (
                            Route::getCurrentRoute()->getName() == 'blog.find'

                            )
                        <li class="active" >
                    @else
                        <li class="" >
                    @endif
                        <a href="#" ><i class="fa fa-bold"></i><span class="nav-label">Blog</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class=""><a href="{{ route('blog.cadastrar') }}">Cadastrar</a></li>
                            <li class=""><a href="{{ route('blog.listar') }}">Listar</a></li>
                        </ul>
                    </li>

                    @if (
                            Route::getCurrentRoute()->getName() == 'fraseRodape.find'

                            )
                        <li class="active" >
                    @else
                        <li class="" >
                    @endif
                        <a href="#" ><i class="fa fa-pencil-square-o"></i></i><span class="nav-label">Frase rodapé</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class=""><a href="{{ url('sistema/editar-fraseRodape/1') }}">Alterar</a></li>
                        </ul>
                    </li>

                    @if (
                            Route::getCurrentRoute()->getName() == 'empresa.find'

                            )
                        <li class="active" >
                    @else
                        <li class="" >
                    @endif
                        <a href="#" ><i class="fa fa-institution"></i><span class="nav-label">Informações Empresa</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class=""><a href="{{ url('sistema/editar-empresa/1') }}">Alterar</a></li>
                        </ul>
                    </li>

                    @if (
                            Route::getCurrentRoute()->getName() == 'politica.find'

                            )
                        <li class="active" >
                    @else
                        <li class="" >
                    @endif
                        <a href="#" ><i class="fa fa-book"></i></i><span class="nav-label">Política de privacidade</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class=""><a href="{{ url('sistema/editar-politica/1') }}">Alterar</a></li>
                        </ul>
                    </li>

                    @if (
                            Route::getCurrentRoute()->getName() == 'termo.find'

                            )
                        <li class="active" >
                    @else
                        <li class="" >
                    @endif
                        <a href="#" ><i class="fa fa-book"></i></i><span class="nav-label">Termo de uso</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class=""><a href="{{ url('sistema/editar-termo/1') }}">Alterar</a></li>
                        </ul>
                    </li>

                    @if (
                            Route::getCurrentRoute()->getName() == 'smtp.find'

                            )
                        <li class="active" >
                    @else
                        <li class="" >
                    @endif
                        <a href="#" ><i class="fa fa-envelope-open-o"></i></i><span class="nav-label">Configurações SMTP</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class=""><a href="{{ url('sistema/editar-smtp/1') }}">Alterar</a></li>
                        </ul>
                    </li>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header" style="    margin-left: -71px;
        z-index: 99999;">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " style="    background-color: #2f4050 !important;
            border-color: #2f4050 !important;" href="#"><i class="fa fa-bars"></i> </a>

        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li style="padding: 20px">
                    <span class="m-r-sm text-muted welcome-message">Bem vindo ao painel administrativo.</span>
                </li>
                <li class="dropdown">

                    <ul class="dropdown-menu dropdown-messages dropdown-menu-right">
                        <li>
                            <div class="dropdown-messages-box">
                                <a class="dropdown-item float-left" href="profile.html">
                                    <img alt="image" class="rounded-circle" src="img/a7.jpg">
                                </a>
                                <div class="media-body">
                                    <small class="float-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a class="dropdown-item float-left" href="profile.html">
                                    <img alt="image" class="rounded-circle" src="img/a4.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="float-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a class="dropdown-item float-left" href="profile.html">
                                    <img alt="image" class="rounded-circle" src="img/profile.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="float-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html" class="dropdown-item">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">

                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html" class="dropdown-item">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="float-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <a href="profile.html" class="dropdown-item">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="float-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <a href="grid_options.html" class="dropdown-item">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="float-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html" class="dropdown-item">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a  href="{{ route('usuario.logout') }}">
                        <i class="fa fa-sign-out"></i> Sair
                    </a>
                </li>
            </ul>

        </nav>
        </div>
