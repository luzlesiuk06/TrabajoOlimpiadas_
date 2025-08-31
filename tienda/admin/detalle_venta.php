<?php
include '../global/config.php';
include '../global/conexion.php';
include '../templates/cabecera.php';

// Obtener ID de la venta
$idVenta = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Si se actualiza el estado
if(isset($_POST['actualizar'])){
    $nuevoStatus = $_POST['status'];
    $update = $pdo->prepare("UPDATE tblventas SET status=:status WHERE ID=:id");
    $update->bindParam(":status", $nuevoStatus);
    $update->bindParam(":id", $idVenta);
    $update->execute();
}

// Traer datos de la venta
$sentenciaVenta = $pdo->prepare("SELECT * FROM tblventas WHERE ID=:id");
$sentenciaVenta->bindParam(":id", $idVenta);
$sentenciaVenta->execute();
$venta = $sentenciaVenta->fetch(PDO::FETCH_ASSOC);

// Traer detalle de productos
$sentenciaDetalle = $pdo->prepare("SELECT dv.*, p.Nombre 
    FROM tbldetalleventa dv 
    INNER JOIN tblproductos p ON dv.IDPRODUCTO = p.ID 
    WHERE dv.IDVENTA=:id");
$sentenciaDetalle->bindParam(":id", $idVenta);
$sentenciaDetalle->execute();
$detalles = $sentenciaDetalle->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-4">
    <h2>Detalle de la Venta #<?php echo $venta['ID']; ?></h2>
    <p><strong>Cliente:</strong> <?php echo $venta['Correo']; ?></p>
    <p><strong>Total:</strong> $<?php echo number_format($venta['Total'],2); ?></p>
    <p><strong>Fecha:</strong> <?php echo $venta['Fecha']; ?></p>
    <p><strong>Status:</strong> <?php echo $venta['status']; ?></p>

    <form method="post" class="mb-3">
        <label for="status">Actualizar estado:</label>
        <select name="status" class="form-control" style="width:200px;display:inline-block;">
            <option value="Pendiente" <?php if($venta['status']=="Pendiente") echo "selected"; ?>>Pendiente</option>
            <option value="Entregado" <?php if($venta['status']=="Entregado") echo "selected"; ?>>Entregado</option>
        </select>
        <button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button>
    </form>

    <h4>Productos de la venta</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio Unitario</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($detalles as $detalle): ?>
                <tr>
                    <td><?php echo $detalle['Nombre']; ?></td>
                    <td>$<?php echo number_format($detalle['PRECIOUNITARIO'],2); ?></td>
                    <td><?php echo $detalle['CANTIDAD']; ?></td>
                    <td>$<?php echo number_format($detalle['PRECIOUNITARIO']*$detalle['CANTIDAD'],2); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include '../templates/pie.php'; ?>