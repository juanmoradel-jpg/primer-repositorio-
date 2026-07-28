<?php
    $edades=[1 ,2,3,4,5,20,100,1000,18,30,40,60,90,234];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>mi primera web de juan</title>
        <h1>los mejores juegos en mi opinion</h1>
    </head>
    <body>
        <h3> porton de entrada de menores </h3>
        <?php foreach ($edades as $edad) {
            if ($edad <= 18) { 
                echo "<p>edad: $edad - acceso denegado</p>";
            } else {
                echo "<p>edad: $edad - acceso permitido</p>";
            }
        } ?>
    </body>
</html>
