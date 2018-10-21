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
        success: function (data) {
            if (data.errors) {
                $('#mensagem').removeClass('alert alert-success');
                $('#mensagem').addClass('alert alert-danger');
                $('#mensagem').text(data['errors']);
            } else {
                $('#titulo').val('');
                $('#conteudo').val('');
                $('#categoria').val('');
                $('#autor').val('');
                $('#palavras_chave').val('');
                $('#mensagem').removeClass('alert alert-danger');
                $('#mensagem').addClass('alert alert-success');
                $('#mensagem').text(data);
            }
        }
    });

});

$('#alterar').click(function () {

    $.ajax({
        type: 'POST',
        url: 'alterar',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $('input[name=id]').val(),
            'titulo': $('input[name=titulo]').val(),
            'conteudo': $('textarea[name=conteudo]').val(),
            'categoria': $('input[name=categoria]').val(),
            'autor': $('input[name=autor]').val(),
            'palavras_chave': $('input[name=palavras_chave]').val()
        },
        success: function (data) {
            if (data.errors) {
                $('#mensagem').removeClass('alert alert-success');
                $('#mensagem').addClass('alert alert-danger');
                $('#mensagem').text(data['errors']);
            } else {
                $('#titulo').val('');
                $('#conteudo').val('');
                $('#categoria').val('');
                $('#autor').val('');
                $('#palavras_chave').val('');
                $('#mensagem').removeClass('alert alert-danger');
                $('#mensagem').addClass('alert alert-success');
                $('#mensagem').text(data);
            }
        }
    });

});

$('#deletar').on('click', function () {
    
    let id = $('#id').val();
        
    $.ajax({
        type: 'POST',
        url: 'deletar',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': id
        },
        success: function (data) {
            if (data.errors) {
                $('#mensagem').addClass('alert alert-error');
                $('#mensagem').text(data);
            } else {
                $('.noticia-'+id).remove();
                $('#mensagem').addClass('alert alert-success');
                $('#mensagem').text(data);
            }
        }
    });

});

$('#modalConfirmar').on('show.bs.modal', function (event){
    var botao = $(event.relatedTarget);
    var noticia = botao.data('whatever');
    var modal = $(this);
    modal.find('.modal-body').text('Deseja realmente deletar a Notícia ' + noticia['titulo'] + '?');
    $('#id').attr('value', noticia['id']);
});