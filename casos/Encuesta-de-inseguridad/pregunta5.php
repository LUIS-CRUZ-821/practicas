<?php 
    session_start();
    if (isset($_POST['preg4'])) {
        $_SESSION['Pregunta4'] = $_POST['preg4'];
    }
?>
<!DOCTYPE html> 
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <link href="css/estilo.css" rel="stylesheet">
  </head>
  <body>
    <header>
<?php include 'encabezado.php'; ?>
    </header>
    <section>
      <form method="POST" action="pregunta5.php">
         <table border="1" width="700" cellspacing="10" cellpadding="0">
           <tr>
             <th colspan="2">¿Usted conoce las medidas que implementa la 
                        policía del Perú para disminuir la delincuencia?</th>
           </tr>
           <tr>
             <td></td>
             <td> 
               <input type="radio" name="preg5" value="Si" />Si<br/>                          
               <input type="radio" name="preg5" value="No" />No<br/>                          
             </td>
           </tr>
           <tr>
             <td></td>
             <td> 
               <input type="submit" value="< Anterior" 
                      onclick = "this.form.action = 'pregunta4.php'" />
               <input type="submit" value="Siguiente >" 
                      onclick = "this.form.action = 'resumen.php'" />
             </td>
           </tr>
         </table>
      </form>
   </section>            
   <footer>
<?php include 'pie.php';?>
   </footer>    
 </body>
</html>