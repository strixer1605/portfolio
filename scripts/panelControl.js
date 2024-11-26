$(document).ready(function() {
    // Tu código que deseas ejecutar cuando el DOM esté completamente cargado
    editarCampos();
    editarCamposSegundaSeccion();
});

function scrollToSection(sectionId) {
    const section = document.getElementById(sectionId);

    // Calcular la posición para centrar la sección verticalmente
    const offsetTop = section.offsetTop;
    const windowHeight = window.innerHeight;
    const sectionHeight = section.offsetHeight;
    const scrollPosition = offsetTop - (windowHeight / 2) + (sectionHeight / 2);

    // Realizar el desplazamiento
    window.scrollTo({
        top: scrollPosition,
        behavior: 'smooth'
    });
}

    // Botón para mostrar/ocultar el menú de estudios
    const toggleEstudiosButton = document.getElementById("toggleEstudios");
    const listaEstudios = document.getElementById("listaEstudios");

    toggleEstudiosButton.addEventListener("click", () => {
        if (listaEstudios.style.display === "none") {
            listaEstudios.style.display = "block";
            toggleEstudiosButton.textContent = "Ocultar Estudios";
        } else {
            listaEstudios.style.display = "none";
            toggleEstudiosButton.textContent = "Mostrar Estudios";
        }
    });

    // Alternar visibilidad de la lista de herramientas
    document.getElementById("toggleHerramientas").addEventListener("click", () => {
        const listaHerramientas = document.getElementById("listaHerramientas");
        if (listaHerramientas.style.display === "none" || listaHerramientas.style.display === "") {
            listaHerramientas.style.display = "flex";
        } else {
            listaHerramientas.style.display = "none";
        }
    });


    // Lógica para cargar y mostrar la lista de idiomas
    document.getElementById('toggleIdiomas').addEventListener('click', function() {
        const listaIdiomas = document.getElementById('listaIdiomas');
        if (listaIdiomas.style.display === 'none') {
            listaIdiomas.style.display = 'flex'; // Mostrar la lista
            cargarIdioma(); // Cargar la lista de idiomas
        } else {
            listaIdiomas.style.display = 'none'; // Ocultar la lista
        }
    });


    $('#institucion, #periodoEstudio, #titulo').on('keydown', function(event){
        if (event.which === 13) {
            event.preventDefault();
            
            $('#agregarEstudio').click();
        }
    });

    $('#agregarEstudio').click(function() { 

        const institucion = document.getElementById("institucion").value;
        const periodoEstudio = document.getElementById("periodoEstudio").value;
        const titulo = document.getElementById("titulo").value;

        if (institucion && periodoEstudio && titulo) {
            const data = {
                institucion: institucion,
                periodoEstudio: periodoEstudio,
                titulo: titulo
            };

            fetch('../php/agregarEstudio.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    // Mostrar alerta de éxito con SweetAlert
                    Swal.fire({
                        title: 'Éxito',
                        text: 'El estudio se ha agregado correctamente.',
                        icon: 'success',
                        confirmButtonColor: '#3C998F' // Color para el botón de éxito
                    }).then(() => {
                        // Recargar los estudios después de agregar uno nuevo
                        cargarEstudios();
                        // Limpiar los campos del formulario
                        document.getElementById('institucion').value = '';
                        document.getElementById('periodoEstudio').value = '';
                        document.getElementById('titulo').value = '';
                    });
                } else {
                    // Mostrar alerta de error con SweetAlert
                    Swal.fire({
                        title: 'Error',
                        text: 'Hubo un problema al agregar el estudio.',
                        icon: 'error',
                        confirmButtonColor: '#3C998F' // Color para el botón de error
                    });
                }
            })
            .catch(error => {
                // Mostrar alerta de error con SweetAlert
                Swal.fire({
                    title: 'Error',
                    text: 'Hubo un problema al agregar el estudio.',
                    icon: 'error',
                    confirmButtonColor: '#3C998F' // Color para el botón de error
                });
            });
        } else {
            // Mostrar alerta de advertencia con SweetAlert
            Swal.fire({
                title: 'Advertencia',
                text: 'Por favor, complete todos los campos.',
                icon: 'warning',
                confirmButtonColor: '#3C998F' // Color para el botón de advertencia
            });
        }
    });

    $('#idioma').on('keydown', function(event){
        if (event.which === 13) {
            event.preventDefault();
            
            $('#guardarIdioma').click();
        }
    });

    $('#guardarIdioma').click(function() { 
        const idioma = document.getElementById("idioma").value;

        if (idioma) {
            const data = {
                idioma: idioma,
            };

            fetch('../php/agregarIdioma.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)  // Enviar como JSON
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    // Mostrar alerta de éxito con SweetAlert
                    Swal.fire({
                        title: 'Éxito',
                        text: 'El idioma se ha agregado correctamente.',
                        icon: 'success',
                        confirmButtonColor: '#3C998F' // Color para el botón de éxito
                    }).then(() => {
                        // Recargar la lista de idiomas después de agregar uno nuevo
                        cargarIdioma();
                        // Limpiar los campos del formulario
                        document.getElementById('idioma').value = '';
                    });
                } else {
                    // Mostrar alerta de error con SweetAlert
                    Swal.fire({
                        title: 'Error',
                        text: result.message || 'Hubo un problema al agregar el idioma.',
                        icon: 'error',
                        confirmButtonColor: '#3C998F' // Color para el botón de error
                    });
                }
            })
            .catch(error => {
                // Mostrar alerta de error con SweetAlert
                Swal.fire({
                    title: 'Error',
                    text: 'Hubo un problema al agregar el idioma.',
                    icon: 'error',
                    confirmButtonColor: '#3C998F' // Color para el botón de error
                });
            });
        } else {
            // Mostrar alerta de advertencia con SweetAlert
            Swal.fire({
                title: 'Advertencia',
                text: 'Por favor, complete todos los campos.',
                icon: 'warning',
                confirmButtonColor: '#3C998F' // Color para el botón de advertencia
            });
        }
    });
    
    $('#herramienta').on('keydown', function(event){
        if (event.which === 13) {
            event.preventDefault();
            
            $('#guardarHerramienta').click();
        }
    });

    $('#guardarHerramienta').click(function() {      
        const herramienta = document.getElementById("herramienta").value;

        if (herramienta) {
            const data = {
                herramienta: herramienta,
            };

            fetch('../php/agregarHerramienta.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)  // Enviar como JSON
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    // Mostrar alerta de éxito con SweetAlert
                    Swal.fire({
                        title: 'Éxito',
                        text: 'La herramienta se ha agregado correctamente.',
                        icon: 'success',
                        confirmButtonColor: '#3C998F' // Color para el botón de éxito
                    }).then(() => {
                        // Recargar la lista de idiomas después de agregar uno nuevo
                        cargarHerramientas();
                        // Limpiar los campos del formulario
                        document.getElementById('herramienta').value = '';
                    });
                } else {
                    // Mostrar alerta de error con SweetAlert
                    Swal.fire({
                        title: 'Error',
                        text: result.message || 'Hubo un problema al agregar la herramienta.',
                        icon: 'error',
                        confirmButtonColor: '#3C998F' // Color para el botón de error
                    });
                }
            })
            .catch(error => {
                // Mostrar alerta de error con SweetAlert
                Swal.fire({
                    title: 'Error',
                    text: 'Hubo un problema al agregar la herramienta.',
                    icon: 'error',
                    confirmButtonColor: '#3C998F' // Color para el botón de error
                });
            });
        } else {
            // Mostrar alerta de advertencia con SweetAlert
            Swal.fire({
                title: 'Advertencia',
                text: 'Por favor, complete todos los campos.',
                icon: 'warning',
                confirmButtonColor: '#3C998F' // Color para el botón de advertencia
            });
        }
    });    
    
    $('#telefono, #email, #ubicacion, #linkedin').on('keydown', function(event){
        if (event.which === 13) {
            event.preventDefault();
            
            $('#btnContacto').click();
        }
    });
    $('#btnContacto').click(function() {        
        // Obtener los valores de los inputs
        const telefono = document.querySelector('#telefono').value.trim();
        const email = document.querySelector('#email').value.trim();
        const ubicacion = document.querySelector('#ubicacion').value.trim();
        const linkedin = document.querySelector('#linkedin').value.trim();
    
        // Referencias a los inputs
        const telefonoInput = document.querySelector('#telefono');
        const emailInput = document.querySelector('#email');
        const ubicacionInput = document.querySelector('#ubicacion');
        const linkedinInput = document.querySelector('#linkedin');
    
        // Validación de los campos
        if (!telefono || isNaN(telefono)) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El campo teléfono debe contener solo números y no estar vacío.',
                confirmButtonColor: '#3C998F'
            }).then(() => telefonoInput.focus()); // Hacer foco en el input de teléfono
            return; // Detener ejecución si la validación falla
        }
    
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Expresión regular para validar email
        if (!email || !emailRegex.test(email)) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Por favor, ingresa un email válido.',
                confirmButtonColor: '#3C998F'
            }).then(() => emailInput.focus()); // Hacer foco en el input de email
            return; // Detener ejecución si la validación falla
        }
    
        if (!ubicacion) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El campo ubicación no puede estar vacío.',
                confirmButtonColor: '#3C998F'
            }).then(() => ubicacionInput.focus()); // Hacer foco en el input de ubicación
            return; // Detener ejecución si la validación falla
        }
    
        if (!linkedin) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El campo LinkedIn no puede estar vacío.',
                confirmButtonColor: '#3C998F'
            }).then(() => linkedinInput.focus()); // Hacer foco en el input de LinkedIn
            return; // Detener ejecución si la validación falla
        }
    
        // Crear un objeto con los datos
        const contactoData = {
            telefono: telefono,
            email: email,
            ubicacion: ubicacion,
            linkedin: linkedin
        };
    
        // Enviar los datos al archivo PHP usando fetch
        fetch('../php/actualizarContacto.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(contactoData)
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                // Mostrar mensaje de éxito usando SweetAlert
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: result.message,
                    confirmButtonColor: '#3C998F' // Color del botón de confirmación
                });
            } else {
                // Mostrar mensaje de error usando SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: result.message,
                    confirmButtonColor: '#3C998F' // Color del botón de confirmación
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            // Mostrar mensaje de error
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo un problema al enviar los datos.',
                confirmButtonColor: '#3C998F'
            });
        });
    });

    $('#descripcion').on('keydown', function(event){
        if (event.which === 13) {
            event.preventDefault();
            
            $('#sobreMi').click();
        }
    });
    $('#sobreMi').click(function() {
        const descripcion = document.querySelector("#descripcion").value.trim(); // Obtener y limpiar el valor del textarea
    
        if (!descripcion) {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "La descripción no puede estar vacía.",
                confirmButtonColor: "#3C998F"
            }).then(() => document.querySelector("#descripcion").focus()); // Hacer foco en el textarea
            return;
        }
    
        // Crear un objeto con los datos
        const sobreMiData = {
            descripcion: descripcion
        };
    
        // Enviar los datos al archivo PHP usando fetch
        fetch("../php/actualizarSobreMi.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(sobreMiData)
        })
        .then((response) => response.json())
        .then((result) => {
            if (result.success) {
                // Mostrar mensaje de éxito usando SweetAlert
                Swal.fire({
                    icon: "success",
                    title: "¡Éxito!",
                    text: result.message,
                    confirmButtonColor: "#3C998F"
                });
            } else {
                // Mostrar mensaje de error usando SweetAlert
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: result.message,
                    confirmButtonColor: "#3C998F"
                });
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Hubo un problema al enviar los datos.",
                confirmButtonColor: "#3C998F"
            });
        });
    });
    

    // Botón para mostrar/ocultar el menú de experiencias laborales
    const toggleButton = document.getElementById("toggleExperiencias");
    const listaExperiencias = document.getElementById("listaExperiencias");

    toggleButton.addEventListener("click", () => {
        if (listaExperiencias.style.display === "none") {
            listaExperiencias.style.display = "block";
            toggleButton.textContent = "Ocultar Experiencias";
        } else {
            listaExperiencias.style.display = "none";
            toggleButton.textContent = "Mostrar Experiencias";
        }
    });

    // Escuchar clic en los botones de la clase editar-btn
    function editarCampos(){
        document.querySelectorAll('.editar-btn').forEach(button => {
            button.addEventListener('click', () => {
                const div = button.closest('.experiencia-item'); // Obtener el contenedor principal del botón
                const inputs = div.querySelectorAll('input'); // Obtener todos los inputs dentro del div
    
                if (button.textContent === 'Editar') {
                    // Si el botón dice "Editar", habilitar los inputs para edición
                    inputs.forEach(input => input.disabled = false);
                    button.textContent = 'Guardar'; // Cambiar el texto del botón a "Guardar"
                } else if (button.textContent === 'Guardar') {
                    // Si el botón dice "Guardar", tomar los valores y enviarlos
                    const dataId = button.getAttribute('data-id'); // Obtener el data-id del botón
                    const archivo = button.getAttribute('data-direccion');
                    const primerInput = inputs[0].value; // Valor del primer input (primerInput)
                    const periodo = inputs[1].value; // Valor del segundo input (periodo)
                    const tercerInput = inputs[2].value; // Valor del tercer input (tercerInput)
    
                    // Crear un objeto con los datos
                    const data = {
                        id: dataId,
                        primerInput: primerInput,
                        periodo: periodo,
                        tercerInput: tercerInput
                    };
    
                    const direccion = '../php/'+archivo+'.php';
    
                    // Enviar los datos al archivo PHP usando fetch
                    fetch(direccion, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            // Mostrar mensaje de éxito usando SweetAlert
                            Swal.fire({
                                icon: 'success',
                                title: '¡Éxito!',
                                text: result.message,
                                confirmButtonColor: '#3C998F' // Cambiar color del botón de confirmación
                            });
                            // Deshabilitar los inputs de nuevo
                            inputs.forEach(input => input.disabled = true);
                            button.textContent = 'Editar'; // Cambiar el texto del botón a "Editar"
                        } else {
                            // Mostrar mensaje de error usando SweetAlert
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: result.message,
                                confirmButtonColor: '#3C998F' // Cambiar color del botón de confirmación
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Mostrar mensaje de error usando SweetAlert
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Hubo un problema al enviar los datos.',
                            confirmButtonColor: '#3C998F' // Cambiar color del botón de confirmación
                        });
                    });
                }
            });
        });
    }

    function editarCamposSegundaSeccion(){
        document.querySelectorAll('.editar-btnn').forEach(button => {
            button.addEventListener('click', () => {
                const div = button.closest('.idioma-item'); // Obtener el contenedor principal del botón
                const inputs = div.querySelectorAll('input'); // Obtener todos los inputs dentro del div
    
                if (button.textContent === 'Editar') {
                    // Si el botón dice "Editar", habilitar los inputs para edición
                    inputs.forEach(input => input.disabled = false);
                    button.textContent = 'Guardar'; // Cambiar el texto del botón a "Guardar"
                } else if (button.textContent === 'Guardar') {
                    // Si el botón dice "Guardar", tomar los valores y enviarlos
                    const dataId = button.getAttribute('data-id'); // Obtener el data-id del botón
                    const archivo = button.getAttribute('data-direccion');
                    const primerInput = inputs[0].value; // Valor del primer input (primerInput)
    
                    // Crear un objeto con los datos
                    const data = {
                        id: dataId,
                        primerInput: primerInput,
                    };
    
                    const direccion = '../php/'+archivo+'.php';
                    // Enviar los datos al archivo PHP usando fetch
                    fetch(direccion, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            // Mostrar mensaje de éxito usando SweetAlert
                            Swal.fire({
                                icon: 'success',
                                title: '¡Éxito!',
                                text: result.message,
                                confirmButtonColor: '#3C998F' // Cambiar color del botón de confirmación
                            });
                            // Deshabilitar los inputs de nuevo
                            inputs.forEach(input => input.disabled = true);
                            button.textContent = 'Editar'; // Cambiar el texto del botón a "Editar"
                        } else {
                            // Mostrar mensaje de error usando SweetAlert
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: result.message,
                                confirmButtonColor: '#3C998F' // Cambiar color del botón de confirmación
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Mostrar mensaje de error usando SweetAlert
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Hubo un problema al enviar los datos.',
                            confirmButtonColor: '#3C998F' // Cambiar color del botón de confirmación
                        });
                    });
                }
            });
        });
    }

    // Escuchar clic en botones de eliminar
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('eliminar-btn')) {
            const id = e.target.dataset.id; // Obtener el ID del registro
            const archivo = e.target.getAttribute('data-direccion'); // Obtener el atributo 'data-direccion' del botón clicado
            const texto = e.target.getAttribute('data-texto'); // Obtener el atributo 'data-direccion' del botón clicado
            const direccion = '../php/'+archivo+'.php';

            // Mostrar alerta de confirmación con SweetAlert
            Swal.fire({
                title: '¿Estás seguro?',
                text: texto,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3C998F',
                cancelButtonColor: '#0A192F',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Enviar solicitud al servidor
                    fetch(direccion, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ id: id }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Mostrar alerta de éxito
                            Swal.fire({
                                title: 'Eliminado',
                                text: data.message,
                                icon: 'success',
                                confirmButtonColor: '#3C998F',
                                confirmButtonText: 'Aceptar'
                            }).then(() => {
                                // Eliminar visualmente el registro del DOM
                                const experienciaItem = e.target.closest('.experiencia-item');
                                experienciaItem.remove();
                            });
                        } else {
                            // Mostrar alerta de error
                            Swal.fire({
                                title: 'Error',
                                text: data.message || 'Hubo un problema al intentar eliminar.',
                                icon: 'error',
                                confirmButtonColor: '#3C998F',
                                confirmButtonText: 'Aceptar'
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            title: 'Error',
                            text: 'Ocurrió un error al conectarse con el servidor.',
                            icon: 'error',
                            confirmButtonColor: '#3C998F',
                            confirmButtonText: 'Aceptar'
                        });
                    });
                }
            });
        }
    });

    $('#empresa, #periodo, #rol').on('keydown', function(event){
        if (event.which === 13) {
            event.preventDefault();
            
            $('#agregarExperiencia').click();
        }
    });
    $('#agregarExperiencia').click(function() {
        // Obtener los valores de los inputs
        const empresa = document.getElementById('empresa').value;
        const periodo = document.getElementById('periodo').value;
        const rol = document.getElementById('rol').value;
    
        // Verificar que los tres campos no estén vacíos
        if (empresa === '' || periodo === '' || rol === '') {
            // Si algún campo está vacío, mostrar alerta de error
            Swal.fire({
                icon: 'warning',
                title: 'Advertencia',
                confirmButtonColor: '#3C998F',
                text: 'Por favor, complete todos los campos.'
            });
        } else {
            // Si todos los campos están completos, enviar los datos al servidor
            const formData = new FormData();
            formData.append('empresa', empresa);
            formData.append('periodo', periodo);
            formData.append('rol', rol);
    
            // Hacer la solicitud AJAX para enviar los datos al archivo PHP
            fetch('../php/agregarExperiencia.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Si la inserción fue exitosa, mostrar alerta de éxito
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        confirmButtonColor: '#3C998F',
                        text: 'La experiencia laboral ha sido guardada correctamente.'
                    });
                    // Limpiar los campos del formulario
                    document.getElementById('empresa').value = '';
                    document.getElementById('periodo').value = '';
                    document.getElementById('rol').value = '';
    
                    // Llamar nuevamente a traerExperiencia.php para actualizar la lista
                    cargarExperiencias();
                } else {
                    // Si hubo un error al guardar, mostrar alerta de error
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        confirmButtonColor: '#3C998F',
                        text: 'Hubo un problema al guardar la experiencia laboral. Intente nuevamente.'
                    });
                }
            })
            .catch(error => {
                // Manejo de errores en caso de que falle la solicitud
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    confirmButtonColor: '#3C998F',
                    text: 'Error en la conexión. Intente nuevamente.'
                });
            });
        }
    });

    
    // Función para cargar las experiencias laborales
    function cargarExperiencias() {
        fetch('../php/traeExperiencia.php')
        .then(response => response.text())
        .then(data => {
            // Actualizar el contenido de la lista de experiencias laborales con los nuevos datos
            document.getElementById('listaExperiencias').innerHTML = data;
            editarCampos();
        })
        .catch(error => {
            // Manejo de errores al cargar las experiencias laborales
            Swal.fire({
                icon: 'error',
                title: 'Error',
                confirmButtonColor: '#3C998F',
                text: 'Hubo un problema al cargar las experiencias laborales.'
            });
        });
    }
    
    function cargarEstudios() {
        fetch('../php/traerEstudios.php')
        .then(response => response.text())
        .then(data => {
            // Actualizar el contenido de la lista de Estudios laborales con los nuevos datos
            document.getElementById('listaEstudios').innerHTML = data;
            editarCampos();
        })
        .catch(error => {
            // Manejo de errores al cargar las Estudios laborales
            Swal.fire({
                icon: 'error',
                title: 'Error',
                confirmButtonColor: '#3C998F',
                text: 'Hubo un problema al cargar los estudios.'
            });
        });
    }

    function cargarIdioma() {
        fetch('../php/traerIdiomas.php')
        .then(response => response.text())
        .then(data => {
            // Actualizar el contenido de la lista de Estudios laborales con los nuevos datos
            document.getElementById('listaIdiomas').innerHTML = data;
            editarCamposSegundaSeccion();
        })
        .catch(error => {
            // Manejo de errores al cargar las Estudios laborales
            Swal.fire({
                icon: 'error',
                title: 'Error',
                confirmButtonColor: '#3C998F',
                text: 'Hubo un problema al cargar los idiomas.'
            });
        });
    }
    
    function cargarHerramientas() {
        fetch('../php/traerHerramientas.php')
        .then(response => response.text())
        .then(data => {
            // Actualizar el contenido de la lista de Estudios laborales con los nuevos datos
            document.getElementById('listaHerramientas').innerHTML = data;
            editarCamposSegundaSeccion();
        })
        .catch(error => {
            // Manejo de errores al cargar las Estudios laborales
            Swal.fire({
                icon: 'error',
                title: 'Error',
                confirmButtonColor: '#3C998F',
                text: 'Hubo un problema al cargar las herramientas.'
            });
        });
    }
    

