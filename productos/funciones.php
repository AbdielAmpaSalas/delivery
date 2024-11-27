<?php
require_once __DIR__ . '/../config/database.php';

class ProductoController {
    private $db;
    private $collection;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getDatabase();
        $this->collection = $this->db->productos;
    }

    public function listarProductos() {
        try {
            return $this->collection->find([], [
                'sort' => ['nombre' => 1]
            ]);
        } catch (Exception $e) {
            throw new Exception("Error al listar los productos: " . $e->getMessage());
        }
    }

    public function crearProducto($datos) {
        try {
            $this->collection->insertOne([
                'nombre' => $datos['nombre'],
                'precio' => $datos['precio'],
                'descripcion' => $datos['descripcion'],
                'categoria' => $datos['categoria'],
                'disponible' => (bool)$datos['disponible']
            ]);
        } catch (Exception $e) {
            throw new Exception("Error al crear el producto: " . $e->getMessage());
        }
    }

    public function obtenerProducto($id) {
        try {
            return $this->collection->findOne([
                '_id' => new MongoDB\BSON\ObjectId($id)
            ]);
        } catch (Exception $e) {
            throw new Exception("Error al obtener el producto: " . $e->getMessage());
        }
    }

    public function actualizarProducto($id, $datos) {
        try {
            $this->collection->updateOne(
                ['_id' => new MongoDB\BSON\ObjectId($id)],
                ['$set' => [
                    'nombre' => $datos['nombre'],
                    'precio' => $datos['precio'],
                    'descripcion' => $datos['descripcion'],
                    'categoria' => $datos['categoria'],
                    'disponible' => (bool)$datos['disponible']
                ]]
            );
        } catch (Exception $e) {
            throw new Exception("Error al actualizar el producto: " . $e->getMessage());
        }
    }

    public function eliminarProducto($id) {
        try {
            $producto = $this->obtenerProducto($id);
            if (!$producto) {
                throw new Exception("Producto no encontrado");
            }

            $resultado = $this->collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
            if ($resultado->getDeletedCount() === 0) {
                throw new Exception("No se pudo eliminar el producto");
            }
        } catch (Exception $e) {
            throw new Exception("Error al eliminar el producto: " . $e->getMessage());
        }
    }
}

if (isset($_GET['action']) && isset($_GET['id'])) {
    $controller = new ProductoController();

    if ($_GET['action'] === 'eliminar') {
        $controller->eliminarProducto($_GET['id']);
        header('Location: index.php');
    }
}
?>