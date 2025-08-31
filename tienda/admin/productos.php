<?php
session_start();
include '../global/config.php';
include '../global/conexion.php';
include 'cabecera.php';

// Obtener lista de productos
$sentencia = $pdo->prepare("SELECT * FROM tblproductos");
$sentencia->execute();
$listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2>Gestión de Productos</h2>
    <a href="agregar_producto.php" class="btn btn-success mb-3">Agregar Producto</a>

    <!-- Toast para mensajes -->
    <?php if(isset($_SESSION['mensaje'])): ?>
    <div id="toast" class="toast-success">
        <?= $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?>
    </div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaProductos as $producto): ?>
            <tr>
                <td><?= $producto['ID'] ?></td>
                <td><?= $producto['Nombre'] ?></td>
                <td>$<?= $producto['Precio'] ?></td>
                <td><?= $producto['Descripcion'] ?></td>
                <td><img src="<?= $producto['Imagen'] ?>" width="80"></td>
                <td>
                    <a href="editar_producto.php?id=<?= $producto['ID'] ?>" class="btn btn-primary">Editar</a>
                    <a href="borrar_producto.php?id=<?= $producto['ID'] ?>" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres borrar este producto?')">Borrar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<style>
/* Botones */
.btn-success {
    background-color: #0a9a89;
    border-color: #098d65;
    color: #ffffff;
}
.btn-success:hover { background-color: #027360; border-color: #027360; color: #ffffff; }
.btn-primary { background-color: #007bff; border-color: #007bff; color: #ffffff; }
.btn-primary:hover { background-color: #0056b3; border-color: #0056b3; color: #ffffff; }
.btn-danger { background-color: #dc3545; border-color: #c82333; color: #ffffff; }
.btn-danger:hover { background-color: #b21f2d; border-color: #b21f2d; color: #ffffff; }

/* Tablas */
.table {
    width: 100%;
    border: 2px solid #098d65;
    border-collapse: collapse;
    margin-bottom: 20px;
}
.table th, .table td {
    border: 1px solid #098d65;
    padding: 10px;
    text-align: center;
    vertical-align: middle;
    font-size: 16px;
    color: #000000;
}

/* Toast */
.toast-success {
    position: fixed;
    top: 20px;
    right: 20px;
    background: #0a9a89;
    color: #ffffff;
    padding: 15px 25px;
    border-radius: 5px;
    z-index: 9999;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    opacity: 1;
    transition: opacity 0.5s ease-out;
}

/* Fondo y contenedor */
body {
    background: #0a9a89;
    color: #000000;
    font-family: Arial, sans-serif;
}
h2 { color: #ffffff; margin-bottom: 20px; }
.container { padding: 20px; }
</style>

<script>
setTimeout(() => {
    const toast = document.getElementById('toast');
    if(toast){
        toast.style.opacity = '0';
        setTimeout(() => toast.remove(), 500);
    }
}, 3000); // desaparece después de 3 segundos
</script>

<?php include 'pie.php'; ?>