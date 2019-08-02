<?php 
require_once("../../config/conexion.php"); 
require_once("../../models/m_persona.php");
	
$objConexion 	= new ConexionMySQL();
$objDatos      = new Datos();
$RSDatos          = $objDatos->Listar($objConexion);
$ruta              = $objConexion->ruta();

//error_reporting(E_ALL);
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ini_set('display_errors', '1');
$mensajeNum  = strip_tags(filter_input(INPUT_GET,'m'));

	switch ($mensajeNum) {
            	case md5(0):
        	$mensaje = '<div class="alert alert-danger" align="center" id="DivMensaje">Ha ocurrido un Error.</div>';
			break;
		case md5(1):
        	$mensaje = '<div class="alert alert-success" align="center" id="DivMensaje">Persona registrada</div>';
			break;
		case md5(2):
	        $mensaje = '<div class="alert alert-success" align="center" id="DivMensaje">Datos de Persona actualizados.</div>';
			break;
		case md5(3):
	        $mensaje = '<div class="alert alert-warning" align="center" id="DivMensaje">Registro de Persona Eliminado.</div>';
			break;
								
	}
 
?>
<!DOCTYPE html>
<html class="">
  <head>
    <meta charset="UTF-8">
    <title>CRUD PERSONAS</title>
    
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    
    <!-- Font Awesome -->
    <link href="../../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>


    <link rel="stylesheet" href="../../css/main.min.css">


    <link href="../../lib/DataTables-1.10.13/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <script src="cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json"></script>


  </head>
  <body>
      <br>      
        <?php if(isset($mensajeNum)){ echo $mensaje; } ?>      

        <!--Begin Datatables-->
        <div class="row" style="margin-right:10px;margin-left:10px;margin-top:10px">
            <div class="col-lg-12" 	>
                <div class="box">
                                <header>
                                        <div class="icons">
                                                <i class="fa fa-table"></i>
                                        </div>
                                        <h5>Gestión de Personas</h5>
                                </header>

                                                        <div id="collapse4" class="body">
                                                                <div>
                                                                    <a href="persona/add.php" class="btn btn-metis-5 btn-grad btnModalAdd" data-toggle="modal" data-target="#myModal" >
                                                                          <i class="fa fa-plus-square"></i>
                                                                          Registrar Nueva Persona
                                                                        </a>		
                                                                </div><br>
                                <div>
                                <table id="myTable" class="table table-bordered table-condensed table-hover table-striped" width="100%" cellspacing="0">
                                              <thead>
                                                <tr>
                                                  <th>Id</th>
                                                  <th>Nombre</th>
                                                  <th>Apellido</th>
                                                  <th>Edad</th>
                                                  <th width="50" align="center" style="ordering:false">Editar</th>
                                                  <th width="6%">Eliminar</th>


                                                </tr>
                                              </thead>
                                              <tbody>
                                              <?php 
                                            if ($RSDatos){ 
                                                    foreach ($RSDatos as $valor) {
                                                          $id 		= $valor['id'];
                                                          $nombre          = $valor['nombre'];
                                                          $apellido 		= $valor['apellido'];
                                                          $edad	 	= $valor['edad'];

                                                  ?>
                                                  <tr>

                                                                                  <td style="vertical-align:middle">&nbsp;<?php echo $id;?></td>

                                                                                  <td style="vertical-align:middle">&nbsp;<?php echo $nombre;?></td>
                                                                                  <td style="vertical-align:middle">&nbsp;<?php echo $apellido;?></td>
                                                                                  <td style="vertical-align:middle">&nbsp;<?php echo $edad;?></td>

                                                                                  <td style="vertical-align:middle" align="center" valign="middle" class="no-sort">
                                                                                        <a href="#" class="btnModalEdit" data-toggle="modal" data-target="#myModal" data-id="<?php echo $id; ?>" 
                                                                                           data-nombre="<?php echo $nombre; ?>" data-apellido="<?php echo $apellido; ?>" data-edad="<?php echo $edad; ?>">
                                                                                                <i class="glyphicon glyphicon-edit"></i>
                                                                                        </a>
                                                                                  </td>
                                                                                  <td align="center" valign="middle">
                                                                                    <a href="persona/delete.php?id=<?php echo $id;?> ">
                                                                                        <i class="glyphicon glyphicon-trash"></i>
                                                                                    </a>
                                                                                  </td> 
                                                </tr>										
                                                <?php 
                                                        }
                                                 }
                                                  ?>


                                              </tbody>
                                        </table>
                                                </div>
                                </div>

                                        </div>

            </div>
        </div>
            
<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Contenido de Modal-->
      <div class="modal-content">
        <div class="modal-body">
            <div id="contenido"></div>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<!--End Datatables-->
    <!--jQuery 3.1.1 -->
    <script src="../../lib/jquery/jquery-3.1.1.min.js"></script>
    <!--<script src="../../lib/jquery/jquery-ui.min.js"></script>-->
    
    <!--Bootstrap -->
    <script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
    
    <script src="../../lib/bootstrap/js/jquery.min.js" type="text/javascript"></script>
	
	<!-- Screenfull -->
    <script src="../../lib/screenfull/screenfull.js"></script>
    <script src="../../lib/DataTables-1.10.13/js/jquery.dataTables.js"></script>
    <script src="../../lib/lib/DataTables-1.10.13/js/dataTables.bootstrap.js"></script>
    <script src="../../lib/jquery.tablesorter/jquery.tablesorter.min.js"></script>
    <script src="../../lib/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
    
    <!--Eliminar mensaje despues de algunos segundos-->
    <script>
        setTimeout(fade_out, 5000);
        function fade_out() {
          $("#DivMensaje").fadeOut().empty();
        }
    </script>    
	<script>
		
		$(document).ready(function()
		{

		$(".btnModalEdit").click(function(){
			var id    = $(this).data("id");
                        var nombre     = $(this).data("nombre");
                        var apellido= $(this).data("apellido");
                        var edad    = $(this).data("edad");
			
                 
                       
			$.post("persona/edit.php?flag_consulta=0", {id: id,nombre: nombre, apellido: apellido, edad: edad},function(htmlexterno){
				$("#contenido").html(htmlexterno);
			});
		});		
		$(".btnModalAdd").click(function(){
						
			$.post("persona/add.php", {},function(htmlexterno){
				$("#contenido").html(htmlexterno);
			});
		});			
		
		});
	
	</script>
        
<!--refrescar pagina quitando variable get del url:-->        
        <script>
           $(function() {
           $(document).keydown(function(e){
            var code = (e.keyCode ? e.keyCode : e.which);
            if(code === 116) {
             e.preventDefault();
             location.href = "index.php"; 
            }
           });
          });      
        </script>
<!-- DATA TABLE -->
    <script src="../../js/jqueryValidacionEspanol.js" type="text/javascript"></script>
 <script src="../../js/validar_formulario.js" type="text/javascript"></script>   


</body>
</html>