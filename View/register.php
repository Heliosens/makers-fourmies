<main class="position-relative">
    <section class="pt-5">
        <div class="mx-auto pb-3 row col-10 col-sm-7 col-md-4">
            <h2 class="pt-3 text-center">Inscription</h2>
            <form action="/index.php?c=user&p=new_user" method="post">
                <div>
                    <div class="form-floating mb-3">
                        <input type="text" name="pseudo" class="form-control" id="inputPseudo">
                        <label for="inputPseudo">Pseudo</label>
                    </div>
                </div>
                <div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="inputEmail">
                        <label for="inputEmail">Email</label>
                    </div>
                </div>
                <div>
                    <div class="text-center">
                        <span class="form-text">
                          Minimum : 8 caractères dont au moins 1 minuscule, 1 majuscule, 1 chiffre, 1 caractère spécial
                            !+@#$%^&*-
                        </span>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="passwrd" class="form-control" id="inputPassword">
                        <label for="inputPassword">Mot de passe</label>
                    </div>
                </div>
                <div>
                    <div class="form-floating mb-3">
                        <input type="password" name="passwrdBis" class="form-control" id="inputPassword2">
                        <label for="inputPassword2">vérification du mot de passe</label>
                    </div>
                </div>
                <input id="registerBtn" type="submit" name="sendBtn" class="btn btn-primary" value="Valider">
            </form>
        </div>
    </section>
</main>