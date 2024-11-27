<?php

require_once '../config/database.php';
require_once 'funciones.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productoController = new ProductoController();
    try {
        $productoController->crearProducto($_POST);
        header('Location: index.php');
        exit;
    } catch (Exception $e) {
        throw new Exception("Error al crear el producto: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Nuevo Producto</title>
</head>
<body>
    <div class="container mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="index.php">Productos</a></li>
                <li class="breadcrumb-item">Nuevo Producto</li>
            </ol>
        </nav>
        <h1>Nuevo Producto</h1>
        <form method="POST" class="needs-validation">
            <div class="mb-3">
                <label class="form-label">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
                <div class="invalid-feedback">
                    Por favor ingrese el nombre del producto
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Precio:</label>
                <input type="number" id="precio" name="precio" step="0.01" class="form-control" required>
                <div class="invalid-feedback">
                    Por favor ingrese un precio válido
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="form-control" required></textarea>
                <div class="invalid-feedback">
                    Por favor ingrese una descripción
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Categoría:</label>
                <select id="categoria" name="categoria" class="form-control" required>
                    <option value="Hamburguesa">Hamburguesa</option>
                    <option value="Bebida">Bebida</option>
                    <option value="Salchipapa">Salchipapa</option>
                    <option value="Alitas">Alitas</option>
                    <option value="pizza">Pizza</option>
                </select>
                <div class="invalid-feedback">
                    Por favor ingrese la categoría
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Disponible:</label>
                <select id="disponible" name="disponible" class="form-control" required>
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
                <div class="invalid-feedback">
                    Por favor seleccione si el producto está disponible
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="index.php" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>