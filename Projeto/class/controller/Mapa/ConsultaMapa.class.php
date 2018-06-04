<?php

class ConsultaMapa
{
    public function controller()
    {
        try {
            $consulta = ORM::for_table("mapa")->find_array();
            if ($consulta) {
                $mapa = $consulta[0];
                $altura = $mapa["altura"];
                $largura = $mapa["largura"];
                $table = "";
		$consultaPrateleira = ORM::for_table("prateleira")->find_array();
		if($consultaPrateleira) {
			$prateleira = $consultaPrateleira[0];
			$andar = $prateleira["andar"];
			$produtoAndar = $prateleira["produtoAndar"];
			$texto = "(".$andar.",".$produtoAndar.")";
			$title = "(Andar,Produto)";
		} else {
			$texto = "Adicionar Prateleira";
			$title = "É necessário adicionar uma Prateleira";
		}
                $template = new Template("view/Mapa/ConsultaMapa.tpl");
                for ($i = 0; $i < $altura; $i++) {
                    $table .= '<tr>';
                    for ($j = 0; $j < $largura; $j++) {
                        $table .= '<td posX='.$i.' posY='.$j.' id="verPrateleira"> <a href="#" title='.$title.'> '.$texto .'</a> </td>';
                    }
                    $table .= '</tr>';
                }
                $template->set("tabela", $table);
                $retorno["erro"] = false;
                $retorno["msg"] = $template->saida();
            } else {
                $retorno["erro"] = true;
                $retorno["msg"] = "Não existe mapa cadastrado\n";
            }
        } catch (Exception $ex) {
            $retorno["erro"] = true;
            $retorno["msg"] = "Erro ao visualizar o mapa\n" . $ex->getMessage() . "\n";
        }
        return $retorno;
    }
}
