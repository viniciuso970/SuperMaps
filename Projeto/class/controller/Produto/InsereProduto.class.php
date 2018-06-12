<?php

class InsereProduto {
    public function controller() {
        try {
	    $nome = $_POST["nome"];
	    $preco = $_POST["preco"];
            $existeProduto = Lista::verificaRegistro("produto", "nome", $nome);
            if($existeProduto) {
                $retorno["erro"] = true;
                $retorno["msg"] = "Erro ao criar o Produto, já existe um Produto com mesmo nome no sistema\n";
                return $retorno;
            }
            $produto = ORM::for_table("produto")->create();
            $produto->nome = $nome;
            $produto->preco = $preco;
            $produto->save();
            $retorno["erro"] = false;
            $retorno["msg"] = "Produto criado com sucesso";
        } catch (Exception $ex) {
            $retorno["erro"] = true;
            $retorno["msg"] = "Erro ao criar o Produto\n".$ex->getMessage()."\n";
        }
        return $retorno;
    }
}

?>
