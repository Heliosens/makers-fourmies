<?php
    $data = $data['project'];
?>
<main>
    <section>
        <div class="mx-auto py-1 row">
            <header class="text-center mt-3">
                <h2><?=$data->getTitle()?></h2>
            </header>
            <div class="mt-3">
                <p><?=$data->getDescription()?></p>
            </div>
            <div class="d-flex flex-wrap justify-content-evenly mt-3">
                <article class="row w-75 row-cols-1 row-cols-md-2 justify-content-center">
                    <?php
                    foreach ($data->getImage() as $item){
                        echo '
                        <div class="d-flex flex-column align-items-center pb-3">
                        <div class="picture" alt="'. $item->getTitle() .'" style="background-image: url(/img/article/'. $item->getName() .');" ></div>
                              <span>' . $item->getDescription() . '</span>
                              </div>
                              ';
                    }
                    ?>
                </article>
                <aside class="ps-3 w-25">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="fw-bold"><?=$data->getType()->getTypeName()?></span>
                        </li>
                        <li class="list-group-item d-flex flex-column">
                            <span class="fw-bold">Réalisation :</span>
                            <?php
                            foreach ($data->getTakePart() as $item){
                                echo '<span>' . $item . '</span>';
                            }
                            ?>
                        </li>
                        <li class="list-group-item d-flex flex-column">
                            <span  class="fw-bold">Technique :</span>
                            <?php
                            foreach ($data->getTechnic() as $item){
                                echo '<span>' . $item->getTechnique() . '</span>';
                            }
                            ?>
                        </li>
                        <li class="list-group-item d-flex flex-column">
                            <span  class="fw-bold">Outils :</span>
                            <?php
                            foreach ($data->getTool() as $item){
                                echo '<span>' . $item->getToolName() . '</span>';
                            }
                            ?>
                        </li>
                        <li class="list-group-item d-flex flex-column">
                            <span class="fw-bold">Matière :</span>
                            <?php
                            foreach ($data->getMatter() as $item){
                                echo '<span>' . $item->getMatterName() . '</span>';
                            }
                            ?>
                        </li>
                    </ul>
                </aside>
            </div>
            <p>Article par : <?=$data->getAuthor()->getPseudo()?></p>
        </div>
    </section>
</main>