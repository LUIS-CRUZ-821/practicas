<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$usuario = isset($_POST['txtUsuario']) ? trim((string) $_POST['txtUsuario']) : '';
$clave = isset($_POST['txtClave']) ? (string) $_POST['txtClave'] : '';

if ($usuario === 'pmtorres' && $clave === 'php') {
    $_SESSION['admin'] = $usuario;
} else {
    $_SESSION['error'] = 'Usuario o clave incorrectos';
}

header('Location: index.php');
exit;
