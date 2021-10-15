
const pathSite = window.location.origin + '/';

/* Máscaras ER */
function mask(o, f) {
    setTimeout(function() {
      var v = mphone(o.value);
      if (v != o.value) {
        o.value = v;
      }
    }, 1);
  }



  $(document).ready(function(){
	$("#cep").mask("99.999-999");
});

  function mphone(v) {
    var r = v.replace(/\D/g, "");
    r = r.replace(/^0/, "");
    if (r.length > 10) {
      r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
    } else if (r.length > 5) {
      r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
    } else if (r.length > 2) {
      r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
    } else {
      r = r.replace(/^(\d*)/, "($1");
    }
    return r;
  }

function mesages(status, msg){

    if(status == 'success'){
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 4000
        };
        toastr.success(msg);
    }

    if(status == 'error'){
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 4000
        };
        toastr.error(msg);
    }
}

function formularios(route){
    $("#validation").validate();

     if($("#validation").valid()){
        tinyMCE.triggerSave();

            jQuery.ajax({
                        url: pathSite + route,
                        type: "POST",
                        dataType: "JSON",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: $('#validation').serialize(),
                        success: function( data )
                        {
                            if(data.situacao == 'success'){

                                if(data.form == 'cad'){
                                    mesages('success', data.msg);
                                    setTimeout(function() {
                                        window.location.href = pathSite + data.redirect
                                    }, 1000);
                                }

                                if(data.form == 'alt'){
                                    mesages('success',  data.msg);
                                    setTimeout(function() {
                                        window.location.href = pathSite + data.redirect
                                    }, 1000);
                                }

                            }

                            if(data.situacao == 'error'){
                                if(data.form == 'alt'){
                                    mesages('error',  data.msg);
                                }

                                if(data.form == 'alt'){
                                    mesages('error',  data.msg);
                                    setTimeout(function() {
                                        window.location.href = pathSite + data.redirect
                                    }, 1000);
                                }
                            }
                        }
                    });




    }


}

function status(route, id){
    jQuery.ajax({
        url:  route,
        type: "POST",
        dataType: "JSON",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {id:id},
        success: function( data )
        {
            if(data.situacao == 'success'){
                mesages('success', 'Status alterado!');
                setTimeout(function() {
                    window.location.reload();
                  }, 1000);

            }
            if(data.situacao == 'error'){
                mesages('error', 'Erro ao alterar o status!');
            }
        }
    });
}

function deletar(route, id){
    var route = pathSite + route + '/' +  id;
    Swal.fire({
        title: 'Você tem certeza de deseja excluir?',
        text: "Pode ser irreversível!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, deletar!',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {

            jQuery.ajax({
                url: route,
                type: "POST",
                dataType: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {id:id},
                success: function( data )
                {
                    if(data.situacao == 'success'){
                        Swal.fire(
                            'Deletado!',
                            'Excluido com sucesso.',
                            'success'
                          )
                        setTimeout(function() {
                            window.location.reload();
                          }, 1000);

                    }
                    if(data.situacao == 'error'){
                        mesages('error', 'Erro ao alterar o status!');
                    }
                }
            });
        }
      })
}

function destroyImage(id)
{
    var quebra = id.split(',');
    var id = quebra[0];
    var route = quebra[1];

    var route = pathSite + route + '/' +  id;
    Swal.fire({
        title: 'Você tem certeza de deseja excluir?',
        text: "Pode ser irreversível!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, deletar!',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {

            jQuery.ajax({
                url: route,
                type: "POST",
                dataType: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {id:id},
                success: function( data )
                {
                    if(data.situacao == 'success'){
                        Swal.fire(
                            'Deletado!',
                            'Excluido com sucesso.',
                            'success'
                          )
                        setTimeout(function() {
                            window.location.reload();
                          }, 1000);

                    }
                    if(data.situacao == 'error'){
                        mesages('error', 'Erro ao alterar o status!');
                    }
                }
            });
        }
      })
}

$(document).ready(function(){
    $('.money').mask('000.000.000.000.000,00', {reverse: true});
  });
  $(".money").focusout(function(){
    if($(this).val().length <= 2){
      temp = $(this).val()
      var newNum = temp + ",00"
      $(this).val(newNum)
    }
  })


