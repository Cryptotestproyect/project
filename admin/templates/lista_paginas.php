<?php
$url_base="http://localhost/servi";
?>

<section>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary" aria-label="Tenth navbar example">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-sm-center" id="navbarsExample08">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="<?php echo $url_base;?>/medicamentos.php">Medicamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo $url_base;?>/cuidado-personal.php">Cuidado Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo $url_base;?>/viveres.php">Viveres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo $url_base;?>/material-medico.php">Material Medico</a>
                    </li>
                            
                </ul>
            </div>
        </div>
    </nav>
</section>