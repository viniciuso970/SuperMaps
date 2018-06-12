<?php

class ConsultaProduto
{
    public function controller()
    {
        try {
            $registro = Lista::pegaTabela("produto");
            if ($registro) {
		$tabela = new Template("view/Produto/ConsultaProduto.tpl");
		foreach($registro as $produto) {
			$linha = new Template("view/Produto/ConsultaProdutoLinha.tpl");
			$linha->set("nome", $produto["nome"]);
			$linha->set("preco", $produto["preco"]);
			$linha->set("id", $produto["id"]);
			$linhas[] = $linha;
		}
		$tabela->set("tabela", Template::juntar($linhas));
                $retorno["erro"] = false;
                $retorno["msg"] = $tabela->saida();
            } else {
                $retorno["erro"] = true;
                $retorno["msg"] = "Não existe Produto cadastrado\n";
            }
        } catch (Exception $ex) {
            $retorno["erro"] = true;
            $retorno["msg"] = "Erro ao visualizar o Produto\n" . $ex->getMessage() . "\n";
        }
        return $retorno;
    }
}
