<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Restaurante asiático Shin Wha: menú variado, mesas VIP y al aire libre. Haz tu reserva ahora.">
    <meta name="keywords" content="Restaurante asiático, Shin Wha, menú asiático, mesas VIP, reservas en restaurante, comida china, comida coreana">
    <meta name="author" content="Restaurante Shin Wha">
    <title>Restaurante Shin Wha</title>
     <!-- Bootstrap CSS desde el CDN -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link href="css/estilos.css" rel="stylesheet">
</head>
<body>

    <!-- Navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Shin Wha</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Menú -->
                <li class="nav-item me-3">
                    <a class="nav-link" href="#menu">Menú</a>
                </li>
                <!-- Mesas -->
                <li class="nav-item me-3">
                    <a class="nav-link" href="#mesas">Mesas</a>
                </li>
                <!-- Contacto -->
                <li class="nav-item me-3">
                    <a class="nav-link" href="#contacto">Contacto</a>
                </li>
                <!-- Registro -->
                <li class="nav-item me-3">
                    <a class="btn btn-outline-primary" href="registro_personas.php">Registro</a>
                </li>
                <!-- Reservas -->
                <li class="nav-item me-3">
                    <a class="btn btn-outline-primary" href="./usuarios/listar_reservas.php">Reservas</a>
                </li>
                <!-- Nuevo botón -->
                <li class="nav-item me-3">
                    <a class="btn btn-outline-primary" href="./categoria/categorias.php">Categoria_mesas</a>
                </li>
                <!-- Nuevo botón adicional -->
                <li class="nav-item me-3">
                    <a class="btn btn-outline-primary" href="./mesa/listar_mesas.php">Mesas</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <!-- Carrusel -->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/img2/port2.jpg" class="d-block w-100" alt="Vista del restaurante">
            </div>
            <div class="carousel-item">
                <img src="img/frentecSill.jpeg" class="d-block w-100" alt="Zona VIP del restaurante">
            </div>
            <div class="carousel-item">
                <img src="img/cenagrup.webp" class="d-block w-100" alt="Platillo gourmet">
            </div>
            <div class="carousel-item">
                <img src="img/img2/port1.jpg" class="d-block w-100" alt="Mesa familiar">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

    <!-- Secciones -->
    <main>

        <!-- Menú -->
        <section id="menu" class="container my-5">
            <h2 class="section-title">Nuestro Menú</h2>
            <p class="text-center">Explora una exquisita selección de platillos asiáticos preparados con los ingredientes más frescos.</p>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <!-- Plato 1 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="img/img2/ramen.jpg" class="card-img-top" alt="Plato 1">
                        <div class="card-body">
                            <h5 class="card-title">Ramen Especial</h5>
                            <p class="card-text">Delicioso ramen preparado con caldo de cerdo y fideos caseros.</p>
                        </div>
                    </div>
                </div>
                <!-- Plato 2 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="img/img2/bimbap.jpg" class="card-img-top" alt="Plato 4">
                        <div class="card-body">
                            <h5 class="card-title">Bibimbap</h5>
                            <p class="card-text">Arroz con vegetales y huevo, servido con salsa picante Gochujang.</p>
                        </div>
                    </div>
                </div>
                <!-- Plato 3 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="img/img2/kimchi_frito.jpeg" class="card-img-top" alt="Plato 5">
                        <div class="card-body">
                            <h5 class="card-title">Kimchi Frito</h5>
                            <p class="card-text">Arroz salteado con kimchi, vegetales y un toque de aceite de sésamo.</p>
                        </div>
                    </div>
                </div>
                <!-- Plato 4 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="img/img2/sushi (2).jpg" class="card-img-top" alt="Plato 2">
                        <div class="card-body">
                            <h5 class="card-title">Sushi Variado</h5>
                            <p class="card-text">Selección de sushi fresco con salmón, atún y vegetales.</p>
                        </div>
                    </div>
                </div>
                <!-- Plato 5 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="img/img2/bulgogi.jpeg" class="card-img-top" alt="Plato 3">
                        <div class="card-body">
                            <h5 class="card-title">Bulgogi Coreano</h5>
                            <p class="card-text">Carne de res marinada y asada con especias coreanas tradicionales.</p>
                        </div>
                    </div>
                </div>
                <!-- Plato 6 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="img/img2/dumplins.jpeg" class="card-img-top" alt="Plato 6">
                        <div class="card-body">
                            <h5 class="card-title">Dumplings</h5>
                            <p class="card-text">Empanaditas al vapor rellenas de carne y vegetales.</p>
                        </div>
                    </div>
                </div>
                <!-- Plato 7 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="img/img2/teriyaki_salmon.jpeg" class="card-img-top" alt="Plato 7">
                        <div class="card-body">
                            <h5 class="card-title">Teriyaki de Salmon</h5>
                            <p class="card-text">Salmon glaseado con salsa teriyaki servido con arroz y vegetales.</p>
                        </div>
                    </div>
                </div>
                <!-- Plato 8 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="img/img2/teoboki_2.jpeg" class="card-img-top" alt="Plato 8">
                        <div class="card-body">
                            <h5 class="card-title">Tteokbokki</h5>
                            <p class="card-text">Pasteles de arroz en salsa picante con un toque dulce.</p>
                        </div>
                    </div>
                </div>
                <!-- Plato 9 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="img/img2/sopa_2.jpeg" class="card-img-top" alt="Plato 9">
                        <div class="card-body">
                            <h5 class="card-title">Miso Soup</h5>
                            <p class="card-text">Sopa japonesa tradicional con tofu, alga wakame y miso.</p>
                        </div>
                    </div>
                </div>
                <!-- Plato 10 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="img/img2/camarones.jpg" class="card-img-top" alt="Plato 10">
                        <div class="card-body">
                            <h5 class="card-title">Tempura de Camarones</h5>
                            <p class="card-text">Camarones crujientes acompañados de una salsa especial.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       <!-- Sección de Mesas -->
