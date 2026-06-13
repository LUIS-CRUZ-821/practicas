<?php
session_start();

if (isset($_POST['txtDescripcion']) && trim($_POST['txtDescripcion']) !== '') {
    $productos = $_SESSION['misProductos'] ?? [];
    $descripcion = trim($_POST['txtDescripcion']);
    $productos[$descripcion] = [
        'descripción' => $descripcion,
        'stock' => isset($_POST['txtStock']) ? trim($_POST['txtStock']) : '',
        'precio' => isset($_POST['txtPrecio']) && $_POST['txtPrecio'] !== ''
            ? (float) str_replace(',', '.', $_POST['txtPrecio'])
            : 0.0,
    ];
    $_SESSION['misProductos'] = $productos;
}

header('Location: listadoProductos.php');
exit;
