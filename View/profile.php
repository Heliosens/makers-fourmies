<?php
    $user = $data['user'];
    $art = $data['art']['write'];
    $avatar = $data['avatar'];
?>
<main>
    <section>
        <div class="mx-auto py-1 row justify-content-center">
            <h2 class="text-center">Mon Profil</h2>
            <!-- Modal -->
            <div class="modal fade" id="avatarModal" tabindex="-1" aria-labelledby="avatarModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="avatarModalLabel">Changer votre avatar</h5>
                        </div>
                        <div class="modal-body gap-4 d-flex flex-wrap justify-content-between">
                            <?php
                            foreach ($avatar as $item){
                                echo '<a href="index.php?c=avatar&p=change&o=' . $item->getId() . '">
                                    <img class="logo" src="/img/avatar/' . $item->getAvatar() . '" alt="avatar">
                                </a>';
                            }
                            ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Retour</button>
                        </div>
                    </div>
                </div>
            </div>
            <header class="row row-cols-1 row-cols-sm-2 g-4">
                <div>
                    <div class="d-flex justify-content-center align-items-end">
                        <img class="col-4 col-4 col-sm-5 col-md-4 me-2 bg-light"
                             src="/img/avatar/<?=$user->getAvatar()->getAvatar()?>" alt="avatar">
                        <!-- Button trigger modal -->
                        <a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#avatarModal">
                            <i class="fa-solid fa-pencil text-dark" title="changer d'avatar"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <div class="bg-light p-3 border">
                        <div>
                            <p>Pseudo : <?=$user->getPseudo()?></p>
                        </div>
                        <div>
                            <p>Email : <?=$user->getEmail()?></p>
                        </div>
                        <div>
                            <p>
                                Rôle : <?=Config::roleName($user->getRole()->getRoleName())?>
                            </p>
                        </div>
                        <div>
<!--        TODO            -->
                            <p>Mot de passe : <a href="">modifier mon mot de passe</a>
                        </div>
                    </div>
                </div>
            </header>
            <div class="row row-cols-1 row-cols-sm-2 g-4">
                <div class="col">
                    <div class="d-flex justify-content-around">
                        <h3 class="text-center">Mes articles :</h3>
                        <a href="index.php?c=projects&p=art_form">Créer un article</a>
                    </div>
                    <?php
                    foreach ($art as $key => $item){
                            echo '<div class="row row-cols-2 bg-light mx-3">
                            <div class="row col-8">
                                <a class="text-decoration-none text-dark col-9" href="index?c=projects&p=one_project&o='
                                . $key . '">' . $item['title'] . '</a>
                                <span class="col-3">' . Config::stateName($item['state']) . '</span>
                                </div>
                            <div class="col-4">
                                <a  class="text-decoration-none text-dark" href="">
                                    <i class="fa-solid fa-pencil p-1" title="modifier"></i>
                                </a>
                                <a  class="text-decoration-none text-dark" href="">
                                    <i class="fa-solid fa-trash-can p-1" title="supprimer l\'article"></i>
                                </a>
                            </div>
                        </div>';
                    }
                    ?>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-around">
                        <h3 class="text-center">Mes favoris :</h3>
                    </div>
                    <?php
                    if(isset($art)){
                        foreach ($art as $key => $item){
                            echo '<div class="row row-cols-2 bg-light">
                        <div class="col-8">
                            <a class="text-decoration-none text-dark" href="index?c=projects&p=one_project&o=' . $key
                                . '">' . $item['title'] . '</a>
                            </div>
                            <a href="#" class="col-4 text-dark">
                                <i class="fa-solid fa-heart-crack" title="Retirer des favoris"></i>
                            </a>
                    </div>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="d-flex flex-column align-items-center pt-5 gap-3">
                <?php
                if($user->getRole()->getRoleName() === 'admin'){
                    echo '
                <div>
                    <a class="btn btn-sm btn-primary" href="index.php?c=profile&p=admin">Espace administrateur</a>
                </div>';
                }
                ?>
<!--            Button trigger modal -->
                <div>
                    <a type="button" class="btn btn-outline-danger btn-light btn-sm text-center" data-bs-toggle="modal"
                       data-bs-target="#accountModal">Supprimer mon compte</a>
                </div>
<!--            delete account Modal -->
                <div class="modal fade" id="accountModal" tabindex="-1" aria-labelledby="accountModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger" id="accountModalLabel">
                                    Suppression de compte
                                </h5>
                            </div>
                            <p class="modal-body text-danger gap-4">
                                Supprimer votre compte supprimera
                                toutes vos informations, tous vos articles de
                                façon <strong>DEFINITIVE</strong>.
                            </p>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Retour</button>
                                <a href="" type="button" class="btn btn-danger">
                                    Confirmer la suppression de mon compte</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>