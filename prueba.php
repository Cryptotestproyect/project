<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    
    include("admin/bd.php");
    
    $id=(isset($_GET["id"]))?$_GET["id"]:"";
    $usuario=(isset($_GET["usuario"]))?$_GET["usuario"]:"";
    $cantidad=(isset($_GET["cantidad"]))?$_GET["cantidad"]:"";
    
    

    


    mysqli_query($con,"UPDATE prueba set cantidad='$cantidad' where id='$id' ");


    
    $sentencia=$conexion->prepare("SELECT * FROM prueba ");
    $sentencia->execute();
    $lista=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    $cantidad=0;
    //$resultado2=2;
    //$resultado3=3;
    
    
    
    
  if($_GET){
    if(isset( $_GET["btnSumar"])){
        $numero = $_GET["cantidad"];
        $cantidad = $numero + 1;
        
        
    }else
    if(isset($_GET["btnRestar"])){
        $numero = $_GET["cantidad"];
        $cantidad = $numero - 1;
        

    }
   
  }
    
    
    
    
    
?>

<?php foreach ($lista as $prueba) {
?>
    <input type="number" name="id" value="<?php echo $prueba['id']?>">    
    <input type="text" name="usuario" value="<?php echo $prueba['usuario']?>">
    <input type="number" name="cantidad" value="<?php echo $prueba['cantidad']?>">
</br>

<?php } ?>


<?php foreach ($lista as $prueba) { ?>
<form action="" method="get">
    
    

    </br>

    
    <button name="btnSumar" >+11</button>
    <button name="btnRestar" >-11</button>
    <input type="number" name="id" value="<?php echo $prueba['id']?>">
    <input type="number" name="cantidad" value="<?php echo $cantidad?>">
    <input type="number" name="cuenta" value="<?php echo $prueba['cantidad']?>">
    <input type="number" name="cuenta2" value="<?php echo $numero?>">
    </br>
    
   

    



   <!--  <button name="btn2Sumar" >+11</button>
    <button name="btn2Restar" >-11</button>
    <input type="number" name="num2" value="<?php// echo $resultado2?>">
    </br>


    <button name="btn3Sumar" >+11</button>
    <button name="btn3Restar" >-11</button>
    <input type="number" name="num3" value="<?php// echo $resultado3?>">
    
    <?php //foreach ($lista as $prueba) {?>
    <input type="number" name="id" value="<?php// echo $prueba['id']?>">
    <input type="number" name="cantidad" value="<?php// echo $prueba['cantidad']?>">
    </br>
    <?php //}?>
    
    
    -->

   
</form>
<?php $numero==0;} ?>
<button type="submit">Sumar</button>


<!-- <div class="input-group product-qty">
                        <button type="button"
                          class="quantity-left-minus  btn btn-primary rounded-0 rounded-start btn-number"
                          name="btnRestar">
                          -
                        </button>

                        <input type="text" name="cantidad<?php //echo $producto['id']?>" class="form-control input-number quantity text-center" value="<?php echo $resultado1?>">

                        <button type="buttom" 
                            class="quantity-right-plus btn btn-primary rounded-0 rounded-end btn-number"
                            name="btnSumar">
                          +
                        </button>-->

<?php 
echo $cantidad;

?>
</br>
<?php 
//echo $resultado2;

?>
</br>
<?php 
//echo $resultado3;

?>

  
    


    
</body>
</html>