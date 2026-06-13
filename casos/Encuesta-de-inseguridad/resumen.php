<?php 
    session_start();
    $_SESSION['Pregunta5']=$_POST['preg5'];
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
       <h3>INFORME DE ENCUESTA</h3>
    </header>
<?php
      $nombres = $_SESSION['nombres'];
      $dni = $_SESSION['dni'];
      $pregunta1 = $_SESSION['Pregunta1'];
      $pregunta2= $_SESSION['Pregunta2'];
      $pregunta3 = $_SESSION['Pregunta3'];
      $pregunta4 = $_SESSION['Pregunta4'];
      $pregunta5 = $_SESSION['Pregunta5'];
    ?>
   <section>
     <form method="POST" action="resumen.php">
       <table border="1" width="700" cellspacing="10" cellpadding="0">
          <tr>
            <td>Nombre del ciudadano</td>
            <td><?php echo $nombres; ?></td>
          </tr>
          <tr>
            <td>DNI</td>
            <td><?php echo $dni; ?></td>
          </tr>
          <tr>
            <td>¿Cómo se siente a nivel de seguridad en la ciudad de Lima?
            </td>
            <td><?php echo $pregunta1; ?></td>
          </tr>
          <tr>
            <td>¿Qué tipo de delito cree usted que es el más 
                común en su zona de residencia?</td>
            <td><?php echo $pregunta2; ?></td>
          </tr>
          <tr>
            <td>¿Generalmente que día cree usted que ocurre 
                más incidencias?</td>
            <td><?php echo $pregunta3; ?></td>
          </tr>
          <tr>
            <td>¿Cuál que usted que deben ser las medidas que las 
                 autoridades deben aplicar para combatir estas 
                 incidencias?</td>
            <td><?php echo $pregunta4; ?></td>
          </tr>
          <tr>
            <td>¿Usted conoce las medidas que implementa la policía 
                del Perú para disminuir la delincuencia?</td>
            <td><?php echo $pregunta5; ?></td>
          </tr>
          <tr>
            <td> 
                <input type="submit" value="< Anterior" 
                       onclick = "this.form.action = 'pregunta5.php'" />
                <input type="submit" value="Volver a encuestar" 
                       onclick = "this.form.action = 'index.php'" />
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