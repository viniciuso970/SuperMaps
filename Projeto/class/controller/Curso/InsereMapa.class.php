<?php

class InsereMapa {
    public function controller() {
        try {
	    $tabela = "mapa";
	    $existeMapa = Lista::verificarMapa($tabela);
	    if($existeMapa) {
		$retorno["erro"] = true;
		$retorno["msg"] = "Erro ao criar o Mapa, já existe um Mapa no sistema\n";
		return $retorno;
	    }
            $mapa = ORM::for_table("mapa")->create();
            $mapa->largura = $_POST["largura"];
            $mapa->altura = $_POST["altura"];
            $mapa->save();
            $retorno["erro"] = false;
            $retorno["msg"] = "Mapa criado com sucesso";
        } catch (Exception $ex) {
            $retorno["erro"] = true;
            $retorno["msg"] = "Erro ao criar o Mapa\n".$ex->getMessage()."\n";
        }
        return $retorno;
    }
}

?>
