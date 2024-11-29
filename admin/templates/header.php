<?php
$url_base="http://localhost/servi/admin/";
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Admin Servifarma</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
        >
        <link rel="stylesheet" 
            href="https://cdn.jsdelivr.net/npm/glider-js@1.7.8/glider.min.css"
        >
        <link rel="stylesheet" href="../../styles.css">
    </head>

    <body>
        <header>
            
        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="nav navbar-nav">
                <a class="nav-item nav-link active" href="#" aria-current="page">
                    Administrador<span class="visually-hidden">(current)</span>
                </a>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"
                    data-bs-toggle="dropdown" aria-expanded="false">Pagina Principal</a>
                    <ul class="dropdown-menu ">
                        <li><a class="dropdown-item" href="<?php echo $url_base;?>banners/index.php">Banners</a></li>
                        <li><a class=" dropdown-item" href="<?php echo $url_base;?>PDestacados/index.php">Productos Destacados</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>

                
                
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"
                    data-bs-toggle="dropdown" aria-expanded="false">Catologo</a>
                    <ul class="dropdown-menu ">
                        
                        <li><a class="dropdown-item" href="<?php echo $url_base;?>medicamentos/index.php">Medicamentos</a></li>
                        <li><a class="dropdown-item" href="<?php echo $url_base;?>cuidadoPersonal/index.php">Cuidado Personal</a></li>
                        <li><a class="dropdown-item" href="<?php echo $url_base;?>viveres/index.php">Viveres</a></li>
                        <li><a class="dropdown-item" href="<?php echo $url_base;?>materialMedico/index.php">Material Medico</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"
                    data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                    <ul class="dropdown-menu ">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </div>
        </nav>
        

        </header>
        <main></main>
        <section class="container">