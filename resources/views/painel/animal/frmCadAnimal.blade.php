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

Form::sb_FormBegin('Cadastro de Animal', 'validation');

Form::sb_FormText('Código animal', 'codigo_animal', 'Defina um código para o animal', '250px', '', false);

Form::sb_FormCropImage('Imagem destaque (1200px X 800px)' , '', true);

$opcaoCategoria[] = "<option value=''  selected>Selecione</option>";
for($i = 0; $i < count($categoria); $i++){
    $opcaoCategoria[] = "<option value='". $categoria[$i]->title ."'>". $categoria[$i]->title ."</option>";
}

Form::sb_FormSelect('Categoria Animal', 'categoria_animal', $opcaoCategoria, '250px', true);


$opcaoRaca[] = "<option value=''  selected>Selecione</option>";
for($i = 0; $i < count($raca); $i++){
    $opcaoRaca[] = "<option value='". $raca[$i]->title ."'>". $raca[$i]->title ."</option>";
}

Form::sb_FormSelect('Raça animal', 'raca', $opcaoRaca, '250px', true);

$opcaoFinalidade[] = "<option value=''  >Selecione</option>";
$opcaoFinalidade[] = "<option value='Compra'  >Compra</option>";
$opcaoFinalidade[] = "<option value='À Venda'  >Venda</option>";
Form::sb_FormSelect('Finalidade', 'finalidade_tipo', $opcaoFinalidade, '250px', true);


Form::sb_FormDates('Data nascimento', 'data_nascimento', 'Data de nascimento do animal', '250px', '', false);

Form::sb_FormText('Idade', 'idade', 'Defina um idade', '250px', '', false);

Form::sb_FormText('Peso', 'peso', 'Defina um peso', '250px', '', false);

$opcaoSexo[] = "<option value=''  selected>Selecione</option>";
$opcaoSexo[] = "<option value='Macho'>Macho</option>";
$opcaoSexo[] .= "<option value='Fêmea' >Fêmea</option>";
Form::sb_FormSelect('Sexo', 'sexo', $opcaoSexo, '250px', false);

Form::sb_FormText('Pelagem', 'pelagem', 'Defina uma pelagem ', '250px', '', false);

$opcaoCriacao[] = "<option value=''  selected>Selecione</option>";
$opcaoCriacao[] = "<option value='Haras'>Haras</option>";
$opcaoCriacao[] .= "<option value='Fazenda' >Fazenda</option>";
Form::sb_FormSelect('Criação', 'criacao', $opcaoCriacao, '250px', false);

$opcaoTipoAnimal[] = "<option value=''  selected>Selecione</option>";
$opcaoTipoAnimal[] = "<option value='Reprodutor'>Reprodutor</option>";
$opcaoTipoAnimal[] .= "<option value='Matriz' >Matriz</option>";
$opcaoTipoAnimal[] .= "<option value='Potro' >Potro</option>";
Form::sb_FormSelect('Tipo Animal', 'tipo_animal', $opcaoTipoAnimal, '250px', false);

$opcaoVacinacao[] = "<option value=''  selected>Selecione</option>";
$opcaoVacinacao[] .= "<option value='Sim' >Sim</option>";
$opcaoVacinacao[] .= "<option value='Não' >Não</option>";
Form::sb_FormSelect('Vacinação', 'vacinacao', $opcaoVacinacao, '250px', false);

$opcaoFinalidade[] = "<option value=''  selected>Selecione</option>";
$opcaoFinalidade[] .= "<option value='Corte' >Corte</option>";
$opcaoFinalidade[] .= "<option value='Leitero' >Leitero</option>";
Form::sb_FormSelect('Finalidade', 'finalidade', $opcaoFinalidade, '250px', false);

Form::sb_FormText('Lactação', 'lactacao', 'Defina os dias de lactação ', '250px', '', false);

Form::sb_FormText('Quantidade', 'qtd', 'Defina uma quantidade ', '250px', '', false);

Form::sb_FormMoney('Valor unitário', 'valor_unitario', 'Escreva o valor unitário', '250px','', false);

Form::sb_FormTextHtml('Observações', 'observacoes', 'Escreva as observações em relação ao animal', '', false);

$opcaoDestaque[] = "<option value='1'  selected>Sim</option>";
$opcaoDestaque[] .= "<option value='0' >Não</option>";
Form::sb_FormSelect('Destaque', 'destaque', $opcaoDestaque, '250px', true);

$opcaoStatus[] = "<option value='1'  selected>Ativo</option>";
$opcaoStatus[] .= "<option value='0' >Inativo</option>";
Form::sb_FormSelect('Status', 'status', $opcaoStatus, '250px', true);

Form::sb_FormDate('Data início exibição', 'begin_date', 'Data inícial que o conteúdo será exibido', '289px', '', false);

Form::sb_FormDate('Data final exibição', 'end_date', 'Data final máxima que o conteúdo será exibido', '289px', '', false);

Form::sb_FormSubmit('Salvar', 'sistema/salvar-animal', '');

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


