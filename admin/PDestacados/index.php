<?php
include("../bd.php");

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:"";

    //proceso de borrado que busqye la img y la pueda borrar
    $sentencia=$conexion->prepare("SELECT * FROM `productos_tienda` WHERE id=:id");
    $sentencia->bindParam(':id', $txtID);
    $sentencia->execute();

    $registro_foto=$sentencia->fetch(PDO::FETCH_LAZY);


/*/borrar una foto
    if(isset($registro_foto['foto'])){
        if(file_exists("../../imagenesWeb/productos/".$registro_foto['foto'])){
            unlink("../../imagenesWeb/productos/".$registro_foto['foto']);
        }

    }
//borrar en la base de datos
    $sentencia=$conexion->prepare("DELETE FROM productos WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();*/

    //header("Location:index.php");
    
}

$sentencia=$conexion->prepare("SELECT * FROM productos_tienda where categoria='medicamentos' and status='offer'");
$sentencia->execute();
$lista_productos=$sentencia->fetchAll(PDO::FETCH_ASSOC);



 include("../templates/header.php");
 ?>
    <br>
    <section>
        <div class="container">

            <h2 class="Productos-destacados "> <a
            name=""
            id=""
            class="btn btn-success mx-5"
            href="crear.php"
            role="button"
            >Agregar Productos
            </a>Productos Destacados</h2>

            <button class="btn btn-primary carousel__anterior">
                <i class="bi bi-chevron-left"></i>
            </button>
                        

            <div class="carousel__lista">
            <?php foreach ($lista_productos as $key => $value) { ?>
                <div class="card carousel__elemento " >
                        <img src="../../imagenesWeb/productos/<?php echo $value['foto']?>" class="card-img-top " width="100" height="200" alt="...">
                    <div class="card-body pt-0">
                        <h5 class="card-title mb-4 mt-3"><?php echo $value['nombre']?></h5>
                        <p class="card-text"><?php echo $value['descripcion']?></p>
                        <p class=""><strong>Precio: </strong><?php echo $value['precio']?>$</p>
                        <p class=""><strong>status: </strong><?php echo $value['status']?></p>
                        <div class="">
                        <a name="" id="" class="btn btn-info " href="editar.php?txtID=<?php echo $value['id']?>"  role="button" >Editar</a >
                        <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $value['id']?>"  role="button" >Eliminar</a >



                        </div>
                           
                    </div>
                </div>
                <?php } ?>

            </div>

                    
                    <button class=" btn btn-primary carousel__siguiente">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                    
        </div>
                    
                
                
    </section>
    


<?php include("../templates/footer.php");?>

