document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);

    // Detectar si el producto fue agregado al carrito
    if (urlParams.get('status') === 'updated') {
        showSuccessModal({
            modalId: 'cartModal',
            title: 'Producto Actualizado',
            message: 'La cantidad del producto se ha actualizado.',
            confirmText: 'Aceptar',
            confirmAction: () => {
                window.history.replaceState({}, document.title, window.location.pathname);
            }
        });
    }

    if (urlParams.get('status') === 'removed') {
        showSuccessModal({
            modalId: 'cartModal',
            title: 'Producto Eliminado',
            message: 'El producto fue eliminado del carrito.',
            confirmText: 'Aceptar',
            confirmAction: () => {
                window.history.replaceState({}, document.title, window.location.pathname);
            }
        });
    }
});

// Función para mostrar un modal de éxito
function showSuccessModal(title, message, buttonText, buttonAction) {
    // Actualiza el contenido del modal
    document.getElementById('modal-title').textContent = title;
    document.getElementById('modal-message').textContent = message;

    const confirmButton = document.getElementById('redirectButton');
    confirmButton.textContent = confirmText;

    // Limpiar eventos anteriores y añadir el nuevo
    redirectButton.replaceWith(redirectButton.cloneNode(true));
    const newRedirectButton = document.getElementById('redirectButton');
    newRedirectButton.addEventListener('click', buttonAction);

    // Mostrar el modal
    const successModal = document.getElementById('successModal');
    successModal.classList.remove('hidden');

    // Cerrar automáticamente el modal después de 3 segundos (opcional)
    setTimeout(() => {
        successModal.classList.add('hidden');
    }, 3000);
}

// Función para mostrar un modal de error
function showErrorModal(title, message) {
    showSuccessModal(title, message, 'Cerrar', () => {
        // Solo cierra el modal
        const successModal = document.getElementById('successModal');
        successModal.classList.add('hidden');
    });
}
