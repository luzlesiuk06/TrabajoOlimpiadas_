<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    
    <link rel="stylesheet" href="archivos/estilos.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7t27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAk/l8wvCWPIPm49" crossorigin="anonymous"></script>
    
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="..." crossorigin="anonymous"></script>
</head>

<body>
    
    <nav class="navbar navbar-expand-lg custom-navbar fixed-top">
  <a class="navbar-brand" href="index.php">
  <img src="archivos/logo.jpg" alt="Logo" class="logo-navbar">
  <span>Betty viajes</span>
</a>


  <div class="collapse navbar-collapse" id="my-nav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
        <img src="archivos/logoInicio.jpg" alt="Inicio" class="nav-icon" style=height:40px; width:5px; margin-right:1px;> Inicio </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mostrarCarrito.php">
            <img src="archivos/logoCarrito.jpg" alt="Carrito" class="nav-icon" style=height:40px; width:5px; margin-right:1px;>Carrito (<?php echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']); ?>)</a>
      </li>
    </ul>
  </div>
</nav>




    <br/>
    <br/>
    <div class="container">