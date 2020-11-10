<?php 
  session_start();
  if(!isset($_SESSION['name']) != null) {
    header('Location: ../index.php');
    }
?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="productos.php">
    <img src="../img/logo.png" width="30" height="30" alt="">
    Elektro<span class="logoPoint">.</span>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation" >
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarsExample04">
    <form class="form-inline">
      <input class="form-control" type="text" placeholder="Buscar">
      <input class="btn" type="submit" value="&#128269;">
    </form>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href=""id="dropdown04" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categorias
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdown04">
          <a class="dropdown-item" href="#">Componentes</a>
          <a class="dropdown-item" href="#">Perifericos</a>
          <a class="dropdown-item" href="#">Video/Audio</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Prime</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Outlet</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item dropleft">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Hola, <?= $_SESSION['name'] ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdown04">
        <?php 
            if ($_SESSION['admin'] == 1){
              ?>
              <a class="dropdown-item" href="nuevoProducto.php">Nuevo producto</a>
              <?php
            }
          ?>
          <a class="dropdown-item" href="#">Mi perfil</a>
          <a class="dropdown-item" href="#">Mis valoraciones</a>
          <a class="dropdown-item" href="../action/actionCerrarSesion.php">Cerrar sesion</a>
        </div>
      </li>
    </ul>
  </div>
</nav>