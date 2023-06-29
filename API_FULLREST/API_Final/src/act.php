<?php

//coneccion
include_once "../modelo/coneccion.php";
$conexion = conectar();

//tomar id
$id = $_POST['id'];

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = (int)$_POST['edad'];
$altura = (float)$_POST['altura'];
$peso = (float)$_POST['peso'];

$imc = $peso / ($altura * $altura);
$estado = "";
if ($imc < 18.5 && $imc > 0) {
    $estado = "Peso bajo";
} else if ($imc >= 18.5 && $imc <= 24.9) {
    $estado = "Normal";
} else if ($imc >= 25 && $imc <= 29.9) {
    $estado = "Sobrepeso";
} else if ($imc >= 30 && $imc <= 34.9) {
    $estado = "Obesidad grado I";
} else if ($imc >= 35 && $imc <= 39.9) {
    $estado = "Obesidad grado II";
} else if ($imc >= 40) {
    $estado = "Obesidad grado III";
} else {
    $estado = "Inconsistencia :/";
}


//actualizar
$sql = "UPDATE api_paciente
SET nombre = '$nombre', apellido = '$apellido', edad = '$edad', altura = '$altura', peso = '$peso', imc = '$imc', estado = '$estado' WHERE id= $id;";
$query = mysqli_query($conexion, $sql);

//consulta exe
$query = mysqli_query($conexion, $sql);


if ($query) {
    // redireecionar al inicio
    echo "<script>alert('Paciente actualizado c:');</script>";
    sleep(3);
    header("location: http://localhost/WEB/API_FINAL_DEVS/API_Final/Visual/grupos.php");
} else {
}
