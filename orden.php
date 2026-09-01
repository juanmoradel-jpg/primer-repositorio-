<?php include 'header.php'; ?>

<?php
class Cafe {
// Propiedades (Las características del objeto)
    public $nombre;
    public $precio;
// Método Constructor (Lo que pasa al momento de "nacer" el objeto)
    public function __construct($nombre_cafe, $precio_cafe) {
        $this->nombre = $nombre_cafe;
        $this->precio = $precio_cafe;
    }
// Métodos (Las acciones que el objeto puede hacer)
    public function obtenerDescripcion() {
        return $this->nombre . " a $" . $this->precio;
    }

    public function calcularSubtotal($cantidad_pedida) {
return $this->precio * $cantidad_pedida; }   
}


$menu = [
    "Espresso" => new Cafe("Espresso", 35),
    "Americano" => new Cafe("Americano", 40),
    "Capuccino" => new Cafe("Capuccino", 55),
    "Latte" => new Cafe("Latte", 60)
];
?>
<h2>generar un nuevo pedido</h2>
<div class="formulario-pedido">
    <form method="POST">
        <label>selecciona tu cafe: </label>
        <select name="tipo_cafe" required>
            <?php foreach ($menu as $llave => $objeto_cafe) { ?>
            <option value='<?php echo $llave; ?>'>
            <?php echo $objeto_cafe->obtenerDescripcion(); ?>
            </option>
            <?php } ?>
        </select>
        <br><br>

        <label>cantidad:</label>
        <input type ="number" name="cantidad" value="1" min="1" required >
        <br><br>
        
        <label>
            <input type="checkbox" name="sin_azucar" value="si"> preparar sin azucar
        </label>
        <br><br>

        <button type="submit" class="boton-principal">Procesar Orden</button>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cafe_elegido = $_POST["tipo_cafe"];
    $cantidad = $_POST["cantidad"];
    $preferencia = isset($_POST["sin_azucar"]) ? "sin azúcar" : "con azúcar";

    // 1. Rescatamos el OBJETO completo de la base de datos
    $mi_bebida = $menu[$cafe_elegido];

    // 2. Extraemos su precio usando la flecha y calculamos
    $total = $mi_bebida->calcularSubtotal($cantidad);
    echo "<div class='ticket'>";
    echo "<h3>Ticket de Compra</h3>";
    echo "<p><strong>Producto:</strong> $cantidad x " . $mi_bebida->nombre . "
    ($preferencia)</p>";
    echo "<p><strong>Total a pagar:</strong> $$total</p>";
    echo "</div>";
}
?>

<?php include 'footer.php'; ?>
