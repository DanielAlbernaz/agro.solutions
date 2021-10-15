@include('painel/header')


<?php
use App\Models\Form;

Form::sb_FormBegin('Alterar categoria animal', 'validation');


Form::sb_FormText('Título', 'title', 'Defina um título para o categoria do animal', '800px', $categoriaAnimal->title, true);

Form::sb_FormSubmit('Salvar', '', 'sistema/edit-categoriaAnimal');

Form::sb_FormHidden('id', $categoriaAnimal->id);


Form::sb_FormEnd();


?>


@include('painel/footer')
