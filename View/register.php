<section class="py-4">
    <div class="mx-auto pb-3 row col-10 col-sm-7 col-md-4">
        <h2 class="pt-3 text-center">Inscription</h2>
        <form  action="index.php?c=maker">
            <div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Pseudo">
                    <label for="floatingInput">Pseudo</label>
                </div>
            </div>
            <div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
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
                    <input type="password" class="form-control" id="floatingPassword" aria-describedby="passwordHelpInline" placeholder="Password">
                    <label for="floatingPassword">Mot de passe</label>
                </div>
            </div>
            <div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">vérification du mot de passe</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>
</section>