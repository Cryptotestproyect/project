<?php
    include("admin/bd.php");
        
        $buscar=(isset($_POST["busqueda"]))?$_POST["busqueda"]:" ";
        $sentencia=$conexion->prepare("SELECT * FROM productos_tienda where categoria='viveres' ");
        $sentencia->execute();
        $lista_productos_tienda=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        

        
        if(isset($_POST['busqueda'])){
            $busqueda = $_POST['busqueda'];
            $sentencia=$conexion->prepare("SELECT * FROM productos_tienda where nombre like '%$busqueda%' and categoria='viveres'");
            $sentencia->execute();
            $lista_productos_tienda=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
            
        
        
        
        
            

        
    

    
    
    /*if(isset($_GET['enviar'])){
        $busqueda = $_GET['busqueda'];
        $sentencia=$conexion->prepare("SELECT * FROM productos_tienda where titulo='%$busqueda%'");
        $sentencia->execute();
        $producto_tienda=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        
    }*/
    
    
        


    $url_base="http://localhost/servi";


    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Viveres</title>
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
    <?php include ("admin/templates/lista_paginas.php");?>

        <section>   
            <form action="" method="POST">
                <div class="input-group  w-25 ms-5">
                    <input type="text" name="busqueda" class="form-control border-primary   mt-4  ">
                    <input type="submit" value="buscar" name="buscar" class="btn btn-primary mt-4">
                </div>
            </form>
           
            
        <div class="album py-4 bg-light">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php foreach ($lista_productos_tienda as $productos) { ?>
                    <div class="col">
                        <div class="card shadow-sm">
                        <img src="imagenesWeb/productos/<?php echo $productos['foto'];?>" class="card-img-top img-tam" alt="...">

                            <div class="card-body pt-0">
                                <hr class="m-0">
                                    <h5 class="card-title"><?php echo $productos['nombre'];?></h5>
                                    <p class="card-text"><?php echo $productos['descripcion'];?></p>
                                    <p class=""><strong>Precio:</strong> <?php echo $productos['precio'];?>$</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">

                                        <form action="" method="post">
                                            
                                        <input type="hidden" name="id" id="id" value="<?php echo $productos['id']; ?>"><!--openssl_encrypt es para encrytar los datos que estan en la base de datos-->  
                                            <input type="hidden" name="foto" id="foto" value="<?php echo $productos['foto']; ?>">
                                            <input type="hidden" name="nombre" id="nombre" value="<?php echo $productos['nombre']; ?>">
                                            <input type="hidden" name="descripcion" id="descripcion" value="<?php echo $productos['descripcion']; ?>">
                                            <input type="hidden" name="precio" id="precio" value="<?php echo $productos['precio']; ?>">
                                            <input type="hidden" name="cantidad" id="cantidad" value="<?php echo 1;?>">
                                        
                                            <button type="submit" 
                                            class="btn btn-sm btn-outline-primary"
                                            name="btnAccion"
                                            value="Agregar"
                                            >Agregar al carrito</button>

                                        </form>
                                        
                                    </div>
                                    <small class="text-muted-sm"><?php echo $productos['unidades'];?> Unidades</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    

                </div>
            </div>
        </div>
        </section>

        <?php include ("admin/templates/footer_principal.php"); ?>

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