<?php

require 'ConexionBD.php';


if (isset($_GET['referencia'])) {
    $referencia = $_GET['referencia'];  

    
    $sql = "SELECT imagen FROM transacciones WHERE referenciabancaria = '$referencia'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();
        $imagen = $row['imagen'];

        
        $rutaArchivo = "../Imagenes/" . $imagen;
        if (file_exists($rutaArchivo) && exif_imagetype($rutaArchivo)) {
           
            echo "<h1>Imagen de Respaldo para Verificación</h1>";
            echo "<img src='" . htmlspecialchars($rutaArchivo, ENT_QUOTES, 'UTF-8') . "' alt='Imagen de referencia' style='max-width:100%; height:auto;'>";
        } else {
            echo "La imagen especificada no existe o no es válida.";
        }
    } else {
        echo "No se encontró una transacción con esa referencia bancaria.";
    }
} else {
    echo "No se ha proporcionado una referencia válida.";
}


$conn->close();
?>