<?php include 'header.php'; ?>

<?php
 if (isset($_GET['nombre'])) {
 $nombre_recibido = $_GET['nombre'];
 echo "<h2>Bienvenido al perfil de: $nombre_recibido</h2>";
 } else {
 echo "<h2>Por favor, selecciona un perfil de la lista.</h2>";
 }
?>

<ul>
 <li><a href="perfil.php?nombre=Juan">Ver perfil de Juan</a></li>
 <li><a href="perfil.php?nombre=Maria">Ver perfil de María</a></li>
</ul>

<?php include 'footer.php'; ?>
