<?php

class FormEditaPrateleira {
    public function controller(){
        $template = new Template("view/Prateleira/EditaPrateleira.tpl");
        $consulta = ORM::for_table("prateleira")->find_array();;
        $prateleira = $consulta[0];
        $andar = $prateleira["andar"];
        $produtoAndar = $prateleira["produtoAndar"];
        $template->set("andar", $andar);   
        $template->set("produtoAndar", $produtoAndar);
        $retorno["erro"] = false;
        $retorno["msg"] = $template->saida();
        return $retorno;
    }
}

?>