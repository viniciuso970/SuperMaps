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
                $template = new Template("view/Telas/ConsultaMapa.tpl");
                for ($i = 0; $i < $altura; $i++) {
                    $table .= '<tr>';
                    for ($j = 0; $j < $largura; $j++) {
                        $table .= '<th> <a href="#"> Adicionar Prateleira </a> </th>';
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
