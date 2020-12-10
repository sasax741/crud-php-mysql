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
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="position:center;">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

    </div>

  </div>

<?php include("includes/footer.php"); ?>
