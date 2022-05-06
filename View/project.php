<?php
    $data = $data['project'];
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
?>
<main>
    <section>
        <div class="mx-auto py-1 row">
            <nav>
                <ul class="list-group list-group-horizontal justify-content-center">
                    <?php
                    echo '
                    <li class="list-group-item">
                        <a class="text-decoration-none text-dark" href="">' . '</a>
                    </li>
                    ';
                    ?>
                </ul>
            </nav>
            <header class="text-center mt-3">
                <h2>Titre</h2>
            </header>
            <div class="mt-3">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. At id iusto, laboriosam non pariatur sed
                    tempora! Consequatur, dolore dolorum eius, fuga ipsam magnam officiis perferendis rem, sunt voluptas
                    voluptates voluptatibus.
                </p>
            </div>
            <div class="d-flex flex-wrap justify-content-evenly mt-3">
                <article class="row w-75 row-cols-1 row-cols-md-2 justify-content-center">
                    <div class="d-flex flex-column align-items-center pb-3">
                        <div class="picture"></div>
                        <span>Modélisation sur Tinkercad</span>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <div class="picture"></div>
                        <span>Impression 3D au L@bo</span>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <div class="picture"></div>
                        <span>Photo du projet fini</span>
                    </div>
                </article>
                <aside class="ps-3 w-25">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="fw-bold">Projet perso</span>
                        </li>
                        <li class="list-group-item d-flex flex-column">
                            <span class="fw-bold">Réalisation :</span>
                            <span>Heliosens</span>
                            <span>Animateurs du L@bo</span>
                        </li>
                        <li class="list-group-item d-flex flex-column">
                            <span  class="fw-bold">Technique :</span>
                            <span>Modélisation 3D</span>
                            <span>Impression 3D</span>
                            <span>Recyclage</span>
                        </li>
                        <li class="list-group-item d-flex flex-column">
                            <span  class="fw-bold">Outils :</span>
                            <span>Imprimante 3D</span>
                            <span>Zortrax, disponible au L@bo</span>
                            <span>Scie à métaux, propriété personnelle</span>
                        </li>
                        <li class="list-group-item d-flex flex-column">
                            <span class="fw-bold">Matière :</span>
                            <span>Pla, disponible au L@bo</span>
                            <span>Métal de récupération</span>
                        </li>
                    </ul>
                </aside>
            </div>
        </div>
    </section>
</main>