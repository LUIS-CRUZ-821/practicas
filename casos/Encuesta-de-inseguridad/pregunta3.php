<?php 
    session_start();
    $_SESSION['Pregunta2']=$_POST['preg2'];
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
        <form method="POST" action="pregunta3.php">
           <table border="1" width="700" cellspacing="10" cellpadding="0">
             <tr>
               <th colspan="2">¿Generalmente que día cree usted que 
                                ocurre más incidencias?</th>
             </tr>
             <tr>
                <td></td>
                <td> 
                  <input type="radio" name="preg3" 
                         value="Cualquier día" />Cualquier día<br/>                          
                  <input type="radio" name="preg3" 
                         value="Fin de semana" />Fin de semana<br/>                          
                  <input type="radio" name="preg3" 
                         value="Fin de mes" />Fin de mes<br/>                          
                  <input type="radio" name="preg3" 
                         value="Fechas de pago" />Fechas de pago                          
               </td>
            </tr>
            <tr>
               <td></td>
               <td> 
                  <input type="submit" 
                         value="< Anterior" 
                         onclick = "this.form.action = 'pregunta2.php'" />
                  <input type="submit" 
                         value="Siguiente >" 
                         onclick = "this.form.action = 'pregunta4.php'" />
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