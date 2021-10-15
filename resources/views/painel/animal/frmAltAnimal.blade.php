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
Form::sb_FormBegin('Alterar terreno', 'validation');

Form::sb_FormText('Código animal', 'codigo_animal', 'Defina um código para o animal', '250px', $animal->codigo_animal, false);

Form::sb_FormCropImage('Imagem destaque (1200px X 800px)',  $animal->imagem, false );

$opcaoCategoria[] = "<option value=''  selected>Selecione</option>";
for($i = 0; $i < count($categoria); $i++){
    if($categoria[$i]->title == $animal->categoria_animal){
        $opcaoCategoria[] = "<option selected value='". $categoria[$i]->title ."'>". $categoria[$i]->title ."</option>";
    }else{
        $opcaoCategoria[] = "<option value='". $categoria[$i]->title ."'>". $categoria[$i]->title ."</option>";
    }
}

Form::sb_FormSelect('Categoria Animal', 'categoria_animal', $opcaoCategoria, '250px', true);


$opcaoRaca[] = "<option value=''  selected>Selecione</option>";
for($i = 0; $i < count($raca); $i++){
    if($raca[$i]->title == $animal->raca){
        $opcaoRaca[] = "<option selected  value='". $raca[$i]->title ."'>". $raca[$i]->title ."</option>";
    }else{
        $opcaoRaca[] = "<option value='". $raca[$i]->title ."'>". $raca[$i]->title ."</option>";
    }
}
Form::sb_FormSelect('Raça animal', 'raca', $opcaoRaca, '250px', true);

$opcaoFinalidade[] = "<option value=''  >Selecione</option>";
$opcaoFinalidade[] = "<option value='Compra'  ".($animal->finalidade_tipo == 'Compra' ? 'selected="selected" ' : '').">Compra</option>";
$opcaoFinalidade[] = "<option value='À Venda'  ".($animal->finalidade_tipo == 'À Venda' ? 'selected="selected" ' : '').">Venda</option>";
Form::sb_FormSelect('Finalidade', 'finalidade_tipo', $opcaoFinalidade, '250px', true);

Form::sb_FormDates('Data nascimento', 'data_nascimento', 'Data de nascimento do animal', '250px',  $animal->data_nascimento, false);

Form::sb_FormText('Idade', 'idade', 'Defina um idade', '250px',  $animal->idade, false);

Form::sb_FormText('Peso', 'peso', 'Defina um peso', '250px',  $animal->peso, false);

$opcaoSexo[] = "<option value=''  selected>Selecione</option>";
$opcaoSexo[] = "<option value='Macho' ".($animal->sexo == 'Macho' ? 'selected="selected" ' : '')." >Macho</option>";
$opcaoSexo[] .= "<option value='Fêmea' ".($animal->sexo == 'Fêmea' ? 'selected="selected" ' : '')." >Fêmea</option>";
Form::sb_FormSelect('Sexo', 'sexo', $opcaoSexo, '250px', false);

Form::sb_FormText('Pelagem', 'pelagem', 'Defina uma pelagem ', '250px',  $animal->pelagem, false);

$opcaoCriacao[] = "<option value=''  selected>Selecione</option>";
$opcaoCriacao[] = "<option value='Haras' ".($animal->criacao == 'Haras' ? 'selected="selected" ' : '').">Haras</option>";
$opcaoCriacao[] .= "<option value='Fazenda' ".($animal->criacao == 'Fazenda' ? 'selected="selected" ' : '')." >Fazenda</option>";
Form::sb_FormSelect('Criação', 'criacao', $opcaoCriacao, '250px', false);

$opcaoTipoAnimal[] = "<option value=''  selected>Selecione</option>";
$opcaoTipoAnimal[] = "<option value='Reprodutor' ".($animal->tipo_animal == 'Reprodutor' ? 'selected="selected" ' : '').">Reprodutor</option>";
$opcaoTipoAnimal[] .= "<option value='Matriz' ".($animal->tipo_animal == 'Matriz' ? 'selected="selected" ' : '')." >Matriz</option>";
$opcaoTipoAnimal[] .= "<option value='Potro'  ".($animal->tipo_animal == 'Potro' ? 'selected="selected" ' : '').">Potro</option>";
Form::sb_FormSelect('Tipo Animal', 'tipo_animal', $opcaoTipoAnimal, '250px', false);

