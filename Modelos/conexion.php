<?php 

class Utils{
    public static function conectar(){
            $servidor = 'localhost';
            $usuario = 'root';
            $clave = '';
            $baseDeDatos = 'dws_pt2';
            
            $conexion = new mysqli($servidor, $usuario, $clave, $baseDeDatos);
            if (mysqli_connect_error()) {
                die('Error de Conexion (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
            }
            $conexion->set_charset('utf8');

            return $conexion;
    }
}


?>