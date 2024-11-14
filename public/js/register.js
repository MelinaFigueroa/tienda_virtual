// Capitalización de la primera letra en tiempo real
document.getElementById('name').addEventListener('input', function() {
    this.value = capitalize(this.value);
});

document.getElementById('username').addEventListener('input', function() {
    this.value = capitalize(this.value);
});

function capitalize(text) {
    return text.replace(/\b\w/g, char => char.toUpperCase());
}

document.getElementById('registerForm').addEventListener('submit', async function (event) {
    event.preventDefault();

    const formData = new FormData(event.target);
    const data = new URLSearchParams(formData);

    try {
        const response = await fetch('../../controllers/auth/register.php', {
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

        if (response.ok && result.success) {

            // Mostrar el modal de éxito
            document.getElementById('successModal').classList.remove('hidden');
            document.getElementById('modal-message').innerText = result.message;

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
        alert("Hubo un problema al registrar el usuario. Inténtalo de nuevo.");
    }
    
});
