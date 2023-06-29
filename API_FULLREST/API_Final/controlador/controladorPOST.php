<?php

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = (int)$_POST['edad'];
$altura = (float)$_POST['altura'];
$peso = (float)$_POST['peso'];

$imc = $peso / ($altura * $altura);
(float)$imc;
$estado;
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


 $url = "http://localhost:8000/api/pacientukis/";


 $curl = curl_init();

 curl_setopt_array($curl, array(
     CURLOPT_URL => "http://127.0.0.1:8000/api/pacientukis/",
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_ENCODING => "",
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 0,
     CURLOPT_FOLLOWLOCATION => true,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => "POST",
     CURLOPT_POSTFIELDS => "{\"nombre\":\"$nombre\", \"apellido\":\"$apellido\", \"edad\":\"$edad\", \"altura\":\"$altura\", \"peso\":\"$peso\", \"imc\":\"$imc\",\"estado\":\"$estado\"}",
     CURLOPT_HTTPHEADER => array(
         "Content-Type: application/json"
     ),
 ));
 
 $response = curl_exec($curl);
 
 curl_close($curl);
 echo $response;
 
 echo "<script>alert('Paciente registrado c:');</script>";
 sleep(3);
 header("location: http://localhost/WEB/API_FINAL_DEVS/API_Final/Visual/grupos.php");
 