<?php
	require_once("../config/conexion.php"); 
	require_once("../models/m_persona.php");


        if ($_POST['origen']=='registroP'){

		$objConexion	= new ConexionMySQL();  
		$objEstado      = new Datos();
		
		$ruta		= $objConexion->ruta();
		
		$nombre     = $_POST['nombre'];
		$apellido 	= $_POST['apellido'];	
		$edad 	    = $_POST['edad'];
		
		if ($nombre!='' and $apellido!='' and $edad!=''){
			$objEstado->RegistroPersona($objConexion,$nombre,$apellido,$edad);
			$m = md5('1');
		}else{
			$m = md5('0');
		}
		header("Location: ".$ruta."views/personas/index.php?m=".$m);				
	}


	if ($_POST['origen']=='editarP'){

		$objConexion	= new ConexionMySQL();  
		$objEditar 	= new Datos();
		
		$ruta		= $objConexion->ruta();
		
		$id 	= $_POST['id'];
		$nombre    = $_POST['nombre'];
		$apellido 	= $_POST['apellido'];	
		$edad 	= $_POST['edad'];
 		
		if ($id!='' and $nombre!='' and $apellido!='' and $edad!=''){
			$objEditar->EditarPersona($objConexion,$id,$nombre,$apellido,$edad);
			$m = md5('2');
		}else{
			$m = md5('0');
		}
		
		header("Location: ".$ruta."views/personas/index.php?m=".$m);				
	}




?>
