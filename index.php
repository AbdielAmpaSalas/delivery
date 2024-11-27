<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema de Gestión de Restaurante</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
      body {
          background-color: #f8f9fa; /* Color de fondo */
      }
      .container {
          height: 100vh; /* Altura total de la ventana */
          display: flex;
          flex-direction: column;
          justify-content: center; /* Centra verticalmente */
          align-items: center; /* Centra horizontalmente */
      }
  </style>
</head>
<body>
  <div class="container">
      <h1>Bienvenido al Sistema de Gestión de Restaurante</h1>

      <h2 class="mt-4">Opciones Disponibles</h2>
      <ul class="list-unstyled mt-3">
          <li>
              <center><a href="clientes/index.php" class="btn btn-primary btn-lg">Gestión de Clientes</a></center>
          </li>
          <li class="mt-2">
              <center><a href="productos/index.php" class="btn btn-success btn-lg">Gestión de Productos</a></center>
          </li>
          <li class="mt-2">
                <center><a href="pedidos/index.php" class="btn btn-warning btn-lg">Gestión de Pedidos</a></center>
          </li>
      </ul>
  </div>
</body>
</html>