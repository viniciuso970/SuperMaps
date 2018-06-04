<?php

class FormEditaPrateleira {
    public function controller(){
        $template = new Template("view/Prateleira/EditaPrateleira.tpl");
        $posY = $_GET["posY"];
        $posX = $_GET["posX"];    
        $template->set("andar", $posX);   
        $template->set("produtoAndar", $posY);
        $retorno["erro"] = false;
        $retorno["msg"] = $template->saida();
        return $retorno;
    }
}

?>