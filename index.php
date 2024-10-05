<?php
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "tu_base_de_datos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['gameName'];
    $imagen = $_POST['gameImage'];
    $enlace = $_POST['gameLink'];
    $año = $_POST['releaseYear'];

    $sql = "INSERT INTO juegos (nombre, imagen, enlace, año) VALUES ('$nombre', '$imagen', '$enlace', '$año')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo juego añadido exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<?php
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "tu_base_de_datos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT nombre, imagen, enlace, año FROM juegos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td><img src='" . $row["imagen"] . "' alt='Imagen del juego' width='100'></td><td>" . $row["nombre"] . "</td><td><a href='" . $row["enlace"] . "'>Enlace</a></td><td>" . $row["año"] . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='4'>No hay juegos añadidos</td></tr>";
}

$conn->close();
?>
