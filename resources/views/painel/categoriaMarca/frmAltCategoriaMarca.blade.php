@include('painel/header')


<?php
use App\Models\Form;

Form::sb_FormBegin('Alterar marca', 'validation');


Form::sb_FormText('Título', 'title', 'Defina um título para marca', '800px', $categoriaMarca->title, true);

Form::sb_FormSubmit('Salvar', '', 'sistema/edit-categoriaMarca');

Form::sb_FormHidden('id', $categoriaMarca->id);


Form::sb_FormEnd();


?>


@include('painel/footer')
