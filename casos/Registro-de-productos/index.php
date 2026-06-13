<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Control de productos</title>
    <link href="css/estilo.css" rel="stylesheet">
  </head>
  <body>
    <header>
<?php include 'encabezado.php'; ?>
    </header>
    <section>
      <h4 id="centrado">Registro del nuevo producto</h4>
<?php include 'capturaDatos.php'; ?>
      <form name="frmPrincipal" method="POST" action="agregarProducto.php">
         <table border="1" width="600" cellspacing="10" cellpadding="0">
           <tr>
              <td>Descripción del Producto</td>
              <td><input type="text" name="txtDescripcion"
                   value="<?php echo htmlspecialchars(getDescripcion(), ENT_QUOTES, 'UTF-8'); ?>" size="60"/></td>
           </tr>
           <tr>
             <td>Stock</td>
             <td><input type="text" name="txtStock"
                        value="<?php echo htmlspecialchars(getStock(), ENT_QUOTES, 'UTF-8'); ?>" /></td>
           </tr>
           <tr>
             <td>Precio de producto</td>
             <td><input type="text" name="txtPrecio"
                        value="<?php echo htmlspecialchars(getPrecio(), ENT_QUOTES, 'UTF-8'); ?>" /></td>
           </tr>
           <tr>
             <td><input type="submit" name="btnListado"
                    onclick="this.form.action = 'listadoProductos.php'"
                    value="Ver listado de productos" />
             </td>
             <td><input type="submit" name="btnRegistrar"
                    onclick="this.form.action = 'agregarProducto.php'"
                    value="Registrar producto" /></td>
           </tr>
         </table>
       </form>
   </section>
   <footer>
<?php include 'pie.php'; ?>
   </footer>
  </body>
</html>
