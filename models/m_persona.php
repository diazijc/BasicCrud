<?php 

class Datos{

	function Listar($objConexion){

		$query="SELECT * FROM datos";
		$resultado = $objConexion->ejecutar($query);
		$resultado = $objConexion->Arreglo($resultado);

		return $resultado;		
	}
        
    function EditarPersona($objConexion,$id,$nombre,$apellido,$edad){

		$query="update datos SET nombre=trim('".$nombre."'),apellido=('".$apellido."'),edad=('".$edad."')
                        WHERE id='".$id."'";
		
		$resultado = $objConexion->ejecutar($query);
		return $resultado;		
	}

    function RegistroPersona($objConexion,$nombre,$apellido,$edad){
						
        $query="insert into datos (nombre, apellido, edad) VALUES ((trim('".$nombre."')),(trim('".$apellido."')),'".$edad."');";
		
		$resultado = $objConexion->ejecutar($query);
		return $resultado;		
	}
        
    function EliminarRegistroPersona($objConexion,$id){
                
                $query="DELETE FROM datos WHERE id='".$id."'";
		
		$resultado = $objConexion->ejecutar($query);
		return $resultado;
    }
}
?>