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
                <!--    form to create article  -->
                <form action="/index.php?c=articles&p=add_art" method="POST" enctype="multipart/form-data">
                    <div class="row row-cols-lg-3 row-cols-sm-2 row-cols-1">
                        <!--    type    -->
                        <div>
                            <span class="fw-bold">Type de projet</span>
                            <?php
                            foreach ($data['type'] as $key => $item){
                                echo '<div class="form-check">
                                <input class="form-check-input" type="radio" name="type" value="' . $key . '" id="radio'
                                    . $key . '">
                                <label class="form-check-label" for="radio' . $key . '">' . $item . '</label>
                            </div>';
                            }
                            ?>
                        </div>
                        <!--    category    -->
                        <div>
                            <span class="fw-bold">Catégorie *</span>
                            <?php
                            foreach ($data['category'] as $key => $item){
                                echo '<div class="form-check">
                                <input class="form-check-input" type="checkbox" name="cat[]" value="' . $key . '"
                                 id="catCheck' . $key . '">
                                <label class="form-check-label" for="catCheck' . $key . '">' . $item . '</label>
                            </div>';
                            }
                            ?>
                        </div>
                        <!--    technique   -->
                        <div>
                            <span class="fw-bold">Technique *</span>
                            <?php
                            foreach ($data['technique'] as $key => $item){
                                echo '<div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tech[]" value="' . $key . '"
                                id="techCheck' . $key . '">
                                <label class="form-check-label" for="techCheck' . $key . '">' . $item . '</label>
                            </div>';
                            }
                            ?>
                        </div>
                        <span class="fst-italic text-end w-100 mt-2">* Plusieurs choix possible</span>
                    </div>
                    <hr>
                    <p class="fst-italic text-end w-100 mt-2">** Champs obligatoires</p>
                    <div class="text-center">
                        <!--    title   -->
                        <div>
                            <span class="fw-bold">Titre de l'article **</span>
                            <span class="fst-italic">(100 caractères max.)</span>
                            <div class="mb-3 mx-auto fw-bold w-75">
                                <input maxlength="100" type="text" name="artTitle" class="form-control" id="arTitle"
                                       required>
                            </div>
                        </div>
                        <!--    description -->
                        <div>
                            <label for="artDescription">Décrivez le but du projet, le temps necessaire, le niveau de
                                difficulté...</label>
                            <span class="fst-italic">(255 caractères max.) **</span>
                            <textarea maxlength="255" name="artDescription" class="form-control mb-3 mx-auto w-75"
                                      id="artDescription" rows="3" required></textarea>
                        </div>
                        <p class="fs-5 fw-bold">Etapes :</p>
                        <!--    STEPS    -->
                        <div id="steps">
                            <div class="oneStep border mb-5">
                                <!--    title   -->
                                <label class="fw-bold">Titre de l'étape 1</label>
                                <span>(50 caractères max.) **</span>
                                <div class="mb-3 mx-auto fw-bold w-75">
                                    <input maxlength="50" type="text" name="stepTitle[]" class="form-control" required>
                                </div>
                                <!--    description-->
                                <span>Décrivez l'étape</span>
                                <span class="fst-italic">(255 caractères max.)</span>
                                <textarea maxlength="255" name="stepDescription[]" class="form-control mb-3 mx-auto w-75"
                                          rows="3"></textarea>
                                <!--    tool & matter   -->
                                <div class="row row-cols-2 w-75 mx-auto">
                                    <div>
                                        <label>Outil</label>
                                        <span>(20 caractères max.)</span>
                                        <div class="mb-3">
                                            <input maxlength="20" type="text" name="stepTool[]" class="form-control">
                                        </div>
                                    </div>
                                    <div>
                                        <label>Matière</label>
                                        <span>(20 caractères max.)</span>
                                        <div class="mb-3 fw-bold">
                                            <input maxlength="20" type="text" name="stepMatter[]" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!--    illustration    -->
                                <div>
                                    <label>Choisissez une image</label>
                                    <input type="file" name="stepImage[]" accept=".jpeg, .jpg, .png">
                                </div>
                            </div>
                            <div class="oneStep border mb-5">
                                <!--    title   -->
                                <label class="fw-bold">Titre de l'étape 2</label>
                                <span>(50 caractères max.) **</span>
                                <div class="mb-3 mx-auto fw-bold w-75">
                                    <input maxlength="50" type="text" name="stepTitle[]" class="form-control" required>
                                </div>
                                <!--    description-->
                                <span>Décrivez l'étape</span>
                                <span class="fst-italic">(255 caractères max.)</span>
                                <textarea maxlength="255" name="stepDescription[]" class="form-control mb-3 mx-auto w-75"
                                          rows="3"></textarea>
                                <!--    tool & matter   -->
                                <div class="row row-cols-2 w-75 mx-auto">
                                    <div>
                                        <label>Outil</label>
                                        <span>(20 caractères max.)</span>
                                        <div class="mb-3">
                                            <input maxlength="20" type="text" name="stepTool[]" class="form-control">
                                        </div>
                                    </div>
                                    <div>
                                        <label>Matière</label>
                                        <span>(20 caractères max.)</span>
                                        <div class="mb-3 fw-bold">
                                            <input maxlength="20" type="text" name="stepMatter[]" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!--    illustration    -->
                                <div>
                                    <label>Choisissez une image</label>
                                    <input type="file" name="stepImage[]" accept=".jpeg, .jpg, .png">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--    submit button  -->
                    <div class="text-center">
                        <input class="btn btn-success" type="submit" name="submitBtn" value="Valider"
                               title="Créer l'article">
                        <p class="fst-italic">
                            En cliquant sur valider votre article sera créer en mode privé, vous pourrez le consulter
                            dans votre espace profil, le modifier, le supprimer ou le soumettre afin qu'un
                            administrateur puisse accepter sa publication.
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
