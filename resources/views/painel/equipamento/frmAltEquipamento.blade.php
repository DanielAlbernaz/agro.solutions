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

Form::sb_FormText('Código equipamento', 'codigo_equipamento', 'Defina um código para o equipamento', '250px', $equipamento->codigo_equipamento, false);

Form::sb_FormText('Nome equipamento', 'nome', 'Defina um nome para o equipamento', '800px', $equipamento->nome, true);

Form::sb_FormCropImage('Imagem destaque (1200px X 800px)', $equipamento->imagem, false);

$opcaoCategoria[] = "<option value=''  selected>Selecione</option>";
for($i = 0; $i < count($categoria); $i++){
    if($categoria[$i]->title == $equipamento->marca){
        $opcaoCategoria[] = "<option selected value='". $categoria[$i]->title ."'>". $categoria[$i]->title ."</option>";
    }else{
        $opcaoCategoria[] = "<option value='". $categoria[$i]->title ."'>". $categoria[$i]->title ."</option>";
    }
}

Form::sb_FormSelect('Marca', 'marca', $opcaoCategoria, '250px', false);

$opcaoFinalidade[] = "<option value=''  >Selecione</option>";
$opcaoFinalidade[] = "<option value='Aluguel'  ".($equipamento->finalidade == 'Aluguel' ? 'selected="selected" ' : '').">Aluguel</option>";
$opcaoFinalidade[] = "<option value='Venda'  ".($equipamento->finalidade == 'Venda' ? 'selected="selected" ' : '').">Venda</option>";
Form::sb_FormSelect('Finalidade', 'finalidade', $opcaoFinalidade, '250px', true);

Form::sb_FormText('Modelo', 'modelo', 'Defina um modelo', '250px', $equipamento->modelo, false);

Form::sb_FormText('Ano fabricação', 'ano_fabricacao', 'Defina um ano de fabricação', '250px', $equipamento->ano_fabricacao, false);

Form::sb_FormText('Tamanho', 'tamanho', 'Defina um tamanho', '250px', $equipamento->tamanho, false);

Form::sb_FormText('Capacidade', 'capacidade', 'Defina uma capacidade', '250px', $equipamento->capacidade, false);

Form::sb_FormText('Quantidade de linhas', 'qtd_linhas', 'Defina uma quantidade de linhas', '250px', $equipamento->qtd_linhas, false);

Form::sb_FormMoney('Valor ', 'valor', 'Escreva o valor', '250px',number_format($equipamento->valor, 2, ',', '.'), false);

Form::sb_FormTextHtml('Observações', 'observacoes', 'Escreva as observações em relação ao equipamento', $equipamento->observacoes, false);

Form::sb_FormGalleria($galleriaEquipamento, 'sistema/deletar-equipamento-imagem');

Form::sb_FormText('Link vídeo youtube', 'url_video', 'Digite o link para o vídeo youtube', '800px',  $equipamento->url_video, false);

$opcaoAba[] = "<option value='1'  ".($equipamento->destaque == 1 ? 'selected="selected" ' : '')." >Sim</option>";
$opcaoAba[] .= "<option value='2'  ".($equipamento->destaque == 0 ? 'selected="selected" ' : '')." >Não</option>";
Form::sb_FormSelect('Destaque', 'destaque', $opcaoAba, '250px', true);

$opcaoAba[] = "<option value='1'  ".($equipamento->status == 1 ? 'selected="selected" ' : '')." >Ativo</option>";
$opcaoAba[] .= "<option value='2'  ".($equipamento->status == 0 ? 'selected="selected" ' : '')." >Inativo</option>";
Form::sb_FormSelect('Status', 'status', $opcaoAba, '250px', true);


Form::sb_FormDate('Data início exibição', 'begin_date', 'Data inícial que o conteúdo será exibido', '289px', str_replace(' ','T',$equipamento->begin_date) , false);

Form::sb_FormDate('Data final exibição', 'end_date', 'Data final máxima que o conteúdo será exibido', '289px',str_replace(' ','T',$equipamento->end_date), false);


Form::sb_FormSubmit('Salvar', '',  'sistema/edit-equipamento');

Form::sb_FormHidden('id', $equipamento->id);
Form::sb_FormHidden('imgOld', $equipamento->imagem);

Form::sb_FormEnd();


$path = urlDomain('salvar-galleria-equipamento');
$urlGalleriaImg = $path . $equipamento->id;

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
