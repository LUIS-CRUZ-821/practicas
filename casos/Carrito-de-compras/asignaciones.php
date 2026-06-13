<?php

function asignaPrecio(string $codigo): float
{
    switch ($codigo) {
        case 'p001':
            return 1.5;
        case 'p002':
            return 2.5;
        case 'p003':
            return 11.0;
        case 'p004':
            return 1.5;
        case 'p005':
            return 5.0;
        case 'p006':
            return 22.0;
        case 'p007':
            return 18.5;
        case 'p008':
            return 15.0;
        case 'p009':
            return 7.5;
        case 'p010':
            return 1.0;
        default:
            return 0.0;
    }
}

function muestraDescripcion(string $codigo): string
{
    switch ($codigo) {
        case 'p001':
            return 'Gaseosa';
        case 'p002':
            return 'Mayonesa en sobre';
        case 'p003':
            return 'Chocolate para niños';
        case 'p004':
            return 'Fideos';
        case 'p005':
            return 'Conservas';
        case 'p006':
            return 'Chocolate';
        case 'p007':
            return 'Cafe 300mg.';
        case 'p008':
            return 'Mayonesa pote';
        case 'p009':
            return 'Crema Dental';
        case 'p010':
            return 'Cubito de pollo';
        default:
            return '';
    }
}
