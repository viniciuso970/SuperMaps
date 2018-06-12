<?php

class FormEditaProduto {
    public function controller(){
        $template = new Template("view/Produto/EditaProduto.tpl");
        $registro = Lista::buscaPorId($_GET["id"], "produto");
	$registro = $registro["msg"];
	$nome = $registro["nome"];
	$preco = $registro["preco"];
	$id = $_GET["id"];
        $template->set("nome", $nome);
        $template->set("preco", $preco);
	$template->set("id", $id);
        $retorno["erro"] = false;
        $retorno["msg"] = $template->saida();
        return $retorno;
    }
}

?>
