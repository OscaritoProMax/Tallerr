<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Estadística</title>
    <link rel="stylesheet" href="styles3.css">
</head>
<body>
    <div class="container">
        <h2>Calculadora Estadística</h2>
        <form action="" method="POST">
            <input type="text" name="numeros" placeholder="Ingrese números separados por coma" required>
            <button type="submit">Calcular</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["numeros"])) {
            // Convertir la entrada en un array, eliminar espacios y convertir en números
            $entrada = trim($_POST["numeros"]);

            if (empty($entrada)) {
                echo "<p class='error'>Error: Ingrese al menos un número válido.</p>";
            } else {
                $numeros = explode(",", $entrada);
                $numeros = array_map('trim', $numeros);

                // Filtrar y convertir a flotantes
                $numeros = array_filter($numeros, function($valor) {
                    return is_numeric($valor);
                });

                $numeros = array_map('floatval', $numeros);

                if (count($numeros) == 0) {
                    echo "<p class='error'>Error: Ingrese al menos un número válido.</p>";
                } else {
                    sort($numeros);

                    // **Promedio**
                    $promedio = array_sum($numeros) / count($numeros);

                    // **Mediana**
                    $n = count($numeros);
                    if ($n % 2 == 0) {
                        $mediana = ($numeros[$n/2 - 1] + $numeros[$n/2]) / 2;
                    } else {
                        $mediana = $numeros[floor($n/2)];
                    }

                    // **Moda (solución corregida)**
                    $numeros_str = array_map('strval', $numeros); // Convertir a string
                    $conteo = array_count_values($numeros_str); // Contar valores
                    arsort($conteo);

                    $maxRepeticiones = reset($conteo); // Obtener máximo de repeticiones
                    $moda = array_keys($conteo, $maxRepeticiones);

                    echo "<div class='result'>";
                    echo "<h3>Resultados:</h3>";
                    echo "<p><strong>Promedio:</strong> $promedio</p>";
                    echo "<p><strong>Mediana:</strong> $mediana</p>";
                    echo "<p><strong>Moda:</strong> " . implode(", ", $moda) . "</p>";
                    echo "</div>";
                }
            }
        }
        ?>
    </div>
</body>
</html>
