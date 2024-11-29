<?php 
include("../bd.php");

include("../index.php");

$sentencia=$conexion->prepare("SELECT * FROM chat where  (envio='2' and recibe='1') or (envio='1' and recibe='2')  ");
$sentencia->execute();
$lista_mensajes=$sentencia->fetchAll(PDO::FETCH_ASSOC);
$sentencia=$conexion->prepare("SELECT clientes.Nombre, MAX(chat.mensaje) AS ultimo_mensaje FROM chat 
INNER JOIN clientes ON chat.id_usuario = clientes.ID_clientes GROUP BY clientes.Nombre 
ORDER BY MAX(chat.id) DESC;");
$sentencia->execute();
$lista_mensajes_nombres=$sentencia->fetchAll(PDO::FETCH_ASSOC);


?>


   
    <div class="row row-cols-3">
      <div class="col">

        <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary" style="width: 380px;">
            <a href="/" class="d-flex align-items-center  flex-shrink-0 p-3 link-body-emphasis text-decoration-none border-bottom">
              <span class="fs-5 fw-semibold ">Mensajes</span>
            </a>
            <div class="list-group list-group-flush border-bottom scrollarea">
              <?php foreach($lista_mensajes_nombres as $mensajes_nombres){?>
              <a href="#" class="list-group-item list-group-item-action py-3 lh-sm" aria-current="true">
                <div class="d-flex w-100 align-items-center justify-content-between">
                  <strong class="mb-1"><?php echo $mensajes_nombres["Nombre"]?></strong>
                  <small>Wed</small>
                </div>
                <div class="col-10 mb-1 small"><?php echo $mensajes_nombres["ultimo_mensaje"]?></div>
              </a>
              <?php }?>

              
            </div>
          </div>
      </div>
      
      <div class="col-auto ">
        <div class="card " id="card-chat" style="width:51rem; height: 48rem; transform: translate(0px,0px);"  >
      
        <div class="card-body">
        
              <h5 class="card-title text-center " >Chat en vivo</h5>

          <div class="card " style="height: 650px;" >
          
              <div class="card-body overflow-y-auto">
                

                  <?php foreach ($lista_mensajes  as $mensajes) {
                          if($mensajes['envio']==2){

                      ?>
                      <p style="width: auto;" class="card-text text-bg-secondary p-3 me-5 mb-0 rounded-top-4 rounded-end-4 fs-5  text-justify">
                          <?php echo $mensajes['mensaje']?>
                      </p>
                      
                      <br>
                  <?php }else{ ?>
                      <p style="width: auto; " class="card-text text-bg-success p-3 ms-5 mb-0 rounded-top-4 rounded-start-4 fs-5 text-justify">
                          <?php echo $mensajes['mensaje']?>                    
                      </p>
                      
                      <br>
                      <?php }}?>
                
              </div>
          </div>
          <?php
          
              $texto=(isset($_POST["texto"]))?$_POST["texto"]:"";

            if($texto==""){
              $invalid="is-invalid";
            }else{
              $sentencia=$conexion->prepare("INSERT INTO `chat` (`id`, `id_usuario`, `id_admin`, `mensaje`)
                                              VALUES (NULL, '2', '1', :texto);");
                $sentencia->bindParam(":texto",$texto);
                $sentencia->execute();

            }

          ?>
          <form action="" method="post">

              <div class="btn-group  w-100 mt-3" role="group" >
                  <input 
                      class="form-control <?php echo $invalid ?> w-100 " 
                      type="text" 
                      placeholder="Add your item here..."
                      id="texto"
                      name="texto" 
                      >
                  
                  <button type="submit" class="btn btn-secondary" ><i class="bi bi-send"></i></button>
              </div>

          </form>
          
          </div>
        </div>
      </div>
      </div>
      
   

  

    




