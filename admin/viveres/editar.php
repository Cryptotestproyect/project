<?php
include("../bd.php");

if($_POST){

    $txtID=(isset($_POST["txtID"]))?$_POST["txtID"]:"";
    $nombre=(isset($_POST["nombre"]))?$_POST["nombre"]:"";
    $descripcion=(isset($_POST["descripcion"]))?$_POST["descripcion"]:"";
    $precio=(isset($_POST["precio"]))?$_POST["precio"]:"";
    $unidades=(isset($_POST["unidades"]))?$_POST["unidades"]:"";
    
    

    


    $sentencia=$conexion->prepare("UPDATE `productos_tienda` 
    SET 
        nombre=:nombre, 
        descripcion=:descripcion,
        precio=:precio,
        unidades=:unidades
        
        
    WHERE id=:id");


    $sentencia->bindParam(":id", $txtID);
    $sentencia->bindParam(":nombre",$nombre);
    $sentencia->bindParam(":descripcion",$descripcion);
    $sentencia->bindParam(":precio", $precio);
    $sentencia->bindParam(":unidades", $unidades);
    
    
    $sentencia->execute();
   //header("Location:index.php");

    //actualizar foto
    $foto=(isset($_FILES['foto']["name"]))?$_FILES['foto']["name"]:"";
    $tmp_foto=$_FILES['foto']["tmp_name"];
    if($tmp_foto != ""){
        $fecha_foto=new DateTime();
        $nombre_foto=$fecha_foto->getTimestamp()."_".$foto;

    
        move_uploaded_file($tmp_foto,"../../imagenesWeb/productos/".$nombre_foto);

        //proceso de borrado que busqye la img y la pueda borrar
        $sentencia=$conexion->prepare("SELECT * FROM `productos` WHERE id=:id");
        $sentencia->bindParam(':id', $txtID);
        $sentencia->execute();

        $registro_foto=$sentencia->fetch(PDO::FETCH_LAZY);
        print_r($registro_foto);
        //borrar una foto
        if(isset($registro_foto['foto'])){
            if(file_exists("../../imagenesWeb/productos/".$registro_foto['foto'])){
                unlink("../../imagenesWeb/productos/".$registro_foto['foto']);
            }

        }

        //agg la foto
        $sentencia=$conexion->prepare("UPDATE `productos` 
        SET 
            foto=:foto
        
        WHERE id=:id");


        $sentencia->bindParam(":id", $txtID);
        $sentencia->bindParam(":foto", $foto);
    

        $sentencia->execute();
        //header("Location:index.php");
    }

}

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:"";

    $sentencia=$conexion->prepare("SELECT * FROM `productos_tienda` WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    //recuperacion de datos para asignar
    
    $nombre=$registro["nombre"];
    $descripcion=$registro["descripcion"];
    $foto=$registro["foto"];
    $precio=$registro["precio"];
    $unidades=$registro["unidades"];
    $categoria=$registro["categoria"];
    

    
    

    

}
if(isset($_GET['txtID']) && isset($_GET['status'])){
    //$txtID=$_GET['txtID'];
    $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:"";
    $status=$_GET['status'];
    mysqli_query($con,"UPDATE productos_tienda set status='$status' where id='$txtID' ");
    /*$sentencia=$conexion->prepare("SELECT * FROM productos_tienda where categoria='medicamentos' ");
    $sentencia->execute();
    $lista_productos_tienda=$sentencia->fetchAll(PDO::FETCH_ASSOC);


    http://localhost/servi/admin/PDestacados/editar.php?txtID=2*/
    

}
if(isset($_GET['txtID']) && isset($_GET['categoria'])){
    //$txtID=$_GET['txtID'];
    $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:"";
    $categoria=$_GET['categoria'];
    mysqli_query($con,"UPDATE productos_tienda set categoria='$categoria' where id='$txtID' ");
    
    

}



include("../templates/header.php");
?>
<br>
<div class="card">
    <div class="card-header">Viveres</div>
    <div class="card-body">

    <form action="" method="post" enctype="multipart/form-data">
        
        <div class="mb-3">
            <label for="titulo" class="form-label">ID:</label>
            <input
                type="text"
                class="form-control border-primary"
                name="txtID"
                id="txtID"
               
                aria-describedby="helpId"
                placeholder="Titulo"
                value="<?php echo $txtID;?>";
            />
        
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label ">Foto:</label><br>
            <img width="150" height="100" src="../../imagenesWeb/productos/<?php echo $foto;?>" alt="">

            <input
                type="file"
                class="form-control border-primary mt-2"
                name="foto"
                id="foto"
                placeholder=""
                aria-describedby="fileHelpId"
                
            />
            
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input
                type="text"
                class="form-control border-primary"
                name="nombre"
                id="nombre"
                aria-describedby="helpId"
                placeholder="ingrese el nombre del producto"
                value="<?php echo $nombre;?>";
            />
          
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion:</label>
            <input
                type="text"
                class="form-control border-primary"
                name="descripcion"
                id="descripcion"
                aria-describedby="helpId"
                placeholder="Ingrese la Descripcion"
                value="<?php echo $descripcion;?>";
            />
                
        </div>

        

        <div class="mb-3">

            <div class="row g-3">
                <div class="col">
                        
                    <label for="precio" class="form-label">Precio:</label>
                    <input
                    type="number"
                    class="form-control border-primary "
                    name="precio"
                    id="precio"
                    aria-describedby="helpId"
                    placeholder="Ingrese el precio del porducto"
                    value="<?php echo $precio;?>";

                    />
                </div>

                <div class="col">

                    <label for="unidades" class="form-label">Unidades:</label>
                    <input
                    type="number"
                    class="form-control border-primary"
                    name="unidades"
                    id="unidades"
                    aria-describedby="helpId"
                    placeholder="ingrese las unidades del producto"
                    value="<?php echo $unidades;?>";
                    />
                </div>
            </div>
        </div>

        

        <div class="mb-3">

            <div class="row g-3">
                <div class="col">
                    <label for="categoria" class="form-label">Categoria: <?php echo $categoria;?></label>
                    <select class="form-select border-primary" aria-label="Default select example" 
                    onchange="category_update(this.options[this.selectedIndex].value,<?php echo $registro['id'];?>)">
                    <option selected>Selecciona una categoria </option>
                        <option  value="medicamentos">Medicamentos</option>
                        <option  value="cuidado-personal">Cuidado Personal</option>
                        <option  value="viveres">Viveres</option>
                        <option  value="material-medico">Material Medico</option>
                    </select>
                </div>
                <div class="col">
                    
                <label for="categoria" class="form-label">Status:</label>

                <?php if($registro['status']=='on'){?>
                    <small class="text-muted-sm badge bg-success"><?php echo $registro['status'];?></small>
                <?php }?>

                <?php if($registro['status']=='off'){?>
                    <small class="text-muted-sm badge bg-danger"><?php echo $registro['status'];?></small>
                <?php }?>

                <?php if($registro['status']=='offer'){?>
                    <small class="text-muted-sm badge bg-info"><?php echo $registro['status'];?></small>
                <?php }?>

                    <select class="form-select border-primary" aria-label="Default select example" 
                    onchange="status_update(this.options[this.selectedIndex].value,<?php echo $registro['id'];?>)">
                        <option selected>Selecciona un status</option>
                        <option value="on">On</option>
                        <option value="off">Off</option>
                        <option value="offer">Offer</option>
                    </select>
                </div>
                

                
                                
                                


            </div>
          
        </div>
        
                <button type="submit" class="btn btn-success">Modificar</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        
        


        </form>
    </div>
    <div class="card-footer text-muted">
        
        
    </div>
</div>
        <script type="text/javascript">
           
            function status_update (value,txtID) {
                //alert(id);
                let url="http://localhost/servi/admin/viveres/editar.php";
                window.location.href= url +"?txtID="+txtID+ "&status="+value;
            }
            function category_update (value,txtID) {
                //alert(id);
                let url="http://localhost/servi/admin/viveres/editar.php";
                window.location.href= url +"?txtID="+txtID+ "&categoria="+value;
            }
            

        </script>


<?php
include("../templates/footer.php");
?>