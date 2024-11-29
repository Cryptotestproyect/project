<?php 
include("../bd.php");
$sentencia=$conexion->prepare("SELECT * FROM productos_tienda where categoria='medicamentos' ");
$sentencia->execute();
$lista_productos_tienda=$sentencia->fetchAll(PDO::FETCH_ASSOC);


if(isset($_POST['busqueda'])){
    $busqueda = $_POST['busqueda'];
    $sentencia=$conexion->prepare("SELECT * FROM productos_tienda where nombre like '%$busqueda%' and categoria='medicamentos' ");
    $sentencia->execute();
    $lista_productos_tienda=$sentencia->fetchAll(PDO::FETCH_ASSOC);
}

/*

if(isset($_GET['id']) && isset($_GET['status'])){
    $id=$_GET['id'];
    $status=$_GET['status'];
    mysqli_query($con,"UPDATE productos_tienda set status='$status' where id='$id' ");
    /*$sentencia=$conexion->prepare("SELECT * FROM productos_tienda where categoria='medicamentos' ");
    $sentencia->execute();
    $lista_productos_tienda=$sentencia->fetchAll(PDO::FETCH_ASSOC);*



    

}*/

include("../templates/header.php");
?>
<br>
<section>
        <div class="album py-4 bg-light">
            <div class="container">

            <h2 class="Productos-destacados mb-5 "> <a
            name=""
            id=""
            class="btn btn-success mx-5 "
            href="crear.php"
            role="button"
            >Agregar Productos
            </a>Medicamentos</h2>

            <form action="" method="POST">
                <div class="input-group mb-4 w-25 ">
                    <input type="text" name="busqueda" class="form-control border-success   mt-4  ">
                    <input type="submit" value="buscar" name="buscar" class="btn btn-success mt-4">
                </div>
            </form>


                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php foreach ($lista_productos_tienda as $producto_tienda) { ?>
                    <div class="col">
                        <div class="card shadow-sm">
                        <img src="../../imagenesWeb/productos/<?php echo $producto_tienda['foto'];?>" class="card-img-top img-tam" alt="...">

                            <div class="card-body pt-0">
                                <hr class="m-0">
                                    <h5 class="card-title pt-2"><?php echo $producto_tienda['nombre'];?></h5>
                                    <p class="card-text"><?php echo $producto_tienda['descripcion'];?></p>
                                    <p class=""><strong>Precio:</strong> <?php echo $producto_tienda['precio'];?>$</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a name="" id="" class="btn btn-info " href="editar.php?txtID=<?php echo $producto_tienda['id']?>"  role="button" >Editar</a >
                                            <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $value['id']?>"  role="button" >Eliminar</a >
                                            
                                        </div>
                                       
                                                    <?php if($producto_tienda['status']=='on'){?>
                                                        <small class="text-muted-sm badge bg-success"><?php echo $producto_tienda['status'];?></small>
                                                    <?php }?>
                                                    <?php if($producto_tienda['status']=='off'){?>
                                                        <small class="text-muted-sm badge bg-danger"><?php echo $producto_tienda['status'];?></small>
                                                    <?php }?>
                                                    <?php if($producto_tienda['status']=='offer'){?>
                                                        <small class="text-muted-sm badge bg-info"><?php echo $producto_tienda['status'];?></small>
                                                    <?php }?>

                                                    
                                                        
                                                        
                                                    
                                                        
                                        

                                        <small class="text-muted-sm"><?php echo $producto_tienda['unidades'];?> Unidades</small>
                                    </div>
                                    
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <!--<div class="col">
                        <div class="card shadow-sm">
                            <img src="imagenes/2.png" alt="" class="card-img-top img-tam">

                            <div class="card-body pt-0">
                                <hr class="m-0">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>

                   
-->

                </div>
            </div>
        </div>
        </section>

        <script type="text/javascript">
            function status_update (value,id) {
                //alert(id);
                let url="http://localhost/servi/admin/medicamentos/index.php";
                window.location.href= url +"?id="+id+ "&status="+value;
            }

        </script>
<?php 
include("../templates/footer.php");

?>