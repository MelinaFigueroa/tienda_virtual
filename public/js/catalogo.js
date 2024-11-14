// catalogo.js
function mostrarLoginRequeridoModal() {
    // Actualiza el contenido del modal para mostrar el mensaje de autenticación requerida
    document.getElementById('modal-title').textContent = 'Acción Requerida';
    document.getElementById('modal-message').textContent = 'Debes registrarte o iniciar sesión para agregar productos al carrito o realizar compras.';

    const redirectButton = document.getElementById('redirectButton');
    redirectButton.textContent = 'Iniciar Sesión';
    redirectButton.onclick = () => {
        window.location.href = "../auth/login.php"; 
    };

    // Muestra el modal
    const successModal = document.getElementById('successModal');
    successModal.classList.remove('hidden');

    // Cierra el modal automáticamente después de unos segundos, si no hay interacción
    setTimeout(() => {
        successModal.classList.add('hidden');
    }, 3000);
}