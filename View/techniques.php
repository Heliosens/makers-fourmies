<main>
    <section>
        <div class="mx-auto py-3 row row-cols-1 row-cols-md-3 g-4 justify-content-center">
            <?php
            foreach ($techniques as $key => $item){?>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body p-0">
                            <a class="text-decoration-none fs-4 text-center shadow"
                               href="index?c=projects&p=one_technic&o=<?=$key?>">
                                <p class="text-dark m-0 py-5">
                                    <?=$item['tech']?>
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
</main>