@include('site.main.header')


<div class="image-politica">
    <div class="migalhaMBI imgMigalha" style="background-size: cover; background-image: url('./images/quem.png');">
        <h1> TERMO DE USO </h1>
    </div>
</div>

<div class="texto-politica">
    <div class="h1-titulo">
        <h1>{{ $termo[0]->title }}</h1>
    </div>
    <div class="politica-text">
        {!! $termo[0]->text !!}
    </div>
</div>

@include('site.main.footer')
