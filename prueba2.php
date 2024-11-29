<?php 
include("admin/bd.php");

include("index.php");

$sentencia=$conexion->prepare("SELECT * FROM chat where (id_usuario='1' and id_admin='2') or (id_usuario='2' and id_admin='1') ");
$sentencia->execute();
$lista_mensajes=$sentencia->fetchAll(PDO::FETCH_ASSOC);




?>

<div class=" position-fixed bottom-0 end-0 bg-success m-5 rounded-circle py-3 px-4"  >
    <i class="bi bi-chat-dots-fill fs-2 text-white" style="cursor: pointer;" id="btn-chat" ></i>
 
  <!--  <button id="close-chat">x</button>-->

    <div class="card position-fixed" id="card-chat"  style="display: block; width:18rem;transform: translate(-280px,-530px); " >
  
        <div class="card-body">
           
                <h5 class="card-title text-center " >Chat en vivo<button class="btn-close fs-6 ms-5" id="close-chat" style="transform: translate(30px,0px);"></button></h5>

          
        
        
            <div class="card " style="height: 350px;" >
            
                <div class="card-body overflow-y-auto">
                   

                    <?php foreach ($lista_mensajes  as $mensajes) {
                            if($mensajes['id_usuario']==1){

                        ?>
                        <p class="card-text text-bg-success p-2 ms-5 mb-0 rounded-top-4 rounded-start-4 fs-6 text-justify">
                            <?php echo $mensajes['mensaje']?>                    
                        </p>
                        <br>
                    <?php }else{ ?>
                        <p class="card-text text-bg-secondary p-2 me-5 mb-0 rounded-top-4 rounded-end-4 fs-6  text-justify">
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
                                                     VALUES (NULL, '1', '2', :texto);");
                      $sentencia->bindParam(":texto",$texto);
                      $sentencia->execute();
    
                  }
            
            ?>
            <form action="" method="post">

                <div class="btn-group w-100 mt-3" role="group" >
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


<script>
    btnChat=document.getElementById("btn-chat");
    btnChat.addEventListener("click",chatOpen); 

    closeChat=document.getElementById("close-chat");
    closeChat.addEventListener("click",chatClose);
   
    function chatOpen(){
        document.getElementById("card-chat").style.display = "block";
    }
    function chatClose(){
        document.getElementById("card-chat").style.display = "none";
    }
    
    
</script>/* if(empty($_POST["correo-login"]) && empty($_POST["password-login"])){
                        $mensaje="!Por favor, Rellene todos los campos¡";
                    }else{
                        $correoL=$_POST["correo-login"];
                        $passwordL=$_POST["password-login"];
                        $sentencia=$con->query("SELECT * from `usuarios` WHERE correo=$correoL and Password=$passwordL");
                        if($datos=$sentencia->fetch_object()){
                            header("location:index.php");
                        }else {*/ ?>
                        <span class="alert alert-danger fs-4" style="margin-left: 430px;">Correo o Contraseña Incorrectos</span>
                        <?php/* }}*/?>

                        <?php
                $correoL=$_POST["correo-login"];
                $passwordL=$_POST["passwordL"];

                session_start();
                $_SESSION['correo-login'];
                $consulta="SELECT * from usuarios where Correo='$correoL' and Password='$passwordL'";
                $resultado=mysqli_query($con,$consulta);
                $filas=mysqli_num_rows($resultado);

                if($filas){
                    header("location: index.php");
                }else{
                    $mensaje='usuario no registrado';
                }
                ?>