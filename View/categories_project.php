<section>
    <div class="frame mx-auto d-flex flex-wrap justify-content-evenly">
        <?php
        foreach ($categories['item'] as $category){?>
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

