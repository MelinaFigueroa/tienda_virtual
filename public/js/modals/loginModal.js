document.getElementById('loginForm').addEventListener('submit', async function (event) {
    event.preventDefault(); // Evita el envío por defecto del formulario

    const formData = new FormData(event.target);
    const data = new URLSearchParams(formData);

    try {
        const response = await fetch('../../controllers/auth/login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: data,
        });

        let result;
        try {
            result = await response.json();
        } catch (jsonError) {
            console.error('Error procesando JSON:', jsonError);
            showErrorModal('Error', 'Hubo un problema en la respuesta del servidor. Inténtalo de nuevo.');
            return;
        }

        // Verificar si la respuesta es exitosa
        if (response.ok && result.token) {
            // Usar el modal de éxito
            showSuccessModal('¡Inicio de sesión exitoso!', result.message, 'Ir al inicio', () => {
                // Guardar token en localStorage
                localStorage.setItem('jwtToken', result.token);

                // Redirigir al inicio
                window.location.href = '../index.php';
            });
        } else {
            // Mostrar error en el modal
            showErrorModal('Error', result.message || 'Error desconocido.');
        }
    } catch (error) {
        console.error('Error:', error);
        showErrorModal('Error', 'Hubo un problema al iniciar sesión. Inténtalo de nuevo.');
    }
});

// Función para mostrar un modal de éxito
function showSuccessModal(title, message, buttonText, buttonAction) {
    // Actualiza el contenido del modal
    document.getElementById('modal-title').textContent = title;
    document.getElementById('modal-message').textContent = message;

    const redirectButton = document.getElementById('redirectButton');
    redirectButton.textContent = buttonText;

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
