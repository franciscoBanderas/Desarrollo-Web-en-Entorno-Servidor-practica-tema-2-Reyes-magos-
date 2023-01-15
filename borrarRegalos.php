<?php 
    if(!empty($_GET['id'])){
        require_once('modelos/Regalos.php');
        $modeloRegalos = new Regalos();
        $idRegalo = (int) filter_input(INPUT_GET, 'id');
        $modeloRegalos->borrarRegalos($idRegalo);
        header('Location:regalosNinos.php');
}
?>