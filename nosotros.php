<?php require_once "config/conexion.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sobre Nosotros</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <link href="assets/css/styles.css" rel="stylesheet" />
    <link href="assets/css/estilos.css" rel="stylesheet" />
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
</head>

<body>
    <a href="#" class="btn-flotante" id="btnCarrito">Carrito <span class="badge bg-success" id="carrito">0</span></a>

    <header class="bg-dark py-1">
        <div class="container px-4 px-lg-5 my-5">
            <div class="head-content text-center text-white">
            <img src="./assets/img/logo.jpg" alt="">
                <h1 class="display-4 fw-bolder">Metamorphosis Style</h1>
                <h1 class="display-4 fw-bolder">By Marilin Chancay</h1>
            </div>
            <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    
                    <ul class="navbar-nav">
                        <a href="./" class="nav-link" category="all">Inicio</a>
                        <a href="./nosotros.php" class="nav-link" category="all">Nosotros</a>
                        <a href="./servicios.php" class="nav-link" category="all">Nuestros Servicios</a>
                        <a href="./categoria.php" class="nav-link" category="all">Categorías</a>
                        <a href="./horario.php" class="nav-link" category="all">Horarios de Atención</a>
                    </ul>
                    <?php
session_start();


function mostrarNombreUsuario() {
    if (isset($_SESSION['nombre'])) {
        echo $_SESSION['nombre']; 
    } else {
        echo "Iniciar sesión";
    }
}

?>
                    <ul>
                        <a class="login" href="./admin/index.php"><?php mostrarNombreUsuario(); ?></a>
                    </ul>
                    
                </div>
            </div>
        </nav>
    </div>
        </div>
    </header>
    
    <section class="py-5">
        <div class="container px-4 px-lg-5">
            <div class="about-us">
            <h1 class="text-center">Nosotros</h1>
            <p class>Metamorphosis le ofrece un servicio altamente calificado con el espíritu alegre
                 e innovador que nos caracteriza. Somos un referente de  moda en peinados y
                  tendencias estéticas, donde tienes un cabello restaurado y vibrante trabajado 
                  en base a técnicas de vanguardia y tratamientos exclusivos. Por eso también
                   te ofrecemos los diseños más estilosos para tus uñas 2019  que están de moda
                    esta temporada. Dale  a tu manicura un look especial con finas líneas y puntos 
                    y elige el modelo  más agradable para el día a día o para un evento especial. 
                    ¡¡Lo amarás!</p>
                    <p>Y como cada vez nos preocupamos más por nuestra apariencia física y nuestra 
                        piel lo refleja, te ofrecemos una variedad de productos de depilación y 
                        limpieza facial para que luzcas bien, joven, fresca, saludable y 
                        resplandeciente. También servimos a nuestros clientes con cálidos
                         consejos y siempre brindamos una atención excelente e individual.</p>
                 <div class="gallery-flex">
                <img src="/assets/img/uno.jpg">
                <img src="/assets/img/dos.jpg">
                <img src="/assets/img/tres.jpg">
                <img src="/assets/img/cuatro.jpg">
                <img src="/assets/img/cinco.jpg">
            </div>
            </div>
            

    

    </section>
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Metamorphosis Style</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            <a href="https://goo.gl/maps/WpqN53e5mWWM8fkF8">Cdla Montalvan, Montecristi, Ecuador</a>
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="https://wa.me/message/3WORETA3AKYVE1?src=qr">+593 961789353</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:marilinchancay@hotmail.com">marilinchancay@hotmail.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Productos</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                    <li class="navbar-nav">
                        <?php
                        $query = mysqli_query($conexion, "SELECT * FROM categorias");
                        while ($data = mysqli_fetch_assoc($query)) { ?>
                            <a href="#" class="nav-link" style="font-size:15px" category="<?php echo $data['categoria']; ?>"><?php echo $data['categoria']; ?></a>
                        <?php } ?>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Contenido</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="nav-link" href="/index.php" style="font-size:15px;">Inicio</a></li>
                        <li><a class="nav-link" href="#" style="font-size:15px;">Sobre Nosotros</a></li>
                        <li><a class="nav-link" href="categoria.php" style="font-size:15px;">Categoría</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-1">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://instagram.com/by.marilin_chancay?igshid=MzNlNGNkZWQ4Mg=="><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                <a class="text-light text-decoration-none" target="_blank" href="https://wa.me/message/3WORETA3AKYVE1?src=qr"><i class="fab fa-whatsapp fa-lg fa-fw"></i></a>
                </li>
                    </ul>
                </div>
            </div>
        </div>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>