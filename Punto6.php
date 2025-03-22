<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Constructor de Árbol Binario</title>
    <link rel="stylesheet" href="recursos/estilos.css">
</head>
<body>
<div class="container">
    <h1>Construcción de Árbol Binario</h1>
    <form method="POST" action="construir.php">
        <label>Preorden (ej: A-B-D-E-C):</label>
        <input type="text" name="preorden" placeholder="Separado por guiones">
        <br>
        <label>Inorden (ej: D-B-E-A-C):</label>
        <input type="text" name="inorden" placeholder="Separado por guiones">
        <br>
        <label>Postorden (opcional):</label>
        <input type="text" name="postorden" placeholder="Separado por guiones">
        
        <button type="submit">Construir Árbol</button>
    </form>
</div>
</body>
</html>