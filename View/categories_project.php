<section>
    <div class="mx-auto py-3 row row-cols-1 row-cols-md-3 g-4">
        <?php
        foreach ($categories as $category){?>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body my-4">
                            <a class="text-decoration-none justify-content-center fs-4 text-center shadow"
                               href="index?c=projects&p=page&o=<?=$category->getIdCat()?>">
                                <p class="text-dark">
                                    <?=$category->getCategoryName()?>
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

