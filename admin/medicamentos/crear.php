<?php
include("../bd.php");
if($_POST){

    
    $nombre=(isset($_POST["nombre"]))?$_POST["nombre"]:"";
    $descripcion=(isset($_POST["descripcion"]))?$_POST["descripcion"]:"";
    $precio=(isset($_POST["precio"]))?$_POST["precio"]:"";
    $unidades=(isset($_POST["unidades"]))?$_POST["unidades"]:"";
    $categoria=(isset($_POST["categoria"]))?$_POST["categoria"]:"";
    $status=(isset($_POST["status"]))?$_POST["status"]:"";

   

   
    $sentencia=$conexion->prepare("INSERT INTO `productos_tienda` (`id`, `foto`, `nombre`, `descripcion`, `precio`, `unidades`, `categoria`,`status`) 
                                VALUES (NULL, :foto, :nombre, :descripcion, :precio, :unidades, :categoria, :status);");

    $foto=(isset($_FILES['foto']["name"]))?$_FILES['foto']["name"]:"";
    $fecha_foto=new DateTime();
    $nombre_foto=$fecha_foto->getTimestamp()."_".$foto;
    $tmp_foto=$_FILES['foto']["tmp_name"];
    if($tmp_foto != ""){
        move_uploaded_file($tmp_foto,"../../imagenesWeb/productos/".$nombre_foto);

    }

    $sentencia->bindParam(":foto",$nombre_foto);
    $sentencia->bindParam(":nombre",$nombre);
    $sentencia->bindParam(":descripcion",$descripcion);
    $sentencia->bindParam(":precio", $precio);
    $sentencia->bindParam(":unidades", $unidades);
    $sentencia->bindParam(":categoria", $categoria);
    $sentencia->bindParam(":status", $status);

    

    $sentencia->execute();
   //header("Location:index.php");
}

include("../templates/header.php");
?>
    <br>
    <div class="card">
        <div class="card-header">Medicamentos</div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="foto" class="form-label ">Foto:</label>
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
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input
                        type="text"
                        class="form-control border-primary"
                        name="nombre"
                        id="nombre"
                        aria-describedby="helpId"
                        placeholder="Nombre del producto"
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
                        placeholder="Descripcion del producto"
                    />
                    
                </div>

                <div class="mb-3">

                    <div class="row g-3">
                        <div class="col">
                        
                        <label for="precio" class="form-label">Precio:</label>
                        <input
                            type="number"
                            class="form-control border-primary mb-3"
                            name="precio"
                            id="precio"
                            aria-describedby="helpId"
                            placeholder="Precio del porducto"
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
                        placeholder="Unidades del producto"
                    />
                    </div>
            
                </div>

                <div class="mb-3">

                    <div class="row g-3">
                        <div class="col">
                            <label for="categoria" class="form-label">Categoria:</label>

                            <select class="form-select border-primary" name="categoria" id="categoria" aria-label="Default select example" 
                            >
                                <option selected>Selecciona una categoria </option>
                                <option  value="medicamentos">Medicamentos</option>
                                <option  value="cuidado-personal">Cuidado Personal</option>
                                <option  value="viveres">Viveres</option>
                                <option  value="material-medico">Material Medico</option>
                            </select>
                        </div>
                        <div class="col">
                    
                            <label for="categoria" class="form-label">Status:</label>
                            <select class="form-select border-primary" name="status" id="status" aria-label="Default select example" 
                            >
                                <option selected>Selecciona un status</option>
                                <option  value="on">On</option>
                                <option  value="off">Off</option>
                                <option  value="offer">Offer</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-success">Crear</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
                

            </form>
        </div>
        <div class="card-footer text-muted"></div>
    </div>
    


<?php include("../templates/footer.php");?>