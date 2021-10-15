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

Form::sb_FormBegin('Cadastro de notícias do blog', 'validation');

Form::sb_FormText('Título', 'title', 'Defina um título', '250px', '', true);

// $opcaoCategoria[] = "<option value=''  selected>Selecione</option>";
// for($i = 0; $i < count($categoria); $i++){
//     $opcaoCategoria[] = "<option value='". $categoria[$i]->id ."'>". $categoria[$i]->title ."</option>";
// }
// Form::sb_FormSelect('Categoria', 'categoria', $opcaoCategoria, '250px', true);

Form::sb_FormCropImage('Imagem destaque (1200px X 800px)', '', true);

Form::sb_FormTextHtml('Texto', 'text', 'Escreva a notícia do blog', '', true);

$opcaoDestaque[] = "<option value='1'  selected>Sim</option>";
$opcaoDestaque[] .= "<option value='0' >Não</option>";
Form::sb_FormSelect('Destaque', 'destaque', $opcaoDestaque, '250px', true);

$opcaoStatus[] = "<option value='1'  selected>Ativo</option>";
$opcaoStatus[] .= "<option value='0' >Inativo</option>";
Form::sb_FormSelect('Status', 'status', $opcaoStatus, '250px', true);

Form::sb_FormDate('Data início exibição', 'begin_date', 'Data inícial que o conteúdo será exibido', '289px', '', false);

Form::sb_FormDate('Data final exibição', 'end_date', 'Data final máxima que o conteúdo será exibido', '289px', '', false);

Form::sb_FormSubmit('Salvar', 'sistema/salvar-blog', '');

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


