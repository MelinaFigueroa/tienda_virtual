//Funcion para mostrar mensaje de producto agregado con exito admmin

document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.get('status') === 'added') {
        showAdminSuccessModal('¡Producto cargado con éxito!', 'Puedes seguir agregando productos.');
        window.history.replaceState({}, document.title, window.location.pathname);
    }

    if (urlParams.get('status') === 'deleted') {
        showAdminSuccessModal('Producto eliminado', 'El producto ha sido eliminado exitosamente.');
        window.history.replaceState({}, document.title, window.location.pathname);
    }
    /**
      const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('status') === 'added') {
        configureModal(
            '¡Producto agregado con éxito!',
            'El producto fue añadido correctamente a la lista.',
            'Ir a la lista de productos',
            () => {
                window.location.href = '../admin/listar_productos.php';
            }
        );
        // Remover el parámetro de la URL
        window.history.replaceState({}, document.title, window.location.pathname);
    }
    }
     */
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

//Funcion para eliminar un producto desde la vista admin
function confirmDeleteModal(productId) {
    configureModal(
        'Confirmar Eliminación',
        '¿Estás seguro de que deseas eliminar este producto? Esta acción no se puede deshacer.',
        'Eliminar',
        () => {
            window.location.href = `../../../controllers/products/delete.php?id=${productId}`;
        },
        'Cancelar',
        closeModal
    );
}

