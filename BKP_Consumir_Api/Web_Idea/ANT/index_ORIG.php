<?
	
	echo date("d/m/Y H:i:s"). "<br>IDEA - CleverSoft";
	exit;


	include "header.php";

?>

<style>
.subtxt {
	color: #999;
	font-size: 12px;
}
</style>



<h1>Idea</h1>

<br>

Actividad: <input type="text" name="evento" id="evento" value="0502170002" style="color: #000; text-align: right;">

<br><br>


<a href="ingreso.php?actividad=">Ingreso</a><br>
<span id="ingresoLink" class="subtxt">1</span>

<br><br>

<a href="inscripcion.php?actividad=">Inscripcion</a><br>
<span id="inscripcionLink" class="subtxt">2</span>

<br><br>

<a href="inscripcion_ok.php?actividad=">Inscripcion Exitosa</a><br>
<span id="exitoLink" class="subtxt">3</span>

<br><br>


<script>
$(function (){

	$('a').click(function (){
		document.location = $(this).attr('href') + $('#evento').val();
		return false;
	});

	$('#evento').keyup(function (){
		refreshData();
	});

	refreshData();

});

function refreshData(){

	$('#ingresoLink').html("http://10.10.10.7/ingreso.php?actividad=" + $('#evento').val());
	$('#inscripcionLink').html("http://10.10.10.7/inscripcion.php?actividad=" + $('#evento').val());
	$('#exitoLink').html("http://10.10.10.7/inscripcion_ok.php?actividad=" + $('#evento').val());

}

</script>




<?

	include "footer.php";

?>