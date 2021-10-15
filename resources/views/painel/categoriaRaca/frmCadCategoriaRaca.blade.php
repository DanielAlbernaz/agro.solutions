 @include('painel/header')

<?php
use App\Models\Form;

Form::sb_FormBegin('Cadastro de raça', 'validation');

Form::sb_FormText('Título', 'title', 'Defina um título para o raça', '800px', '', true);

Form::sb_FormSubmit('Salvar', 'sistema/salvar-categoriaRaca', '');

Form::sb_FormEnd();
?>

@include('painel/footer')


