<main class="flex-column">
    <header id="band">
        <h1>MAKERS FOURMIES</h1>
    </header>
    <div id="home" class="mx-auto">
        <div class="row pt-3 gy-3 row-cols-lg-4 row-cols-md-2 row-cols-1">
            <div class="col">
                <div class="card shadow ">
                    <a href="index.php?c=maker" class="text-decoration-none card-header">
                        <h5  class="text-dark" >Maker</h5>
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Qu'est ce donc ?</h5>
                        <p class="card-text">Le mouvement maker ?<br>Les maker faire ?<br>Les fablabs ?</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow">
                    <a href="index.php?c=resources" class="text-decoration-none card-header">
                        <h5 class="text-dark">Ressources</h5>
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Les liens utiles</h5>
                        <p class="card-text">Les logiels gratuits<br>Les applications en ligne<br>Les tutos</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow">
                    <a href="index.php?c=projects&p=all_technic" class="text-decoration-none card-header">
                        <h5 class="text-dark">Projets</h5>
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Réalisations de makers</h5>
                        <p class="card-text">Retrouvez les projets<br>Fiches technique et images<br>
                            Partagez vos créations</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow">
                    <a href="index.php?c=contact" class="text-decoration-none card-header">
                        <h5 class="text-dark">Contact</h5>
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Une question ?</h5>
                        <p class="card-text">Contactez nous pour une question ou un message sur les makers,<br>
                            un avis sur le site...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        if (isset($_SESSION['user'])) {
        echo '<pre>';
            print_r($_SESSION);
            echo '</pre>';
        }
    ?>
</main>