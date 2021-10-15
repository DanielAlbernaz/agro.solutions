 @include('painel/header')

<?php
use App\Models\Form;

Form::sb_FormBegin('Cadastro de categoria de animal', 'validation');

Form::sb_FormText('Título', 'title', 'Defina um título para o categoria do animal', '800px', '', true);

Form::sb_FormSubmit('Salvar', 'sistema/salvar-categoriaAnimal', '');

Form::sb_FormEnd();
?>

@include('painel/footer')


