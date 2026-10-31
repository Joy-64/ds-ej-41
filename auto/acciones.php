<?php
require_once '../modelo/auto.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';
    $marca = $_POST['marca'] ?? '';
    $modelo = $_POST['modelo'] ?? '';
    $rodado = $_POST['rodado'] ?? '';
     $cantidadCambios = $_POST['cantidadCambios'] ?? '';
     $color = $_POST['color'] ?? '';
     $precio = $_POST['precio'] ?? '';
    $id = $_POST['id'] ?? '';

    if ($accion === 'agregar') {
    Auto::agregar($marca, $modelo, $rodado, $cantidadCambios, $color, $precio);
        header('Location: vistas/listar.php');
        exit;
    }

    if ($accion === 'editar') {
        Auto::editar($marca, $modelo, $rodado, $cantidadCambios, $color, $precio);
        header('Location: vistas/listar.php');
        exit;
    }

    if ($accion === 'eliminar') {
        Auto::eliminar($id);
        header('Location: vistas/listar.php');
        exit;
    }
}
?>
