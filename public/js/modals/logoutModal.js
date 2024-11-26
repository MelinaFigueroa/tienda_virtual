document.getElementById('logoutButton').addEventListener('click', function () {
    showConfirmationModal(
        'Cerrar Sesión',
        '¿Estás seguro de que deseas cerrar sesión?',
        'Cerrar Sesión',
        'Cancelar',
        () => {
            // Redirigir al logout.php
            window.location.href = '/controllers/auth/logout.php?redirect=index';
        }
    );
});

// Función para mostrar un modal de confirmación
function showConfirmationModal(title, message, confirmText, cancelText, confirmAction) {
    // Actualiza el contenido del modal
    document.getElementById('modal-title').textContent = title;
    document.getElementById('modal-message').textContent = message;

    const confirmButton = document.getElementById('redirectButton');
    confirmButton.textContent = confirmText;

    const cancelButton = document.getElementById('cancelButton');
    cancelButton.textContent = cancelText;

    // Limpiar eventos previos y asignar nuevos
    confirmButton.replaceWith(confirmButton.cloneNode(true));
    const newConfirmButton = document.getElementById('redirectButton');
    newConfirmButton.addEventListener('click', () => {
        confirmAction();
        closeModal();
    });

    cancelButton.replaceWith(cancelButton.cloneNode(true));
    const newCancelButton = document.getElementById('cancelButton');
    newCancelButton.addEventListener('click', closeModal);

    // Mostrar el modal
    const confirmationModal = document.getElementById('successModal');
    confirmationModal.classList.remove('hidden');
}

// Función para cerrar el modal
function closeModal() {
    const confirmationModal = document.getElementById('successModal');
    confirmationModal.classList.add('hidden');
}
