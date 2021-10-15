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
       border:  1px solid black;
   }
</style>

<?php
use App\Models\Form;

Form::sb_FormBegin('Alterar banner', 'validation');


Form::sb_FormText('Título', 'title', 'Defina um título para o banner', '800px', $banner->title, true);

Form::sb_FormCropImage('Imagem banner', $banner->imagem, false);

Form::sb_FormText('Link redirecionamento', 'url', 'Defina uma url para redirecionar', '800px', $banner->url, false);

$opcaoAba[] = "<option value='1'  ".($banner->target_page == 1 ? 'selected="selected" ' : '')." >Sim</option>";
$opcaoAba[] .= "<option value='0'  ".($banner->target_page == 0 ? 'selected="selected" ' : '')." >Não</option>";
Form::sb_FormSelect('Abrir link mesma aba ?', 'target_page', $opcaoAba, '250px', false);

$opcaoAba[] = "<option value='1'  ".($banner->status == 1 ? 'selected="selected" ' : '')." >Ativo</option>";
$opcaoAba[] .= "<option value='0'  ".($banner->status == 0 ? 'selected="selected" ' : '')." >Inativo</option>";
Form::sb_FormSelect('Status', 'status', $opcaoAba, '250px', true);

Form::sb_FormDate('Data início exibição', 'begin_date', 'Data inícial que o conteúdo será exibido', '289px', str_replace(' ','T',$banner->begin_date) , false);

Form::sb_FormDate('Data final exibição', 'end_date', 'Data final máxima que o conteúdo será exibido', '289px',str_replace(' ','T',$banner->end_date), false);

Form::sb_FormSubmit('Salvar', '', 'sistema/edit-banner');

Form::sb_FormHidden('id', $banner->id);
Form::sb_FormHidden('imgOld', $banner->imagem);


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
           aspectRatio: 1920 / 715,
           viewMode: 1,
           preview: '.preview'
       });
   }).on('hidden.bs.modal', function() {
       cropper.destroy();
       cropper = null;
   });

   $("#crop").click(function() {
       canvas = cropper.getCroppedCanvas({
           width: 1920,
           height: 715,
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
