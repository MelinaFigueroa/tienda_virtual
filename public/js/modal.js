// Función para mostrar el modal con un mensaje personalizado
function showSuccessModal(message, redirectUrl) {
    document.getElementById('modal-title').textContent = '¡Éxito!';
    document.getElementById('modal-message').innerText = message;
    document.getElementById('successModal').classList.remove('hidden');

    const redirectButton = document.getElementById('redirectButton');
    
    // Eliminar cualquier evento previo para evitar múltiples listeners
    redirectButton.replaceWith(redirectButton.cloneNode(true)); 
    const newRedirectButton = document.getElementById('redirectButton');
    
    // Configura el botón de redirección en el modal
    newRedirectButton.addEventListener('click', () => {
        window.location.href = redirectUrl;
    });

    // Redirigir automáticamente después de 2 segundos (opcional)
    setTimeout(() => {
        window.location.href = redirectUrl;
    }, 3000);
}

// Función para cerrar el modal
function closeModal() {
    document.getElementById('successModal').classList.add('hidden');
}