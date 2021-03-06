<?php
    $users = $data['user'];
    $articles = $data['articles'];
    $rubrics = $data['rubrics'];
    $resources = $data['cat-link'];
?>
<main>
    <section>
        <div class="mx-auto py-2 px-5">
            <h2 class="text-center m-5">Espace administrateur</h2>
            <div class="accordion" id="accordionAdmin">
                <div class="accordion-item mb-3">
                    <!--    users   -->
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
                                foreach ($users as $key => $user){
                                    $token = ($user->getToken() === "" || $user->getToken() === null) ?
                                        '<i class="fa-solid fa-check"></i>' : "non validé";
                                    echo '<div class="row row-cols-5 px-5  align-items-center">
                                    <a class="text-decoration-none text-dark" href="/index.php?c=profile&p=profile&o='
                                        . $user->getId() . '">' . $user->getPseudo() . '
                                    </a>
                                    <div>
                                        <img class="w-25" src="/img/avatar/'. $user->getAvatar()->getAvatar() .'">
                                    </div>
                                    <span class="text-decoration-none text-dark">' .
                                        Config::roleName($user->getRole()->getRoleName()) . '
                                    </span>
                                    <a href="/index.php?c=user&p=del_user&o=' . $user->getId() . '" class="text-dark">
                                        <i class="fa-solid fa-trash-can p-1" title="supprimer l\'utilisateur"></i>
                                    </a>
                                    <span>' . $token . '</span>
                                </div>';
                                }
                                ?>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <!--    articles    -->
                    <h3 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                            Articles
                        </button>
                    </h3>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingOne"
                         data-bs-parent="#accordionAdmin">
                        <?php
                        foreach ($articles as $key => $state){
                            echo '<h3>' . Config::stateName($key) . '</h3>
                            <article>';
                            foreach ($state as $nbr => $article){
                                echo '<div class="row row-cols-3 px-5">
                                    <a class="text-decoration-none text-dark" 
                                    href="/index.php?c=articles&p=one_article&o=' . $nbr . '">' . $article['title'] .'
                                    </a>
                                    <span>' . $article['author'] .'</span>
                                    <div class="d-flex justify-content-between">
                                        <a  class="text-decoration-none text-dark" 
                                        href="/index.php?c=articles&p=update_article&o=' . $nbr . '">
                                            <i class="fa-solid fa-pencil p-1" title="modifier"></i>
                                        </a>
                                        <a  class="text-decoration-none text-dark" 
                                        href="/index.php?c=articles&p=del_article&o=' . $nbr . '">
                                            <i class="fa-solid fa-trash-can p-1" title="supprimer l\'article"></i>
                                        </a>
                                        <a href="/index.php?c=articles&p=status_change&o=' . $nbr . '" 
                                        title="changement de status">
                                            <i class="fa-solid fa-toggle-on"></i>
                                        </a>
                                    </div>
                                </div>';
                            }
                            echo '</article>';
                        };
                        ?>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <!--    rubrics -->
                    <h3 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
                            Rubriques
                        </button>
                    </h3>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingOne"
                         data-bs-parent="#accordionAdmin">
                        <div>
                            <a href="/index.php?c=articles&p=rubric_form">Ajouter une rubrique</a>
                        </div>
                        <?php
                        foreach ($rubrics as $table => $rubric) {
                            echo '<h3>' . Config::rubricsName($table) . '</h3>
                            <article>';
                            foreach ($rubric as $nbr => $item) {
                                echo '<div class="row row-cols-3 px-5">
                                <span>' . $item . '</span>
                                <a class="text-decoration-none text-dark" href="">
                                    <i class="fa-solid fa-pencil p-1" title="modifier"></i>
                                </a>
                                <a href="/index.php?c=articles&p=del_rubric&o=' . $table . '_' . $nbr .'" 
                                    class="text-decoration-none text-dark">
                                    <i class="fa-solid fa-trash-can p-1" title="supprimer"></i>
                                </a>
                            </div>';
                            }
                            echo '</article>';
                        };
                        ?>
                    </div>
                </div>
                <div class="accordion-item mb-3">
                    <!--    resources   -->
                    <h3 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseOne">
                            Ressources
                        </button>
                    </h3>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingOne"
                         data-bs-parent="#accordionAdmin">
                        <?php
                        foreach ($resources as $key => $item){
                            $name = CategoryLinkManager::catLinkById($key);
                            echo '<h3>' . $name->getCategoryLink() . '</h3>
                            <article>
                                <div class="row row-cols-3 px-5">';
                                foreach ($item as $value){
                                echo '<div>
                                    <span>' . $value['title'] . '</span>
                                    </div>
                                    <div>
                                        <a  class="text-decoration-none text-dark" href="">
                                            <i class="fa-solid fa-pencil p-1" title="modifier"></i>
                                        </a>
                                        <a  class="text-decoration-none text-dark" href="">
                                            <i class="fa-solid fa-trash-can p-1" title="supprimer"></i>
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
