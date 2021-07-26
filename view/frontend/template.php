<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <title>Tatyana</title>

    <!-- CSS -->
    <link rel="stylesheet" media="screen" type="text/css" href="../../../public/style.css" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/22878924ef.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav class="nav_device_laptop">
            <ul class="nav flex-column">
                <li class="welcome_btn">
                    <i class="fab fa-artstation" class="nav-link active"></i>
                </li>
                <ul class="nav_burger">
                    <li>
                        <a href="" class="nav-link active">
                            <i class="fas fa-user"></i>
                        </a>
                    </li>
                    <li>
                        <a href="" class="nav-link">
                            <i class="fas fa-newspaper"></i>
                        </a>
                    </li>
                    <li>
                        <a href="" class="nav-link">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </li>
                </ul>
            </ul>
        </nav>

        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="display-none">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Connexion</a>
                        </li>        
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Blog</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <?php echo $content; ?>
    </main>
    
</body>
</html>