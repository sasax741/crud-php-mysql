<?php include("db.php");
include("includes/header.php");
include("includes/navegacion.php") ?>

  <div class="container p-4">

    <div class="row">

      <div class="row-md-4">
        <?php if (isset($_SESSION['mensaje'])) { ?>
          <div class="alert alert-<?= $_SESSION['tipo-mensaje']; ?> alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['mensaje']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php session_unset(); } ?>

        <div class="card card-body">
          <form action="acciones/guardar_tarea.php" method="POST">
            <div class="form-group">
              <input type="text" name="titulo" class="form-control" placeholder="Titulo de tarea">
            </div>
            <div class="form-group">
              <textarea name="descripcion" rows="2" class="form-control" placeholder="descripcion de la tarea" ></textarea>
            </div>
            <input type="submit" class="btn btn-success btn-block" name="guardar_tarea" value="Guardar tarea">
          </form>
        </div>

      </div>
        <div class="col-md-8">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Creacion</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $query = "SELECT * FROM tareas";
                $resultado_tareas = mysqli_query($conexion, $query);

                while ($row = mysqli_fetch_array($resultado_tareas)) { ?>
                  <tr>
                    <td><?php echo $row['titulo']; ?></td>
                    <td><?php echo $row['Descripcion']; ?></td>
                    <td><?php echo $row['creacion']; ?></td>
                    <td>
                      <a class="btn btn-secondary" href="acciones/editar.php?id=<?php  echo $row['id']; ?>">
                        <i class="fas fa-marker"></i>
                      </a>
                      <a class="btn btn-danger" href="acciones/eliminar.php?id=<?php echo $row['id']; ?>">
                        <i class="far fa-trash-alt"></i>
                      </a>
                    </td>
                  </tr>
                <?php  } ?>
            </tbody>
          </table>
        </div>

    </div>

  </div>

<?php include("includes/footer.php"); ?>
