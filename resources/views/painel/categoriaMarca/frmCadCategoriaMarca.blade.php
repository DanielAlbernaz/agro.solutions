 @include('painel/header')

<?php
use App\Models\Form;

Form::sb_FormBegin('Cadastro de marca', 'validation');

Form::sb_FormText('Título', 'title', 'Defina um título para marca', '800px', '', true);

Form::sb_FormSubmit('Salvar', 'sistema/salvar-categoriaMarca', '');

Form::sb_FormEnd();
?>

@include('painel/footer')


