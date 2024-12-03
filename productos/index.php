<?php
    require_once '../config/database.php';
    require_once 'funciones.php';

    $productoController = new ProductoController();
    $productos = $productoController->listarProductos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Productos</title>
</head>
<body>
    <div class="container mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                <li class="breadcrumb-item active">Productos</li>
            </ol>
        </nav>

        <div class="row mb-3">
            <div class="col">
                <h1>Gestión de Productos</h1>
            </div>
            <div class="col text-end">
                <a href="nuevo.php" class="btn btn-primary">Nuevo Producto</a>
            </div>
        </div>

        <table class="table table-striped table-bordered -table-hover table-condensed">
            <thead>
                <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Categoría</th>
                <th>Descripción</th>
                <th>Disponible</th>
                <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?php echo $producto->nombre; ?></td>
                    <td>$<?php echo number_format($producto->precio, 2); ?></td>
                    <td><?php echo $producto->categoria; ?></td>
                    <td><?php echo substr($producto->descripcion, 0, 50) . '...'; ?></td>
                    <td>
                        <?php echo $producto->disponible ? 'Si':'No'; ?>
                    </td>
                    <td>
                        <a href="editar.php?id=<?PHP echo $producto->_id; ?>" class="btn btn-warning">Editar</a>
                        <a href="funciones.php?action=eliminar&id=<?PHP echo $producto->_id ?>" 
                            class="btn btn-danger"
                            onclick="return confirm('¿Está seguro de eliminar este producto?')">
                        Eliminar
                        </a>
                    </td>
                </tr>
            <?PHP endforeach;  ?>
            </tbody>
        </table>

    </div>
</body>
</html>