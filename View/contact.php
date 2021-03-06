<main>
    <section class="py-4">
        <div class="mx-auto pb-3 row col-10 col-sm-7 col-md-4">
            <h2 class="pt-3 text-center">Contact</h2>
            <form action="/index.php?c=contact&p=send_mail" method="post">
                <div>
                    <div class="form-floating mb-3">
                        <input type="email" name="user-mail" class="form-control" id="floatingInput1">
                        <label for="floatingInput1">Email</label>
                    </div>
                </div>
                <div>
                    <div class="form-floating mb-3">
                        <input type="text" name="subject" class="form-control" id="floatingInput2">
                        <label for="floatingInput2">Sujet</label>
                    </div>
                </div>
                <div>
                    <div class="mb-3">
                        <label for="user-message" class="form-label">Laissez votre message</label>
                        <textarea name="user-message" class="form-control" id="user-message" maxlength="255" rows="6"></textarea>
                    </div>
                </div>
                <input type="submit" name="sendBtn" class="btn btn-primary" value="Valider">
            </form>
        </div>
    </section>
</main>