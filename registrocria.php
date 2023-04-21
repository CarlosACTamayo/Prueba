<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  
  if (!empty($_POST['provedor']) && !empty($_POST['ID']) && !empty($_POST['peso']) && !empty($_POST['costo']) && !empty($_POST['nombre'])) {

   
    $provedor = $_POST['provedor'];
    $id = $_POST['ID'];
    $peso = $_POST['peso'];
    $costo = $_POST['costo'];
    $nombre = $_POST['nombre'];
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';

    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "controldecrias";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    
    if (!$conn) {
      die("Conexion fallida: " . mysqli_connect_error());
    }

    
    $sql = "INSERT INTO crias (provedor, ID, peso, costo, nombre, descripcion) VALUES ('$provedor', '$id', '$peso', '$costo', '$nombre', '$descripcion')";

    
    if (mysqli_query($conn, $sql)) {
      echo "Cria registrada correctamente";
    } else {
      echo "Error al registrar la cria: " . mysqli_error($conn);
    }

    
    mysqli_close($conn);

  } else {
    echo "Debe completar todos los campos";
  }

}
?>