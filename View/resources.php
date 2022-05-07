<main>
    <section>

        <div class="d-grid py-3 gap-3 mx-auto">
            <?php
            $data = $data['cat'];
            foreach ($data as $key => $item){
                $name = CategoryLinkManager::catLinkById($key);
                ?>
                <article class="card">
                <h2 class="card-header"><?=$name->getCategoryLink()?></h2>
                <div class="card-body">
                    <?php
                    foreach ($item as $value){?>
                    <div class="mb-2">
                        <a class="btn btn-primary" href="#"><?=$value['title']?></a>
                        <div><!--    description   -->
                            <p><?=$value['description']?></p>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                </article>
            <?php
            }
            ?>
        </div>
    </section>
</main>