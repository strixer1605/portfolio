<a id="inicio" href="inicio.php">
            <img style="margin-top: 8px; height: 70px; cursor: pointer;" src="../imagenes/ley.png" alt="Inicio">
        </a>
        
        <!-- Menú para escritorio -->
        <nav id="escritorio">
            <a href="sobreMi.php">Sobre mi</a>
            <a href="trabajos.php">Trabajos</a>
            <a href="curriculum.php" style="border: 1px solid #3C998F; padding: 5px 10px; border-radius: 5px; color: #3C998F;" id="curriculumEscritorio">Curriculum</a>
        </nav>
        
        <div>
            <div id="iconosEscritorio" class="social-container">
                <!-- LinkedIn -->
                <a href="https://www.linkedin.com/in/tuusuario" target="_blank" class="social-item">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <!-- Email -->
                <a href="mailto:tuemail@gmail.com" class="social-item">
                    <i class="fas fa-envelope"></i>
                </a>
                <!-- WhatsApp -->
                <a href="https://wa.me/2246445029" target="_blank" class="social-item">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
        </div>
    
    
        
        <!-- Menú para móviles -->
        <nav class="navbar bg-body-tertiary fixed-top navbar-mobile">
            <div class="container-fluid" style="justify-content: flex-end;">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav">
                            <li><a href="sobreMi.php">Sobre mi</a></li>
                            <li><a href="trabajos.php">Trabajos</a></li>
                            <li>
                                <a href="curriculum.php" style="border: 1px solid #3C998F; padding: 5px 10px; border-radius: 5px;">Curriculum</a>
                            </li>
                        </ul>
                        <!-- Redes sociales -->
                        <div class="social-container" style="margin-top: 20px;">
                            <a href="https://www.linkedin.com/in/tuusuario" target="_blank" class="social-item">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="mailto:tuemail@gmail.com" class="social-item">
                                <i class="fas fa-envelope"></i>
                            </a>
                            <a href="https://wa.me/1234567890" target="_blank" class="social-item">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>