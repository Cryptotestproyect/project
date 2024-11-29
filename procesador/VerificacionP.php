<?php
require 'ConexionBD.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $metododepago = $_POST['metododepago'];
    $referenciabancaria = $_POST['referenciabancaria'];
    $fileName = null;

    
    if (isset($_FILES['imagenpago']) && $_FILES['imagenpago']['error'] === UPLOAD_ERR_OK) {
        $fileName = basename($_FILES['imagenpago']['name']);
        $fileTmpName = $_FILES['imagenpago']['tmp_name'];
        $fileType = $_FILES['imagenpago']['type'];

        if (strpos($fileType, 'image/') === 0) {
            
            if (move_uploaded_file($fileTmpName, "../Imagenes/$fileName")) {
                echo "Imagen subida correctamente.<br>";
            } else {
                echo "Error al subir la imagen.<br>";
                $fileName = null; 
            }
        } else {
            echo "Por favor suba un archivo de imagen válido.<br>";
        }
    }

    
    $sql = "INSERT INTO transacciones (nombre, email, metododepago, referenciabancaria, imagen) 
            VALUES ('$nombre', '$email', '$metododepago', '$referenciabancaria', '$fileName')";

    if ($conn->query($sql) === TRUE) {
        echo "Pago recibido, está en estado de verificación.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>