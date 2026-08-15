<?php include 'header.php'; ?>

<?php
//
$menu = [
    "expresso"=>35,
    "americano"=>40,
    "capuchino"=>55,
    "tatte" =>60
];
?>

<h2>generar un nuevo pedido</h2>
<div class="formulario-pedido">
    <form method="POST">
        <label>selecciona tu cafe: </label>
        <select name="tipo_cafe" required>
            <?php
                foreach ($menu as $cafe=>$precio){
                echo "<option value='$cafe'> $cafe-$$precio </option>";
            }
            ?>
        <select>
        <br><br>

        <label>cantidad:</label>
        <input type ="number" name="cantidad" value="1" min="1" requiered >
        <br><br>
        
        <label>
            <input type="checkbox" name="sin_azucar" value="si"> preparar sin azucar
        </label>
        <br><br>

        <button type="submit" class="boton-principal">Procesar Orden</button>
    </form>
</div>

<?php
// Lógica para procesar la orden
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cafe_elegido = $_POST["tipo_cafe"];
        $cantidad = $_POST["cantidad"];
        $preferencia = isset($_POST["sin_azucar"]) ? "sin azúcar" : "con azúcar";
        $total = $menu[$cafe_elegido] * $cantidad;
        echo "<div class='ticket'>";
        echo "<h3>Ticket de Compra</h3>";
        echo "<p><strong>Producto:</strong> $cantidad x $cafe_elegido($preferencia)</p>";
        echo "<p><strong>Total a pagar:</strong> $$total</p>";
        echo "</div>";
    }
?>

<?php include 'footer.php'; ?>
