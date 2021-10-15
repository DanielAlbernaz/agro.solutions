 @include('painel/header')

<?php
use App\Models\Form;

Form::sb_FormBegin('Cadastro de menu', 'validation');

Form::sb_FormText('Título', 'title', 'Defina um título para o menu', '800px', '', true);

Form::sb_FormText('Link redirecionamento', 'url', 'Defina uma url para redirecionar', '800px', '', true);

$opcaoAba[] = "<option value='1'  >Sim</option>";
$opcaoAba[] .= "<option value='0' selected  >Não</option>";
Form::sb_FormSelect('Abrir link mesma aba ?', 'target_page', $opcaoAba, '250px', false);

$opcaoStatus[] = "<option value='1'  selected>Ativo</option>";
$opcaoStatus[] .= "<option value='0' >Inativo</option>";
Form::sb_FormSelect('Status', 'status', $opcaoStatus, '250px', true);

Form::sb_FormDate('Data início exibição', 'begin_date', 'Data inícial que o conteúdo será exibido', '289px', '', false);

Form::sb_FormDate('Data final exibição', 'end_date', 'Data final máxima que o conteúdo será exibido', '289px', '', false);

Form::sb_FormSubmit('Salvar', 'sistema/salvar-menu', '');

Form::sb_FormEnd();
?>

@include('painel/footer')


