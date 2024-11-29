<?php
    include("admin/bd.php");


    $sentencia=$conexion->prepare("SELECT * FROM productos_tienda where categoria='medicamentos' and status='offer'");
    $sentencia->execute();
    $lista_productos=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    $sentencia=$conexion->prepare("SELECT * FROM banners ");
    $sentencia->execute();
    $lista_bannerss=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    
?>



<!doctype html>
<html lang="en">
    <head>
        <title>Servifarma</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
        >
        <link rel="stylesheet" 
            href="https://cdn.jsdelivr.net/npm/glider-js@1.7.8/glider.min.css"
        >
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>

        <?php include ("admin/templates/header_principal.php");?>

        <main>
            <article >
                <!--carusel principal-->
                <div id="carouselPricipal" class="carousel slide tam" data-bs-ride="carousel">
                    <div class="carousel-inner ">
                    <?php foreach ($lista_bannerss as $banners) {
                    ?>
                        <div class="carousel-item active">
                            <img src="imagenesWeb/banners/<?php echo $banners['foto'];?>" class="tam" alt="...">
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
                </div>

                <!--lista-->
                <?php include ("admin/templates/lista_paginas.php");?>

                <!--carrusel de productos-->
                <section>
                    <div class="container">

                        <h2 class="Productos-destacados">Productos Destacados</h2>

                            <button class="btn btn-primary  carousel__anterior">
                                <i class="bi bi-chevron-left"></i>
                            </button>
                        

                    <div class="carousel__lista">
                        
                    <?php foreach ($lista_productos as $productos) {
                    ?>
                        <div class="card carousel__elemento " >
                            <img src="imagenesWeb/productos/<?php echo $productos['foto'];?>" class="card-img-top img-tam" alt="...">
                            <div class="card-body pt-0">
                                <h5 class="card-title mb-4"><?php echo $productos['nombre'];?></h5>
                                <p class="card-text"><?php echo $productos['descripcion'];?></p>
                                <p class=""><strong>Precio:</strong><?php echo $productos['precio'];?>$</p>


                                
                                <form action="" method="post">
                                    <input type="hidden" name="id" id="id" value="<?php echo $productos['id']; ?>"><!--openssl_encrypt es para encrytar los datos que estan en la base de datos-->  
                                    <input type="hidden" name="foto" id="foto" value="<?php echo $productos['foto']; ?>">
                                    <input type="hidden" name="nombre" id="nombre" value="<?php echo $productos['nombre']; ?>">
                                    <input type="hidden" name="descripcion" id="descripcion" value="<?php echo $productos['descripcion']; ?>">
                                    <input type="hidden" name="precio" id="precio" value="<?php echo $productos['precio']; ?>">
                                    <input type="hidden" name="cantidad" id="cantidad" value="<?php echo 1;?>">
                                    
                                    <button type="submit" 
                                    class="btn btn-primary"
                                    name="btnAccion"
                                    value="Agregar"
                                    >Agregar al carrito</button>

                            </form>
                                    
                                
                                
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    </div>

                    
                    <button class=" btn btn-primary carousel__siguiente">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                    
                    </div>
                    
                
                
                </section>

            </article>

        </main>

        <?php include ("admin/templates/footer_principal.php");?>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
        <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.8/glider.min.js"></script>
        <script>
            AOS.init();
        </script>
        <script src="javaS.js"></script>
    </body>
</html>
