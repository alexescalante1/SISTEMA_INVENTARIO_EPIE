<?php

require_once "../controladores/articulos.controlador.php";
require_once "../modelos/articulos.modelo.php";

require_once "../controladores/notificaciones.controladorM.php";
require_once "../modelos/notificaciones.modeloM.php";

class TablaArticulos{

  /*=============================================
  MOSTRAR LA TABLA DE NOTIFICACIONES
  =============================================*/ 

  public function mostrarTablaArticulos(){
	
  	$item = null;
  	$valor = null;
	$tipoDoc = null;
	$tituloArticulo = null;
	
	$idArt = array();
	$NameArt = array();
	
	$articulos = ControladorArticulos::ctrMostrarArticulos($item, $valor);
	
	for($i = 0; $i < count($articulos); $i++){
	
	  $idArt[$i] = $articulos[$i]["idDetalleArticulo"];
	  $NameArt[$i] = $articulos[$i]["titulo"];
	
	}

  	$notific = ControladorNotificacionesM::ctrMostrarNotificaciones();

  	$datosJson = '

  		{
  			"data":[';

	 	for($i = 0; $i < count($notific); $i++){

			for($j = 0; $j < count($articulos); $j++){
				
				if($idArt[$j] == $notific[$i]["idDetalleArticulo"]){
					$tituloArticulo = $NameArt[$j];
					break;
				}
			
			}

			/*=============================================
  			AGREGAR ETIQUETAS DE VISTA
  			=============================================*/

  			if($notific[$i]["visto"] == 0){

				$colorEstado = "btn-danger";
				$textoEstado = "No visto";
				$estadoNotificacion = 1;

			}else{

				$colorEstado = "btn-success";
				$textoEstado = "visto";
				$estadoNotificacion = 0;

			}
			$visto = "<button class='btn btn-xs btnActivar ".$colorEstado."' idNotificacion='".$notific[$i]["idNotificacion"]."' estadoArticulo='".$estadoNotificacion."'>".$textoEstado."</button>";

			if($notific[$i]["tipoDocTitular"] == 0){
				$tipoDoc = "DNI";
			}else{
				$tipoDoc = "CODIGO";
			}

			$acciones = "<div class='btn-group'><button class='btn btn-success btnPrestarArticulo'><i class='fa fa-eye'> Prestar</i></button><button class='btn btn-danger btnEliminarNotificacion' idNotificacion='".$notific[$i]["idNotificacion"]."'><i class='fa fa-times'></i></button></div>";

			$datosJson .='[
					
					"'.($i+1).'",
					"'.$tipoDoc.'",
					"'.$notific[$i]["numDocTitular"].'",
					"'.$notific[$i]["nombreTitular"].", ".$notific[$i]["apellidoTitular"].'",
					"'.$tituloArticulo.'",
					"'.$notific[$i]["cantidad"]." Unidades".'",
					"'.$notific[$i]["dias"].'",
					"'.$notific[$i]["detalle"].'",
					"'.$notific[$i]["fecha"].'",
					"'.$visto.'",
					"'.$acciones.'"	   

			],';

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson .= ']

		}';

		echo $datosJson;

  }

}

/*=============================================
ACTIVAR TABLA DE NOTIFICACIONES
=============================================*/ 
$activarNotificacion = new TablaArticulos();
$activarNotificacion -> mostrarTablaArticulos();

