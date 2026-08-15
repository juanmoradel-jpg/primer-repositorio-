const menu = [
  { nombre: 'expresso', precio: 35 },
  { nombre: 'americano', precio: 40 },
  { nombre: 'capuchino', precio: 55 },
  { nombre: 'latte', precio: 60 }
];

const selector = document.getElementById('tipo-cafe');
const cantidadInput = document.getElementById('cantidad');
const sinAzucar = document.getElementById('sin-azucar');
const formulario = document.getElementById('formulario-pedido');
ticket = document.getElementById('ticket');

function cargarMenu() {
  if (!selector) return;

  selector.innerHTML = menu
    .map(
      (cafe) => `<option value="${cafe.nombre}">${cafe.nombre} - $${cafe.precio}</option>`
    )
    .join('');
}

function mostrarTicket(cafeElegido, cantidad, preferencia, total) {
  if (!ticket) return;

  ticket.innerHTML = `
    <h3>Ticket de Compra</h3>
    <p><strong>Producto:</strong> ${cantidad} x ${cafeElegido} (${preferencia})</p>
    <p><strong>Total a pagar:</strong> $${total}</p>
  `;
}

if (formulario) {
  formulario.addEventListener('submit', (event) => {
    event.preventDefault();

    const cafeElegido = selector.value;
    const cantidad = Number(cantidadInput.value) || 1;
    const preferencia = sinAzucar.checked ? 'sin azúcar' : 'con azúcar';
    const cafe = menu.find((item) => item.nombre === cafeElegido);
    const total = cafe.precio * cantidad;

    mostrarTicket(cafeElegido, cantidad, preferencia, total);
  });
}

cargarMenu();
