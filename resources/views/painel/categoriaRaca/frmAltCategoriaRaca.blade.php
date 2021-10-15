@include('painel/header')


<?php
use App\Models\Form;

Form::sb_FormBegin('Alterar categoria raça', 'validation');

Form::sb_FormText('Título', 'title', 'Defina um título para a raça', '800px', $categoriaRaca->title, true);

Form::sb_FormSubmit('Salvar', '', 'sistema/edit-categoriaRaca');

Form::sb_FormHidden('id', $categoriaRaca->id);


Form::sb_FormEnd();


?>


@include('painel/footer')
