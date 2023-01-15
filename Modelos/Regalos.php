<?php 
    require_once('conexion.php');

    class Regalos {
        
        protected $_conexion;

        
        public function __construct(){
            $this->_conexion = Utils::conectar();
        }

     
        public function seleccionarTodosLosRegalos(){
            $sql = 'SELECT * FROM regalosNinos';
            return $this->_conexion->query($sql);
        }

       
        public function seleccionarRegalo($id){
            $sql = 'SELECT * FROM regalosNinos WHERE id = '.(int)$id;
            $filas = $this->_conexion->query($sql);
            if((int)$filas->num_rows){
                $fila = $filas->fetch_assoc();
            }else{
                $fila = null;
            }

            return $fila;
        }

      
        public function insertarRegalos($dato){
            if(empty($dato['nombreRegalo']))
            {
                throw new Exception('el campo nombre no puede estar vacio.');
            }
            if(!isset($dato['precioRegalo'])){
                $dato['precioRegalo'] = null;
            }
            if(!isset($dato['idReyMago'])){
                $dato['idReyMago'] = null;
            }

            $sql = 'INSERT INTO regalosninos (nombreRegalo, precioRegalo, idReyMago) VALUES ("'.$dato['nombreRegalo'].'", "'.$dato['precioRegalo'].'", "'.$dato['idReyMago'].'")';

            $this->_conexion->query($sql);

            return $this->_conexion->insert_id;
        }

        public function ModificarRegalos($dato){
            if(empty($dato['id']))
            {
                throw new Exception('indique la fila.');
            }
            if(empty($dato['nombreRegalo']))
            {
                throw new Exception('el campo nombre no puede estar vacio.');
            }
            if(!isset($dato['precioRegalo'])){
                $dato['precioRegalo'] = null;
            }
            if(!isset($dato['idReyMago'])){
                $dato['idReyMago'] = null;
            }

            $sql = 'UPDATE regalosninos SET nombreRegalo = "'.$dato['nombreRegalo'].'", precioRegalo = "'.$dato['precioRegalo'].'", idReyMago = "'.$dato['idReyMago'].'" WHERE id = '.(int)$dato['id'];

            $this->_conexion->query($sql);
            return (int)$dato['id'];
        }

     
        public function BorrarRegalos($id){
            $sql = 'DELETE FROM regalosNinos WHERE id = '.(int)$id;
            return $this->_conexion->query($sql);
        }

    }

?>