$opcaoVacinacao[] = "<option value=''  selected>Selecione</option>";
$opcaoVacinacao[] .= "<option value='Sim' ".($animal->vacinacao == 'Sim' ? 'selected="selected" ' : '').">Sim</option>";
$opcaoVacinacao[] .= "<option value='Não' ".($animal->vacinacao == 'Não' ? 'selected="selected" ' : '').">Não</option>";
Form::sb_FormSelect('Vacinação', 'vacinacao', $opcaoVacinacao, '250px', false);

$opcaoFinalidade[] = "<option value=''  selected>Selecione</option>";
$opcaoFinalidade[] .= "<option value='Corte' ".($animal->finalidade == 'Corte' ? 'selected="selected" ' : '').">Corte</option>";
$opcaoFinalidade[] .= "<option value='Leitero' ".($animal->finalidade == 'Leitero' ? 'selected="selected" ' : '').">Leitero</option>";
Form::sb_FormSelect('Finalidade', 'finalidade', $opcaoFinalidade, '250px', false);

Form::sb_FormText('Lactação', 'lactacao', 'Defina os dias de lactação ', '250px',  $animal->lactacao, false);

Form::sb_FormText('Quantidade', 'qtd', 'Defina uma quantidade ', '250px',  $animal->qtd, false);

Form::sb_FormMoney('Valor unitário', 'valor_unitario', 'Escreva o valor unitário', '250px', number_format($animal->valor_unitario, 2, ',', '.'), false);

Form::sb_FormTextHtml('Observações', 'observacoes', 'Escreva as observações em relação ao animal', $animal->observacoes, false);

Form::sb_FormGalleria($galleriaAnimal, 'sistema/deletar-animal-imagem');

Form::sb_FormText('Link vídeo youtube', 'url_video', 'Digite o link para o vídeo youtube', '800px',  $animal->url_video, false);

$opcaoAba[] = "<option value='1'  ".($animal->destaque == 1 ? 'selected="selected" ' : '')." >Sim</option>";
$opcaoAba[] .= "<option value='2'  ".($animal->destaque == 0 ? 'selected="selected" ' : '')." >Não</option>";
Form::sb_FormSelect('Destaque', 'destaque', $opcaoAba, '250px', true);

$opcaoAba[] = "<option value='1'  ".($animal->status == 1 ? 'selected="selected" ' : '')." >Ativo</option>";
$opcaoAba[] .= "<option value='2'  ".($animal->status == 0 ? 'selected="selected" ' : '')." >Inativo</option>";
Form::sb_FormSelect('Status', 'status', $opcaoAba, '250px', true);


Form::sb_FormDate('Data início exibição', 'begin_date', 'Data inícial que o conteúdo será exibido', '289px', str_replace(' ','T',$animal->begin_date) , false);

Form::sb_FormDate('Data final exibição', 'end_date', 'Data final máxima que o conteúdo será exibido', '289px',str_replace(' ','T',$animal->end_date), false);


Form::sb_FormSubmit('Salvar', '',  'sistema/edit-animal');

Form::sb_FormHidden('id', $animal->id);
Form::sb_FormHidden('imgOld', $animal->imagem);

Form::sb_FormEnd();


$path = urlDomain('salvar-galleria-animal');
$urlGalleriaImg = $path . $animal->id;

?>



<script>
    Dropzone.options.myDropzone= {
    url: '<?php print $urlGalleriaImg; ?>',
    //autoProcessQueue: false,
    uploadMultiple: true,
    addRemoveLinks:false,
    dictDefaultMessage: "Arraste ou clique para importar suas fotos, tamanho recomendado (700px X 525px).",
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
