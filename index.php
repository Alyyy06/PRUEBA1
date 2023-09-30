<!DOCTYPE html>
<html>
<head>
    <title>Registro de Empleados</title>
    <style>
                        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Registro de Empleados</h1>

    <form method="post" action="consultar.php">
        <label for="nombre">Nombre y Apellido:</label>
        <input type="text" name="nombre" required><br>

        <label for="edad">Edad:</label>
        <input type="number" name="edad" required min="18"><br> <!-- Agregamos el atributo "min" para la validación -->

        <label for="estadoCivil">Estado Civil:</label>
        <select name="estadoCivil" required>
            <option value="Soltero/a">Soltero/a</option>
            <option value="Casado/a">Casado/a</option>
            <option value="Viudo/a">Viudo/a</option>
        </select><br>

        <label for="sexo">Sexo:</label>
        <input type="radio" name="sexo" value="Masculino" required> Masculino
        <input type="radio" name="sexo" value="Femenino" required> Femenino<br>

        <label for="sueldo">Sueldo:</label>
        <select name="sueldo" required>
            <option value="Menos de 1000bs">Menos de 1000bs</option>
            <option value="Entre 1000 y 2500 bs">Entre 1000 y 2500 bs</option>
            <option value="Más de 2500bs">Más de 2500bs</option>
        </select><br><br>

        <input type="submit" value="Registrar">
    </form>
</body>
</html>




