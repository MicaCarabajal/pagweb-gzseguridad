<?php

date_default_timezone_set('America/Argentina/Buenos_Aires');
$datos = json_decode(file_get_contents("php://input"));
if(isset($datos))
{
	include("conexion.php");
	$chat_id="1003134348";
	//$token="1113498102:AAHpMj6KU5fmrHcqS_cBXUiZNVrBGE3hMHI";
	$token="859300280:AAH6SqjmsAdZu7XmtszJ6AgrjMlbtEC6i3A";
	$msj = urlencode("Nombre: ".$datos->Nombre."\nApellido: ".$datos->Apellido."\nEmail: ".$datos->Email."\nServicio: ".$datos->Servicio."\nMensaje:".$datos->Mensaje);
    $res = file_get_contents("https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$chat_id."&text=".$msj);


    $fecha = date("Y-m-d H:i:s");
   $resultados = $conex->query("INSERT INTO consultas (nombre,apellido,email,servicio,mensaje,fecha) VALUES ('".$datos->Nombre."','".$datos->Apellido."','".$datos->Email."','".$datos->Servicio."','".$datos->Mensaje."','".$fecha."')");
    echo $res;
}
else
{
	return "ERROR";
}

/*if(isset($_POST['nombre']))
{
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $consulta = $_POST['consulta'];
    
}
else
{
    echo "No se envio el request";
}
*/



?>