<?php
class Ruta{
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