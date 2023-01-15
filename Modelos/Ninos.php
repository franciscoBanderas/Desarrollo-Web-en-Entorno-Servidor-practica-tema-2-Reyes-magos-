<?php 
    require_once('conexion.php');

    class Ninos {
        
        protected $_conexion;

      
        public function __construct(){
            $this->_conexion = Utils::conectar();
        }

        public function seleccionarTodos(){
            $sql = 'SELECT * FROM ninos';
            return $this->_conexion->query($sql);
        }

       
        public function seleccionarBuenos(){
            $sql = 'SELECT * FROM ninos WHERE buenComportamientoNino = "Si"';
            return $this->_conexion->query($sql);
        }

       
        public function seleccionar($id){
            $sql = 'SELECT * FROM ninos WHERE id = '.(int)$id;
            $filas = $this->_conexion->query($sql);
            if((int)$filas->num_rows){
                $fila = $filas->fetch_assoc();
            }else{
                $fila = null;
            }

            return $fila;
        }

  
        public function insertarNinos($dato){
            if(empty($dato['nombreNino']))
            {
                throw new Exception('Debe rellenar el campo de NOMBRE.');
            }
            if(!isset($dato['apellidosNino'])){
                $dato['apellidosNino'] = null;
            }
            if(!isset($dato['fechaNacimientoNino'])){
                $dato['fechaNacimientoNino'] = null;
            }
            if(!isset($dato['buenComportamientoNino'])){
                $dato['buenComportamientoNino'] = null;
            }

            $sql = 'INSERT INTO ninos (nombreNino, apellidosNino, fechaNacimientoNino, buenComportamientoNino) VALUES ("'.$dato['nombreNino'].'", "'.$dato['apellidosNino'].'", "'.$dato['fechaNacimientoNino'].'", "'.$dato['buenComportamientoNino'].'")';

            $this->_conexion->query($sql);

            return $this->_conexion->insert_id;
        }

     
        public function modificarNinos($dato){
            if(empty($dato['id']))
            {
                throw new Exception('este campo no puede estar vacio.');
            }
            if(empty($dato['nombreNino']))
            {
                throw new Exception('este campo no puede estar vacio.');
            }
            if(!isset($dato['apellidosNino'])){
                $dato['apellidosNino'] = null;
            }
            if(!isset($dato['fechaNacimientoNino'])){
                $dato['fechaNacimientoNino'] = null;
            }
            if(!isset($dato['buenComportamientoNino'])){
                $dato['buenComportamientoNino'] = null;
            }

            $sql = 'UPDATE ninos SET nombreNino = "'.$dato['nombreNino'].'", apellidosNino = "'.$dato['apellidosNino'].'", fechaNacimientoNino = "'.$dato['fechaNacimientoNino'].'", buenComportamientoNino = "'.$dato['buenComportamientoNino'].'" WHERE id = '.(int)$dato['id'];

            $this->_conexion->query($sql);
            return (int)$dato['id'];
        }

   
        public function borrarNinos($id){
            $sql = 'DELETE FROM ninos WHERE id = '.(int)$id;
            return $this->_conexion->query($sql);
        }

    }

?>