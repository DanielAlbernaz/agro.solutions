@include('painel/header')

<?php
use App\Models\Form;

Form::sb_FormBegin('Alterar empresa  ', 'validation');

Form::sb_FormText('Nome da Empresa', 'nome', 'Defina um nome para empresa', '800px', $empresa->nome, true);

Form::sb_FormClone('Telefone',  'telefone', '200px', $telefone);

Form::sb_FormPhone('WhatsApp', 'whatsapp', 'Defina um número de whatsapp',  '200px', $empresa->whatsapp, true);

Form::sb_FormText('Email', 'email', 'Defina um email', '800px', $empresa->email, true);

Form::sb_FormText('Endereço', 'endereco', 'Defina um endereço', '800px', $empresa->endereco, true);

Form::sb_FormText('Cidade/Estado', 'cidade', 'Defina uma cidade', '800px', $empresa->cidade, true);

Form::sb_FormText('Instagram', 'instagram', 'Informar o link do instagram', '800px', $empresa->instagram, false);

Form::sb_FormText('Facebook', 'facebook', 'Informar o link do facebook', '800px', $empresa->facebook, false);

Form::sb_FormText('YouTube', 'youtube', 'Informar o link do youtube', '800px', $empresa->youtube, false);

Form::sb_FormText('LinkedIn', 'linkedIn', 'Informar o link do linkedIn', '800px', $empresa->linkedIn, false);

Form::sb_FormSubmit('Salvar', '', 'sistema/edit-empresa');

Form::sb_FormHidden('id', $empresa->id);

Form::sb_FormEnd();

?>



@include('painel/footer')
