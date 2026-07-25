<?php 
    $edad =12;
    $mensaje="";
    if($edad>=18){
        $mensaje="tienes acceso";
    }else{
        $mensaje ="acceso denegado";

    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>mi primera web de juan</title>
    </head>
    <body>
        <h1>!hola mundo!</h1>
        <h2><?php echo $mensaje;  ?></h2>
        <p>este es mi  primera pagina web. Hola soy juan</p>
    </body>
</html>