<section id="mesas" class="container my-5">
    <h2 class="section-title">Nuestras Mesas</h2>
    <p class="text-center">Elige la mesa que mejor se adapte a tu ocasión especial. Contamos con opciones diseñadas para brindar la mejor experiencia, desde reuniones íntimas hasta celebraciones importantes.</p>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <!-- Mesa VIP Oro -->
        <div class="col">
            <div class="card h-100">
                <img src="img/vipvip.png" class="card-img-top" alt="Mesa VIP Oro">
                <div class="card-body">
                    <h5 class="card-title">Mesa VIP Oro</h5>
                    <p class="card-text">Ubicadas en la sala VIP y la planta 2 (Sala 1), estas mesas exclusivas ofrecen el máximo lujo y privacidad, ideales para cenas elegantes, reuniones importantes o cerrar negocios. Este tipo de mesa incluye un costo adicional que se sumará a su consumo del día.</p>
                </div>
            </div>
        </div>
        <!-- Mesa VIP Plata -->
        <div class="col">
            <div class="card h-100">
                <img src="img/vip3.jpeg" class="card-img-top" alt="Mesa VIP Plata">
                <div class="card-body">
                    <h5 class="card-title">Mesa VIP Plata</h5>
                    <p class="card-text">Perfectas para celebraciones especiales como compromisos o cenas románticas. Situadas en la planta 2 (Sala 2), ofrecen un ambiente sofisticado y cómodo. Estas mesas también tienen un costo adicional, el cual será incluido en el pago de su consumo del día.</p>
                </div>
            </div>
        </div>
        <!-- Mesa VIP Normal -->
        <div class="col">
            <div class="card h-100">
                <img src="img/VIP.jpeg" class="card-img-top" alt="Mesa VIP Normal">
                <div class="card-body">
                    <h5 class="card-title">Mesa VIP Normal</h5>
                    <p class="card-text">Ubicadas en la planta 2 (Sala 3), estas mesas son ideales para cenas más casuales pero con un toque de exclusividad. Incluyen un costo preferencial por los servicios adicionales, que será agregado al total de su consumo en el día.</p>
                </div>
            </div>
        </div>
    </div>
