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
   #buttonGalleria{
    opacity: 0;
}
   #imagemGalleria:hover #buttonGalleria{
    opacity: 1;
    transition-duration: 5s;
}
</style>

<?php
use App\Models\Form;


Form::sb_FormBegin('Cadastro de Equipamento', 'validation');

Form::sb_FormText('Título', 'title', 'Defina um título', '250px', $blog->title, true);

// $opcaoCategoria[] = "<option value=''  selected>Selecione</option>";
// for($i = 0; $i < count($categoria); $i++){
//     if($categoria[$i]->id == $blog->categoria){
//         $opcaoCategoria[] = "<option selected value='". $categoria[$i]->id ."'>". $categoria[$i]->title ."</option>";
//     }else{
//         $opcaoCategoria[] = "<option value='". $categoria[$i]->id ."'>". $categoria[$i]->title ."</option>";
//     }
// }
// Form::sb_FormSelect('Categoria', 'categoria', $opcaoCategoria, '250px', true);

Form::sb_FormCropImage('Imagem destaque (1200px X 800px)', $blog->imagem, false);

Form::sb_FormTextHtml('Texto', 'text', 'Escreva a notícia do blog', $blog->text, true);

// Form::sb_FormGalleria($galleriaBlog, 'sistema/deletar-blog-imagem');

Form::sb_FormText('Link vídeo youtube', 'url_video', 'Digite o link para o vídeo youtube', '800px',  $blog->url_video, false);

$opcaoAba[] = "<option value='1'  ".($blog->destaque == 1 ? 'selected="selected" ' : '')." >Sim</option>";
$opcaoAba[] .= "<option value='2'  ".($blog->destaque == 0 ? 'selected="selected" ' : '')." >Não</option>";
Form::sb_FormSelect('Destaque', 'destaque', $opcaoAba, '250px', true);

$opcaoAba[] = "<option value='1'  ".($blog->status == 1 ? 'selected="selected" ' : '')." >Ativo</option>";
$opcaoAba[] .= "<option value='2'  ".($blog->status == 0 ? 'selected="selected" ' : '')." >Inativo</option>";
Form::sb_FormSelect('Status', 'status', $opcaoAba, '250px', true);


Form::sb_FormDate('Data início exibição', 'begin_date', 'Data inícial que o conteúdo será exibido', '289px', str_replace(' ','T',$blog->begin_date) , false);

Form::sb_FormDate('Data final exibição', 'end_date', 'Data final máxima que o conteúdo será exibido', '289px',str_replace(' ','T',$blog->end_date), false);


Form::sb_FormSubmit('Salvar', '',  'sistema/edit-blog');

Form::sb_FormHidden('id', $blog->id);
Form::sb_FormHidden('imgOld', $blog->imagem);

Form::sb_FormEnd();


$path = urlDomain('salvar-galleria-blog');
$urlGalleriaImg = $path . $blog->id;

?>



<script>
    Dropzone.options.myDropzone= {
    url: '<?php print $urlGalleriaImg; ?>',
    //autoProcessQueue: false,
    uploadMultiple: true,
    addRemoveLinks:false,
    dictDefaultMessage: "Arraste ou clique para importar suas fotos.",
    parallelUploads: 50,
    maxFiles: 50,
    maxFilesize: 55,
    acceptedFiles: 'image/*',
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    init: function() {
        dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

        // for Dropzone to process the queue (instead of default form behavior):
        document.getElementById("submit-all").addEventListener("click", function(e) {
            // Make sure that the form isn't actually being sent.
            e.preventDefault();
            e.stopPropagation();
            dzClosure.processQueue();
        });

        //send all the form data along with the files:
        this.on("sendingmultiple", function(data, xhr, formData) {
            formData.append("lastname", jQuery("#lastname").val());
        });
    }
}


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
           aspectRatio: 1200 / 800,
           viewMode: 1,
           preview: '.preview'
       });
   }).on('hidden.bs.modal', function() {
       cropper.destroy();
       cropper = null;
   });

   $("#crop").click(function() {
       canvas = cropper.getCroppedCanvas({
           width: 1200,
           height: 800,
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
