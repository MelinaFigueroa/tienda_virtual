function togglePasswordVisibility(inputId) {
    const passwordInput = document.getElementById(inputId);
    const passwordIcon = document.getElementById('togglePasswordIcon');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordIcon.src = '../icons/visibility_on.svg';
    } else {
        passwordInput.type = 'password';
        passwordIcon.src = '../icons/visibility_off.svg';
    }
}

// Validación en tiempo real de la contraseña
document.getElementById('password').addEventListener('input', function () {
    const password = this.value;
    const requirements = document.getElementById('passwordRequirements');

    // Verificar si la contraseña tiene al menos 8 caracteres y al menos un número
    const isValid = password.length >= 8 && /\d/.test(password);

    if (isValid) {
        requirements.classList.add('hidden'); // Ocultar el mensaje si es válida
    } else {
        requirements.classList.remove('hidden'); // Mostrar el mensaje si no es válida
    }
});