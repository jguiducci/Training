<?php
/*
Recibe petición HTTP POST para verificar e insertar los datos en la BD
en PHP
 */
/*
CREADO POR:  JAVIER GUIDUCCI
FECHA:		 26/05/2021
DESCRIPCION: VERIFICAR LOS DATOS Y LUEGO INSERTAR EN LA BD

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
		
		$query = "SELECT Id_Trans FROM actividadinscripciones WHERE Id_Trans = ".$arrayData[$i]["Id_Trans"]."";
		#echo "Query: ".$query;
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) < 1) {
		#if ($exist < 1) {
			
			$query = "INSERT INTO actividadinscripciones 
					(
						Id_Cliente
						,nombre
						,email
						,empresa
						,Nombre_Fantasia
						,app_usuario
						,app_clave
						,cargo
						,apellido
						,nombre_solo
						,Area_Desempenio
						,Id_Producto
						,Id_Trans
						,desc_AreaDesemp
					)
					VALUES
					(
						".$arrayData[$i]["Id_Cliente"]."
						,'".$arrayData[$i]["nombre"]."'
						,'".$arrayData[$i]["email"]."'
						,'".$arrayData[$i]["empresa"]."' 
						,'".$arrayData[$i]["Nombre_Fantasia"]."'
						,'".$arrayData[$i]["app_usuario"]."'
						,'".$arrayData[$i]["app_clave"]."' 
						,'".$arrayData[$i]["cargo"]."'
						,'".$arrayData[$i]["apellido"]."' 
						,'".$arrayData[$i]["nombre_solo"]."' 
						,".$arrayData[$i]["Area_Desempenio"]." 
						,'".$arrayData[$i]["Id_Producto"]."'
						,".$arrayData[$i]["Id_Trans"]."
						,'SELECT ADI.descrip FROM areadesempidea ADI WHERE ADI.cod=".$arrayData[$i]["Area_Desempenio"]."'
					)";
			
			#echo "SQL: ".$query."";
			#echo "<br>";
			#echo "<br>";
			
			$resultq = mysqli_query($conn, $query);
			if(!$resultq) {
				die("INSERT RECORD FAILED.");
			}

			$totIns = $totIns + 1;
			#echo "Task Saved Successfully";
			#echo "<br>";
		}
		
		# Avanzar al siguiente registro de datos
		$i = $i+1;
	}
	echo "<br>";
	echo "<font>Total de registros recibidos: <b>".$totReg."</b></font>";
	echo "<br>";
	echo "<font>Total de registros insertados correctamente: <b>".$totIns."</b></font>";
	echo "<br>";
	echo "<br>";
	echo "<a href=http://localhost/Web_Idea/consumirApiIdea_v2.php><b>Volver atr&aacute;s</b></a>";
	echo "<br>";
	echo "<br>";
	echo "<a href=http://localhost/Web_Idea/index.php><b>Volver al inicio</b></a>";
	
}

include("../includes/footer.php");
?>


