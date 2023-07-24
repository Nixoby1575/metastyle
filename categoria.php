<?php require_once "config/conexion.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Categoría</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <link href="assets/css/styles.css" rel="stylesheet" />
    <link href="assets/css/estilos.css" rel="stylesheet" />
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/error-filter.css">
    <link rel="stylesheet" href="assets/css/categoria.css">

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
    <?php
$query_categorias = mysqli_query($conexion, "SELECT DISTINCT categoria FROM categorias");
$categorias = mysqli_fetch_all($query_categorias, MYSQLI_ASSOC);
?>
<a href="#" class="TITTLE-SA" category="all">Categorías</a>

<form action="" method="GET">
    <div class="filter-box">
    <div class="filter-in">
    <select name="categoria">
        <option value="">Todas las categorías</option>
        <?php foreach ($categorias as $categoria) { ?>
            <option value="<?php echo $categoria['categoria']; ?>" <?php if (isset($_GET['categoria']) && $_GET['categoria'] == $categoria['categoria']) echo 'selected'; ?>>
            <?php echo $categoria['categoria']; ?>
            </option>
        <?php } ?>
    </select>
    <button type="submit">Filtrar</button>
    </div>
    </div>
</form>




        <section class="py-5">
        <div class="container px-4 px-lg-5">
        <?php
        if (isset($_GET['categoria']) && $_GET['categoria'] !== '') {
            $categoriaSeleccionada = $_GET['categoria'];

            // Realiza la consulta filtrando por categoría
            $query = mysqli_query($conexion, "SELECT p.*, c.id AS id_cat, c.categoria FROM productos p INNER JOIN categorias c ON c.id = p.id_categoria WHERE c.categoria = '$categoriaSeleccionada'");
        } else {
            // Consulta sin filtro de categoría
            $query = mysqli_query($conexion, "SELECT p.*, c.id AS id_cat, c.categoria FROM productos p INNER JOIN categorias c ON c.id = p.id_categoria");
        }

        $result = mysqli_num_rows($query);

        if ($result > 0) {
            while ($data = mysqli_fetch_assoc($query)) {
        ?>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                $result = mysqli_num_rows($query);
                if ($result > 0) {
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                            <img class="card-img-top" src="assets/img/<?php echo $data['imagen']; ?>" alt="..." />
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-success text-white mt-2 agregar" data-id="<?php echo $data['id']; ?>" href="#"><i class="fas fa-cart-plus"></i></a></div>
                                </div>
                                     </ul>
                                </div>
                            </div>
                            <div class="text-center">
                                        <h5 class="fw-bolder"><?php echo $data['nombre'] ?></h5>
                                        <p><?php echo $data['descripcion']; ?></p>
                                        <div class="d-flex justify-content-center small text-warning mb-2">
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                        </div>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><?php echo ($data['precio_normal'] > $data['precio_rebajado']) ? 'Oferta' : ''; ?></div>
                                <p class="text-center mb-0 text-decoration-line-through" style="color:gray;" >$<?php echo $data['precio_normal'] ?></p>
                                <p class="text-center mb-0">$<?php echo $data['precio_rebajado'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php  }
                } ?>

            </div>
        </div>
        <?php
            }
        } else {
        ?>


<div class="box-error">
       <div class="results"><span>No Se encontraron reultados</span></div> 
    <div class="george">
  <div class="shadow"></div>
  <div class="george_flower"></div>
  <div class="george_head">
    <div class="line"></div>
    <div class="cheek"></div>
    <div class="eye"></div>
    <div class="eye"></div>
  </div>
  <div class="pot_top"></div>
  <div class="pot_body"></div>
  <div class="pot_plate"></div>
</div>
    </div>


<?php }


?>
    </section>
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Metamorphosis Style</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            Cdla Montalvan, Montecristi, Ecuador
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:010-020-0340">0961789353</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="">marilinchancay@hotmail.com</a>
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
                        <li><a class="nav-link" href="#" style="font-size:15px;">Inicio</a></li>
                        <li><a class="nav-link" href="#" style="font-size:15px;">Sobre Nosotros</a></li>
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
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
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