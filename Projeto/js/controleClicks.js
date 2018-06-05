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
    window.location.replace("index.php?acao=FormProdPrat&produto="+produto+"&posX="+posX+"&posY="+posY);
});

$("#deletarPrateleira").click(function(e) {
    var posX = getQueryVariable("posX");
    var posY = getQueryVariable("posY");
    window.location.replace("index.php?acao=FormRemovePrateleira&posX="+posX+"&posY="+posY);
}
);

$("#formEditaPerfilUsuario").submit(function (e) {
    // Previne que o browser abra o link
    e.preventDefault();
    // Encontra a form no html
    var $formInsere = $("#formEditaPerfilUsuario");

    // Verifica se todos os campos necessários foram preenchidos
    if (!validarCampos($formInsere)) {
        alert("Campo obrigatório não preenchido");
        return false;
    }

    // Monta o json com os dados da form
    var dados = $formInsere.serialize();


    // Define a ação do PHP
    $.ajax({
        url: "class/index.php?acao=EditaPerfilUsuario",
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
        window.location.replace("index.php?acao=PerfilUsuario")
    }, 2000);
    return false;

});


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
        window.location.replace("index.php?acao=ConsultaMapa")
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

function recarregarLista() {
    if (location.search.includes("acao=Lista")) {
        setTimeout(location.reload(), 2000);
    }
}
