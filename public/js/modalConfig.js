// modalConfig.js

// Función para configurar y mostrar el modal
function configureModal(title, message, buttonText, buttonAction, cancelText = 'Cancelar', cancelAction = closeModal) {
    const modalTitle = document.getElementById('modal-title');
    const modalMessage = document.getElementById('modal-message');
    const redirectButton = document.getElementById('redirectButton');
    const cancelButton = document.getElementById('cancelButton');
    const successModal = document.getElementById('successModal');

    if (!modalTitle || !modalMessage || !redirectButton || !cancelButton || !successModal) {
        console.error("No se encontraron elementos del modal en el DOM");
        return;
    }

    // Actualiza el contenido del modal
    modalTitle.textContent = title;
    modalMessage.textContent = message;
    redirectButton.textContent = buttonText;
    cancelButton.textContent = cancelText;

    // Configura la acción de los botones
    redirectButton.onclick = () => {
        buttonAction();
        closeModal(); // Cierra el modal después de ejecutar la acción
    };
    cancelButton.onclick = () => {
        cancelAction();
        closeModal(); // Cierra el modal si se hace clic en "Cancelar"
    };

    // Muestra el modal
    successModal.classList.remove('hidden');
}

// Función para cerrar el modal
function closeModal() {
    document.getElementById('successModal').classList.add('hidden');
}