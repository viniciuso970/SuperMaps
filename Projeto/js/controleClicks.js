function validarCampos($form) {
    var camposPreenchidos = true;

    // Verificar campos obrigatorios da form
    $form.find("input.obrigatorio").each(function () {
        if (!$(this).val()) {
            return camposPreenchidos = false;
        }
    });

    return camposPreenchidos;
}

$("#formAddMapa").submit(function (e) {
    // Previne que o browser abra o link
    e.preventDefault();
    // Encontra a form no html
    var $formInsere = $("#formAddMapa");

    // Verifica se todos os campos necessários foram preenchidos
    if (!validarCampos($formInsere)) {
        alert("Campo obrigatório não preenchido");
        return false;
    }

    // Monta o json com os dados da form
    var dados = $formInsere.serialize();


    // Define a ação do PHP
    var acao = $formInsere.attr("action");
    $.ajax({
        url: "class/index.php?acao=" + acao,
        data: dados,
        type: 'POST',
        success: function (retornoPost) {
            // Recebe a resposta e mostra se ocorreu erro ou não
            var retornoPost = JSON.parse(retornoPost);
            console.log(retornoPost);
            $("#status .modal-title").html(retornoPost.erro ? "Erro" : "Sucesso");
            $("#status .modal-body").html(retornoPost.msg);
            $("#status").modal("show");
        },
        async: false
    });
    setTimeout(function () {
        window.location.replace("index.php?acao=ConsultaMapa")
    }, 2000);
    return false;

});

$("#formAddPrateleira").submit(function (e) {
    // Previne que o browser abra o link
    e.preventDefault();
    // Encontra a form no html

    var $formInsere = $("#formAddPrateleira");

    var produto = $("#produtoAdd").val();
    var posX = getQueryVariable("posX");
    var posY = getQueryVariable("posY");
    //window.location.replace("index.php?acao=FormProdPrat&produto="+produto+"&posX="+posX+"&posY="+posY);
    $.ajax({
        url: "class/index.php?acao=FormProdPrat",
        data: {"produto" : produto,
                "posX" : posX,
                "posY" : posY},
        type: 'GET',
        success: function (retornoPost) {
            // Recebe a resposta e mostra se ocorreu erro ou não
            var retornoPost = JSON.parse(retornoPost);
            $("#status .modal-title").html(retornoPost.erro ? "Erro" : "Sucesso");
            $("#status .modal-body").html(retornoPost.msg);
            $("#status").modal("show");
        },
        async: false
    });
    setTimeout(function () {
        //window.location.replace("index.php?acao=ConsultaMapa")
        window.location = "index.php?acao=FormProdPrat&produto=0&posX="+posX+"&posY="+posY;
    }, 2000);
    //window.location.replace("index.php?acao=FormProdPrat&produto=0&posX="+posX+"&posY="+posY);
    return false;
});

$("#deletarPrateleira").click(function(e) {
    var posX = getQueryVariable("posX");
    var posY = getQueryVariable("posY");
    window.location.replace("index.php?acao=FormRemovePrateleira&posX="+posX+"&posY="+posY);
}
);

$("#formEditaMapa").submit(function (e) {
    // Previne que o browser abra o link
    e.preventDefault();
    // Encontra a form no html
    var $formInsere = $("#formEditaMapa");

    // Verifica se todos os campos necessários foram preenchidos
    if (!validarCampos($formInsere)) {
        alert("Campo obrigatório não preenchido");
        return false;
    }

    // Monta o json com os dados da form
    var dados = $formInsere.serialize();


    // Define a ação do PHP
    $.ajax({
        url: "class/index.php?acao=EditaMapa",
        data: dados,
        type: 'POST',
        success: function (retornoPost) {
            // Recebe a resposta e mostra se ocorreu erro ou não
            var retornoPost = JSON.parse(retornoPost);
            $("#status .modal-title").html(retornoPost.erro ? "Erro" : "Sucesso");
            $("#status .modal-body").html(retornoPost.msg);
            $("#status").modal("show");
        },
        async: false
    });
    setTimeout(function () {
        //window.location.replace("index.php?acao=ConsultaMapa")
        window.location = "index.php?acao=ConsultaMapa";
    }, 2000);
    return false;

});

$("#formEditaPrateleira").submit(function (e) {
    // Previne que o browser abra o link
    e.preventDefault();
    // Encontra a form no html
    var $formInsere = $("#formEditaPrateleira");

    // Verifica se todos os campos necessários foram preenchidos
    if (!validarCampos($formInsere)) {
        alert("Campo obrigatório não preenchido");
        return false;
    }
    var posX = getQueryVariable("posX");
    var posY = getQueryVariable("posY");
    // Monta o json com os dados da form
    var dados = $formInsere.serialize();

    // Define a ação do PHP
    $.ajax({
        url: "class/index.php?acao=EditaPrateleira&posX="+posX+"&posY="+posY,
        data: dados,
        type: 'POST',
        success: function (retornoPost) {
            // Recebe a resposta e mostra se ocorreu erro ou não
            var retornoPost = JSON.parse(retornoPost);
            $("#status .modal-title").html(retornoPost.erro ? "Erro" : "Sucesso");
            $("#status .modal-body").html(retornoPost.msg);
            $("#status").modal("show");
        },
        async: false
    });
    setTimeout(function () {
        window.location.replace("index.php?acao=ConsultaMapa")
    }, 2000);
    return false;

});

