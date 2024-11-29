<?php
include("../bd.php");

if($_POST){

    
   $nombre=(isset($_POST["nombre"]))?$_POST["nombre"]:"";
   
    

   
    $sentencia=$conexion->prepare("INSERT INTO `banners` (`id`, `foto`,`nombre`) 
    VALUES (NULL, :foto,:nombre);");

    $foto=(isset($_FILES['foto']["name"]))?$_FILES['foto']["name"]:"";
    $fecha_foto=new DateTime();
    $nombre_foto=$fecha_foto->getTimestamp()."_".$foto;
    $tmp_foto=$_FILES['foto']["tmp_name"];
    if($tmp_foto != ""){
        move_uploaded_file($tmp_foto,"../../imagenesWeb/banners/".$nombre_foto);

    }

    $sentencia->bindParam(":foto",$nombre_foto);
    $sentencia->bindParam(":nombre",$nombre);
    
    

    $sentencia->execute();
   header("Location:index.php");
}

include("../templates/header.php");
?>
<br>
    <div class="card">
        <div class="card-header">Bannes</div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="foto" class="form-label ">Agregar Banner:</label>
                        <input
                            type="file"
                            class="form-control border-primary"
                            name="foto"
                            id="foto"
                            placeholder=""
                            aria-describedby="fileHelpId"
                        />
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Banner:</label>
                    <input
                        type="text"
                        class="form-control border-primary"
                        name="nombre"
                        id="nombre"
                        aria-describedby="helpId"
                        placeholder="Escriba el nombre del producto"
                    />
                    
                </div>

                <button type="submit" class="btn btn-success">Crear</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
                
            </form>
        </div>
        <div class="card-footer text-muted"></div>
    </div>
    


<?php include("../templates/footer.php");?>