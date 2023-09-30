<!DOCTYPE html>
<html>
<head>
    <title>Consulta de Empleados</title>
    <style>
                body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        h2 {
            color: #007bff;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Consulta de Empleados</h1>

    <div class="container">
        <h2>Empleados Registrados:</h2>
        <?php
        $archivo = fopen("datos_empleados.txt", "r");

        if ($archivo) {
            echo "<table>";
            echo "<tr><th>Nombre y Apellido</th><th>Edad</th><th>Estado Civil</th><th>Sexo</th><th>Sueldo</th></tr>";

            while (($linea = fgets($archivo)) !== false) {
                $datos = explode(", ", $linea);
                echo "<tr>";
                foreach ($datos as $dato) {
                    echo "<td>" . $dato . "</td>";
                }
                echo "</tr>";
            }

            echo "</table>";
            fclose($archivo);
        } else {
            echo "No se pudo abrir el archivo de datos.";
        }
        ?>
    </div>

    <?php
    // Calcular el total de empleados de sexo femenino
    $archivo = fopen("datos_empleados.txt", "r");
    $totalFemenino = 0;

    // Calcular el total de hombres casados que ganan más de 2500 bs
    $totalHombresCasadosMas2500 = 0;

    // Calcular el total de mujeres viudas que ganan más de 1000 bs
    $totalMujeresViudasMas1000 = 0;

    // Calcular la edad promedio de los hombres
    $totalEdadHombres = 0;
    $totalHombres = 0;

    if ($archivo) {
        while (($linea = fgets($archivo)) !== false) {
            // Verificar si la línea contiene "Sexo: Femenino"
            if (strpos($linea, "Sexo: Femenino") !== false) {
                $totalFemenino++;
            }

            // Verificar si la línea contiene "Sexo: Masculino" y "Estado Civil: Casado/a" y "Sueldo: Más de 2500bs"
            if (
                strpos($linea, "Sexo: Masculino") !== false &&
                strpos($linea, "Estado Civil: Casado/a") !== false &&
                strpos($linea, "Sueldo: Más de 2500bs") !== false
            ) {
                $totalHombresCasadosMas2500++;
            }

            // Verificar si la línea contiene "Sexo: Femenino" y "Estado Civil: Viudo/a" y "Sueldo: Más de 1000bs"
            if (
                strpos($linea, "Sexo: Femenino") !== false &&
                strpos($linea, "Estado Civil: Viudo/a") !== false &&
                strpos($linea, "Sueldo: Más de 1000bs") !== false
            ) {
                $totalMujeresViudasMas1000++;
            }

            // Obtener la edad de los hombres
            if (strpos($linea, "Sexo: Masculino") !== false) {
                preg_match("/Edad: (\d+)/", $linea, $matches);
                if (!empty($matches[1])) {
                    $totalEdadHombres += intval($matches[1]);
                    $totalHombres++;
                }
            }
        }
        fclose($archivo);
    }

    // Calcular la edad promedio de los hombres
    $promedioEdadHombres = $totalHombres > 0 ? $totalEdadHombres / $totalHombres : 0;

    echo "<h2>Total de Empleados de Sexo Femenino: $totalFemenino</h2>";
    echo "<h2>Total de Hombres Casados que ganan más de 2500 bs: $totalHombresCasadosMas2500</h2>";
    echo "<h2>Total de Mujeres Viudas que ganan más de 1000 bs: $totalMujeresViudasMas1000</h2>";
    echo "<h2>Edad Promedio de los Hombres: $promedioEdadHombres años</h2>";
    ?>

    <!-- Botón para regresar a index.php -->
    <a href="index.php"><button>Volver a Registrar</button></a>
</body>
</html>