<?php
session_start();

if (!isset($_SESSION['candidata1'])) {
    $_SESSION['candidata1'] = 0;
    $_SESSION['candidata2'] = 0;
    $_SESSION['candidata3'] = 0;
    $_SESSION['candidata4'] = 0;
    $_SESSION['total'] = 0;
}

$total = (int) $_SESSION['total'];
if ($total > 0) {
    $pcandidata1 = ($_SESSION['candidata1'] * 100) / $total;
    $pcandidata2 = ($_SESSION['candidata2'] * 100) / $total;
    $pcandidata3 = ($_SESSION['candidata3'] * 100) / $total;
    $pcandidata4 = ($_SESSION['candidata4'] * 100) / $total;
} else {
    $pcandidata1 = $pcandidata2 = $pcandidata3 = $pcandidata4 = 0;
}

$arreglo = array(
    'Marisol Romero' => $_SESSION['candidata1'],
    'Cesia Alfaro' => $_SESSION['candidata2'],
    'Micaela Borja' => $_SESSION['candidata3'],
    'Karla Guerrero' => $_SESSION['candidata4'],
);
arsort($arreglo);
$candidata = array_key_first($arreglo);
$puntaje = $arreglo[$candidata];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reyna de Primavera 2015 — Votación</title>
        <link href="css/estilo.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <h3 id="centrado">VOTACION DE CANDIDATAS</h3>
            <h2 id="titulo">REYNA DE PRIMAVERA 2015</h2>
        </header>
        <section>
            <form name="frmVotacion" method="POST" action="conteo.php">
                <table class="tabla-voto">
                <tr>
                    <td id="centrado"><img class="candidata-foto" src="imagenes/candidata1.jpg" alt="Marisol Romero"/></td>
                    <td id="centrado"><img class="candidata-foto" src="imagenes/candidata2.avif" alt="Cesia Alfaro"/></td>
                </tr>
                <tr>
                  <td id="centrado">Marisol Romero 19 años <br>
                    <input type="submit" value="Votar" name="btnBoton1"/><br>
                    TOTAL DE VOTOS: <?php echo $_SESSION['candidata1']; ?><br>
                    PORCENTAJE DE VOTOS: <?php echo round($pcandidata1,2);?>%
                  </td>
                  <td id="centrado">Cesia Alfaro 22 años<br>
                    <input type="submit" value="Votar" name="btnBoton2" /><br>
                    TOTAL DE VOTOS:<?php echo $_SESSION['candidata2']; ?><br>
                    PORCENTAJE DE VOTOS:<?php echo round($pcandidata2,2); ?>%
                  </td>
                </tr>
                <tr>
                  <td id="centrado"><img class="candidata-foto" src="imagenes/candidata3.webp" alt="Micaela Borja"/></td>
                  <td id="centrado"><img class="candidata-foto" src="imagenes/candidata4.jpeg" alt="Karla Guerrero"/></td>
                </tr>
                <tr>
                  <td id="centrado">Micaela Borja 20 años<br>
                  <input type="submit" value="Votar" name="btnBoton3" /><br>
                  TOTAL DE VOTOS:<?php echo $_SESSION['candidata3'];?><br>
                  PORCENTAJE DE VOTOS:<?php echo round($pcandidata3,2);?>%
                 </td>
                 <td id="centrado">Karla Guerrero 21 años<br>
                   <input type="submit" value="Votar" name="btnBoton4" /><br>
                   TOTAL DE VOTOS: <?php echo $_SESSION['candidata4'];?><br>
                   PORCENTAJE DE VOTOS:<?php echo round($pcandidata4,2);?>%
                 </td>
                </tr>
                </table>
            </form>
            <table class="tabla-resumen">
                <tr>
                    <td id="ganadora">TOTAL DE VOTANTES:
<?php echo $_SESSION['total']; ?>
                    </td>
                </tr>
                <tr>
                    <td id="ganadora">GANADORA:<?php echo $candidata; ?>
                        (<?php echo $puntaje; ?> votos)
                    </td>
                </tr>
            </table>
        </section>
        <footer>
            <h5 id="centrado">Todos los derechos reservados @2015
                          Diseñado por M@nuel Torres</h5>
        </footer>
    </body>
</html>
