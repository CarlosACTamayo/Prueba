<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  
  if (!empty($_POST['ID']) && !empty($_POST['peso']) && !empty($_POST['color']) && !empty($_POST['marmoleo'])) {

   
    $id = $_POST['ID'];
    $peso = $_POST['peso'];
    $color = $_POST['color'];
    $marmoleo = $_POST['marmoleo'];

    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "controldecrias";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    
    if (!$conn) {
      die("Conexion fallida: " . mysqli_connect_error());
    }

    
    $sql = "INSERT INTO clasificacion (ID, peso, color, marmoleo) VALUES ('$id', '$peso', '$color', '$marmoleo')";

    
    if (mysqli_query($conn, $sql)) {
      echo "Clasificacion registrada correctamente";
    } else {
      echo "Error al registrar la clasificacion: " . mysqli_error($conn);
    }

    
    mysqli_close($conn);

  } else {
    echo "Debe completar todos los campos";
  }

}
?>