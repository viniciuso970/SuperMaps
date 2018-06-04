<?php

class EditaPerfilUsuario {

    public function controller() {
        ControlaSessao::iniciaSessao();
        // IMPORTANTE, ALTERAR, PARA VERIFICAÇAO CORRETA
        $id = $_SESSION["id"];
        $resultado = Lista::buscaPorId($id, "usuario");
        if(!$resultado["erro"]) {
            $usuarioLogado = $resultado["msg"];
            
            $id = $usuarioLogado["id"];
            $idUsuarioLogado = $id;
            $tabela = "usuario";
            $resultado = Lista::buscaPorId($id, $tabela);
            $usuarioLogado = $resultado["msg"];
            
            if($usuarioLogado["senha"] !== $_POST["senhaAtual"]) {
                $retorno["erro"] = true;
                $retorno["msg"] = "Senha incorreta";
                return $retorno;
            }
        } else {
            $retorno["erro"] = true;
            $retorno["msg"] = "Usuário não encontrado";
            return $retorno;
        }
        $campos = array("email", "senha");
        $id = $_POST["id"];
        $valores = array();
        foreach($campos as $campo) {
            $valores[$campo] = $_POST[$campo];
        }
        
        $retorno = Altera::alterarRegistro("usuario", $id, $valores);
        
        if(!$retorno["erro"]) {
            $tabela = "usuario";
            $id = $idUsuarioLogado;
            $campos = array("email", "senha");
            $valores = array();
            foreach($campos as $campo) {
                if($campo == "senha") {
                    if($_POST["senhaNova"] != "") {
                        $valores[$campo] = $_POST["senhaNova"];
                    } else {
                        $valores[$campo] = $_POST["senhaAtual"];
                    }
                } else {
                    $valores[$campo] = $_POST[$campo];
                }
            }
            $retorno = Altera::alterarRegistro($tabela, $id, $valores);
        }
        return $retorno;
    }
}

?>