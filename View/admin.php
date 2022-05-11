<?php
//    /* @var User $user */
    $users = $data['user'];
    $articles = $data['article'];
    $rubrics = $data['rubrics'];

    echo '<pre>';
    var_dump($data);
    echo '</pre>';

    if($_SESSION['user']['role'] === 'admin'){
        ?>
<main>
    <section>
        <div class="mx-auto py-2 px-5">
            <h2 class="text-center">Espace administrateur</h2>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item mb-3">
<!--                    users                   -->
                    <h3 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Utilisateurs
                        </button>
                    </h3>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                         data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <article>
                                <?php
                                foreach ($users as $user){
                                    echo '<div class="row row-cols-3 px-5">
                                    <a class="text-decoration-none text-dark" href="">' . $user->getPseudo() . '</a>
                                    <a class="text-decoration-none text-dark" href="">' . Controller::roleName($user->getRole()->getRoleName()) . '</a>
                                    <a href="index.php?c=user&p=del_user&o=' . $user->getId() . '" class="text-dark">
                                        <i class="fa-solid fa-trash-can p-1" title="supprimer l\'utilisateur"></i>
                                    </a>
                                </div>';
                                }
                                ?>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
<!--                    articles                -->
                    <h3 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                            Articles
                        </button>
                    </h3>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingOne"
                         data-bs-parent="#accordionExample">
<!--                        publish       -->
                        <h3>Privé</h3>
                        <article class="row row-cols-2 px-5">
                            <?php
                            foreach ($articles['pr'] as $article){
                                echo '<div class="row col-8">
                                <a class="text-decoration-none text-dark" href="">' . $article .'</a>
                                </div>
                            <div class="col-4">
                                <a  class="text-decoration-none text-dark" href="">
                                    <i class="fa-solid fa-pencil p-1" title="modifier"></i>
                                </a>
                                <a  class="text-decoration-none text-dark" href="">
                                    <i class="fa-solid fa-trash-can p-1" title="supprimer l\'article"></i>
                                </a>
                            </div>
                                ';
                            }
                            ?>
                        </article>
<!--                        stand by        -->
                        <h3>En attente de validation</h3>
                        <article class="row row-cols-2 px-5">
                            <?php
                            foreach ($articles['sb'] as $article){
                                echo '<div class="row col-8">
                                <a class="text-decoration-none text-dark" href="">' . $article .'</a>
                                </div>
                            <div class="col-4">
                                <a  class="text-decoration-none text-dark" href="">
                                    <i class="fa-solid fa-pencil p-1" title="modifier"></i>
                                </a>
                                <a  class="text-decoration-none text-dark" href="">
                                    <i class="fa-solid fa-trash-can p-1" title="supprimer l\'article"></i>
                                </a>
                            </div>
                                ';
                            }
                            ?>
                        </article>
<!--                        private            -->
                        <h3>Publié</h3>
                        <article class="row row-cols-2 px-5">
                            <?php
                            foreach ($articles['pu'] as $article){
                                echo '<div class="row col-8">
                                <a class="text-decoration-none text-dark" href="">' . $article .'</a>
                                </div>
                            <div class="col-4">
                                <a  class="text-decoration-none text-dark" href="">
                                    <i class="fa-solid fa-pencil p-1" title="modifier"></i>
                                </a>
                                <a  class="text-decoration-none text-dark" href="">
                                    <i class="fa-solid fa-trash-can p-1" title="supprimer l\'article"></i>
                                </a>
                            </div>
                                ';
                            }
                            ?>
                        </article>
                    </div>
                </div>
                <div class="accordion-item mb-3">
<!--                    rubrics                 -->
                    <h3 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
                            Rubriques
                        </button>
                    </h3>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingOne"
                         data-bs-parent="#accordionExample">
<!--                        type    -->
                        <h3>Types</h3>
                        <article class="row px-5">
                            <div>
                                <?php
                                foreach ($data['type'] as $item){
                                    echo '<div>
                                    <span>' . $item . '</span>
                                    <a class="text-decoration-none text-dark" href="">
                                        <i class="fa-solid fa-pencil p-1" title="modifier"></i>
                                    </a>
                                    <a class="text-decoration-none text-dark" href="">
                                        <i class="fa-solid fa-trash-can p-1" title="supprimer l\'article"></i>
                                    </a>
                                </div>';
                                }
                                ?>
                            </div>
                        </article>
<!--                        category    -->
                        <h3>Categories</h3>
                        <article class="row px-5">
                            <div>
                                <?php
                                foreach ($data['cat'] as $item){
                                    echo '<div>
                                    <span>' . $item . '</span>
                                    <a class="text-decoration-none text-dark" href="">
                                        <i class="fa-solid fa-pencil p-1" title="modifier"></i>
                                    </a>
                                    <a class="text-decoration-none text-dark" href="">
                                        <i class="fa-solid fa-trash-can p-1" title="supprimer l\'article"></i>
                                    </a>
                                </div>';
                                }
                                ?>
                            </div>
                        </article>
<!--                        technical    -->
                        <h3>Techniques</h3>
                        <article class="row px-5">
                            <div>
                                <?php
                                foreach ($data['technic'] as $item){
                                    echo '<div>
                                    <span>' . $item . '</span>
                                    <a class="text-decoration-none text-dark" href="">
                                        <i class="fa-solid fa-pencil p-1" title="modifier"></i>
                                    </a>
                                    <a class="text-decoration-none text-dark" href="">
                                        <i class="fa-solid fa-trash-can p-1" title="supprimer l\'article"></i>
                                    </a>
                                </div>';
                                }
                                ?>
                            </div>
                        </article>
<!--                        tool    -->
                        <h3>Outils</h3>
                        <article class="row px-5">
                            <div>
                                <?php
                                foreach ($data['technic'] as $item){
                                    echo '<div>
                                    <span>' . $item . '</span>
                                    <a class="text-decoration-none text-dark" href="">
                                        <i class="fa-solid fa-pencil p-1" title="modifier"></i>
                                    </a>
                                    <a class="text-decoration-none text-dark" href="">
                                        <i class="fa-solid fa-trash-can p-1" title="supprimer l\'article"></i>
                                    </a>
                                </div>';
                                }
                                ?>
                            </div>
                        </article>
<!--                        matter  -->
                        <h3>Matières</h3>
                        <article class="row px-5">
                            <div>
                                <?php
                                foreach ($data['technic'] as $item){
                                    echo '<div>
                                    <span>' . $item . '</span>
                                    <a class="text-decoration-none text-dark" href="">
                                        <i class="fa-solid fa-pencil p-1" title="modifier"></i>
                                    </a>
                                    <a class="text-decoration-none text-dark" href="">
                                        <i class="fa-solid fa-trash-can p-1" title="supprimer l\'article"></i>
                                    </a>
                                </div>';
                                }
                                ?>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="accordion-item mb-3">
<!--                    resources                -->
                    <h3 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseOne">
                            Ressources
                        </button>
                    </h3>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingOne"
                         data-bs-parent="#accordionExample">
<!--                        software       -->
                        <h3>Logiciel</h3>
                        <article class="row row-cols-2 px-5">
                            <div class="row col-8">
                                <a class="text-decoration-none text-dark" href="">Titre article 1</a>
                            </div>
                            <div class="col-4">
                                <a  class="text-decoration-none text-dark" href="">
                                    <i class="fa-solid fa-pencil p-1" title="modifier"></i>
                                </a>
                                <a  class="text-decoration-none text-dark" href="">
                                    <i class="fa-solid fa-trash-can p-1" title="supprimer l'article"></i>
                                </a>
                            </div>
                        </article>
<!--                        app        -->
                        <h3>Application</h3>
                        <article class="row row-cols-2 px-5">
                            <div class="row col-8">
                                <a class="text-decoration-none text-dark" href="">Titre article 1</a>
                            </div>
                            <div class="col-4">
                                <a  class="text-decoration-none text-dark" href="">
                                    <i class="fa-solid fa-pencil p-1" title="modifier"></i>
                                </a>
                                <a  class="text-decoration-none text-dark" href="">
                                    <i class="fa-solid fa-trash-can p-1" title="supprimer l'article"></i>
                                </a>
                            </div>
                        </article>
<!--                        diy            -->
                        <h3>Tuto</h3>
                        <article class="row row-cols-2 px-5">
                            <div class="row col-8">
                                <a class="text-decoration-none text-dark" href="">Titre article 1</a>
                            </div>
                            <div class="col-4">
                                <a  class="text-decoration-none text-dark" href="">
                                    <i class="fa-solid fa-pencil p-1" title="modifier"></i>
                                </a>
                                <a  class="text-decoration-none text-dark" href="">
                                    <i class="fa-solid fa-trash-can p-1" title="supprimer l'article"></i>
                                </a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
}
else{
    header('Location : index.php');
}