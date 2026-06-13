<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}

$admin = (string) $_SESSION['admin'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CONTROL DE CLIENTES</title>
    <link href="css/estilo.css" rel="stylesheet">
</head>
<body class="pagina-principal">
    <header class="cabecera-app">
        <?php require 'encabezado.php'; ?>
        <p class="centrado barra-usuario">
            Bienvenido &gt; <?php echo htmlspecialchars($admin, ENT_QUOTES, 'UTF-8'); ?><br>
            | <a href="cerrar.php">Cerrar sesión</a> |
        </p>
    </header>
    <section class="contenido-principal">
        <table class="tabla-menu" cellspacing="5">
            <tr>
                <td>
                    <a href="#"><img src="imagenes/icono_cliente.svg" width="60" height="60" alt=""></a>
                </td>
                <td><a href="#">Registro de clientes</a></td>
            </tr>
            <tr>
                <td>
                    <a href="#"><img src="imagenes/icono_lista.svg" width="60" height="60" alt=""></a>
                </td>
                <td><a href="#">Listado de clientes</a></td>
            </tr>
            <tr>
                <td>
                    <a href="cerrar.php"><img src="imagenes/icono_salida.svg" width="60" height="60" alt=""></a>
                </td>
                <td><a href="cerrar.php">Salir</a></td>
            </tr>
        </table>
    </section>
    <footer>
        <?php require 'pie.php'; ?>
    </footer>
</body>
</html>
