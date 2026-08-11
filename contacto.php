<?php include 'header.php'; ?>

<h2>Envíanos un mensaje</h2>

<?php
 // Si el usuario presionó enviar, atrapamos el dato con POST
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $nombre = $_POST["nombre"];
 echo "<p style='color: green;'>¡Gracias por escribirnos, $nombre! Hemos recibido tu mensaje.</p>";
 }
?>

<form method="POST">
 <label>Tu Nombre:</label><br>
 <input type="text" name="nombre" required><br><br>
 <label>Mensaje:</label><br>
 <textarea name="mensaje" required></textarea><br><br>
 <button type="submit">Enviar Mensaje</button>
</form>

<?php include 'footer.php'; ?>
