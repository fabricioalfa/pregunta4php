<?php
// Conexión a la base de datos MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "BDRafael";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos de la base de datos
$sql = "SELECT * FROM persona";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Crear un array para almacenar los datos
    $datos = array();
    
    // Recorrer los resultados y añadirlos al array
    while($row = $result->fetch_assoc()) {
        $datos[] = $row;
    }
    
    // Convertir el array a formato JSON
    $json_data = json_encode($datos);
    echo $json_data; // Devolver los datos en formato JSON
} else {
    echo "0 resultados";
}
$conn->close();
?>
