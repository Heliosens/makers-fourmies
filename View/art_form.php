<main>
    <section>
        <div class="mx-auto p-3">
            <div class="mb-3 w-75 mx-auto">
                <div class="text-center">
                    <span class="fs-5 fw-bold">Créer un article </span>
                    <span>Vous pourrez ainsi partager votre expérience.</span>
                    <p class="fst-italic">
                        Votre projet apparaitra sur notre site sous réserve de validation par un
                            administrateur.
                    </p>
                </div>
<!--                create article form        -->
                <form action="">
                    <div class="d-flex justify-content-between">
<!--                        type    -->
                        <div>
                            <span class="fw-bold">Type de projet</span>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Projet personnel
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Projet de groupe
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Autre
                                </label>
                            </div>
                        </div>
<!--                        category    -->
                        <div>
                            <span class="fw-bold">Catégorie</span>
                            <span class="fst-italic">plusieurs choix possible</span>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Création manuelle
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Création numérique
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Electronique
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Autre
                                </label>
                            </div>
                        </div>
                    </div>
<!--                    title-->
                    <span class="fw-bold">Titre de l'article</span>
                    <div>
                        <div class="mb-3 mx-auto fw-bold w-50">
                            <input type="text" class="form-control" id="art_title">
                        </div>
                    </div>
<!--                    add picture -->
                    <div class="mb-3 mx-auto">
                        <span class="fw-bold">Ajouter une image</span>
                        <div class="w-75 mx-auto">
                            <div class="row row-cols-2">
                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label">Taille max. 4 mo -
                                        Format : jpg, jpeg, png</label>
                                    <input class="form-control form-control" id="formFileSm" type="file">
                                </div>
                                <div>
                                    <label for="art_title" class="form-label">Titre de l'image</label>
                                    <input type="text" class="form-control" id="art_title">
                                </div>
                            </div>
                            <div>
                                <label for="art_title" class="form-label">Description</label>
                                <input type="text" class="form-control" id="art_title">
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </section>
</main>
