<?php

session_start();
require_once __DIR__ . '/capturaDatos.php';
require_once __DIR__ . '/asignaciones.php';

$codigo = getProducto();
$cantidad = getCantidad();

if ($codigo === '') {
    header('Location: index.php');
    exit;
}

if (!isset($_SESSION[CLAVE_CARRITO])) {
    $_SESSION[CLAVE_CARRITO] = [];
}

if (isset($_SESSION[CLAVE_CARRITO][$codigo])) {
    $_SESSION[CLAVE_CARRITO][$codigo] += $cantidad;
} else {
    $_SESSION[CLAVE_CARRITO][$codigo] = $cantidad;
}

$tSubtotal = 0.0;
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Canasta - Carrito de compras</title>
    <link href="css/estilo.css" rel="stylesheet">
  </head>
  <body>
    <header>
      <?php require_once __DIR__ . '/encabezado.php'; ?>
    </header>
    <section>
      <table border="1" width="550" cellspacing="10" cellpadding="0">
        <tr>
          <td colspan="5">
            <img src="imagenes/carrito.png" width="80" height="80" alt="Carrito">
          </td>
        </tr>
        <tr>
          <th>Codigo</th>
          <th>Descripcion</th>
          <th>Precio</th>
          <th>Cantidad</th>
          <th>Subtotal</th>
        </tr>
        <?php foreach ($_SESSION[CLAVE_CARRITO] as $cod => $cant) { ?>
          <?php
          $subtotal = $cant * asignaPrecio($cod);
          $tSubtotal += $subtotal;
          ?>
        <tr>
          <td id="centrado"><?php echo htmlspecialchars($cod, ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars(muestraDescripcion($cod), ENT_QUOTES, 'UTF-8'); ?></td>
          <td id="derecha"><?php echo '$' . number_format(asignaPrecio($cod), 2); ?></td>
          <td id="centrado"><?php echo (int) $cant; ?></td>
          <td id="derecha"><?php echo '$' . number_format($subtotal, 2); ?></td>
        </tr>
        <?php } ?>
        <tr>
          <td id="resaltado">Total a Pagar</td>
          <td></td>
          <td></td>
          <td></td>
          <td id="totales"><?php echo '$' . number_format($tSubtotal, 2); ?></td>
        </tr>
        <tr>
          <td colspan="5"><a href="index.php">Seguir comprando..!!</a></td>
        </tr>
        <tr>
          <td colspan="5"><a href="destruir.php">Finalizar la compra</a></td>
        </tr>
      </table>
    </section>
    <footer>
      <?php require_once __DIR__ . '/pie.php'; ?>
    </footer>
  </body>
</html>
