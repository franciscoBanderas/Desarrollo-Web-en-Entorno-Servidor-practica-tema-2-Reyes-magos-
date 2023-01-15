<?php 
    require_once('conexion.php');

    class Reyes {
        
        protected $_conexion;


        public function __construct(){
            $this->_conexion = Utils::conectar();
        }

       
        public function seleccionarTodos(){
            $sql = 'SELECT * FROM pedidos';
            return $this->_conexion->query($sql);
        }


        public function seleccionarPedidosReyMago($idReyMago){
            $sql = 'SELECT pedidosninos.idNino, pedidosninos.idRegalo, regalosninos.nombreRegalo, regalosninos.precioRegalo, regalosninos.idReyMago FROM pedidosninos INNER JOIN regalosninos ON pedidosninos.idRegalo = regalosninos.id WHERE idReyMago = '.(int)$idReyMago . ' ORDER BY pedidosninos.idNino';

            return $this->_conexion->query($sql);
        }

    }

?>