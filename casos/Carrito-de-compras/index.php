<?php

session_start();
require_once __DIR__ . '/capturaDatos.php';
$producto = getProducto();
$selP1 = $selP2 = $selP3 = $selP4 = $selP5 = $selP6 = $selP7 = $selP8 = $selP9 = $selP10 = '';
require_once __DIR__ . '/seleccionaProducto.php';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Carrito de compras</title>
    <link href="css/estilo.css" rel="stylesheet">
  </head>
  <body>
    <header>
      <?php require_once __DIR__ . '/encabezado.php'; ?>
    </header>
    <section>
      <form name="frmSeleccion" method="post" action="index.php">
        <table border="1" width="780" cellspacing="10" cellpadding="1">
          <tr>
            <td width="200">Seleccione un producto</td>
            <td width="300">
              <select name="selProducto" onchange="this.form.submit()">
                <option value="p001" <?php echo $selP1; ?>>Gaseosa</option>
                <option value="p002" <?php echo $selP2; ?>>
                  Mayonesa en sobre
                </option>
                <option value="p003" <?php echo $selP3; ?>>
                  Chocolate para niños
                </option>
                <option value="p004" <?php echo $selP4; ?>>Fideos</option>
                <option value="p005" <?php echo $selP5; ?>>Conservas</option>
                <option value="p006" <?php echo $selP6; ?>>Chocolate</option>
                <option value="p007" <?php echo $selP7; ?>>
                  Cafe 300mg.
                </option>
                <option value="p008" <?php echo $selP8; ?>>
                  Mayonesa pote
                </option>
                <option value="p009" <?php echo $selP9; ?>>
                  Crema Dental
                </option>
                <option value="p010" <?php echo $selP10; ?>>
                  Cubito de pollo
                </option>
              </select>
            </td>
            <td rowspan="3" width="220">
              <?php if (isset($_POST['selProducto'])) { ?>
                <img class="vista-producto"
                     src="fotosProductos/<?php echo htmlspecialchars(getProducto(), ENT_QUOTES, 'UTF-8'); ?>.jpg"
                     width="200"
                     height="200"
                     alt="Vista del producto seleccionado">
              <?php } ?>
            </td>
          </tr>
          <tr>
            <td>Cantidad</td>
            <td><input type="text" name="txtCantidad" value=""></td>
          </tr>
          <tr>
            <td>
              <input type="submit" value="Comprar"
                     onclick="this.form.action = 'canasta.php'"
                     name="btnComprar">
            </td>
            
          </tr>
        </table>
      </form>
    </section>
    <footer>
      <?php require_once __DIR__ . '/pie.php'; ?>
    </footer>
  </body>
</html>
