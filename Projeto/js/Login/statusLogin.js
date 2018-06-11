// Nivel de acesso:
/*
 * Admin = 0
 * Professor = 1
 * Estudante = 2
 * 
 * Admin = Estudantes, Professor, Relat�rio de Quest�es
 * Professor = Estudantes
 * Estudante = Gerar Teste
 */

jQuery(".btnLogin").click(function(e) {
    // Previne que o browser abra o link
    e.preventDefault(); 

    // Encontra os elementos do html
    var $modalLogin = $("#modalLogin");
    var $formLogin = $modalLogin.find("form");

    // Define a ação do PHP
    $formLogin.attr("action", "LoginUsuario");

    // Limpa o formulário e mostra 
    $formLogin.trigger("reset");
    $modalLogin.modal("show");
});

function status() {
    var retornoStatus = null;
    jQuery.ajax({
        url: "class/index.php?acao=LoginUsuario",
        data: {"status": ""},
        type: 'POST',
        success: function (retornoLogin) {
            var retornoLogin = JSON.parse(retornoLogin);
            retornoStatus = retornoLogin;
        },
        async: false
    });
    return retornoStatus;
}

$("#formLogin").submit(function(e) {
    e.preventDefault();
    var dados = $("#formLogin").serialize();
    var acao = $("#formLogin").attr("action");
    $("#modalLogin").modal("hide");
    $.ajax({
        url: "class/index.php?acao="+acao,
        data: dados,
        type: 'POST',
        success: function (retornoPost) {
            var retornoPost = JSON.parse(retornoPost);
            if(!retornoPost.erro) {
                setTimeout(function() { window.location.replace("index.php?acao=ConsultaMapa")}, 2000);
            } else {
                jQuery("#status .modal-title").html("Erro");
                jQuery("#status .modal-body").html(retornoPost.msg);
                jQuery("#status").modal("show");
            }
            //alert(retornoPost.msg);
        },
        async: false
    });
    $("#formLogin").trigger("reset");
    $("#formLogin").modal("hide");
    $("#modalLogin").find("form").attr("action", "");
});

jQuery(".btnLogout").click(function(e) {
    e.preventDefault();
    jQuery.ajax({
        url: "class/index.php?acao=Logout",
        data: "",
        type: "POST",
        success: function (retornoLogout) {
            var retornoLogout = JSON.parse(retornoLogout);
            jQuery("#status .modal-title").html("Logout");
            jQuery("#status .modal-body").html(retornoLogout.msg);
            jQuery("#status").modal("show");
        },
        async: false
    });
    setTimeout(function() {
        window.location.replace("index.php")
    }, 2000);
});

jQuery(".btnStatus").click(function(e) {
    e.preventDefault();
});