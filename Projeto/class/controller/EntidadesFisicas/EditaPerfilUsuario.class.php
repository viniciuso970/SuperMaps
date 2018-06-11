<?php

class EditaPerfilUsuario {

    public function controller() {
        ControlaSessao::iniciaSessao();
        // IMPORTANTE, ALTERAR, PARA VERIFICAÇAO CORRETA
        $id = $_SESSION["id"];
        $resultado = Lista::buscaPorId($id, "usuario");
        $usuarioLogado = $resultado["msg"];
        if(!$resultado["erro"]) {
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
        $id = $_POST["id"];
        $valores = array();
        $valores["usuario"] = $_POST["nome"];
        $valores["email"] = $_POST["email"];
        $valores["senha"] = $_POST["senhaNova"];
        $retorno = Altera::alterarRegistro("usuario", $id, $valores);
        return $retorno;
    }
}

?>