<?php
session_start();
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="UTF-8">
    <title>Listado de productos</title>
    <link href="css/estilo.css" rel="stylesheet">
 </head>
 <body>
   <header>
 <?php include 'encabezado.php'; ?>
   </header>
   <section>
      <h4 id="centrado">Listado de productos</h4>
<?php
$productos = $_SESSION['misProductos'] ?? [];
if (count($productos) > 0) {
?>
      <table border="1" width="600" cellspacing="10" cellpadding="1">
         <tr>
           <th>DESCRIPCION DEL PRODUCTO</th>
           <th>STOCK</th>
           <th>PRECIO</th>
         </tr>
<?php
    foreach ($productos as $producto) {
?>
         <tr>
            <td><?php echo htmlspecialchars($producto['descripción'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($producto['stock'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo '$' . number_format((float) $producto['precio'], 2); ?></td>
         </tr>
<?php
    }
?>
      </table>
<?php
} else {
    echo '<p id="centrado">No hay productos en la canasta..!!!</p>';
}
?>
    </section>
    <footer>
      <p id="centrado">
         <a href="index.php">Seguir regristando..!!</a> |
         <a href="destruir.php">Cerrar sesión</a>
      </p>
 <?php include 'pie.php'; ?>
    </footer>
  </body>
</html>
