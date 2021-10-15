@include('painel/header')

<style>
   img {
       display: block;
       max-width: 100%;
   }
   .preview {
       overflow: hidden;
       width: 160px;
       height: 160px;
       margin: 10px;
       border:  1px solid red;
   }
</style>

<?php
use App\Models\Form;
//Form::print_rpre($user->id);

Form::sb_FormBegin('Alterar usuário', 'validation');

Form::sb_FormText('Nome', 'name', 'Defina um nome para ser reconhecido no sistema', '800px', $user->name, true);

Form::sb_FormTextEmail('Usuário / email', 'email', 'Defina um nome ou use seu email para logar no sistema', '800px', $user->email, true);

Form::sb_FormPassword('Escolha uma senha', 'password','Escolha uma senha para logar no painel', '500px', '', false);

$form = array();
$opcaoNivel[] = "<option value='1'  ".($user->nivel_acesso == 1 ? 'selected="selected" ' : '')." >Administrador</option>";
$opcaoNivel[] .= "<option value='2'  ".($user->nivel_acesso == 2 ? 'selected="selected" ' : '')." >Usuário</option>";
Form::sb_FormSelect('Nível acesso', 'nivel_acesso', $opcaoNivel, '250px', true);

Form::sb_FormCropImage('Imagem perfil',  $user->imagem);

Form::sb_FormSubmit('Salvar', '', 'sistema/edit-usuario');

Form::sb_FormHidden('id', $user->id);
Form::sb_FormHidden('imgOld', $user->imagem);


Form::sb_FormEnd();


?>



<script>
   var bs_modal = $('#modal');
   var image = document.getElementById('image');
   var cropper,reader,file;

   $("body").on("change", ".image", function(e) {
       var files = e.target.files;
       var done = function(url) {
           image.src = url;
           bs_modal.modal('show');
       };

       if (files && files.length > 0) {
           file = files[0];

           if (URL) {
               done(URL.createObjectURL(file));
           } else if (FileReader) {
               reader = new FileReader();
               reader.onload = function(e) {
                   done(reader.result);
               };
               reader.readAsDataURL(file);
           }
       }
   });

   bs_modal.on('shown.bs.modal', function() {
       cropper = new Cropper(image, {
           aspectRatio: 48 / 48,
           viewMode: 1,
           preview: '.preview'
       });
   }).on('hidden.bs.modal', function() {
       cropper.destroy();
       cropper = null;
   });

   $("#crop").click(function() {
       canvas = cropper.getCroppedCanvas({
           width: 48,
           height: 48,
       });

       canvas.toBlob(function(blob) {
           url = URL.createObjectURL(blob);
           var reader = new FileReader();
           reader.readAsDataURL(blob);
           reader.onloadend = function() {
           var base64data = reader.result;

           $('#image_file').val(base64data);
           bs_modal.modal('hide');
           };
       });
   });

</script>
@include('painel/footer')
