<?php

class InsereUsuario {
    public function controller() {
        try {
            $usuario = ORM::for_table("usuario")->create();
            $usuario->usuario = $_POST["usuario"];
            $usuario->email = $_POST["email"];
            $usuario->senha = $_POST["senha"];
            $usuario->save();
            $retorno["erro"] = false;
            $retorno["msg"] = "Usuário criado com sucesso!\n";
            
        } catch (Exception $ex) {
            $retorno["erro"] = true;
            $retorno["msg"] = "Erro ao inserir o usuário\n".$ex->getMessage()."\n";
        }
        return $retorno;
    }
}

?>
