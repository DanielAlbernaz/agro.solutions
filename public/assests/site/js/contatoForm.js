function mask(o, f) {
    setTimeout(function() {
      var v = mphone(o.value);
      if (v != o.value) {
        o.value = v;
      }
    }, 1);
  }
  function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

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

function formularioContato(){

    if(validateEmail($('#email').val()) == true){
        if($('#telefone').val().length > 13){
            if($('#nome').val() != '' && $('#email').val() != '' && $('#telefone').val() != ''  && $('#mensagem').val() != '' ){


                Swal.fire({
                    icon: 'info',
                    title: 'Aguarde !',
                    text: 'Estamos enviando seu contato!'
                })


                jQuery.ajax({
                    url:  'envia-contato',
                    type: "POST",
                    dataType: "JSON",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: $('#frmContato').serialize(),
                    success: function( data )
                    {
                        if(data.situacao == 'success'){
                            Swal.fire({
                                icon: 'success',
                                title: 'Sucesso',
                                text: 'Recebemos seu contato!'
                            })

                            setTimeout(function() {
                                window.location.reload();
                            }, 3000);

                        }
                        if(data.situacao == 'error'){
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: data.msg
                            })
                        }
                    }
                });
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Preencha todos os campos do fomrmulário!'
                })
            }
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Preencha um telefone correto!'
              })
        }
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Preencha um email válido!'
          })
    }
}

function copiarTexto() {
    var textoCopiado = document.getElementById("link");
    textoCopiado.select();
    document.execCommand("Copy");
  }
