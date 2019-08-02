<?php 
	require_once("../../../config/conexion.php");
	require_once("../../../models/m_persona.php");	
	
	$objConexion	= new ConexionMySQL();  
	$objPersona	= new Datos();
			
	$ruta		= $objConexion->ruta();
	
	$id		= $_GET['id'];
	
	
		if ($id!=''){
			$objPersona->EliminarRegistroPersona($objConexion,$id);
			$m = md5('3');
		}else{
			$m = md5('0');
		}
		
		header("Location: ".$ruta."views/personas/index.php?m=".$m);	
				

