<?php    
$inventario = [ 
    "laptop" => 5,
    "mouse" => 0,
    "teclado" => 12,
    "monitor" => 0
];
?>

<!DOCTYPE html>
<html>
    <head><title>MI TIENDA</title></head> 
    <body>
        <h2> estado de inventario </h2>
        <ul>
            <?php foreach ($inventario as $producto=>$cantidad){
                if ($cantidad){
                    echo "<li>$producto:¡disponible!(quedan $cantidad)</li>";
                }else{
                    echo "<li>$producto:agotado :(<li/>";
                }
            }?>
        </ul>
    </body>
</html>        
