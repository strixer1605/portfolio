// Función para obtener los repositorios de GitHub
async function fetchRepos() {
    const username = "felipondioo"; // Cambia por tu usuario de GitHub
    const reposContainer = document.getElementById("repos-container");

    try {
        const response = await fetch(`https://api.github.com/users/${username}/repos`);
        const repos = await response.json();

        repos.forEach(repo => {
            // Crear una tarjeta para cada repositorio
            const repoCard = document.createElement("div");
            repoCard.classList.add("repo-card");

            repoCard.innerHTML = `
                <div class="repo-info">
                    <h2 class="repo-title">${repo.name}</h2>
                    <p class="repo-description">
                        ${repo.description || "No se ha añadido una descripción a este repositorio."}
                    </p>
                    <a href="${repo.html_url}" target="_blank" class="repo-link">Ver en GitHub</a>
                </div>
            `;

            // Añadir la tarjeta al contenedor
            reposContainer.appendChild(repoCard);
        });
    } catch (error) {
        console.error("Error al obtener los repositorios:", error);
        reposContainer.innerHTML = `<p>No se pudieron cargar los repositorios. Por favor, inténtalo más tarde.</p>`;
    }
}

// Llamar a la función al cargar la página
fetchRepos();
