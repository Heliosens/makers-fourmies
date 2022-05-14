<main>
    <section>
        <div class="mx-auto p-3">
            <div class="mb-3 w-75 mx-auto">
                <div class="text-center">
                    <span class="fs-5 fw-bold">Créer un article </span>
                    <span>Vous pourrez ainsi partager votre expérience.</span>
                    <p class="fst-italic">
                        Votre projet apparaitra sur notre site sous réserve de validation par un administrateur.
                    </p>
                </div>
<!--                form to create article  -->
                <form action="index.php?c=projects&p=add_art" method="post" enctype="multipart/form-data">
                    <div class="row row-cols-lg-3 row-cols-sm-2 row-cols-1">
<!--                type    -->
                        <div>
                            <span class="fw-bold">Type de projet</span>
                            <?php
                            foreach ($data['type'] as $key => $item){
                                echo '<div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="radio' . $key . '">
                                <label class="form-check-label" for="radio' . $key . '">' . $item . '</label>
                            </div>';
                            }
                            ?>
                        </div>
<!--                category    -->
                        <div>
                            <span class="fw-bold">Catégorie </span><span>*</span>
                            <?php
                            foreach ($data['category'] as $key => $item){
                                echo '<div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="catCheck' . $key . '">
                                <label class="form-check-label" for="catCheck' . $key . '">' . $item . '</label>
                            </div>';
                            }
                            ?>
                        </div>
<!--                technique   -->
                        <div>
                            <span class="fw-bold">Technique </span><span>*</span>
                            <?php
                            foreach ($data['technique'] as $key => $item){
                                echo '<div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="techCheck' . $key . '">
                                <label class="form-check-label" for="techCheck' . $key . '">' . $item . '</label>
                            </div>';
                            }
                            ?>
                        </div>
                        <span class="fst-italic text-end w-100 mt-2">* Plusieurs choix possible</span>
                    </div>
                    <hr>

                    <div class="text-center">
                        <!--            title   -->
                        <div>
                            <span class="fw-bold">Titre de l'article </span>
                            <span class="fst-italic">(100 caractères max.)</span>
                            <div class="mb-3 mx-auto fw-bold w-75">
                                <input maxlength="100" type="text" class="form-control" id="art_title">
                            </div>
                        </div>
                        <!--            description -->
                        <div>
                            <label for="artDescription">Décrivez le but du projet, le temps necessaire, le niveau de
                                difficulté...</label>
                            <span class="fst-italic">(255 caractères max.)</span>
                            <textarea maxlength="255" class="form-control mb-3 mx-auto w-75" id="artDescription"
                                      rows="3"></textarea>
                        </div>
                        <!--            first step -->
                        <div id="step">
                            <p class="fs-5 fw-bold">Ajoutez les étapes :</p>
                            <label for="stepTitle" class="fw-bold">Titre de l'étape</label>
                            <span>(50 caractères max.)</span>
                            <div class="mb-3 mx-auto fw-bold w-75">
                                <input maxlength="50" type="text" class="form-control" id="stepTitle">
                            </div>
                            <span>Décrivez l'étape</span>
                            <span class="fst-italic">(255 caractères max.)</span>
                            <textarea maxlength="255" class="form-control mb-3 mx-auto w-75" id="artDescription"
                                      rows="3"></textarea>
                            <div>
                                <label for="picture">Choisissez une image</label>
                                <input type="file" name="stepImage" id="picture" accept=".jpeg, .jpg, .png">
                            </div>
                        </div>
                        <span class="fst-italic">Cliquez ici ajouter une étape supplémentaire</span>
                        <!--            Button add step -->
                        <a id="addStep" href="#" class="btn btn-primary m-3 btn-sm">Ajouter une étape</a>
                    </div>
<!--            submit button  -->
                    <div class="text-center">
                        <input class="btn btn-success" type="submit" value="Valider">
                        <p class="fst-italic">
                            En cliquant sur valider votre article sera créer en mode privé, vous pourrez le consulter
                            dans votre espace profil et le soumettre afin qu'un administrateur puisse accepter
                            la publication.
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
