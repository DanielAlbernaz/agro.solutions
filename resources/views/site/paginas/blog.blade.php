@include('site.main.header')

<!-- Wrapper -->
<div id="wrapper">



    <!-- Titlebar
    ================================================== -->
    <div id="titlebar"style="background-size: cover; background-image: url('{{ urlImg() . $bannerBlog->imagem}}');">
        <div class="container" >
            <div class="row" >
                <div class="col-md-12" >

                    <h2>{{ $bannerBlog->title}}</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">

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
            <div class="col-md-8">

                @if (count($blog) > 0)
                    @for ($i = 0; $i < count($blog); $i++)
                        <!-- Blog Post -->
                        <div class="blog-post">

                            <!-- Img -->
                            <a href="{{ pathSite() }}blogView/{{ $blog[$i]->id }}" class="post-img">
                                <img src="{{ urlImg() . $blog[$i]->imagem }}" alt="">
                            </a>

                            <!-- Content -->
                            <div class="post-content">
                                <h3><a href="{{ pathSite() }}blogView/{{ $blog[$i]->id }}">{{ $blog[$i]->title }}</a></h3>

                                <ul class="post-meta">
                                    <?php $data = converteDataHora($blog[$i]->created_at);
                                        $data = explode(' ', $data);

                                    ?>
                                    <li>{{ $data[0] }}</li>
                                </ul>

                                <p>{!! Str::substr(strip_tags($blog[$i]->text), 0, 70)  !!}...</p>

                                <a href="{{ pathSite() }}blogView/{{ $blog[$i]->id }}" class="read-more">Saiba Mais <i class="fa fa-angle-right"></i></a>
                            </div>

                        </div>
                        <!-- Blog Post / End -->
                    @endfor

                @endif





                <!-- Pagination -->
                <div class="clearfix"></div>
                {{-- <div class="pagination-container">
                    <nav class="pagination">
                        <ul>
                            <li><a href="#" class="current-page">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul>
                    </nav>

                    <nav class="pagination-next-prev">
                        <ul>
                            <li><a href="#" class="prev">Anterior</a></li>
                            <li><a href="#" class="next">Próximo</a></li>
                        </ul>
                    </nav>
                </div> --}}
                <div class="clearfix"></div>

            </div>

        <!-- Blog Posts / End -->


        <!-- Widgets -->
        <div class="col-md-4">
            <div class="sidebar right">

                <!-- Widget -->
                {{-- <div class="widget">
                    <h3 class="margin-top-0 margin-bottom-25">Procurar Blog</h3>
                    <div class="search-blog-input">
                        <div class="input"><input class="search-field" type="text" placeholder="Digite e pressione enter" value=""/></div>
                    </div>
                    <div class="clearfix"></div>
                </div> --}}
                <!-- Widget / End -->






                @if (count($blogRecentes) > 0)
                    <!-- Widget -->
                    <div class="widget">

                        <h3>Blogs Populares</h3>
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
                @endif



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
