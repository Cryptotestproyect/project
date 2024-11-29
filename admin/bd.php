<?php
    $con=mysqli_connect('localhost','root','','servifarma');

    $servidor="localhost";
    $baseDatos="servifarma";
    $usuario="root";
    $clave="";


    try{
        $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $clave);
    
    }catch(Exception $error){
        echo $error->errorMessage();
    }

?>