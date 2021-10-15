@include('site.main.header')

<div class="image-politica">
    <div class="img-quem">
        <img src="./images/quem.png" alt="" style="width: 100%">
    </div>
    <div class="titulo-politica">
        <h1> Política de Privacidade </h1>
    </div>
</div>


<div class="texto-politica">
    <div class="h1-titulo">
        <h1>{{ $politica[0]->title }}</h1>
    </div>
    <div class="politica-text">
        {!! $politica[0]->text !!}
    </div>
</div>


@include('site.main.footer')
