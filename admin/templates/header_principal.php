
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Servifarma</title>
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
        <link rel="stylesheet" href="styles.css">
        
    
    </head>


<body>
    <div  class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 z-1 ">
            <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <img src="imagenes/logo.jpeg" class="img-logo" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            <ul class="nav nav-pills ">
                <li class="nav-link p-0 ">
                    
                    <a href="login.php"><i class="bi bi-person-circle nav-link icons"></i> </a>
                </li>
                <li class="nav-item">
                    <a href="/servi/mostrarCarrito.php">
                        <?php 
                            session_start();
                            include('carrito.php');
                            include('numero-compra.php');
                        ?>
                    </a>
                    
                </li>
                
                
                
                    
                    
            </ul>
        </header>
    </div>
</body>
</html>