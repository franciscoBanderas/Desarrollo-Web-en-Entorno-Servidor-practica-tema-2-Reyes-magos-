<?php 
    require_once('conexion.php');

    class Pedidos {
        
        protected $_conexion;

        
        public function __construct(){
            $this->_conexion = Utils::conectar();
        }

   
        public function seleccionarTodos(){
            $sql = 'SELECT * FROM pedidos';
            return $this->_conexion->query($sql);
        }

     
        public function seleccionarPedidosDe($idNino){
            $sql = 'SELECT pedidosninos.idRegalo, regalosninos.nombreRegalo, regalosninos.precioRegalo FROM pedidosninos INNER JOIN regalosninos ON pedidosninos.idRegalo = regalosninos.id WHERE idNino = '.(int)$idNino;
            return $this->_conexion->query($sql);
        }

    
        public function insertar($dato){
            if(empty($dato['idNino']))
            {
                throw new Exception('Campo idNino no existe.');
            }
            if(empty($dato['idRegalo']))
            {
                throw new Exception('Campo idRegalo no existe.');
            }
            
            $sql = 'INSERT INTO pedidosNinos (idNino, idRegalo) VALUES ("'.$dato['idNino'].'", "'.$dato['idRegalo'].'")';

            $this->_conexion->query($sql);

            return $this->_conexion->insert_id;
        }


    }

?>