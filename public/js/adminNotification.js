//Funcion para mostrar mensaje de producto agregado con exito admmin

document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.get('status') === 'added') {
        showAdminSuccessModal('¡Producto cargado con éxito!', 'Puedes seguir agregando productos.');
        window.history.replaceState({}, document.title, window.location.pathname);
    }

    if (urlParams.get('status') === 'updated') {
        showAdminSuccessModal('¡Producto actualizado con éxito!', 'Los cambios han sido guardados.');
        window.history.replaceState({}, document.title, window.location.pathname);
    }

    if (urlParams.get('status') === 'deleted') {
        confirmDeleteModal('Producto eliminado', 'El producto ha sido eliminado exitosamente.');
        window.history.replaceState({}, document.title, window.location.pathname);
    }
});

function showAdminSuccessModal(title, message) {
    const modalTitle = document.getElementById('modal-title');
    const modalMessage = document.getElementById('modal-message');
    const redirectButton = document.getElementById('redirectButton');
    const successModal = document.getElementById('successModal');

    // Verificar si los elementos existen
    if (!modalTitle || !modalMessage || !redirectButton || !successModal) {
        console.error("Elementos del modal no encontrados en el DOM");
        return;
    }

    // Actualizar contenido del modal
    modalTitle.textContent = title;
    modalMessage.textContent = message;
    redirectButton.textContent = 'Ir a la lista de productos';

    // Mostrar el modal
    successModal.classList.remove('hidden');

    // Cierra el modal automáticamente después de unos segundos
    setTimeout(() => {
        successModal.classList.add('hidden');
    }, 3000);

    // Agregar el evento para redirigir al hacer clic en el botón
    redirectButton.addEventListener('click', () => {
        window.location.href = '../admin/listar_productos.php';
    });
}

function confirmDeleteModal(productId) {
    showAdminDeleteModal(
        'Confirmar Eliminación',
        '¿Estás seguro de que deseas eliminar este producto? Esta acción no se puede deshacer.',
        'Eliminar',
        () => {
            window.location.href = `../../../controllers/products/delete.php?id=${productId}&status=deleted`;
            window.history.replaceState({}, document.title, window.location.pathname);
        },
        'Cancelar',
        closeModal
    );
}

// Función para configurar y mostrar el modal
function showAdminDeleteModal(title, message, buttonText, buttonAction, cancelText = 'Cancelar', cancelAction = closeModal) {
    const modalTitle = document.getElementById('modal-title');
    const modalMessage = document.getElementById('modal-message');
    const deleteConfirmButton = document.getElementById('deleteConfirmButton');
    const cancelButton = document.getElementById('deleteCancelButton');
    const deleteModal = document.getElementById('deleteModal');

    if (!modalTitle || !modalMessage || !redirectButton || !cancelButton || !successModal) {
        console.error("No se encontraron elementos del modal en el DOM");
        return;
    }

    // Actualiza el contenido del modal
    modalTitle.textContent = title;
    modalMessage.textContent = message;
    deleteConfirmButton.textContent = buttonText;
    cancelButton.textContent = cancelText;

    // Configura la acción de los botones
    deleteConfirmButton.onclick = () => {
        buttonAction();
        closeModal(); // Cierra el modal después de ejecutar la acción
    };
    cancelButton.onclick = () => {
        cancelAction();
        closeModal(); // Cierra el modal si se hace clic en "Cancelar"
    };

    // Muestra el modal
    deleteModal.classList.remove('hidden');
}

// Función para cerrar el modal
function closeModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}