</section>

            <!-- Sección de Mesas al Aire Libre -->

        <section id="mesas-al-aire-libre" class="container my-5">
            <h2 class="section-title">Mesas al Aire Libre</h2>
            <p class="text-center">Disfruta del aire fresco y el encanto del exterior en nuestras mesas al aire libre. Perfectas para cualquier ocasión.</p>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <!-- Terraza Frontal -->
                <div class="col">
                    <div class="card h-100">
                        <img src="img/frentecSill.jpeg" class="card-img-top" alt="Terraza Frontal">
                        <div class="card-body">
                            <h5 class="card-title">Terraza Frontal</h5>
                            <p class="card-text">Perfecta para disfrutar del ambiente mientras observas la vida diaria frente al restaurante. Mesas para 2 a 4 personas en un ambiente relajado y cómodo.</p>
                        </div>
                    </div>
                </div>
                <!-- Patio Central -->
                <div class="col">
                    <div class="card h-100">
                        <img src="img/patio.jpg" class="card-img-top" alt="Patio Central">
                        <div class="card-body">
                            <h5 class="card-title">Patio Central</h5>
                            <p class="card-text">Ubicado en el corazón del restaurante, este espacio abierto combina modernidad y tranquilidad. Ideal para parejas o pequeños grupos de hasta 4 personas.</p>
                        </div>
                    </div>
                </div>
                <!-- Vereda Lateral -->
                <div class="col">
                    <div class="card h-100">
                        <img src="img/lateral.jpeg" class="card-img-top" alt="Vereda Lateral">
                        <div class="card-body">
                            <h5 class="card-title">Vereda Lateral</h5>
                            <p class="card-text">Situada al costado del restaurante, esta sección es perfecta para quienes buscan privacidad en un ambiente relajado. Mesas para 2 a 4 personas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección de Mesas en el Interior -->
        <section id="mesas-interior" class="container my-5">
            <h2 class="section-title">Mesas en el Interior</h2>
            <p class="text-center">Disfruta del ambiente cálido y cómodo en nuestras diferentes áreas interiores, diseñadas para satisfacer tus necesidades.</p>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <!-- Salón Familiar 1 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="img/salonfsenafam.png" class="card-img-top" alt="Salón Familiar 1">
                        <div class="card-body">
                            <h5 class="card-title">Salón Familiar 1</h5>
                            <p class="card-text">Ubicado en un salón exclusivo, este espacio es perfecto para reuniones familiares o celebraciones especiales. Capacidad de 10 a 20 personas.</p>
                        </div>
                    </div>
                </div>
                <!-- Salón Familiar 2 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="img/salafam2.jpeg" class="card-img-top" alt="Salón Familiar 2">
                        <div class="card-body">
                            <h5 class="card-title">Salón Familiar 2</h5>
                            <p class="card-text">Otro salón espacioso diseñado para familias o grupos grandes. Ofrece comodidad y privacidad para tus momentos especiales.</p>
                        </div>
                    </div>
                </div>
                <!-- Salón General -->
                <div class="col">
                    <div class="card h-100">
                        <img src="img/cenagrup2.webp" class="card-img-top" alt="Salón General">
                        <div class="card-body">
                            <h5 class="card-title">Salón General</h5>
                            <p class="card-text">Ubicado en la planta baja, este espacio es ideal para parejas o pequeños grupos de hasta 4 personas. Perfecto para cenas casuales en un ambiente acogedor.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Contacto -->
<section id="contacto" class="container my-5">
    <h2 class="section-title">Contacto</h2>
    <p class="text-center">¿Tienes preguntas? Contáctanos y estaremos encantados de atenderte.</p>

    <!-- Redes sociales y WhatsApp -->
    <div class="text-center">
        <!-- WhatsApp -->
        <a href="https://wa.me/595973574441" target="_blank" class="btn btn-success mx-2">
            <i class="fab fa-whatsapp"></i> WhatsApp
        </a>

        <!-- Instagram -->
        <a href="https://www.instagram.com/shin_wha_moments/profilecard/?igsh=M25wMnN4bGN6YzZl" target="_blank" class="btn btn-danger mx-2">
            <i class="fab fa-instagram"></i> Instagram
        </a>
    </div>
</section>
    <!-- Footer -->
    <footer>
        <p>© 2024 Shin Wha. Todos los derechos reservados.</p>
    </footer>
<!-- Bootstrap JS y dependencias -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
