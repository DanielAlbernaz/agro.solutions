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

Form::sb_FormBegin('Cadastro de Terreno', 'validation');

Form::sb_FormText('Código Terreno (1200px X 800px)', 'codigo_imovel', 'Defina um código para o terreno', '250px', '', true);

$opcaoTipo[] = "<option value=''  >Selecione</option>";
$opcaoTipo[] = "<option value='Fazenda' >Fazenda</option>";
$opcaoTipo[] = "<option value='Terreno' >Terreno</option>";
$opcaoTipo[] = "<option value='Sítio' >Sítio</option>";
$opcaoTipo[] = "<option value='Chácara' >Chácara</option>";
$opcaoTipo[] .= "<option value='Casa' >Casa</option>";
$opcaoTipo[] .= "<option value='Casa Comercial' >Casa Comercial</option>";
$opcaoTipo[] .= "<option value='Cobertura'>Cobertura</option>";
$opcaoTipo[] .= "<option value='Flat' >Flat</option>";
$opcaoTipo[] .= "<option value='Imovel Comercial' >Imovel Comercial</option>";
$opcaoTipo[] .= "<option value='Kitinete' >Kitinete</option>";
$opcaoTipo[] .= "<option value='Loja' >Loja</option>";
$opcaoTipo[] .= "<option value='Lote' >Lote</option>";
$opcaoTipo[] .= "<option value='Prédio' >Prédio</option>";
$opcaoTipo[] .= "<option value='Salas' >Salas</option>";
$opcaoTipo[] .= "<option value='Sobrado'>Sobrado</option>";
Form::sb_FormSelect('Tipo imóvel', 'tipo_imovel', $opcaoTipo, '250px', true);

$opcaoFinalidade[] = "<option value=''  >Selecione</option>";
$opcaoFinalidade[] = "<option value='Compra'>Compra</option>";
$opcaoFinalidade[] = "<option value='À Venda' >Venda</option>";
$opcaoFinalidade[] = "<option value='Arrendamento' >Arrendamento</option>";
Form::sb_FormSelect('Finalidade', 'finalidade', $opcaoFinalidade, '250px', true);

Form::sb_FormText('Tamanho /  Hectare', 'tamanho_hectares', 'Defina tamanho em hectares', '250px', '', false);

Form::sb_FormMoney('Valor por hectare', 'valor_hectare', 'Escreva o valor por hectare', '250px','', false);

Form::sb_FormMoney('Valor imóvel', 'valor', 'Escreva o valor do imóvel', '250px','', false);

Form::sb_FormText('Tipo solo', 'tipo_solo', 'Defina um tipo de solo', '800px', '', false);

Form::sb_FormText('Endereço', 'endereco', 'Escreva o endereço do terreno ex: Rua 25...', '800px', '', true);

$opcaoAptidao[] = "<option value=''  selected></option>";
$opcaoAptidao[] = "<option value='Pecuária'>Pecuária</option>";
$opcaoAptidao[] .= "<option value='Agricultura' >Agricultura</option>";
Form::sb_FormSelect('Aptidão', 'aptidao', $opcaoAptidao, '250px', false);

$opcaoNegociacao[] = "<option value=''  selected></option>";
$opcaoNegociacao[] = "<option value='Dinheiro'>Dinheiro</option>";
$opcaoNegociacao[] .= "<option value='Permuta' >Permuta</option>";
Form::sb_FormSelect('Tipo negociação', 'tipo_negociacao', $opcaoNegociacao, '250px', false);

Form::sb_FormTextHtml('Infraestrutura da fazenda', 'infra_fazenda', 'Escreva uma descrição da infraestrutura da fazenda', '', false);

Form::sb_FormText('Cidade / Estado', 'cidade_estado', 'Escreva  a cidade / estado ex: Goiânia - GO', '800px', '', true);

$opcaoAguadas[] = "<option value=''  selected></option>";
$opcaoAguadas[] = "<option value='Artificial'>Artificial</option>";
$opcaoAguadas[] .= "<option value='Natural' >Natural</option>";
Form::sb_FormSelect('Aguadas', 'aguadas', $opcaoAguadas, '250px', false);

Form::sb_FormTextHtml('Observações', 'observacoes', 'Escreva as observações em relação a fazenda', '', false);

Form::sb_FormCropImage('Imagem destaque', '', true);

$opcaoDestaque[] = "<option value='1'  selected>Sim</option>";
$opcaoDestaque[] .= "<option value='0' >Não</option>";
Form::sb_FormSelect('Destaque', 'destaque', $opcaoDestaque, '250px', true);

$opcaoStatus[] = "<option value='1'  selected>Ativo</option>";
$opcaoStatus[] .= "<option value='0' >Inativo</option>";
Form::sb_FormSelect('Status', 'status', $opcaoStatus, '250px', true);

Form::sb_FormDate('Data início exibição', 'begin_date', 'Data inícial que o conteúdo será exibido', '289px', '', false);

Form::sb_FormDate('Data final exibição', 'end_date', 'Data final máxima que o conteúdo será exibido', '289px', '', false);

Form::sb_FormSubmit('Salvar', 'sistema/salvar-imovel', '');

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


