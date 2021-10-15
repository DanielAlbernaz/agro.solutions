@include('painel/header')

<?php
use App\Models\Form;

Form::sb_FormBegin('Alterar configurações de envios de emails SMTP ', 'validation');

Form::sb_FormText('Host', 'host', 'Informe o servidor host ', '400px', $smtp->host, true);

Form::sb_FormText('Usuário', 'usuario', 'Informe o usuário', '400px', $smtp->usuario, true);

Form::sb_FormText('Senha', 'senha', 'Informe a senha ', '400px', $smtp->senha, true);

Form::sb_FormText('Porta', 'port', 'Informe a porta Ex: 587 ', '400px', $smtp->port, true);

Form::sb_FormText('Nome site', 'nome_site', 'Informe o nome do site ', '400px', $smtp->nome_site, true);

Form::sb_FormText('Email administrador', 'email_adm', 'Informe o email que irá receber os contatos ', '400px', $smtp->email_adm, true);

Form::sb_FormText('Link site', 'link_site', 'Informe o link para o site ', '400px', $smtp->link_site, true);

Form::sb_FormSubmit('Salvar', '', 'sistema/edit-smtp');

Form::sb_FormHidden('id', $smtp->id);

Form::sb_FormEnd();

?>
@include('painel/footer')
