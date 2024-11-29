<?php


    $mensaje="";

    if(isset($_POST['btnAccion'])){
        switch ($_POST['btnAccion']){

            case "Agregar":
                if(is_numeric(($_POST['id']) )){
                    $id=($_POST['id']);
                  //  $mensaje.="ok id correcto".$id."<br>";
                }else{
                   // $mensaje.="error id no es numerico ".$id."<br>";

                }
                
                if(is_string(($_POST['foto']) )){
                    $foto=($_POST['foto']);
                    //$mensaje.="ok nombre correcto ".$nombre."<br>";
                }else{
                   // $mensaje.="error nombre no es numerico ".$nombre."<br>";
                    
                }

                if(is_string(($_POST['nombre']) )){
                    $nombre=($_POST['nombre']);
                    //$mensaje.="ok nombre correcto ".$nombre."<br>";
                }else{
                   // $mensaje.="error nombre no es numerico ".$nombre."<br>";
                    
                }

                if(is_string(($_POST['descripcion']) )){
                    $descripcion=($_POST['descripcion']);
                    //$mensaje.="ok nombre correcto ".$descripcion."<br>";
                }else{
                    //$mensaje.="error nombre no es numerico ".$descripcion."<br>";
                    
                }
                
                if(is_numeric(($_POST['cantidad']) )){
                    $cantidad=($_POST['cantidad']);
                   // $mensaje.="ok cantidad correcto ".$cantidad."<br>";
                }else{
                    //$mensaje.="error cantidad no es numerico ".$cantidad."<br>";
                    
                }
                
                if(is_numeric(($_POST['precio']) )){
                    $precio=($_POST['precio']);
                   // $mensaje.="ok precio correcto ".$precio."<br>";
                }else{
                    //$mensaje.="error precio no es numerico ".$precio."<br>";
                    
                }

                

                if(!isset($_SESSION['carrito'])){
                    $productos=array(
                        'id'=>$id,
                        'foto'=>$foto,
                        'nombre'=>$nombre,
                        'descripcion'=>$descripcion,
                        'cantidad'=>$cantidad,
                        'precio'=>$precio,
                        
                    
                    );
                    $_SESSION['carrito'][0]=$productos;
                    $mensaje="Producto Agregado al Carrito";
                }else{
                    $idProducto=array_column($_SESSION['carrito'],'id');
                    if(in_array($id,$idProducto)){
                        echo "<script>alert('El producto ya se agrego al carrito...');</script>";
                    }else{

                        $numeroProducto=count($_SESSION['carrito']);
                        $productos=array(
                            'id'=>$id,
                            'foto'=>$foto,
                            'nombre'=>$nombre,
                            'descripcion'=>$descripcion,
                            'cantidad'=>$cantidad,
                            'precio'=>$precio,
                            
                    
                        );
                        $_SESSION['carrito'][$numeroProducto]=$productos;
                       $mensaje="Producto Agregado al Carrito";

                    }
                }
                $producto=print_r($_SESSION,true);
            $mensaje=print_r($_SESSION,true);
           $mensaje="Producto Agregado al Carrito";
                break;

            case "eliminar":
                if(is_numeric($_POST['id'] )){
                    $id=($_POST['id']);

                   foreach($_SESSION['carrito'] as $indice=>$producto){
                    if($producto['id']==$id){
                        unset($_SESSION['carrito'][$indice]);
                        echo "<script> alert('elemento borrado....') </script>";
                   } 
                }
            }else {
               // $mensaje.="error id no es numerico ".$id."<br>";

            }
                break;

        }
    }

    

?>