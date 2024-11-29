<?php
include("../bd.php");

    $sentencia=$conexion->prepare("SELECT * FROM banners ");
    $sentencia->execute();
    $lista_banners=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    
include("../templates/header.php");
?>
<br>
    <h2 class="Productos-destacados "> <a
            name=""
            id=""
            class="btn btn-success mx-5"
            href="crear.php"
            role="button"
            >Agregar Banner
            </a>Banners</h2>

    <div id="carouselPricipal" class="carousel slide tam mt-5 mx-0 " data-bs-ride="carousel">
        <div class="carousel-inner ">
        <?php foreach ($lista_banners as $banners) {
        ?>
            <div class="carousel-item active">
                <img src="../../imagenesWeb/banners/<?php echo $banners['foto'];?>" class="tam" alt="...">
            </div>
        <?php
        }
        ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselPricipal" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselPricipal" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

        <a name="" id="" class="btn btn-info " href="editar.php"  role="button" >Editar</a >
        <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $value['id']?>"  role="button" >Eliminar</a >
    </div>





<?php include("../templates/footer.php");?>