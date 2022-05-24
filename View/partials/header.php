<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo/minGear.png" />
    <script src="https://kit.fontawesome.com/8c6b69265a.js" crossorigin="anonymous"></script>
    <title>Makers Fourmies</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/index.php">MAKERS FOURMIES</a>
<!--        button appear on responsive    -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
<!--        menu    -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/index.php?c=maker">Maker</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php?c=resources">Ressources</a>
                    </li>
                    <?php
                    $info = null;
                    if(isset($_SESSION['user'])){
                        $info = $_SESSION['user'];?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/index.php?c=articles" id="navbarDropdownMenuLink"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Projets
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="/index.php?c=articles&p=all_articles">Tous les
                                    articles</a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="/index.php?c=articles&p=all_technic">Toutes les
                                    techniques</a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
<!--        technique list    -->
                            <?php
                            foreach ($tech as $key => $item) {
                                echo '
                            <li>
                                <a class="dropdown-item" href="/index.php?c=articles&p=one_technic&o=' . $key . ' ">' .
                                    $item . '</a>
                            </li>';
                            }?>
                        </ul>
                    </li><?php
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php?c=contact">Contact</a>
                    </li>
                </ul>
                <div class="d-flex flex-grow-1 justify-content-end align-items-center gap-4">
                    <?php
                    if(!isset($_SESSION['user'])){
                        echo '
                    <a class="nav-link text-secondary me-3" href="/index.php?c=user&p=connection_form"
                    title="Connexion">
                        <i class="fa-solid fa-user"></i>
                    </a>
                    <a class="nav-link text-secondary" href="/index.php?c=user&p=register_form" 
                        title="Inscription">
                        <i class="fa-solid fa-right-to-bracket"></i>
                    </a>';
                    }
                    else{
                        $avatar = UserManager::getAvatar($info['id']);
                        echo '
                    <div>
                        <a class="btn btn-primary btn-sm" href="/index.php?c=articles&p=art_form">Créer un article</a>
                    </div>
                    <a href="/index.php?c=profile" title="profile">
                        <img src="/img/avatar/'. $avatar->getAvatar() .'">
                    </a>
                    <span>'. $_SESSION['user']['pseudo'] .'</span>
                    <a class="nav-link text-secondary" href="/index.php?c=user&p=disconnect" title="Déconnexion">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <?php
    if(isset($_SESSION['error'])){
        echo '<div class="alert alert-warning alert-dismissible fade show position-absolute w-100" role="alert">
                <strong>Erreur : </strong>' . $_SESSION["error"] .
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        $_SESSION['error'] = null;
    }
    if (isset($_SESSION['success'])){
        echo '<div class="alert alert-success alert-dismissible fade show position-absolute w-100" role="alert">'
            . $_SESSION["success"] .
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        $_SESSION['success'] = null;
    }
    ?>
</header>