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
                <form action="index.php?c=projects&p=add_art" method="post">
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
                        <!--                technical   -->
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
                    </div>
<!--                title   -->
                    <hr>
                    <div>
                        <span class="fw-bold">Titre de l'article </span>
                        <span class="fst-italic">(100 caractères max.)</span>
                        <div class="mb-3 mx-auto fw-bold w-75">
                            <input maxlength="90" type="text" class="form-control" id="art_title">
                        </div>
                    </div>
<!--            description -->
                    <label for="artDescription" class="fw-bold">Description </label>
                    <span class="fst-italic">(255 caractères max.)</span>
                    <p>Décrivez le but du projet, le temps necessaire, le niveau de difficulté...</p>
                    <textarea maxlength="255" class="form-control mb-3 mx-auto w-75" id="artDescription"
                              rows="3"></textarea>
<!--            add step -->
<!--            Button add step -->
                    <div class="text-center">
                        <a class="btn btn-primary m-3 btn-sm">Ajouter une étape</a>
                    </div>
<!--            submit button  -->
                    <div class="text-center">
                        <input class="btn btn-success" type="submit" value="Soumettre">
                    </div>
                    <?php
                    echo '<pre>';
                    var_dump($data);
                    echo '</pre>';
                    ?>
                </form>
            </div>
        </div>
    </section>
</main>
