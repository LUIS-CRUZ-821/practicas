<?php 
    session_start();
    $_SESSION['Pregunta1']=$_POST['preg1'];
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
            <form method="POST" action="pregunta2.php">
                <table border="1" width="700" 
                       cellspacing="10" cellpadding="0">
                <tr>
                    <th colspan="2">¿Qué tipo de delito cree usted 
                                     que es el más 
                                     común en su zona de residencia?</th>
                </tr>
                <tr>
                    <td></td>
                    <td> 
                        <input type="radio" name="preg2" 
                              value="Hurto" />Hurto<br/>                          
                        <input type="radio" name="preg2" 
                               value="Robo por descuido" />
                               Robo por descuido<br/>                          
                        <input type="radio" name="preg2" 
                               value="Robo de vehículo" />
                               robo de vehículo<br/>                          
                        <input type="radio" name="preg2" 
                               value="Intento de hurto" />
                               Intento de hurto<br/>
                        <input type="radio" name="preg2" 
                               value="Estafa" />Estafa<br/>                          
                        <input type="radio" name="preg2" 
                               value="Asesinato" />Asesinato                          
                    </td>
                </tr>
                <tr>                    
                    <td></td>
                    <td> 
                        <input type="submit" 
                             value="< Anterior" 
                             onclick="this.form.action='pregunta1.php'"/>
                        <input type="submit" value="Siguiente >" 
                             onclick="this.form.action='pregunta3.php'"/>
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
