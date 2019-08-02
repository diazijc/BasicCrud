<?php 
    require_once("../../../config/conexion.php");
	require_once('../../../lib/personalizada/ruta.php');
	
	$objRuta    = new Ruta();
    $objConexion= new ConexionMySQL();
    $ruta = $objConexion->ruta();

?>
<!DOCTYPE html>
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
		<h4 class="modal-title">Registrar Persona</h4>
	</div>
            
	<div class="modal-body">
		<form id="form1" name="form1" class="form-horizontal" action="<?php echo $objRuta->ruta(); ?>controllers/c_persona.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="form-group"  >
				<label for="nombre" class="control-label col-sm-4">Nombre:</label>
					<div class="col-sm-8">
                        <input class="form-control top" onKeyPress="return soloLetras(event)" type="text" id="nombre" name="nombre" required="required" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
					</div>
			</div>
                                
			<div class="form-group">
				<label for="apellido" class="control-label col-sm-4">Apellido</label>
					<div class="col-sm-8">
                        <input class="form-control top" type="text" id="apellido" name="apellido" onKeyPress="return soloLetras(event)"" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
					</div>
			</div>   

            <div class="form-group">
				<label for="edad" class="control-label col-sm-4">Edad:</label>
					<div class="col-sm-8">
                        <input class="form-control top" type="tel" id="edad" name="edad"  minlength="1" maxlength="3" value="" onKeyPress="return soloNumeros(event)"/>
                    </div>
			</div>
                                
            <div class="modal-footer">
                <label class="control-label col-sm-4">&nbsp;</label>
                    <div class="col-sm-8">
                        <input type="submit" id="enviar" name="enviar" class="btn btn-metis-5 btn-grad" value="Crear" >
                            <a href="" class="btn btn-default btn-grad close"  title="">Cancelar</a>
                    </div>
            </div>
			<input type="hidden" id="origen" name="origen" value="registroP">
        </form>
    </div>
    <script src="../../../js/validar_formulario.js"></script>  
    </body>
</html>