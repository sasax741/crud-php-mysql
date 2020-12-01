<?php
include("../db.php");
  if (isset($_REQUEST['guardar_tarea']))
  {
    $titulo= $_REQUEST['titulo'];
    $descricion = $_REQUEST['descripcion'];

    $insertar = "INSERT INTO tareas(titulo, descripcion) VALUES ('$titulo', '$descricion')";
    $resultado = mysqli_query($conexion, $insertar);
    if (!$resultado)
    {
      die("fallo el insertar");
    }

    $_SESSION['mensaje'] = 'Tarea guardada';
    $_SESSION['tipo-mensaje'] = 'success';
    header("location: ../index.php");
  }
 ?>
