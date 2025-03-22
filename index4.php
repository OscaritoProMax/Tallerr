<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operaciones con Conjuntos</title>
    <link rel="stylesheet" href="styles4.css">
</head>
<body>
    <div class="container">
        <h2>Operaciones con Conjuntos</h2>
        <form action="" method="POST">
            <input type="text" name="conjuntoA" placeholder="Ingrese los números del conjunto A separados por coma" required>
            <input type="text" name="conjuntoB" placeholder="Ingrese los números del conjunto B separados por coma" required>
            <button type="submit">Calcular</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            function procesarConjunto($entrada) {
                $numeros = explode(",", trim($entrada));
                $numeros = array_map('trim', $numeros);
                $numeros = array_filter($numeros, 'is_numeric'); // Filtrar solo números
                return array_unique(array_map('intval', $numeros)); // Convertir a enteros y eliminar duplicados
            }

            // Obtener y procesar conjuntos A y B
            $A = procesarConjunto($_POST["conjuntoA"]);
            $B = procesarConjunto($_POST["conjuntoB"]);

            // Operaciones entre conjuntos
            $union = array_unique(array_merge($A, $B));
            $interseccion = array_values(array_intersect($A, $B));
            $diferenciaA_B = array_values(array_diff($A, $B));
            $diferenciaB_A = array_values(array_diff($B, $A));

            echo "<div class='result'>";
            echo "<h3>Resultados:</h3>";
            echo "<p><strong>Unión (A ∪ B):</strong> " . implode(", ", $union) . "</p>";
            echo "<p><strong>Intersección (A ∩ B):</strong> " . (empty($interseccion) ? "∅" : implode(", ", $interseccion)) . "</p>";
            echo "<p><strong>Diferencia (A - B):</strong> " . (empty($diferenciaA_B) ? "∅" : implode(", ", $diferenciaA_B)) . "</p>";
            echo "<p><strong>Diferencia (B - A):</strong> " . (empty($diferenciaB_A) ? "∅" : implode(", ", $diferenciaB_A)) . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
