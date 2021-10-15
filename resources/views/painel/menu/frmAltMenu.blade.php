@include('painel/header')


<?php
use App\Models\Form;

Form::sb_FormBegin('Alterar menu', 'validation');


Form::sb_FormText('Título', 'title', 'Defina um título para o menu', '800px', $menu->title, true);

Form::sb_FormText('Link redirecionamento', 'url', 'Defina uma url para redirecionar', '800px', $menu->url, true);

$opcaoAba[] = "<option value='1'  ".($menu->target_page == 1 ? 'selected="selected" ' : '')." >Sim</option>";
$opcaoAba[] .= "<option value='0'  ".($menu->target_page == 0 ? 'selected="selected" ' : '')." >Não</option>";
Form::sb_FormSelect('Abrir link mesma aba ?', 'target_page', $opcaoAba, '250px', false);

$opcaoAbaStatus[] = "<option value='1'  ".($menu->status == 1 ? 'selected="selected" ' : '')." >Ativo</option>";
$opcaoAbaStatus[] .= "<option value='0'  ".($menu->status == 0 ? 'selected="selected" ' : '')." >Inativo</option>";
Form::sb_FormSelect('Status', 'status', $opcaoAbaStatus, '250px', true);

Form::sb_FormDate('Data início exibição', 'begin_date', 'Data inícial que o conteúdo será exibido', '289px', str_replace(' ','T',$menu->begin_date) , false);

Form::sb_FormDate('Data final exibição', 'end_date', 'Data final máxima que o conteúdo será exibido', '289px',str_replace(' ','T',$menu->end_date), false);

Form::sb_FormSubmit('Salvar', '', 'sistema/edit-menu');

Form::sb_FormHidden('id', $menu->id);


Form::sb_FormEnd();


?>


@include('painel/footer')
