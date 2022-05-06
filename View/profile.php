<main>
    <section>
        <div class="mx-auto pt-2">
            <h2 class="text-center">Mon Profil</h2>
            <header class="row row-cols-1 row-cols-sm-2 g-4">
                <div class="col">
                    <div class="d-flex justify-content-center align-items-end my-3">
                        <img class="col-4 col-4 col-sm-5 col-md-4 me-2" src="/img/avatar/<?= $_SESSION['avatar']?>" alt="avatar">
                        <a href="">
                            <i class="fa-solid fa-pencil" title="changer d'avatar"></i>
                        </a>
                    </div>
                </div>
                <div class="col ">
                    <div class="my-3 ms-5">
                        <p>Pseudo : <?= $_SESSION['user']?></p>
                        <p>Email : <?= $_SESSION['id']?></p>
                        <p>Pseudo : <?= $_SESSION['role']?></p>
                        <a href="">modifier mon mot de passe</a>
                    </div>
                </div>
            </header>
            <div class="row row-cols-1 row-cols-sm-2 g-4">
                <div class="col px-5">
                    <h3>Mes articles :</h3>
                    <div class="row row-cols-2">
                        <div class="row col-8">
                            <a class="text-decoration-none col-6" href="">titre 1</a>
                            <span class="col-6">publié</span>
                        </div>
                        <div class="col-4">
                            <i class="fa-solid fa-pencil p-1" title="modifier"></i>
                            <i class="fa-solid fa-trash-can p-1" title="supprimer"></i>
                        </div>
                    </div>
                </div>
                <div class="col px-5">
                    <h3>Mes participations :</h3>
                    <div class="row row-cols-2">
                        <div class="col-8">
                            <a class="text-decoration-none" href="">titre 1</a>
                        </div>
                        <div class="col-4">
                            <i class="fa-solid fa-pencil p-1" title="modifier"></i>
                            <i class="fa-solid fa-trash-can p-1" title="supprimer"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>