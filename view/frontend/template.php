<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <title>Tatyana</title>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- CSS -->
    <link rel="stylesheet" media="screen" type="text/css" href="../../../public/style.css" />

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/22878924ef.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav class="nav_device_laptop">
            <ul class="nav flex-column">
                <!-- If session off -->
                <?php
                if (empty($_SESSION)) {
                ?>
                <li class="welcome_btn" >
                    <a href=""  class="welcome_btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fab fa-artstation"></i>
                    </a>
                </li>
                <?php
                }
                ?>


                <!-- If session on -->
                <?php
                if (isset($_SESSION) && !empty($_SESSION)) {
                ?>
                <li class="welcome_btn" >
                    <i class="fab fa-artstation fas fa-sign-out-alt title="Se déconnecter" href="?controller=UserController&action=logout""></i>
                </li>
                <?php
                }
                ?>

                <ul class="nav_burger">
                    <li>
                        <a href="?controller=UserController&action=showHomeView"  class="nav-link active" >
                            <i class="fas fa-home"></i>
                        </a>
                    </li>

                    <!-- If session on -->
                    <?php
                    if (isset($_SESSION) && !empty($_SESSION)) {
                    ?>
                    <li>
                        <a href="?controller=PostController&action=showAddPost" class="nav-link">
                            <i class="fas fa-newspaper"></i>
                            <i class="far fa-plus-square"></i>
                        </a>
                    </li>
                    <?php
                    }
                    ?>

                    <li>
                        <a href="#set_images" class="nav-link">
                            <i class="fas fa-newspaper"></i>
                        </a>
                    </li>

                    <li>
                        <a href="?controller=ContactController&action=showContactView" class="nav-link">
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
                        <a class="nav-link active" aria-current="page" href="?controller=UserController&action=showLogin">Connexion</a>
                        </li>        
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#set_images">Blog</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="?controller=ContactController&action=showContactView">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <?php 
            require_once ('./view/inc/_login.php');
            require_once('./view/inc/_messageError.php');
            echo $content;
        ?>
    </main>
    
</body>
</html>