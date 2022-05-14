<main>
    <section>
        <div class="mx-auto py-3 row justify-content-center g-1">
            <?php
            foreach ($data['art'] as $item){?>
            <div class="bg-light w-75">
                <a class="text-decoration-none text-center"
                   href="index?c=articles&p=one_article&o=<?=$item->getId()?>">
                    <p class="text-dark m-0">
                        <?=$item->getTitle()?>
                    </p>
                </a>
            </div>
            <?php
            }
            ?>
        </div>
    </section>
</main>

<?php
echo '<pre>';
var_dump($data);
echo '</pre>';
