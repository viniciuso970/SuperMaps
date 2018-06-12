<?php
class Remove {
    public static function removeListaPorId($tabela, $coluna, $id) {
	try {
		ORM::for_table($tabela)->where_equal($coluna, $id)->delete_many();
		$retorno["erro"] = false;
		$retorno["msg"] = "Produto removido das Prateleiras\n";
	} catch (Exception $ex) {
		$retorno["erro"] = true;
		$retorno["msg"] = "Erro de remoção dos produtos das prateleiras\n".$ex->getMessage()."\n";
	}
	return $retorno;
    }

    public static function removePorId($tabela, $id) {
        try {
            $registro = ORM::for_table($tabela)->find_one($id);
            if($registro) {
                $registro->delete();
                $retorno["erro"] = false;
                $retorno["msg"] = "Removido com sucesso";
            } else {
                $retorno["erro"] = true;
                $retorno["msg"] = "Nenhum valor removido!";
            }
        } catch (Exception $ex) {
            $retorno["erro"] = true;
            $retorno["msg"] = "Erro de remoção\n".$ex->getMessage()."\n";
        }
        return $retorno;
    }

    public static function removePessoaPorId($tabela, $id, $idUsuario) {
        $retorno = Remove::removePorId($tabela, $id);
        if(!$retorno["erro"]) {
            $retorno = Remove::removePorId("usuario", $idUsuario);
        }
        return $retorno;
    }
}
?>
