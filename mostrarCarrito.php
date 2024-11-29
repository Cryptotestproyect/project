<?php
include ("admin/templates/header_principal.php");
include("admin/bd.php");

if (!isset($_SESSION['carrito'])){ //Si no existe ninguna sesion, creamos una con un array vacio
    $_SESSION['carrito']= [];
}

if (isset($_POST['btnAccion']) && isset($_POST['id'])){// Si existe informacion del btn del formulario y un ID proveniente del mismo,  le asignamos el valor del ID a una nueva variable
    $producto_id=$_POST['id'];                            //en este caso, productoid
    foreach($_SESSION['carrito'] as $indice => $producto){ //Recorremos el bucle con la finalidad de encontrar los datos de los prodcutos almacenados
        if ($producto['id'] == $producto_id){ //si tanto el producto que se introdujo por el formulario es igual al que creamos, podemos manipularlo para aumentar o disminuir su cantidad
            if ($_POST['btnAccion'] == 'sumar'){
                $_SESSION['carrito'][$indice]['cantidad'] +=1;
            } elseif($_POST['btnAccion'] == 'restar' && $_SESSION['carrito'][$indice]['cantidad'] > 1){
                $_SESSION['carrito'][$indice]['cantidad'] -=1;
            }

        }
    }
}


?>
<br>
<div class="container">
<h3>Lista del carrito</h3>
<?php
if (!empty($_SESSION['carrito'])) {
?>
     
     <?php $total=0;?>
     <?php foreach($_SESSION['carrito'] as $indice=>$producto) { ?>
        <table class="table table-light ">
            <tbody>
                <tr>
                    <td width="20%" class="text-center "><img width="150" height="150" src="imagenesWeb/productos/<?php echo $producto['foto'];?>" alt=""></td>
                    <td width="30%" class="text-center align-middle">
                        <?php echo $producto['id']?>
                        </br>
                        <?php echo $producto['nombre']?>
                    </br> 
                        <?php echo $producto['descripcion']?>
                    </td>
                    
                    <td width="12%" class=" align-middle"> 
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                            <button name="btnAccion" value="restar" class="btn btn-sm btn-secondary">-</button>
                            <input type="number" name="cantidad" value="<?php echo $producto['cantidad']; ?>" readonly style="width: 50px; text-align: center;">
                            <button name="btnAccion" value="sumar" class="btn btn-sm btn-secondary">+</button>
                        </form>
                    </td>

                    <td width="10%" class="text-center align-middle"><?php echo $producto['precio'] ?>$</td>
                    <td width="20%" class="text-center align-middle"><?php echo number_format($producto['precio'] * $producto['cantidad'], 2); ?>$</td>

                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                        <td width="5%" class="text-center align-middle">
                            <button name="btnAccion" value="eliminar" class="btn btn-danger" type="submit">Eliminar</button>
                        </td>
                    </form>
                </tr>
                <?php $total += $producto['precio'] * $producto['cantidad']; ?>
            <?php } ?>
            
            <tr>
                <td colspan="5">
                    <div class="d-grid gap-2">
                        <a class="btn btn-primary btn-lg btn-block" href="procesador/procesador.php">Pagar >></a>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
<?php 
} else { ?>
    <div class="alert alert-success">
        <strong>¡No hay productos en el carrito!</strong>
    </div>
<?php } ?>
</div>

</body>
</html>

