<?php
session_start();
include 'header.php';

$ticket = $_SESSION['ticket'] ?? null;
?>

<?php if ($ticket) { ?>
<div class="ticket">
    <h3>Ticket de Compra</h3>
    <p><span><strong>Producto</strong></span><span><?php echo htmlspecialchars($ticket['cantidad'] . ' x ' . $ticket['producto']); ?></span></p>
    <p><span><strong>Preparación</strong></span><span><?php echo htmlspecialchars($ticket['preferencia']); ?></span></p>
    <p class="total"><span>Total a pagar</span><span>$<?php echo htmlspecialchars($ticket['total']); ?></span></p>
</div>
<?php } else { ?>
<div class="ticket">
    <h3>No hay un pedido disponible</h3>
    <p>Realiza un pedido para ver tu ticket.</p>
    <a href="orden.php" class="boton-principal">Hacer un pedido</a>
</div>
<?php } ?>

<?php include 'footer.php'; ?>