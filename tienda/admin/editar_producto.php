<?php
session_start();
include '../global/config.php';
include '../global/conexion.php';
include 'cabecera.php';

$id = $_GET['id'];
$sentencia = $pdo->prepare("SELECT * FROM tblproductos WHERE ID=:ID");
$sentencia->bindParam(":ID",$id);
$sentencia->execute();
$producto = $sentencia->fetch(PDO::FETCH_ASSOC);

if($_POST){
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_POST['imagen'];

    $sentencia = $pdo->prepare("UPDATE tblproductos SET Nombre=:Nombre, Precio=:Precio, Descripcion=:Descripcion, Imagen=:Imagen WHERE ID=:ID");
    $sentencia->bindParam(":Nombre",$nombre);
    $sentencia->bindParam(":Precio",$precio);
    $sentencia->bindParam(":Descripcion",$descripcion);
    $sentencia->bindParam(":Imagen",$imagen);
    $sentencia->bindParam(":ID",$id);
    $sentencia->execute();

    $_SESSION['mensaje'] = "Producto actualizado correctamente!";
    header("Location: productos.php");
}
?>

<div class="container">
    <h2>Editar Producto</h2>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required class="form-control" value="<?= $producto['Nombre'] ?>">
        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" required class="form-control" value="<?= $producto['Precio'] ?>">
        <label>Descripción:</label>
        <textarea name="descripcion" class="form-control"><?= $producto['Descripcion'] ?></textarea>
        <label>URL Imagen:</label>
        <input type="text" name="imagen" class="form-control" value="<?= $producto['Imagen'] ?>">
        <br>
        <button class="btn btn-primary" type="submit">Actualizar</button>
    </form>
</div>

<?php include 'pie.php'; ?>