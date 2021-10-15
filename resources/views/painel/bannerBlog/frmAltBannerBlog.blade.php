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

Form::sb_FormBegin('Alterar banner página blog  ', 'validation');

Form::sb_FormText('Título', 'title', 'Defina um título', '800px', $bannerBlog->title, true);

Form::sb_FormCropImage('Imagem banner blog (1920px X 500px)', $bannerBlog->imagem, false);

Form::sb_FormSubmit('Salvar', '', 'sistema/edit-bannerBlog');

Form::sb_FormHidden('id', $bannerBlog->id);
Form::sb_FormHidden('imgOld', $bannerBlog->imagem);


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
           aspectRatio: 1920 / 500,
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
           height: 500,
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
