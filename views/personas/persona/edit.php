<?php 
	require_once("../../../config/conexion.php");
    require_once('../../../lib/personalizada/ruta.php');
	require_once("../../../models/m_persona.php");

	$objConexion	= new ConexionMySQL();  
	$objEditar	= new Datos();
    $objRuta    = new Ruta();
        
	$Id         = $_POST['id'];
    $nombre     = $_POST['nombre'];
    $apellido   = $_POST['apellido'];
    $edad       = $_POST['edad'];
?>

<!doctype html>
<html class="no-js">
    <head>
        <meta charset="UTF-8">
        <!--IE Compatibility modes-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!--Mobile first-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="modal-header ModalHeaderFondo">
            <h4 class="modal-title">Datos Persona</h4>
        </div>
     
        <div class="modal-body">
            <form class="form-horizontal" id="form1" name="form1" action="<?php echo $objRuta->ruta(); ?>controllers/c_persona.php" method="post" autocomplete="off" enctype="multipart/form-data">

                <div class="form-group">
                    <span class="auto-style1">
                        <label for="id" class="control-label col-lg-4">ID:<?php echo " (".$Id.")" ?></label>
                    </span>
                </div>
				
                <div class="form-group">
				    <label for="nombre" class="control-label col-sm-4">Nombre</label>
					    <div class="col-sm-8">
                            <input class="form-control top" value="<?php echo $nombre;?>" type="text" id="nombre" name="nombre" onKeyPress="return soloLetras(event)" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                        </div>
				</div>                                
				
                <div class="form-group">
				    <label for="apellido" class="control-label col-sm-4">Apellido</label>
					    <div class="col-sm-8">
                            <input class="form-control top" type="text" value="<?php echo $apellido;?>" id="apellido" name="apellido" onKeyPress="return soloLetras(event)" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
					    </div>
				</div>    

   
                <div class="form-group">
				    <label for="edad" class="control-label col-sm-4">Edad:</label>
 					    <div class="col-sm-8">
                            <input class="form-control top" type="tel" value="<?php echo $edad;?>" id="edad" name="edad"  minlength="1" maxlength="3" value="" onKeyPress="return soloNumeros(event)"/>
					    </div>
				</div>  

                <div class="modal-footer">
                        
                    <label class="control-label col-lg-4">&nbsp;</label>
                        <div class="col-lg-8">
                            <input type="submit" id="editar" name="editar" class="btn btn-default btn-grad" value="Editar">
                            <a href="" class="btn btn-default btn-grad close"  data-dismiss="modal" title="">Cancelar</a>
                        </div>
                </div>

    
                <input type="hidden" id="origen" name="origen" value="editarP" class="auto-style1">
                <input type="hidden" id="id" name="id" value="<?php echo $Id; ?>" class="auto-style1">

            </form>

        </div>  

    </body>
</html>
