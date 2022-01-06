?php
	//Sintaxis de conexión de la base de datos de muestra para PHP y MySQL.
	
	//Conectar a la base de datos
	
	$hostname="your_hostname";
	$username="your_dbusername";
	$password="your_dbpassword";
	$dbname="your_dbusername";
	$usertable="your_tablename";
	$yourfield = "your_field";
	
	mysqli_connect($hostname,$username, $password) o morir ("html>script language='JavaScript'>alert('¡No es posible conectarse a la base de datos! Vuelve a intentarlo más tarde.'),history.go(-1)/script>/html>");
	mysqli_select_db($dbname);
	
	# Comprobar si existe registro
	
	$query = “SELECCIONAR * DESDE $usertable”;
	
	$result = mysqli_query($query);
	
	si($result){
		while($row = mysqli_fetch_array($result)){
			$name = $row["$yourfield"];
			echo "Nombre: ".$name."br/>";
		}
	}
?>