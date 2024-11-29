<?php 
include("admin/bd.php");
include ("admin/templates/header_principal.php");

   
       /* $nombre=(isset($_POST["nombre"]))?$_POST["nombre"]:"";
        $apellido=(isset($_POST["apellido"]))?$_POST["apellido"]:"";
        $edad=(isset($_POST["edad"]))?$_POST["edad"]:"";
        $correo=(isset($_POST["correo"]))?$_POST["correo"]:"";
        $telefono=(isset($_POST["telefono"]))?$_POST["telefono"]:"";
        $password=(isset($_POST["password"]))?$_POST["password"]:"";
        $direccion=(isset($_POST["direccion"]))?$_POST["direccion"]:"";
        
       /* if($nombre=="" || $apellido=="" || $edad=="" || $correo=="" || 
            $telefono=="" || $password=="" || $direccion==""){

            $invalid="is-invalid";
            $mensaje="!Por favor, Rellene todos los campos¡";
          }else{
            $sentencia=$conexion->prepare("INSERT INTO `usuarios` (`ID_Usuario`, `Nombre`, `Apellido`, `Edad`, `Correo`, `Telefono`, `Password`, `Direccion`) 
                VALUES (NULL,:nombre , :apellido,:edad, :correo, :telefono, :pasword, :direccion);");


        
                $sentencia->bindParam(":nombre",$nombre);
                $sentencia->bindParam(":apellido",$apellido);
                $sentencia->bindParam(":edad",$edad);
                $sentencia->bindParam(":correo",$correo);
                $sentencia->bindParam(":telefono",$telefono);
                $sentencia->bindParam(":pasword",$password);
                $sentencia->bindParam(":direccion",$direccion);
                $sentencia->execute();

          }
        */

    

    

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Servifarma </title>
    <link rel="icon" href="images/icon-servifarma.png">
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="login/estilos.css">
</head>
<body>
    <div class="todo">
    <main>

        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Regístrarse</button>
                </div>
            </div>

            <!--Formulario de Login y registro-->
            <div class="contenedor__login-register">
                <!--Login-->
                <?php
                    if(empty($_POST["correo-login"]) && empty($_POST["password-login"])){
                        $alert="alert-danger";
                        $mensaje="!Por favor, Rellene todos los campos login¡";
                    }else{
                        $correoL=$_POST["correo-login"];
                        $passwordL=$_POST["password-login"];
                        
                        $consulta="SELECT * from usuarios where Correo='$correoL' and Password='$passwordL'";
                        $resultado=mysqli_query($con,$consulta);
                        $filas=mysqli_num_rows($resultado);

                        if($filas){
                            header("location: index.php");
                        
                        }else { 
                            $alert="alert-danger";
                            $mensaje='Correo o Contraseña incorrectas';
                        }
                    }
                ?>
                           
            
                <form action="" class="formulario__login" method="post">
                    <h2>Iniciar Sesión</h2>
                    <input type="text" 
                        placeholder="Correo Electronico"
                        class="form-control border-primary <?php echo $invalid ?>" 
                        name="correo-login" 
                        id="correo-login"
                        >
                        <input type="password" 
                        placeholder="Contraseña"
                        class="form-control border-primary <?php echo $invalid ?>" 
                        name="password-login" 
                        id="password-login"
                        >
                    <button>Entrar</button>
                </form>
                
                <!--Register-->
                <?php
                    if(empty($_POST["nombre"]) || empty($_POST["apellido"]) || 
                        empty($_POST["edad"])|| empty($_POST["correo"])|| empty($_POST["telefono"])|| 
                        empty($_POST["password"])|| empty($_POST["direccion"])){
                        $alert="alert-danger";
                        $invalid="is-invalid";
                        $mensaje="!Por favor, Rellene todos los campos del registro¡";
                    }else{
                        $nombre=$_POST["nombre"];
                        $apellido=$_POST["apellido"];
                        $edad=$_POST["edad"];
                        $correo=$_POST["correo"];
                        $telefono=$_POST["telefono"];
                        $password=$_POST["password"];
                        $direccion=$_POST["direccion"];
                        
                        $consulta="SELECT * from usuarios where Correo='$correo' ";
                        $resultado=mysqli_query($con,$consulta);
                        $filas=mysqli_num_rows($resultado);

                        if($filas){
                            $alert="alert-danger";
                            $mensaje='El correo ya existe';
                        
                        }else { 
                            $sentencia=$conexion->prepare("INSERT INTO `usuarios` (`ID_Usuario`, `Nombre`, `Apellido`, `Edad`, `Correo`, `Telefono`, `Password`, `Direccion`) 
                            VALUES (NULL,:nombre , :apellido,:edad, :correo, :telefono, :pasword, :direccion);");


                    
                            $sentencia->bindParam(":nombre",$nombre);
                            $sentencia->bindParam(":apellido",$apellido);
                            $sentencia->bindParam(":edad",$edad);
                            $sentencia->bindParam(":correo",$correo);
                            $sentencia->bindParam(":telefono",$telefono);
                            $sentencia->bindParam(":pasword",$password);
                            $sentencia->bindParam(":direccion",$direccion);
                            $sentencia->execute();
                            $alert="alert-success";
                            $mensaje='El usuario se registro correctamente';
                        }
                    }
                ?>
                
                <form action="" class="formulario__register z-1" method="post">
                    <h2>Regístrarse</h2>
                    <input type="text" placeholder="Nombre " 
                        class="form-control border-primary <?php echo $invalid ?>" 
                        name="nombre" 
                        id="nombre"
                    >
                    <input type="text" 
                        placeholder="Apellido"
                        class="form-control border-primary <?php echo $invalid ?>" 
                        name="apellido" 
                        id="apellido"
                        >
                    <input type="number"
                        placeholder="Edad"
                        class="form-control border-primary <?php echo $invalid ?>" 
                        name="edad" 
                        id="edad"
                    >
                    <input type="text" 
                        placeholder="Correo Electronico"
                        class="form-control border-primary <?php echo $invalid ?>" 
                        name="correo" 
                        id="correo"
                        >
                    <input type="tel" 
                        placeholder="Telefono"
                        class="form-control border-primary <?php echo $invalid ?>" 
                        name="telefono" 
                        id="telefono"
                        >
                    <input type="password" 
                        placeholder="Contraseña"
                        class="form-control border-primary <?php echo $invalid ?>" 
                        name="password" 
                        id="password"
                        >
                    <input type="text" 
                        placeholder="Direccion"
                        class="form-control border-primary <?php echo $invalid ?>" 
                        name="direccion" 
                        id="direccion"
                        >
                    
                    <button>Regístrarse</button>
                </form>
            </div>
        </div>
        <span class="alert <?php echo $alert ?> fs-4" style="margin-left: 430px; top: 30px;"><?php echo $mensaje?></span>
    </main>

        
    
    
    </div>
        

        <script src="login/login.js"></script>
</body>
</html>

<?php 
include("admin/bd.php");
include ("admin/templates/footer_principal.php");
?>