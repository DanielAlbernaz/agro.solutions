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

Form::sb_FormText('Código Terreno (1200px X 800px)', 'codigo_imovel', 'Defina um código para o terreno', '250px', $imovel->codigo_imovel, true);

$opcaoTipo[] = "<option value=''  ></option>";
$opcaoTipo[] = "<option value='Fazenda' ".($imovel->tipo_imovel == 'Fazenda' ? 'selected="selected" ' : '')." >Fazenda</option>";
$opcaoTipo[] = "<option value='Terreno' ".($imovel->Terreno == 'Fazenda' ? 'selected="selected" ' : '')." >Terreno</option>";
$opcaoTipo[] = "<option value='Sítio' ".($imovel->tipo_imovel == 'Sítio' ? 'selected="selected" ' : '')." >Sítio</option>";
$opcaoTipo[] = "<option value='Chácara' ".($imovel->tipo_imovel == 'Chácara' ? 'selected="selected" ' : '')." >Chácara</option>";
$opcaoTipo[] .= "<option value='Casa' ".($imovel->tipo_imovel == 'Casa' ? 'selected="selected" ' : '').">Casa</option>";
$opcaoTipo[] .= "<option value='Casa Comercial' ".($imovel->tipo_imovel == 'Casa Comercial' ? 'selected="selected" ' : '').">Casa Comercial</option>";
$opcaoTipo[] .= "<option value='Cobertura'".($imovel->tipo_imovel == 'Cobertura' ? 'selected="selected" ' : '')." >Cobertura</option>";
$opcaoTipo[] .= "<option value='Flat' ".($imovel->tipo_imovel == 'Flat' ? 'selected="selected" ' : '').">Flat</option>";
$opcaoTipo[] .= "<option value='Imovel Comercial' ".($imovel->tipo_imovel == 'Imovel Comercial' ? 'selected="selected" ' : '').">Imovel Comercial</option>";
$opcaoTipo[] .= "<option value='Kitinete' ".($imovel->tipo_imovel == 'Kitinete' ? 'selected="selected" ' : '').">Kitinete</option>";
$opcaoTipo[] .= "<option value='Loja' ".($imovel->tipo_imovel == 'Loja' ? 'selected="selected" ' : '').">Loja</option>";
$opcaoTipo[] .= "<option value='Lote' ".($imovel->tipo_imovel == 'Lote' ? 'selected="selected" ' : '').">Lote</option>";
$opcaoTipo[] .= "<option value='Prédio' ".($imovel->tipo_imovel == 'Prédio' ? 'selected="selected" ' : '').">Prédio</option>";
$opcaoTipo[] .= "<option value='Salas' ".($imovel->tipo_imovel == 'Salas' ? 'selected="selected" ' : '').">Salas</option>";
$opcaoTipo[] .= "<option value='Sobrado' ".($imovel->tipo_imovel == 'Sobrado' ? 'selected="selected" ' : '').">Sobrado</option>";
Form::sb_FormSelect('Tipo imóvel', 'tipo_imovel', $opcaoTipo, '250px', true);

$opcaoFinalidade[] = "<option value=''  >Selecione</option>";
$opcaoFinalidade[] = "<option value='Compra'  ".($imovel->finalidade == 'Compra' ? 'selected="selected" ' : '').">Compra</option>";
$opcaoFinalidade[] = "<option value='À Venda'  ".($imovel->finalidade == 'À Venda' ? 'selected="selected" ' : '').">Venda</option>";
$opcaoFinalidade[] = "<option value='Arrendamento'  ".($imovel->finalidade == 'Arrendamento' ? 'selected="selected" ' : '').">Arrendamento</option>";
Form::sb_FormSelect('Finalidade', 'finalidade', $opcaoFinalidade, '250px', true);

Form::sb_FormText('Tamanho /  Hectare', 'tamanho_hectares', 'Defina tamanho em hectares', '250px', $imovel->tamanho_hectares, false);

Form::sb_FormMoney('Valor por hectare', 'valor_hectare', 'Escreva o valor por hectare', '250px',number_format($imovel->valor_hectare, 2, ',', '.'), false);

Form::sb_FormMoney('Valor imóvel', 'valor', 'Escreva o valor do imóvel', '250px',number_format($imovel->valor, 2, ',', '.'), false);

Form::sb_FormText('Tipo solo', 'tipo_solo', 'Defina um tipo de solo', '800px', $imovel->tipo_solo, false);

