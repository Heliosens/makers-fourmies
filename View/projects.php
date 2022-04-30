<section>
    <div>
        <h2>page projets</h2>
        <?php
        echo $data['title'];
        foreach ($categories['item'] as $category){?>
            <a class="card text-decoration-none fs-4 text shadow d-flex justify-content-center align-items-center"
               href="index?c=projects">
                <p class="text-dark">
                    <?=$category->getCategoryName()?>
                </p>
            </a>
            <?php
        }
        ?>
    </div>
</section>
