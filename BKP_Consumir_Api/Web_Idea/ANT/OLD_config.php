<?


	ob_start("ob_gzhandler");					// compresion

	session_start();
	
	error_reporting(E_ERROR | E_PARSE);
	//error_reporting(E_ALL);

	header('P3P: CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');			// IE Blocking iFrame Cookies


	date_default_timezone_set('Etc/GMT+3');


  	$enter = "\r\n\r\n";
  	$v .= "DATE: " 		. date("Y-m-d H:i:s") 			. $enter;
  	$v .= "URL: " 		. $_SERVER["HTTP_HOST"] 		. $_SERVER["REQUEST_URI"] . $enter;
  	$v .= "IP: " 		. $_SERVER["REMOTE_ADDR"] 		. $enter;
  	$v .= "BROWSER: " 	. $_SERVER["HTTP_USER_AGENT"] 		. $enter;
  	$v .= "REFERER: " 	. $_SERVER["HTTP_REFERER"] 		. $enter;
  	$v .= "POST: " 		. var_export($_POST, true) 		. $enter;
  	$v .= "GET: " 		. var_export($_GET, true) 		. $enter;
	$v .= "FILES: " 	. var_export($_FILES, true)		. $enter;
  	$v .= "SESSION: " 	. var_export($_SESSION, true) 		. $enter;  	
  	$v .= "========================================"		. $enter;

	/*
	if (!is_dir("log/")){ @mkdir("log/"); chmod("log/", 0700); }
  	$handle = fopen("log/" . date("Ymd") . ".txt", "a");
  	if (fwrite($handle, $v) === false) {
  		//echo "Cannot write to text file. <br />";
  	}
  	fclose($handle);
	*/

	/*
	// CONEXION PARA MS-SQLSERVER
	//$serverName = "localhost";			// colocar el nombre del servidor segun la instalacion local			//10.10.10.7
	//$connectionOptions = array(
	//	"Database" => "Clever_IDEA_Prod",
	//	"Uid" => "Clever",
	//	"PWD" => "sarmiento*.16",
	//	"ReturnDatesAsStrings" => true,
	//	"CharacterSet" => "UTF-8"
	//);
	//$conn = sqlsrv_connect($serverName, $connectionOptions);
	
	//if( !$conn ) {
	//	echo "Connection could not be established.<br />";
	//	//die( print_r( sqlsrv_errors(), true));
	//}

	//sqlsrv_configure("WarningsReturnAsErrors", 0);
	*/
	
	// CONEXION PARA MySQL
	$serverName="localhost";
	$username="root";
	$password="";
	$dbname="web_idea";
	$usertable="actividadInscripciones";
	//$yourfield = "your_field";
	
	$conn = mysqli_connect($serverName, $username, $password, $dbname)
	//mysqli_select_db($dbname);
	
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully";
	//mysqli_close($conn);

	
	if ($_GET['q_last_str']){
		$a = split('&', $_GET['q_last_str']);
		for ($i=0; $i<count($a);$i++){
			$b = split('=', $a[$i]);
			$_GET[$b[0]]=$b[1];
		}
	}
	
?>