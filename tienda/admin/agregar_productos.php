<?php
session_start();
include '../global/config.php';
include '../global/conexion.php';
include 'cabecera.php';

if($_POST){
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_POST['imagen'];

    $sentencia = $pdo->prepare("INSERT INTO tblproductos (Nombre, Precio, Descripcion, Imagen) VALUES (:Nombre, :Precio, :Descripcion, :Imagen)");
    $sentencia->bindParam(":Nombre",$nombre);
    $sentencia->bindParam(":Precio",$precio);
    $sentencia->bindParam(":Descripcion",$descripcion);
    $sentencia->bindParam(":Imagen",$imagen);
    $sentencia->execute();

    $_SESSION['mensaje'] = "Producto agregado correctamente!";
    header("Location: productos.php");
}
?>

<div class="container">
    <h2>Agregar Producto</h2>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required class="form-control">
        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" required class="form-control">
        <label>Descripción:</label>
        <textarea name="descripcion" class="form-control"></textarea>
        <label>URL Imagen:</label>
        <input type="text" name="imagen" class="form-control">
        <br>
        <button class="btn btn-success" type="submit">Agregar</button>
    </form>
</div>

<?php include 'pie.php'; ?>