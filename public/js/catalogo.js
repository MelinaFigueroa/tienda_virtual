// catalogo.js
document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('status') === 'added') {
        showSuccessModal('¡Producto agregado al carrito!', 'Podes seguir comprando o');
        window.history.replaceState({}, document.title, window.location.pathname); // Remueve el parámetro de la URL
    }
});

function showSuccessModal(title, message) {
    // Actualiza el contenido del modal
    document.getElementById('modal-title').textContent = title;
    document.getElementById('modal-message').textContent = message;

    const redirectButton = document.getElementById('redirectButton');
    redirectButton.textContent = 'Ir a el carrito de compras';

    // Muestra el modal
    const successModal = document.getElementById('successModal');
    successModal.classList.remove('hidden');

    // Cierra el modal automáticamente después de unos segundos
    setTimeout(() => {
        successModal.classList.add('hidden');
    }, 3000);

    // Opcional: Redirige al hacer clic en el botón
    document.getElementById('redirectButton').addEventListener('click', () => {
        window.location.href = '../views/carrito.php';
    });
}
