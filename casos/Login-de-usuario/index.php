<?php
session_start();

if (isset($_SESSION['admin'])) {
    header('Location: principal.php');
    exit;
}

$error = '';
if (isset($_SESSION['error'])) {
    $error = (string) $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso — Control de clientes</title>
    <link href="css/estilo.css" rel="stylesheet">
</head>
<body class="pagina-login">
    <section class="contenedor-login">
        <?php if ($error !== ''): ?>
            <p class="mensaje-error" role="alert"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>
        <form name="frmLogin" method="post" action="login.php">
            <table class="tabla-login" cellspacing="0" cellpadding="5">
                <tr>
                    <td colspan="3">
                        <p id="titulo">Acceso</p>
                    </td>
                </tr>
                <tr>
                    <td id="derecha" width="150">Usuario</td>
                    <td>
                        <input type="text" name="txtUsuario" value="" autocomplete="username" required>
                    </td>
                    <td rowspan="4">
                        <img src="imagenes/usuario.svg" width="200" height="200" alt="Usuario">
                    </td>
                </tr>
                <tr>
                    <td id="derecha">Clave</td>
                    <td>
                        <input type="password" name="txtClave" maxlength="64" autocomplete="current-password" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <label class="recordar">
                            <input type="checkbox" name="recordar" value="1">
                            Recordar la clave
                        </label>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input id="boton" type="submit" name="btnLogin" value=" LOGIN ">
                    </td>
                </tr>
            </table>
        </form>
    </section>
</body>
</html>
