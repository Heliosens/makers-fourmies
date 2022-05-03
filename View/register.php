<main>
    <section class="py-4">
        <div class="mx-auto pb-3 row col-10 col-sm-7 col-md-4">
            <h2 class="pt-3 text-center">Inscription</h2>
            <form action="index.php?c=user&p=new_user" method="post">
                <div>
                    <div class="form-floating mb-3">
                        <input type="text" name="pseudo" class="form-control" id="floatingInput" placeholder="Pseudo">
                        <label for="floatingInput">Pseudo</label>
                    </div>
                </div>
                <div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInput">
                        <label for="floatingInput">Email</label>
                    </div>
                </div>
                <div>
                    <div class="text-center">
                        <span id="passwordHelpInline" class="form-text">
                          Minimum : 8 caractères, 1 minuscule, 1 majuscule, 1 caractère spécial !+@#$%^&*-
                        </span>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="passwrd" class="form-control" id="floatingPassword" aria-describedby="passwordHelpInline" placeholder="Password">
                        <label for="floatingPassword">Mot de passe</label>
                    </div>
                </div>
                <div>
                    <div class="form-floating mb-3">
                        <input type="password" name="passwrdBis" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">vérification du mot de passe</label>
                    </div>
                </div>
                <input type="submit" name="sendBtn" class="btn btn-primary" value="Valider">
            </form>
        </div>
    </section>
</main>