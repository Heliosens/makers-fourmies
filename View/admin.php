<?php
    $users = $data['user'];
    $articles = $data['article'];
    $rubrics = $data['rubrics'];
?>
<main>
    <section>
        <div class="mx-auto py-2 px-5">
            <h2 class="text-center m-5">Espace administrateur</h2>
            <div class="accordion" id="accordionAdmin">
                <div class="accordion-item mb-3">
<!--                    users                   -->
                    <h3 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Utilisateurs
                        </button>
                    </h3>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                         data-bs-parent="#accordionAdmin">
                        <div class="accordion-body">
                            <article>
                                <?php
                                foreach ($users as $user){
                                    echo '<div class="row row-cols-3 px-5">
                                    <a class="text-decoration-none text-dark" href="">' . $user->getPseudo() . '</a>
                                    <span class="text-decoration-none text-dark">' . Config::roleName($user->getRole()->getRoleName()) . '</span>
                                    <a href="/index.php?c=user&p=del_user&o=' . $user->getId() . '" class="text-dark">
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
                         data-bs-parent="#accordionAdmin">
<!--                        private       -->
                        <h3>Privé</h3>
                        <article>
                            <?php
                            foreach ($articles['pr'] as $article){
                                echo '<div class="row row-cols-3 px-5">
                                    <a class="text-decoration-none text-dark" href="">' . $article['title'] .'</a>
                                    <span>' . $article['author'] .'</span>
                                    <div>
                                        <a  class="text-decoration-none text-dark" href="">
                                            <i class="fa-solid fa-pencil p-1" title="modifier"></i>
                                        </a>
                                        <a  class="text-decoration-none text-dark" href="">
                                            <i class="fa-solid fa-trash-can p-1" title="supprimer l\'article"></i>
                                        </a>
                                    </div>
                                </div>
                                ';
                            }
                            ?>
                        </article>
<!--                        stand by        -->
                        <h3>En attente de validation</h3>
                        <article>
                            <?php
                            foreach ($articles['sb'] as $article){
                                echo '<div class="row row-cols-3 px-5">
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
                        <article>
                            <?php
                            foreach ($articles['pu'] as $article){
                                echo '<div class="row row-cols-3 px-5">
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
                         data-bs-parent="#accordionAdmin">
<!--                        type    -->
                        <?php

                        ?>
                        <h3>Types</h3>
                        <article>
                            <div>
                                <?php
                                foreach ($rubrics['type'] as $item){
                                    echo '<div class="row row-cols-3 px-5">
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
                        <article>
                            <div>
                                <?php
                                foreach ($rubrics['category'] as $item){
                                    echo '<div class="row row-cols-3 px-5">
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
                        <article>
                            <div>
                                <?php
                                foreach ($rubrics['technique'] as $item){
                                    echo '<div class="row row-cols-3 px-5">
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
<!--                        resources-->
                        <h3>Ressources</h3>
                        <article>
                            <div class="row row-cols-3 px-5">
                                <?php
                                foreach ($rubrics['resource'] as $item){
                                    echo '<div class="mb-2">
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
                         data-bs-parent="#accordionAdmin">
                        <?php
                        foreach ($data['cat-link'] as $key => $item){
                            $name = CategoryLinkManager::catLinkById($key);
                            echo '<h3>' . $name->getCategoryLink() . '</h3>
                            <article>
                                <div class="row row-cols-3 px-5">';
                                foreach ($item as $value){
                                echo '<div>
                                    <span>' . $value['title'] . '</span>
                                    </div>
                                    <div>
                                        <a  class="text-decoration-none text-dark" href="#">
                                            <i class="fa-solid fa-pencil p-1" title="modifier"></i>
                                        </a>
                                        <a  class="text-decoration-none text-dark" href="#">
                                            <i class="fa-solid fa-trash-can p-1" title="supprimer l\'article"></i>
                                        </a>
                                    </div>
                                </div>
                            </article>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
