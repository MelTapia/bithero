<!DOCTYPE html>
<html>
<head>
    <title>Lista de Alumnos</title>
    <link rel="icon" type="image/x-icon" href="/recursos/robot.png">
    <link rel="stylesheet" href="estiloBase.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <nav>
        <div >
            <a href="index.html">BitHero</a>
        </div>
    </nav>
    <?php
    $server = "";
    $usuario = "";
    $contra = "";
    $bd = "";

    $conn = new mysqli($server, $usuario, $contra, $bd);

    $sql = "SELECT * FROM alumnos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '
        <form action="eliminar.php" method="post">
        <div>
        <label for="carnet">Carnet</label>
        <input placeholder="Carnet" name="carnet" type="text" required>
    </div>
    <button type="submit">Enviar</button>
    </form>';
        echo "<table>";
        echo "<tr><th>Carnet de Identificación</th><th>Nombre Completo</th><th>E-mail</th><th>Carrera</th><th>Fecha de Registro</th></tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['carnet'] . "</td>";
            echo "<td>" . $row['nombreCompleto'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['carrera'] . "</td>";
            echo "<td>" . $row['fechaRegistro'] . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "No hay alumnos aún.";
    }

    $conn->close();
    ?>
</body>
</html>