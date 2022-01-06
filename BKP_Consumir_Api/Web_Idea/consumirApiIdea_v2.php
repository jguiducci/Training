<?php
/*
Enviar formulario con petición HTTP POST
en PHP
 */
/*
CREADO POR:  JAVIER GUIDUCCI
FECHA:		 03/05/2021
DESCRIPCION: HACER AL LLAMADA A LA API IDEA DE MANERA AUTOMATICA

*/

include("database/db.php");
include("includes/header.php");


$url = "http://idea-caba-rgnhhjckcn.dynamic-m.com:8099/api/index.php";
// Los datos de formulario
$datos = [
    "ActividadInscripciones" => "1",
    "data" => '{"actividades":["0502211240","0502211241"]}',
];
// Crear opciones de la petición HTTP
$opciones = array(
    "http" => array(
        "header" => "Content-type: application/x-www-form-urlencoded\r\n",
        "method" => "POST",
        "content" => http_build_query($datos), # Agregar el contenido definido antes
    ),
);

# Preparar la petición
$contexto = stream_context_create($opciones);

# Hacer la petición
$resultado = json_decode( file_get_contents($url, false, $contexto), true);
if ($resultado === false) {
    echo "Error haciendo petición";
    exit;
}

# si no salimos allá arriba, todo va bien
# var_dump($resultado);
# echo "<br>";
# echo "<br>";
$arrayData = $resultado["data"];
print_r($resultado);
echo "<br>";
echo "<br>";
#$Id_Cliente = $arrayData[0]["Id_Cliente"];
#echo "Id_Cliente: ".$Id_Cliente;
/* Crear la variable de sesión para guardar los datos obtenidos */
$_SESSION['arrayData'] = $resultado;
$totReg = count($arrayData);
echo "<font>Total de registros a Procesar: <b>".$totReg."</b></font>";
echo "<br>";
echo "<br>";
#echo "<font><b>".$resultado["data"]."</b></font>";
echo "<br>";
#echo "<br>";

?>

<html>
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<title>Confirmar Procesamiento</title>
		<!-- <script type='text/javascript'>
			function enviarForm(){
			document.nameForm.submit();
			}
		</script> -->
	</head>
	<!-- <body onLoad='javascript:enviarForm();'> -->
	<body>	
	  <div align="left">
	    <a href="https://www.idea.org.ar/"><img src="https://www.idea.org.ar/wp-content/uploads/2021/04/LogoOK.png" width="71" height="26"></a>
	  </div>
	  <table border="1" cellpadding="1" cellspacing="1" width="75%" align="center">
		<tr>
		  <td colspan="2" align="center"><font size ="3", color ="#000055"><b><u>Seleccione el proceso que desea confirmar:</u></b><font></td>
		</tr>
		<tr>
		  <td bgcolor ="#000055" align="center" valign="middle">
		    <form name="dataIns" action="database\save_data.php" method="POST" style="width:500px">
			  <!--<input type="text" name="array" value=""/>-->
			  <input type="submit" name="agregar" value="Confirmar Agregar" style="width:500px"/>
		    </form>
	      </td>
		  <td bgcolor ="#000055" align="center" valign="middle">
	        <form name="dataAct" action="database\update_data.php" method="POST" style="width:500px">
			  <!--<input type="text" name="array" value=""/>-->
			  <input type="submit" name="actualizar" value="Confirmar Actualizar" style="width:500px"/>
		    </form>
	      <td>
		</tr>
		<tr>
		  <td colspan="2" align="center"><br></td>
		</tr>
	  <table>
	  <br>
	  <br>
	  <a href=http://localhost/Web_Idea/index.php><b>Volver al inicio</b></a>
	</body>
</html>

<?php include("includes/footer.php"); ?>


<?php
/*
# Comenzar a guardar los datos en la tabla de MySQL
if($resultado)
{
	#while($regdatos = mysqli_fetch_array($resultado))
	#while($regdatos = mysqli_result($resultado))
	$i = 0;
    $totReg = count($arrayData);
	while($i<count($arrayData))
	{
		#$Id_Cliente = $arrayData[$i]["Id_Cliente"];
		#echo "Id_Cliente: ".$Id_Cliente;
		#echo "<br>";
				
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
					,'xx'
				)";
		
		#echo "SQL: ".$query."";
		#echo "<br>";
		#echo "<br>";
		
		$resultq = mysqli_query($conn, $query);
		if(!$resultq) {
			die("INSERT RECORD FAILED.");
		}

		#echo "Task Saved Successfully";
		#echo "<br>";
		
		# Avanzar al siguiente registro de datos
		$i = $i+1;
	}
	#echo "<br>";
	echo "<font>Total registros Insertados Correctamente: <b>".$totReg."</b></font>";
}


include('includes/footer.php'); 
*/
?>



