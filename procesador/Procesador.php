<?php 
include('../admin/bd.php');
include("../admin/templates/header_principal.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Pago</title>
</head>
<body>
    <div class="container-sm m-center ">
    <h1 class="text-center mb-5">Procesador de Pagos</h1>
    
    <form action="verificacionP.php" method="POST" enctype="multipart/form-data">
        <div class="card position-absolute top-50 start-50 translate-middle border-primary" style="width:50rem;">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <label for="nombre" class="form-label  fs-5">Nombre:</label><br>
                        <input type="text" id="nombre" name="nombre" class="form-control border-primary" placeholder="Ingresa tu Nombre" value="" required>
                        
                    </div>
                    <div class="col">
                        <label for="email" class="form-label fs-5">Email:</label><br>
                        <input type="email" id="email" name="email" class="form-control border-primary" placeholder="Correo Electronico" value="" required>
                    
                    </div>
                </div>

        <div class="text-center ">
            <label for="metododepago" class="form-label text-center fs-5 mt-4">Método de Pago:</label>
        </div>
        

        <select id="metododepago" name="metododepago" class="form-select w-100 border-primary" required>
            <option value="tarjetacredito">Tarjeta de Crédito</option>
            <option value="paypal">PayPal</option>
            <option value="transferenciabancaria">Transferencia Bancaria</option>
        </select>

        <div class="row">
            <div class="col">
                <label for="referenciabancaria" class="form-label fs-5 mt-4">Referencia Bancaria:</label><br>
                <input type="number"  id="referenciabancaria" name="referenciabancaria" class="form-control border-primary" placeholder="Referencia" required>
            </div>
            <div class="col">
            <label for="imagenpago" class="form-label fs-5 mt-4">Imagen de respaldo:</label><br>
            <input type="file" id="imagenpago" name="imagenpago" accept="image/*" class="form-control border-primary"  required>
            </div>
        </div>
        
            <input type="submit" value="Procesar Pago" class="btn btn-primary mt-4">
            </div>
        </div>
        
    </form>
    </div>
</body>
</html>