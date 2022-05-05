<main>
    <section class="pt-5">
        <div class="mx-auto pb-3 row col-10 col-sm-7 col-md-4">
            <h2 class="py-3 text-center">Connexion</h2>
            <form class="align-middle" action="index.php?c=user&p=connection" method="post">
                <div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email</label>
                    </div>
                </div>
                <div>
                    <div class="form-floating mb-3">
                        <input type="password" name="passwrd" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Mot de passe</label>
                    </div>
                </div>
                <div>
                    <input type="submit" name="sendBtn" class="btn btn-primary" value="Valider">
                </div>
            </form>
        </div>
    </section>
</main>