$("#produtosListBusca").change(function (e) {
    // Previne que o browser abra o link
    e.preventDefault();

    $(".tem-prateleira").removeClass("tem-produto");

    // Monta o json com os dados da form
    var dados = $("#produtosListBusca").serialize();

    $.ajax({
        url: "class/index.php?acao=EncontraProduto",
        data: dados,
        type: 'POST',
        success: function (retornoPost) {
            // Recebe a resposta e mostra se ocorreu erro ou não
            var jsonRetorno = JSON.parse(retornoPost);
            $.each(jsonRetorno.msg, function(index, prateleira) {
                $(".x-"+prateleira.andar+".y-"+prateleira.produtoAndar).addClass("tem-produto");
            });
        },
        async: false
    });
});