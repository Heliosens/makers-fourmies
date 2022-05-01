<section>
    <div class="frame mx-auto d-flex flex-wrap justify-content-center gap-3">
        <?php
        foreach ($categories as $category){?>
            <a class="card text-decoration-none fs-4 text shadow d-flex justify-content-center align-items-center"
               href="index?c=projects&p=page&o=<?=$category->getIdCat()?>">
                <p class="text-dark">
                    <?=$category->getCategoryName()?>
                </p>
            </a>
            <?php
        }
        ?>
    </div>
</section>