Form::sb_FormText('Endereço', 'endereco', 'Escreva o endereço do terreno ex: Rua 25...', '800px', $imovel->endereco, true);

$opcaoAptidao[] = "<option value=''  selected>Selecione</option>";
$opcaoAptidao[] = "<option value='Pecuária'  ".($imovel->aptidao == 'Pecuária' ? 'selected="selected" ' : '').">Pecuária</option>";
$opcaoAptidao[] .= "<option value='Agricultura'  ".($imovel->aptidao == 'Agricultura' ? 'selected="selected" ' : '').">Agricultura</option>";
Form::sb_FormSelect('Aptidão', 'aptidao', $opcaoAptidao, '250px', false);

$opcaoNegociacao[] = "<option value=''  selected>Selecione</option>";
$opcaoNegociacao[] = "<option value='Dinheiro'  ".($imovel->tipo_negociacao == 'Dinheiro' ? 'selected="selected" ' : '').">Dinheiro</option>";
$opcaoNegociacao[] .= "<option value='Permuta'   ".($imovel->tipo_negociacao == 'Permuta' ? 'selected="selected" ' : '').">Permuta</option>";
Form::sb_FormSelect('Tipo negociação', 'tipo_negociacao', $opcaoNegociacao, '250px', false);

Form::sb_FormTextHtml('Infraestrutura da fazenda', 'infra_fazenda', 'Escreva uma descrição da infraestrutura da fazenda', $imovel->infra_fazenda, false);

Form::sb_FormText('Cidade / Estado', 'cidade_estado', 'Escreva  a cidade / estado ex: Goiânia - GO', '800px', $imovel->cidade_estado, true);

$opcaoAguadas[] = "<option value=''  selected>Selecione</option>";
$opcaoAguadas[] = "<option value='Artificial' ".($imovel->aguadas == 'Artificial' ? 'selected="selected" ' : '').">Artificial</option>";
$opcaoAguadas[] .= "<option value='Natural'  ".($imovel->aguadas == 'Natural' ? 'selected="selected" ' : '').">Natural</option>";
Form::sb_FormSelect('Aguadas', 'aguadas', $opcaoAguadas, '250px', false);

Form::sb_FormTextHtml('Observações', 'observacoes', 'Escreva as observações em relação a fazenda', $imovel->observacoes, false);

Form::sb_FormCropImage('Imagem ', $imovel->imagem, false);

Form::sb_FormGalleria($galleriaImovel, 'sistema/deletar-imovel-imagem');

Form::sb_FormText('Link vídeo youtube', 'url_video', 'Digite o link para o vídeo youtube', '800px',  $imovel->url_video, false);

$opcaoAba[] = "<option value='1'  ".($imovel->destaque == 1 ? 'selected="selected" ' : '')." >Sim</option>";
$opcaoAba[] .= "<option value='2'  ".($imovel->destaque == 0 ? 'selected="selected" ' : '')." >Não</option>";
Form::sb_FormSelect('Destaque', 'destaque', $opcaoAba, '250px', true);

$opcaoAba[] = "<option value='1'  ".($imovel->status == 1 ? 'selected="selected" ' : '')." >Ativo</option>";
$opcaoAba[] .= "<option value='2'  ".($imovel->status == 0 ? 'selected="selected" ' : '')." >Inativo</option>";
Form::sb_FormSelect('Status', 'status', $opcaoAba, '250px', true);


Form::sb_FormDate('Data início exibição', 'begin_date', 'Data inícial que o conteúdo será exibido', '289px', str_replace(' ','T',$imovel->begin_date) , false);

Form::sb_FormDate('Data final exibição', 'end_date', 'Data final máxima que o conteúdo será exibido', '289px',str_replace(' ','T',$imovel->end_date), false);


Form::sb_FormSubmit('Salvar', '', 'sistema/edit-imovel');

Form::sb_FormHidden('id', $imovel->id);
Form::sb_FormHidden('imgOld', $imovel->imagem);

Form::sb_FormEnd();

$path = urlDomain('salvar-galleria-terreno');
$urlGalleriaImg = $path . $imovel->id;
?>



<script>
    Dropzone.options.myDropzone= {
    url: '<?php print $urlGalleriaImg; ?>',
    //autoProcessQueue: false,
    uploadMultiple: true,
    addRemoveLinks:false,
    dictDefaultMessage: "Arraste ou clique para importar suas fotos, tamanho recomendado (1200px X 800px).",
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
