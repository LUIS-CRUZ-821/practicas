<?php

/** Clave de `$_SESSION` donde se guardan los productos del carrito. */
const CLAVE_CARRITO = 'productos';

function getProducto(): string
{
    return isset($_POST['selProducto']) ? (string) $_POST['selProducto'] : '';
}

function getCantidad(): int
{
    if (!isset($_POST['txtCantidad']) || $_POST['txtCantidad'] === '') {
        return 1;
    }
    $n = (int) $_POST['txtCantidad'];

    return $n > 0 ? $n : 1;
}
