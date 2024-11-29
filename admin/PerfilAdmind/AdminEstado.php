<?php
require 'ConexionBD.php';  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $estadoAdmin = $_POST['estadoAdmin'];

    
    $sql = "UPDATE transacciones SET estadoAdmin='$estadoAdmin' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "El estado de la transacción con ID $id se ha actualizado a '$estadoAdmin'.";
        
        header("Location: Admin.php");
        exit();
    } else {
        echo "Error al actualizar el estado: " . $conn->error;
    }

    $conn->close();
}
?>