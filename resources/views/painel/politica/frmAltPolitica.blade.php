@include('painel/header')


<?php
use App\Models\Form;

Form::sb_FormBegin('Alterar política de privacidade   ', 'validation');

Form::sb_FormText('Título', 'title', 'Defina um título para a política', '800px', $politica->title, true);

Form::sb_FormTextHtml('Descrição', 'text', 'Escre uma descrição', $politica->text, true);

Form::sb_FormSubmit('Salvar', '', 'sistema/edit-politica');

Form::sb_FormHidden('id', $politica->id);

Form::sb_FormEnd();

?>



@include('painel/footer')
