<html>
<body>

<form method="POST" action="http://idea-caba-rgnhhjckcn.dynamic-m.com:8099/api/index.php">
ActividadInscripciones: <br>
<input type="text" name="ActividadInscripciones" value="1"><br>
data: <br>
<input type="text" name="data" value='{"actividades":["0502211240","0502211241"]}' style="padding: 10px;">
<br><br>
<input type="submit" name="submit" value="Enviar" style="padding: 10px 30px;">
</form>

</body>
</html>


<?php

$url = "http://idea-caba-rgnhhjckcn.dynamic-m.com:8099/api/index.php";
$json = file_get_contents($url);
$data = json_decode($json,true);
print_r($data);

?>



