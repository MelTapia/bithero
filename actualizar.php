<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $carnet = $_POST["carnet"];
    $url = 'lista.php';


    $sql = "UPDATE alumnos SET carrera = 'Graduado' WHERE carnet = :carnet";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':carnet', $carnet, PDO::PARAM_STR);

    try {
        $stmt->execute();
        header("Location: " . $url);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
