<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversión a Acrónimo</title>
    <link rel="stylesheet" href="RECURSOS/estilospunto1.css"> 
</head>
<body>
    <h2>Convertir Frase a Acrónimo</h2>
    <input type="text" id="phrase" placeholder="Ingrese una frase...">
    <button onclick="convertToAcronym()">Convertir</button>
    <h3 id="result"></h3>

    <script>
        function convertToAcronym() {
            let phrase = document.getElementById("phrase").value;

            fetch("punto1.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "phrase=" + encodeURIComponent(phrase)
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error("Error en la respuesta del servidor");
                }
                return response.json();
            })
            .then(data => {
                document.getElementById("result").textContent = "Acrónimo: " + data.acronym;
            })
            .catch(error => console.error("Error:", error));
        }
    </script>
</body>
</html>

