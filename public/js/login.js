document.getElementById('loginForm').addEventListener('submit', async function(event) {
    event.preventDefault(); // Evita el envío por defecto del formulario

    const formData = new FormData(event.target);
    const data = new URLSearchParams(formData);

    try {
        const response = await fetch('../../controllers/auth/login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: data
        });

        let result;
        try {
            result = await response.json();
        } catch (jsonError) {
            console.error("Error procesando JSON:", jsonError);
            alert("Hubo un problema en la respuesta del servidor. Inténtalo de nuevo.");
            return;
        }

        const errorMessage = document.getElementById('errorMessage');

        if (response.ok && result.token) {

             // Mostrar el modal de éxito
             document.getElementById('successModal').classList.remove('hidden');
             document.getElementById('modal-message').innerText = result.message;

            // Guardar el token en localStorage
            localStorage.setItem('jwtToken', result.token);


            // Redirigir al inicio cuando se hace clic en el botón del modal
            document.getElementById('redirectButton').addEventListener('click', () => {
                window.location.href = '/Proyecto-PHP-1/public/'; 
            });
            // Redirigir automáticamente después de 2 segundos (opcional)
            setTimeout(() => {
                window.location.href = '/Proyecto-PHP-1/public/'; 
            }, 2000);
        } else {
            errorMessage.innerText = result.message;
            errorMessage.classList.remove('hidden');
        }
    } catch (error) {
        console.error("Error:", error);
        alert("Hubo un problema al iniciar sesión. Inténtalo de nuevo.");
    }
});
