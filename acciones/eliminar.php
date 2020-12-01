<?php
include("../db.php");

if (isset($_REQUEST['id'])) {
  $id = $_REQUEST['id'];
  $eliminar = "DELETE FROM tareas WHERE id = $id";
  $resultado_eliminar = mysqli_query($conexion, $eliminar);
  if (!$resultado_eliminar) {
    die("follo la eliminacion");
  }
  $_SESSION['mensaje'] = 'Tarea eliminada';
  $_SESSION['tipo-mensaje'] = 'danger';
  header("location: ../index.php");
}

 ?>
