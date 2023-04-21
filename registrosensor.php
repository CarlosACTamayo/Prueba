<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  
  if (!empty($_POST['ID']) && !empty($_POST['frecar']) && !empty($_POST['presan']) && !empty($_POST['freres']) && !empty($_POST['temperatura'])) {

   
    $id = $_POST['ID'];
    $frecar = $_POST['frecar'];
    $presan = $_POST['presan'];
    $freres = $_POST['freres'];
    $temperatura = $_POST['temperatura'];

    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "controldecrias";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    
    if (!$conn) {
      die("Conexion fallida: " . mysqli_connect_error());
    }

    
    $sql = "INSERT INTO sensor (ID, frecar, presan, freres, temperatura) VALUES ('$id', '$frecar', '$presan', '$freres', '$temperatura')";

    
    if (mysqli_query($conn, $sql)) {
      echo "Sensor registrado correctamente";
    } else {
      echo "Error al registrar la Sensor: " . mysqli_error($conn);
    }

    
    mysqli_close($conn);

  } else {
    echo "Debe completar todos los campos";
  }

}
?>
