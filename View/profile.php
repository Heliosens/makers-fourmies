<?php
    $user = $data['user'];
    /* @var User $user */
?>
<main>
    <section>
        <div class="mx-auto py-2 px-5">
            <h2 class="text-center">Mon Profil</h2>
            <header class="row row-cols-1 row-cols-sm-2 g-4">
                <div>
                    <div class="d-flex justify-content-center align-items-end my-3">
                        <img class="col-4 col-4 col-sm-5 col-md-4 me-2"
                             src="/img/avatar/<?=$user->getAvatar()->getAvatar()?>" alt="avatar">
                        <a href="">
                            <i class="fa-solid fa-pencil text-dark" title="changer d'avatar"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <div class="my-3">
                        <div class="row row-cols-2">
                            <p class="text-end col-3">Pseudo : </p>
                            <p class="col-6"><?=$user->getPseudo()?></p>
                        </div>
                        <div class="row row-cols-2">
                            <p class="text-end col-3">Email : </p>
                            <p class="col-6"><?=$user->getEmail()?></p>
                        </div>
                        <div class="row row-cols-2">
                            <p class="text-end col-3">Rôle : </p>
                            <p class="col-6"><?=$user->getRole()->getRoleName()?></p>
                        </div>
                        <div class="row row-cols-2">
        <!--                            TODO                    -->
                            <p class="text-end col-3">Mot de passe : </p>
                            <a class="col-6" href="">modifier mon mot de passe</a>
                        </div>
                    </div>
                </div>
            </header>
            <div class="row row-cols-1 row-cols-sm-2 g-4 pt-5">
                <div class="col">
                    <h3 class="text-center">Mes articles :</h3>
                    <div class="row row-cols-2">
                        <div class="row col-8">
                            <a class="text-decoration-none text-dark col-9" href="">Titre 1 long</a>
                            <span class="col-3">publié</span>
                        </div>
                        <div class="col-4">
                            <a  class="text-decoration-none text-dark" href="">
                                <i class="fa-solid fa-pencil p-1" title="modifier"></i>
                            </a>
                            <a  class="text-decoration-none text-dark" href="">
                                <i class="fa-solid fa-trash-can p-1" title="supprimer l'article"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h3 class="text-center">Mes participations :</h3>
                    <div class="row row-cols-2">
                        <div class="col-8">
                            <a class="text-decoration-none text-dark" href="">Titre 1 long</a>
                        </div>
                        <div class="col-4">
                            <i class="fa-solid fa-trash-can p-1" title="supprimer ma participation"></i>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="d-flex flex-column align-items-center pt-5 gap-3">
                <?php
                if($user->getRole()->getRoleName() === 'admin'){
                    echo '
                <div>
                    <a class="btn btn-primary" href="c=user&p=ad_profile&o=' . $user->getId() . '" role="button">Espace administrateur</a>
                </div>
                    ';
                }
                ?>
                <div class="row row-cols-1 row-cols-md-2 justify-content-center">
                    <div class="col-md-9 col-11">
                        <p class="text-danger fw-bold">
                            Supprimer votre compte supprimera toutes vos informations, tous vos articles et
                            enlèvera votre nom des projets auxquels vous avez participé, de façon
                            <strong>DEFINITIVE</strong>.
                        </p>
                    </div>
                    <div class="col-md-3 text-center">
                        <a class="btn btn-danger" href="#" role="button">Supprimer mon compte</a>
                    </div>
                </div>
            </footer>
        </div>
    </section>
</main>