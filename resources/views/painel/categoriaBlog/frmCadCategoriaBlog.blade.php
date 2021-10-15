 @include('painel/header')

<?php
use App\Models\Form;

Form::sb_FormBegin('Cadastro de categoria de blog', 'validation');

Form::sb_FormText('Título', 'title', 'Defina um título para o categoria do blog', '800px', '', true);

Form::sb_FormSubmit('Salvar', 'sistema/salvar-categoriaBlog', '');

Form::sb_FormEnd();
?>

@include('painel/footer')


