$('#salvar').click(function () {

    $.ajax({
        type: 'POST',
        url: 'salvar',
        data: {
            '_token': $('input[name=_token]').val(),
            'titulo': $('input[name=titulo]').val(),
            'conteudo': $('textarea[name=conteudo]').val(),
            'categoria': $('input[name=categoria]').val(),
            'autor': $('input[name=autor]').val(),
            'palavras_chave': $('input[name=palavras_chave]').val()
        },
        success: function(data){
            if((data.errors)){
                $('#mensagem').addClass('alert alert-error');
            }else{
                $('#mensagem').addClass('alert alert-success');
                $('#mensagem').text(data);
            }
        }
    });

});