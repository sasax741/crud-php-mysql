<?php include("db.php");
include("includes/header.php");
include("includes/navegacion.php") ?>

  <div class="container p-4">

    <div class="row">

      <div class="row-md-4">

        <div class="card card-body">
          <form action="guardar_tarea.php" method="POST">
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

    </div>

  </div>

<?php include("includes/footer.php"); ?>
