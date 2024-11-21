// Evento para manejar el clic en el botón de registro
document.getElementById('register-btn').addEventListener('click', async () => {
    const nameField = document.getElementById('name');
    const emailField = document.getElementById('email');

    const name = nameField.value.trim();
    const email = emailField.value.trim();

    // Validación
    if (!name) {
        showError('Debe ingresar su nombre!', nameField);
        return;
    }
    if (!/^[a-zA-Z\s]+$/.test(name)) {
        showError('Su nombre solamente puede contener letras!', nameField);
        return;
    }
    if (!email) {
        showError('Debe ingresar su email!', emailField);
        return;
    }
    if (!/\S+@\S+\.\S+/.test(email)) {
        showError('Debe ingresar un formato válido de email!', emailField);
        return;
    }

    // Enviar datos al servidor para registrar el usuario
    try {
        const response = await fetch('../php/insertarUsuario.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({ email, nombre: name })
        });

        const result = await response.json();

        if (result.success) {
            Swal.fire({
                icon: 'success',
                title: 'Cuenta creada exitosamente!',
                text: 'Inicie sesión con su nueva cuenta!',
                confirmButtonColor: '#214E77'
            }).then(() => {
                // Vaciar los inputs antes de redirigir
                nameField.value = "";
                emailField.value = "";
                
                // Redirigir a la página de inicio (index.php)
                window.location.href = '../index.php';
            });
        } else {
            showError(result.message, emailField);
        }
    } catch (error) {
        console.error('Error al registrar el usuario:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Ocurrió un error al registrar el usuario. Inténtelo de nuevo más tarde.',
            confirmButtonColor: '#214E77'
        });
    }
});

// Función para mostrar errores con foco en el campo correspondiente
function showError(message, field) {
    field.focus(); // Mueve el foco al campo antes de mostrar la alerta
    Swal.fire({
        icon: 'error',
        title: 'Ocurrió un error',
        text: message,
        confirmButtonColor: '#214E77'
    });
}

// Capturar el evento de Enter para enviar el formulario
['name', 'email'].forEach((id) => {
    document.getElementById(id).addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault(); // Previene el comportamiento por defecto de Enter
            document.getElementById('register-btn').click(); // Simula el clic en el botón
        }
    });
});
