 <?php
 $menu = [
    "expresso"=> 35,
    "americano"=>40,
    "capuchino"=>55,
    "latle"=>60,

 ];
 if($_SERVER["REQUEST_METHOD"]=="POST"){   
    $cafe_elegido=$_POST ["tipo_cafe"];
    $cantidad = $_POST["cantidad"];

    $preferencia ="con azucar";
    if (isset ( $_POST["sin_azucar"])){
        $preferencia = "sin azucar";
    }

    $precio_unitario = $menu[$cafe_elegido];
    $total =$precio_unitario * $cantidad;

    echo"<div style='border : 1px solid black; padding: 15px ; margin-bottom:20px;'>";
    echo "<h3> ticket de compra </h3>";
    echo "<p><strong>producto:</strong>$cantidad x $cafe_elegido($preferencia)</p>";
    echo"<p><strong>total a pagar :</strong> $$total</p>";
    echo "</div>";
    }
 ?>

 <!DOCTYPE html>
 <html>
    <head> <title>cafeteria</title></head>
    <body>
        <h1>sistema de pedidos</h1>
        <form method="POST">
            <label>selecciona tu cafe:</label>

            <select name="tipo_cafe">
            <?php
            foreach ($menu as $cafe => $precio) {
                echo "<option value='$cafe'> $cafe - $$precio</option>";

            }
            ?>
            </select>
            <br><br>

            <label>cantidad:</label>
            <input type ="number" name="cantidad" value ='1' min ="1">
            <br><br>
              
            <label>
                <input type="checkbox" name="sin_azucar" value="si">
                 preparar sin azucar 
            </label>
            <button type="submit"> procesar orden </button>
        </form>
    </body>
</html>
