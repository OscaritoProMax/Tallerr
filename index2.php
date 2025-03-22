<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibonacci y Factorial</title>
    <link rel="stylesheet" href="RECURSOS/estilospunto2.css">
</head>
<body>
    <div class="container">
        <h1>Calculadora Fibonacci / Factorial</h1>
        <form method="POST">
            <input type="number" name="numero" placeholder="Ingrese un número" required min="0">
            <select name="operacion">
                <option value="fibonacci">Sucesión de Fibonacci</option>
                <option value="factorial">Factorial</option>
            </select>
            <button type="submit">Calcular</button>
        </form>

        <?php
        function fibonacci($n) {
            $a = 0;
            $b = 1;
            $serie = [$a, $b];
            for ($i = 2; $i < $n; $i++) {
                $c = $a + $b;
                $serie[] = $c;
                $a = $b;
                $b = $c;
            }
            return implode(", ", array_slice($serie, 0, $n));
        }

        function factorial($n) {
            if ($n == 0 || $n == 1) return "1 (0! y 1! = 1)";
            
            $resultado = 1;
            $proceso = [];
            for ($i = 1; $i <= $n; $i++) {
                $resultado *= $i;
                $proceso[] = $i;
            }
            return implode(" × ", $proceso) . " = " . $resultado;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numero = intval($_POST["numero"]);
            $operacion = $_POST["operacion"];
            echo "<div class='resultado'>";
            if ($operacion == "fibonacci") {
                echo "<h3>Sucesión de Fibonacci:</h3><p>" . fibonacci($numero) . "</p>";
            } elseif ($operacion == "factorial") {
                echo "<h3>Factorial:</h3><p>" . factorial($numero) . "</p>";
            }
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
