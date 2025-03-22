<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor Decimal a Binario</title>
    <link rel="stylesheet" href="recursos/estilos.css">
</head>
<body>
    <div class="container">
        <h1>Conversor Decimal a Binario</h1>
        <form method="POST" action="convertir.php">
            <input type="number" name="numero" required placeholder="Ingresa un número entero">
            <button type="submit">Convertir</button>
        </form>

        <?php if (isset($_GET['resultado'])): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Número Decimal</th>
                        <th>Resultado Binario</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo htmlspecialchars($_GET['original']); ?></td>
                        <td><?php echo htmlspecialchars($_GET['resultado']); ?></td>
                    </tr>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>