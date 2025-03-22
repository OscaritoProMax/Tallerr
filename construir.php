<?php

require_once 'clases/ArbolBinario.php';

$preorden = isset($_POST['preorden']) ? explode('-', strtoupper(trim($_POST['preorden']))) : [];
$inorden = isset($_POST['inorden']) ? explode('-', strtoupper(trim($_POST['inorden']))) : [];

sort($preorden);
sort($inorden);

if ($preorden !== $inorden) {
    echo "<link rel='stylesheet' href='recursos/estilos.css'>";
    echo "<div class='container'><h2>Error: Los elementos de los recorridos no coinciden. No se puede construir el árbol.</h2><a href='Punto6.php'>Volver</a></div>";
    exit;
}

if (count($preorden) > 0 && count($inorden) > 0) {
    $arbol = new ArbolBinario();
    $arbol->construirDesdePreInorden($preorden, $inorden);
    echo "<link rel='stylesheet' href='recursos/estilos.css'>";
    echo "<div class='container'><h2>Árbol Binario Construido</h2>";
    $arbol->imprimirArbol($arbol->raiz);
    echo "<br><a href='Punto6.php'>Volver</a></div>";
} else {
    echo "<div class='container'><h2>Error: Debes ingresar al menos preorden e inorden.</h2><a href='Punto6.php'>Volver</a></div>";
}