$("#removerMapa").submit(function (e) {
    // Previne que o browser abra o link
    e.preventDefault();

    var $formInsere = $("#removerMapa");

    // Monta o json com os dados da form
    var dados = $formInsere.serialize();


    $.ajax({
        url: "class/index.php?acao=RemoveMapa",
        data: dados,
        type: 'POST',
        success: function (retornoPost) {
            // Recebe a resposta e mostra se ocorreu erro ou não
            var retornoPost = JSON.parse(retornoPost);
            $("#status .modal-title").html(retornoPost.erro ? "Erro" : "Sucesso");
            $("#status .modal-body").html(retornoPost.msg);
            $("#status").modal("show");
        },
        async: false
    });
    setTimeout(function () {
        window.location.replace("index.php?acao=FormMapa")
    }, 2000);
    return false;
});

$("#removerPrateleira").submit(function (e) {
	e.preventDefault();
	var $formRemove = $("removerPrateleira");
	var dados = $formRemove.serialize();
    var posX = getQueryVariable("posX");
    var posY = getQueryVariable("posY");
    window.location.replace("index.php?acao=RemovePrateleira&posX="+posX+"&posY="+posY);
});

$("#editarPrateleira").click(function (e) {
	e.preventDefault();
	var $formRemove = $("editarPrateleira");
	var dados = $formRemove.serialize();
    var posX = getQueryVariable("posX");
    var posY = getQueryVariable("posY");
    window.location.replace("index.php?acao=FormEditaPrateleira&posX="+posX+"&posY="+posY);
});


$("#formAddProduto").submit(function (e) {
    // Previne que o browser abra o link
    e.preventDefault();
    // Encontra a form no html
    var $formInsere = $("#formAddProduto");

    // Verifica se todos os campos necessários foram preenchidos
    if (!validarCampos($formInsere)) {
        alert("Campo obrigatório não preenchido");
        return false;
    }

    // Monta o json com os dados da form
    var dados = $formInsere.serialize();


    // Define a ação do PHP
    var acao = $formInsere.attr("action");
    $.ajax({
        url: "class/index.php?acao=" + acao,
        data: dados,
        type: 'POST',
        success: function (retornoPost) {
            // Recebe a resposta e mostra se ocorreu erro ou não
            var retornoPost = JSON.parse(retornoPost);
            console.log(retornoPost);
            $("#status .modal-title").html(retornoPost.erro ? "Erro" : "Sucesso");
            $("#status .modal-body").html(retornoPost.msg);
            $("#status").modal("show");
        },
        async: false
    });
    setTimeout(function () {
        window.location.replace("index.php?acao=FormProduto")
    }, 2000);
    return false;
});

$(".editaProduto").click(function (e) {
    // Previne que o browser abra o link
    e.preventDefault();
    var id = $(this).attr("registro");
    window.location.replace("index.php?acao=FormEditaProduto&id="+id);
});

$("#formEditaProduto").submit(function (e) {
    // Previne que o browser abra o link
    e.preventDefault();
    // Encontra a form no html
    var $formEdita = $("#formEditaProduto");

    // Verifica se todos os campos necessários foram preenchidos
    if (!validarCampos($formEdita)) {
        alert("Campo obrigatório não preenchido");
        return false;
    }

    // Monta o json com os dados da form
    var dados = $formEdita.serialize();

    // Define a ação do PHP
    $.ajax({
        url: "class/index.php?acao=EditaProduto",
        data: dados,
        type: 'POST',
        success: function (retornoPost) {
            // Recebe a resposta e mostra se ocorreu erro ou não
            var retornoPost = JSON.parse(retornoPost);
            $("#status .modal-title").html(retornoPost.erro ? "Erro" : "Sucesso");
            $("#status .modal-body").html(retornoPost.msg);
            $("#status").modal("show");
        },
        async: false
    });
    setTimeout(function () {
        window.location.replace("index.php?acao=ConsultaProduto")
    }, 2000);
    return false;

});

$(".removeProduto").click(function (e){
    e.preventDefault();
    var id = $(this).attr("registro");
    $("#confirmaRemocao").modal("show");
    $("#sim").click(function (e) {
        $("#confirmaRemocao").modal("hide");
        $.ajax({
            url: "class/index.php?acao=RemoveProduto",
            data: {"id": id},
            type: 'POST',
            success: function (retornoPost) {
                // Recebe a resposta e mostra se ocorreu erro ou não
                var retornoPost = JSON.parse(retornoPost);
                $("#status .modal-title").html(retornoPost.erro ? "Erro" : "Sucesso");
                $("#status .modal-body").html(retornoPost.msg);
                $("#status").modal("show");
            },
            async: false
        });
        return false;
    });
    setTimeout(function () {
        window.location.replace("index.php?acao=ConsultaProduto")
    }, 2000);
    return false;
});

function getQueryVariable(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for(var i = 0; i< vars.length; i++) {
        var pair = vars[i].split("=");
        if(pair[0] == variable) {
            return pair[1];
        }
    }
    return false;
}
