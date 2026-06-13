<?php
    function getDescripcion(){
        return $_POST['txtDescripcion'] ?? '';
    }
    function getStock(){
        return $_POST['txtStock'] ?? '';
    }
    function getPrecio(){
        return $_POST['txtPrecio'] ?? '';
    }
?>