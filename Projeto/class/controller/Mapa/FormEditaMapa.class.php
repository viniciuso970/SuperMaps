<?php

class FormEditaMapa {
    public function controller(){
        $template = new Template("view/Mapa/EditaMapa.tpl");
        $consulta = ORM::for_table("mapa")->find_array();;
        $mapa = $consulta[0];
        $altura = $mapa["altura"];
        $largura = $mapa["largura"];
        $template->set("altura", $altura);   
        $template->set("largura", $largura);
        $retorno["erro"] = false;
        $retorno["msg"] = $template->saida();
        return $retorno;
    }
}

?>