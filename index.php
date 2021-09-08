<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="shortcut icon" href="img/logo-mywebsite-urian-viera.svg"/>
  <title>Cómo importar CSV con acentos y ñ a MySQL usando PHP Fácil :: WebDeveloper Urian Viera</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/cargando.css">
  <link rel="stylesheet" type="text/css" href="css/cssGenerales.css">
</head>
<body>

<!--Importar correctamente las eñes y tildes en MySQL con csv y php -->
<div class="cargando">
    <div class="loader-outter"></div>
    <div class="loader-inner"></div>
</div>


<nav class="navbar navbar-expand-lg navbar-light navbar-dark fixed-top" style="background-color: #563d7c !important;">
    <ul class="navbar-nav mr-auto collapse navbar-collapse">
      <li class="nav-item active">
        <a href="https://blogangular-c7858.web.app/"> 
        <strong>Canal WebDeveloper </strong>
        </a>
      </li>
    </ul>
    <div class="my-2 my-lg-0">
      <h5 class="navbar-brand">Web Developer Urian Viera </h5>
    </div>
</nav>


<div class="container mb-5">
  <h3 class="text-center">
      Cómo importar <span style="color: #777;">CSV</span> con acentos y ñ a MySQL usando PHP Fácil
  </h3>
  <hr>


 <div class="row">
    <div class="col-md-5">
      <form action="subir_csv.php" method="POST" enctype="multipart/form-data"/>
        <div class="file-input text-center">
            <input  type="file" name="dataCliente" id="file-input" class="file-input__input" accept=".csv"/>
            <label class="file-input__label" for="file-input">
              <i class="zmdi zmdi-upload zmdi-hc-2x"></i>
              <span>Elegir Archivo CSV</span></label
            >
          </div>
      <div class="text-center mt-5">
          <input type="submit" name="subir" class="btn-enviar" value="Subir Archivo CSV"/>
      </div>
      </form>
    </div>

    <div class="col-md-7">
    <?php
    header("Content-Type: text/html;charset=utf-8");
    include('config.php');
    $sqlNombrePersonas         = ("SELECT * FROM personas ORDER BY id ASC");
    $queryDataNombrePersonas   = mysqli_query($con, $sqlNombrePersonas);
    $totalNombrePersonas       = mysqli_num_rows($queryDataNombrePersonas);
    ?>

      <h6 class="text-center">
        Nombre de Personas  <strong>(<?php echo $totalProducts; ?>)</strong>
      </h6>

        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
               <th>Nombres de Personas</th>
              <th>Sexo</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i = 1;
            while ($dataPersona = mysqli_fetch_array($queryDataNombrePersonas)) { ?>
            <tr>
              <th><?php echo $i++; ?></th>
              <td><?php echo $dataPersona['nombre']; ?></td>
              <td><?php echo $dataPersona['sexo']; ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>

    </div>
  </div>

</div>


<script src="js/jquery.min.js"></script>
<script src="'js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(window).load(function() {
            $(".cargando").fadeOut(500);
        });      
});
</script>

</body>
</html>