<?php

class PerfilUsuario {
    public function controller() {
        try {
            $perfil= new Template("view/Usuario/EditaUsuario.tpl");
            ControlaSessao::iniciaSessao();
            if(!isset($_SESSION["nivel"])) {
                $retorno["erro"] = true;
                $retorno["msg"] = "Nenhum usuário logado";
            }
            
            $id = $_SESSION["id"];
            $tabela = "usuario";
            
            $resultado = Lista::buscaPorId($id, $tabela);
            if(!$resultado["erro"]) {
                $registro = $resultado["msg"];
                $perfil->set("id", $registro["id"]);
                $perfil->set("usuario", $registro["usuario"]);
                $perfil->set("email", $registro["email"]);
                
                $retorno["erro"] = false;
                $retorno["msg"] = $perfil->saida();
            } else {
                $retorno["erro"] = true;
                $retorno["msg"] = "Erro de processamento\n".$listaDados["msg"]."\n";
            }
        } catch (Exception $ex) {
            $retorno["erro"] = true;
            $retorno["msg"] = "Erro de processamento\n";
        }
        return $retorno;
    }
}

?>