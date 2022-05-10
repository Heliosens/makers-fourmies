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
<!--                create article form -->
                <form action="">
                    <div class="row row-cols-3">
<!--                type    -->
                        <div>
                            <span class="fw-bold">Type de projet</span>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">Projet personnel</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">Projet de groupe</label>
                            </div>
                        </div>
<!--                category    -->
                        <div>
                            <span class="fw-bold">Catégorie </span><span>*</span>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Création manuelle</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">Création numérique</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Electronique</label>
                            </div>
                        </div>
<!--                resource    -->
                        <div>
                            <span class="fw-bold">Ressource </span><span>*</span>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Default checkbox</label>
                            </div>
                        </div>
<!--                technical   -->
                        <div>
                            <span class="fw-bold">Technique </span><span>*</span>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Default checkbox</label>
                            </div>
                        </div>
<!--                tool    -->
                        <div>
                            <span class="fw-bold">Outil </span><span>*</span>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Default checkbox</label>
                            </div>
                        </div>
<!--                matter  -->
                        <div>
                            <span class="fw-bold">Matière </span><span>*</span>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Default checkbox</label>
                            </div>
                        </div>
                        <span class="fst-italic text-end w-100 mt-2">* Plusieurs choix possible</span>
                    </div>
<!--            title   -->
                    <hr>
                    <div>
                        <span class="fw-bold">Titre de l'article </span>
                        <span class="fst-italic">(90 caractères max.)</span>
                        <div class="mb-3 mx-auto fw-bold w-75">
                            <input maxlength="90" type="text" class="form-control" id="art_title">
                        </div>
                    </div>
<!--            description -->
                    <label for="artDescription" class="fw-bold">Description </label>
                    <span class="fst-italic">(255 caractères max.)</span>
                    <p>Décrivez le but du projet, le temps necessaire, les difficultés rencontrées...</p>
                    <textarea maxlength="255" class="form-control mb-3 mx-auto w-75" id="artDescription"
                              rows="3"></textarea>
<!--            add picture -->
                    <div class="mb-3 mx-auto">
                        <span class="fw-bold">Ajouter une image</span>
                        <div class="w-75 mx-auto">
                            <div class="w-75 mx-auto">
                                <label for="art_title" class="form-label">Titre de l'image</label>
                                <span class="fst-italic">(50 caractères max.)</span>
                                <input maxlength="50" type="text" class="form-control" id="art_title">
                            </div>
                            <div class="mb-3 w-75 mx-auto">
                                <label for="formFileSm" class="form-label fst-italic">Taille max. 4 mo -
                                    Format : jpg, jpeg, png</label>
                                <input class="form-control form-control" id="formFileSm" type="file">
                            </div>

                            <div>
                                <label for="imgDescription" class="form-label">Description </label>
                                <span class="fst-italic"> (255 caractères max.)</span>
                                <textarea maxlength="255" class="form-control mb-3 mx-auto" id="imgDescription"
                                          rows="3"></textarea>
                            </div>
                        </div>
                    </div>
<!--            button  -->
                    <div class="text-center">
                        <input class="btn btn-primary" type="submit" value="Soumettre">
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
