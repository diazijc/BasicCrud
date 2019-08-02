<?php
//error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
//ini_set('display_errors', '1');


class ConexionMySQL extends PDO{

        public function __construct($dbhost = '127.0.0.1', $dbname = 'crud', $dbuser = 'root', $dbpass = '123456', $dbtype = 'mysql') {
        
	    try {
 
            $this->dbh = parent::__construct($dbtype . ':host=' . $dbhost . ';dbname=' . $dbname, $dbuser, $dbpass);
 
	    } catch(PDOException $e) {
 
	        echo  $e->getMessage();
	    }
 
	}
        

    public function close_con(){

        $this->dbh = null; 

    } 

	function ejecutar($query){
            try{
                $this->con = new ConexionMySQL();
		        $resultado = $this->con->prepare($query);
                $resultado->execute();
                $this->con->close_con();

                return $resultado;

            } catch(PDOException $e) {
 
	        echo  $e->getMessage(); 
 
	    }                
	}

	function cantidad($recurso){
            $cantidad = $recurso->rowCount();
            $this->con->close_con();
            
            return $cantidad;
	}
	
	function Arreglo($recurso){
            $arreglo = $recurso->fetchAll();
            //$this->con->close_con();
            return $arreglo;
	}
        

    function ruta(){
        if ($_SERVER['HTTP_HOST']=='localhost'){
        return 'http://'.$_SERVER['HTTP_HOST'].'/crud/';
        }else{
            return 'http://'.$_SERVER['HTTP_HOST'].'/crud/';
        }
    }
	
    function rutAbsoluta(){
        if ($_SERVER['HTTP_HOST']=='localhost'){		
        return $_SERVER['DOCUMENT_ROOT'].'/crud/';
        }else{
            return $_SERVER['DOCUMENT_ROOT'].'/crud/';
        }
    }	
    
    
}
?>
