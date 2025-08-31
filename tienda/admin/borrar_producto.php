<?php
session_start();
include '../global/config.php';
include '../global/conexion.php';

$id = $_GET['id'];
$sentencia = $pdo->prepare("DELETE FROM tblproductos WHERE ID=:ID");
$sentencia->bindParam(":ID",$id);
$sentencia->execute();

$_SESSION['mensaje'] = "Producto eliminado correctamente!";
header("Location: productos.php");