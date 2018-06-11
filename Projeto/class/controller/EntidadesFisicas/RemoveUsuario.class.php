<?php

class RemoveUsuario {
    public function controller() {
        $id = $_GET["id"];
        return Remove::removePorId("usuario", $_GET["id"]);
    }
}

?>