@include('painel/header')


<?php
use App\Models\Form;

Form::sb_FormBegin('Alterar categoria blog', 'validation');


Form::sb_FormText('Título', 'title', 'Defina um título para o categoria do blog', '800px', $categoriaBlog->title, true);

Form::sb_FormSubmit('Salvar', '', 'sistema/edit-categoriaBlog');

Form::sb_FormHidden('id', $categoriaBlog->id);


Form::sb_FormEnd();


?>


@include('painel/footer')
