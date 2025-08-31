<?php
include '../global/config.php';
include '../global/conexion.php';
include '../templates/cabecera.php';

// Obtener todas las ventas
$sentencia = $pdo->prepare("SELECT * FROM tblventas ORDER BY ID DESC");
$sentencia->execute();
$ventas = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-4">
    <h2>Listado de Ventas</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Venta</th>
                <th>Cliente</th>
                <th>Total</th>
                <th>Fecha</th>
                <th>Status</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($ventas as $venta): ?>
                <tr>
                    <td><?php echo $venta['ID']; ?></td>
                    <td><?php echo $venta['Correo']; ?></td>
                    <td>$<?php echo number_format($venta['Total'],2); ?></td>
                    <td><?php echo $venta['Fecha']; ?></td>
                    <td><?php echo $venta['status']; ?></td>
                    <td>
                        <a href="detalle_venta.php?id=<?php echo $venta['ID']; ?>" class="btn btn-info btn-sm">
                            Ver Detalle
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include '../templates/pie.php'; ?>