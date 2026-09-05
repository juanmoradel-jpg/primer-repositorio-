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

// 1. Nos conectamos a la base de datos de DDEV (host, dbname, usuario, contraseña)
$conexion = new PDO("mysql:host=db;dbname=db", "db", "db");
// 2. Preparamos la pregunta (Query)
$consulta = $conexion->query("SELECT * FROM menu");
// 3. Descargamos los datos genéricos
$menu_db = $consulta->fetchAll(PDO::FETCH_OBJ);

// 4. CORRECCIÓN: Convertimos los datos a objetos de la clase Cafe 
// y creamos el arreglo $menu donde la "llave" es el nombre del café.
$menu = [];
foreach ($menu_db as $item) {
    $menu[$item->nombre] = new Cafe($item->nombre, $item->precio);
}
?>

<h2>generar un nuevo pedido</h2>
<div class="formulario-pedido">
    <form method="POST">
        <label>selecciona tu cafe: </label>
        <select name="tipo_cafe" required>
            <!-- Usamos el nuevo arreglo $menu -->
            <?php foreach ($menu as $item) { ?>
            <option value='<?php echo $item->nombre; ?>'>
            <?php echo $item->obtenerDescripcion(); ?>
            </option>
            <?php } ?>
        </select>
        <br><br>

        <label>cantidad:</label>
        <input type ="number" name="cantidad" value="1" min="1" required >
        <br><br>
        
        <label class="opcion-checkbox">
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
