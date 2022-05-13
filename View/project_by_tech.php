<main>
    <section>
        <div class="mx-auto py-3">
            <?php
            $title = $data['title'];
            echo '<div class="d-flex justify-content-center">
                <h2 class="p-1 border bg-light">' . $title['name'] . '</h2>
            </div>';
            ?>
            <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
                <?php
                $projects = $data['projects'];
                foreach ($projects as $item){
                    ?>
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body p-0">
                                <a class="text-decoration-none justify-content-center fs-4 text-center my-4"
                                   href="index?c=projects&p=one_project&o=<?=$item->getId()?>">
                                    <p class="text-dark m-0 py-5">
                                        <?= $item->getTitle() ?>
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
</main>