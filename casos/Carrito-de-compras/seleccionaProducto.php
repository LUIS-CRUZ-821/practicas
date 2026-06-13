<?php

$producto = isset($producto) ? (string) $producto : '';
for ($i = 1; $i <= 10; $i++) {
    $cod = 'p' . str_pad((string) $i, 3, '0', STR_PAD_LEFT);
    ${'selP' . $i} = ($producto === $cod) ? 'selected' : '';
}
