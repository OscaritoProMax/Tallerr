<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['numero'])) {
    $numero = intval($_POST['numero']);
    $binario = decbin($numero);
    header("Location: Punto5.php?original=$numero&resultado=$binario");
    exit;
} else {
    header("Location: Punto5.php");
    exit;
}
?>