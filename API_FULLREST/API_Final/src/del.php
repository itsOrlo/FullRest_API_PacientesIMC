<?php

//coneccion
include_once "../modelo/coneccion.php";
$conexion = conectar();

$id = $_GET['id'];

//eliminar
$sql = "DELETE FROM api_paciente WHERE id = $id;";
$query = mysqli_query($conexion, $sql);

//consulta exe
$query = mysqli_query($conexion, $sql);

if($query){
    // redireecionar al inicio
    header("location: http://localhost/WEB/API_FINAL_DEVS/API_Final/Visual/grupos.php");   
}else{

    echo "<script>alert('Error al eliminar');</script>";

}