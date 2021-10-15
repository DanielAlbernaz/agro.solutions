@include('painel/header')


<?php
use App\Models\Form;

Form::sb_FormBegin('Alterar termo de uso  ', 'validation');

Form::sb_FormText('Título', 'title', 'Defina um título para o termo de uso', '800px', $termo->title, true);

Form::sb_FormTextHtml('Descrição', 'text', 'Escre uma descrição', $termo->text, true);

Form::sb_FormSubmit('Salvar', '', 'sistema/edit-termo');

Form::sb_FormHidden('id', $termo->id);

Form::sb_FormEnd();

?>


@include('painel/footer')
