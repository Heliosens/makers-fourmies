<main>
    <section>
        <div class="mx-auto py-1 row">
            <?php
            $art = $data['art'];
            foreach ($art as $value){
                require __DIR__ . '/../View/partials/article_base.php';
            } ?>
        </div>
    </section>
</main>
