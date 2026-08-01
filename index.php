<?php

function verificarAcceso($edad_a_revisar){
    if ($edad_a_revisar>=18){
        return "acceso concedido.disfruta tu estancia.";
    }else{
        return"acceso denegado .vuelve cuando crezcas. ";
    }
}

if ($_SERVER ["REQUEST_METHOD"]=="POST"){

$nombre =$_POST["nombre_usuario"];
$edad=$_POST ["edad_usuario"];

echo "<h3>!hola,$nombre ¡el sevidor recibio su edad : $edad años </h3>";
$resultado=verificarAcceso($edad);
echo"<p>$resultado</p>";
}
?>

<!DOCTYPE html>
<html>
    <head><title>registro</title></head> 
    <body>
        <h1> ingresa tus datos</h1>
        <form method ="POST">
            <label> tu nombre ;</label>
            <input type = "text" name = "nombre_usuario" placeholder="EJ.juan">
            <br></br>
            <label> tu edad ;</label>
            <input type = " number " name = "edad_usuario" placeholder ="EJ.20">
            <br> </br>
            <button type ="submit">enviar al servidor</button>
        </form>
    </body>
</html>        
