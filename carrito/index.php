<?php
    include ("../admin/templates/header_principal.php");
    include("../admin/bd.php");
    


    $sentencia=$conexion->prepare("SELECT * FROM productos ");
    $sentencia->execute();
    $lista_productos=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<section>

 
                    <div class="container">

                        <h2 class="Productos-destacados">Productos Destacados</h2>
                        <div class="alert alert-success">
                            <?php echo $mensaje;?>
                        </div>

                           
                        

                    <div class="carousel__lista row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        
                    <?php foreach ($lista_productos as $productos) {
                    ?>
                        <div class="card carousel__elemento " width="317px" >
                            <img src="../imagenesWeb/productos/<?php echo $productos['foto'];?>" class="card-img-top img-tam" alt="<?php echo $productos['nombre'];?>" height="317px"  >
                            <div class="card-body pt-0">
                                <h5 class="card-title mb-4"><?php echo $productos['nombre'];?></h5>
                                <p class="card-text"><?php echo $productos['descripcion'];?></p>
                                <p class=""><strong>Precio:</strong><?php echo $productos['precio'];?>$</p>

                                <form action="" method="post">
                                    <input type="hidden" name="id" id="id" value="<?php echo $productos['id']; ?>"><!--openssl_encrypt es para encrytar los datos que estan en la base de datos-->                                
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

                    
                    
                    
                    </div>
                    
                
                
                </section>

                <?php
    include ("../admin/templates/footer.php");
    

?>





