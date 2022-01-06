<?php
/*
Recibe petición HTTP POST para verificar y actualizar los datos en la BD
en PHP
 */
/*
CREADO POR:  JAVIER GUIDUCCI
FECHA:		 31/05/2021
DESCRIPCION: VERIFICAR LOS DATOS Y LUeGO ACTUALIZAR EN LA BD

*/

include("../database/db.php");
include("../includes/header.php");

#print_r($_SESSION["arrayData"]);

if(isset($_SESSION["arrayData"])) {

    #session_start();
    $result = $_SESSION["arrayData"];
	#print_r($result);
	$arrayData = $result["data"]; 
	echo "<br>";
	echo "<br>";
	echo "<br>";
	
	$i = 0;
    $totReg = count($arrayData);
	$totIns = 0;
	while($i<count($arrayData))
	{
		#$Id_Cliente = $arrayData[$i]["Id_Cliente"];
		#echo "Id_Cliente: ".$Id_Cliente;
		#echo "<br>";
		
		# VERIFICAR SI YA EXISTE EL REGISTRO EN LA TABLA
		
		$query = "SELECT COUNT(Id_Trans) AS ParaAct FROM actividadinscripciones 
		          WHERE (Id_Trans = ".$arrayData[$i]["Id_Trans"].")
				    AND ((Id_Cliente <> ".$arrayData[$i]["Id_Cliente"].")
					 OR (nombre <> '".$arrayData[$i]["nombre"]."')
					 OR (email <> '".$arrayData[$i]["email"]."')
					 OR (empresa <> '".$arrayData[$i]["empresa"]."')
					 OR (Nombre_Fantasia <> '".$arrayData[$i]["Nombre_Fantasia"]."')
					 OR (app_usuario <> '".$arrayData[$i]["app_usuario"]."')
					 OR (app_clave <> '".$arrayData[$i]["app_clave"]."')
					 OR (cargo <> '".$arrayData[$i]["cargo"]."')
					 OR (apellido <> '".$arrayData[$i]["apellido"]."')
					 OR (nombre_solo <> '".$arrayData[$i]["nombre_solo"]."')
					 OR (Area_Desempenio <> ".$arrayData[$i]["Area_Desempenio"].")
					 OR (Id_Producto <> '".$arrayData[$i]["Id_Producto"]."'))";
		#echo "Query: ".$query;
		
		$result = mysqli_query($conn, $query);
		#echo "<br>";
		#echo "<br>";
		#echo "Resultado query: ".settype($resul, 'string');
		#echo "<br>";
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			$ParaAct = $row['ParaAct'];
			if ($ParaAct > 0) {
			
				$query = "UPDATE `actividadinscripciones` SET
							`Id_Cliente` = ".$arrayData[$i]["Id_Cliente"]."
							,`nombre` = '".$arrayData[$i]["nombre"]."'
							,`email` = '".$arrayData[$i]["email"]."'
							,`empresa` = '".$arrayData[$i]["empresa"]."'
							,`Nombre_Fantasia` = '".$arrayData[$i]["Nombre_Fantasia"]."'
							,`app_usuario` = '".$arrayData[$i]["app_usuario"]."'
							,`app_clave` = '".$arrayData[$i]["app_clave"]."'
							,`cargo` = '".$arrayData[$i]["cargo"]."'
							,`apellido` = '".$arrayData[$i]["apellido"]."' 
							,`nombre_solo` = '".$arrayData[$i]["nombre_solo"]."'
							,`Area_Desempenio` = ".$arrayData[$i]["Area_Desempenio"]."
							,`Id_Producto` = '".$arrayData[$i]["Id_Producto"]."'
							,`desc_AreaDesemp` = (SELECT ADI.descrip FROM areadesempidea ADI WHERE ADI.cod=".$arrayData[$i]["Area_Desempenio"].")
						  WHERE (`Id_Trans` = ".$arrayData[$i]["Id_Trans"].")";
				
				#echo "SQL: ".$query."";
				#echo "<br>";
				#echo "<br>";
				
				$resultq = mysqli_query($conn, $query);
				if(!$resultq) {
					die("UPDATE RECORD FAILED.");
				}

				$totIns = $totIns + 1;
				#echo "Task Saved Successfully";
				#echo "<br>";
			}
		}
		
		# Avanzar al siguiente registro de datos
		$i = $i+1;
	}
	echo "<br>";
	echo "<font>Total de registros recibidos: <b>".$totReg."</b></font>";
	echo "<br>";
	echo "<font>Total de registros actualizados correctamente: <b>".$totIns."</b></font>";
	echo "<br>";
	echo "<br>";
	echo "<a href=http://localhost/Web_Idea/consumirApiIdea_v2.php><b>Volver atr&aacute;s</b></a>";
	echo "<br>";
	echo "<br>";
	echo "<a href=http://localhost/Web_Idea/index.php><b>Volver al inicio</b></a>";
	
}

include("../includes/footer.php");
?>


