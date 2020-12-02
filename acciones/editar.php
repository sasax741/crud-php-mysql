<?php
  include("../db.php");
  if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $seleccionar = "SELECT * FROM tareas WHERE id = $id";
    $resultado = mysqli_query($conexion, $seleccionar);
    if (mysqli_num_rows($resultado) == 1) {
      $row = mysqli_fetch_array($resultado);
      $titulo = $row['titulo'];
      $descripcion = $row['Descripcion'];
    }

  }
  if (isset($_REQUEST['actualizar'])) {
    $id = $_REQUEST['id'];
    $titulo = $_REQUEST['titulo'];
    $descripcion = $_REQUEST['descripcion'];

    $actualizar = "UPDATE tareas SET titulo = '$titulo', Descripcion = '$descripcion' WHERE id = $id";
    mysqli_query($conexion, $actualizar);

    $_SESSION['mensaje'] = 'Tarea actualizada';
    $_SESSION['tipo-mensaje'] = 'info';
    header("location:../index.php");
  }

 ?>

 <?php include("../includes/header.php") ?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form action="editar.php?id= <?php echo $_REQUEST['id']; ?> " method="post">
          <div class="form-group">
            <input type="text" name="titulo" value=" <?php echo $titulo; ?> " class="form-control" placeholder="Cambia el titulo">
          </div>
          <div class="form-group">
            <textarea name="descripcion" rows="2" class="form-control" placeholder="Cambia la descripcion" > <?php echo $descripcion; ?> </textarea>
          </div>
          <input type="submit" class="btn btn-success btn-block" name="actualizar" value="Actualizar">
        </form>
      </div>
    </div>
  </div>
</div>

 <?php include("../includes/footer.php") ?>
