document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.get('status') === 'updated') {
        showSuccessModal('Cantidad Actualizada', 'La cantidad del producto se actualizó correctamente.');
    }

    else if (urlParams.get('status') === 'deleted') {
        showSuccessModal('Producto Eliminado', 'El producto fue eliminado del carrito.');
    }

    // Limpia los parámetros de la URL después de mostrar el modal
    if (urlParams.get('status')) {
        window.history.replaceState({}, document.title, window.location.pathname);
    }
});

function showSuccessModal(title, message) {
    // Actualiza el contenido del modal
    document.getElementById('modal-title').textContent = title;
    document.getElementById('modal-message').textContent = message;

    const redirectButton = document.getElementById('redirectButton');
    redirectButton.textContent = 'Continuar comprando';

    // Muestra el modal
    const successModal = document.getElementById('successModal');
    successModal.classList.remove('hidden');

    // Cierra el modal automáticamente después de unos segundos
    setTimeout(() => {
        successModal.classList.add('hidden');
    }, 3000);

    // Opcional: Redirige al hacer clic en el botón
    redirectButton.addEventListener('click', () => {
        window.location.href = '../views/catalogo.php';
    });
}
