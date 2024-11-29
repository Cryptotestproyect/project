<?php
include("../bd.php");
if($_POST){

    $txtID=(isset($_POST["txtID"]))?$_POST["txtID"]:"";
    $sentencia=$conexion->prepare("UPDATE `banners` 
    WHERE id=:id");


    $sentencia->bindParam(":id", $txtID);
    //actualizar foto
    $foto=(isset($_FILES['foto']["name"]))?$_FILES['foto']["name"]:"";
    $tmp_foto=$_FILES['foto']["tmp_name"];
    if($tmp_foto != ""){
        $fecha_foto=new DateTime();
        $nombre_foto=$fecha_foto->getTimestamp()."_".$foto;

    
        move_uploaded_file($tmp_foto,"../../imagenesWeb/banners/".$nombre_foto);

         //proceso de borrado que busqye la img y la pueda borrar
         $sentencia=$conexion->prepare("SELECT * FROM `banners` WHERE id=:id");
        $sentencia->bindParam(':id', $txtID);
        $sentencia->execute();

        $registro_foto=$sentencia->fetch(PDO::FETCH_LAZY);
        //borrar una foto
        if(isset($registro_foto['foto'])){
            if(file_exists("../../imagenesWeb/banners/".$registro_foto['foto'])){
                unlink("../../imagenesWeb/banners/".$registro_foto['foto']);
            }

        }

        //agg la foto
        $sentencia=$conexion->prepare("UPDATE `banners` 
        SET 
            foto=:foto
        
        WHERE id=:id");


        $sentencia->bindParam(":id", $txtID);
        $sentencia->bindParam(":foto", $foto);
    

        $sentencia->execute();
        header("Location:index.php");
    }

}

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:"";

    $sentencia=$conexion->prepare("SELECT * FROM `banners` WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    //recuperacion de datos para asignar
    $foto=$registro["foto"];
    
    

    

}
    $sentencia=$conexion->prepare("SELECT * FROM banners ");
    $sentencia->execute();
    $lista_banners=$sentencia->fetchAll(PDO::FETCH_ASSOC);
include("../templates/header.php");
?>

<br>
<div class="card border-primary ">
    <div class="card-header border-primary">Banners</div>
    <div class="card-body">
        <form action="" method="post">
        <?php foreach ($lista_banners as $banners) {
        ?>
           <div class="card mb-3 border-primary">
            <div class="card-body ">
                <div class="mb-3">
                    <label for="titulo" class="form-label">ID:</label>
                    <input
                        type="text"
                        class="form-control border-primary"
                        name="txtID"
                        id="txtID"
                        aria-describedby="helpId"
                        placeholder="Titulo"
                        value="<?php echo $banners['id'];?>";
                    />
                
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label ">Foto:</label><br>
                    <img width="150" height="100" src="../../imagenesWeb/banners/<?php echo $banners['foto'];?>" alt="">

                    <input
                        type="file"
                        class="form-control border-primary"
                        name="foto"
                        id="foto"
                        placeholder=""
                        aria-describedby="fileHelpId"
                        
                    />
                    
                </div>
            </div>
           </div>
           
        <?php
        }
        ?>

            <button type="submit" class="btn btn-success">Modificar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        
        </form>

    </div>
    <div class="card-footer text-muted border-primary"></div>
</div>
