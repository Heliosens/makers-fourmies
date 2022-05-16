<?php
    $data = $data['article'];
    /* @var Article $data */
?>
<main>
    <section>
        <div class="mx-auto py-1 row">
<!--            title-->
            <header class="text-center mt-3">
                <h2><?=$data->getTitle()?></h2>
            </header>
<!--            description-->
            <div class="text-center mt-3 w-75 mx-auto">
                <p><?=$data->getDescription()?></p>
            </div>
<!--            steps-->
            <div class="d-flex flex-wrap justify-content-evenly mt-3">
                <article class="row w-75 row-cols-1 row-cols-md-2 justify-content-center">
                    <?php
                    foreach ($data->getStep() as $item){
                        echo '
                        <div class="d-flex flex-column align-items-center pb-3">
                        <div class="picture" title="'. $item->getTitle() .'" style="background-image: url(/uploads/'.
                            $item->getImgName() .');" ></div>
                              <span>' . $item->getDescription() . '</span>
                              </div>
                              ';
                    }
                    ?>
                </article>
                <aside class="ps-3 w-25">
                    <ul class="list-group">
                        <li class="list-group-item">    <!-- type  -->
                            <span class="fw-bold"><?=$data->getType()->getTypeName()?></span>
                        </li>
                        <li class="list-group-item d-flex flex-column">    <!-- category  -->
                            <?php
                            foreach ($data->getCategory() as $item){
                                echo '<span class="fw-bold">' . $item->getName() . '</span>';
                            }
                            ?>
                        </li>
                        <li class="list-group-item d-flex flex-column">    <!-- technique  -->
                            <span  class="fw-bold">Technique :</span>
                            <?php
                            foreach ($data->getTechnic() as $item){
                                echo '<a class="text-dark" href="index?c=articles&p=one_technic&o=' .
                                    $item->getIdTech() . '">' . $item->getTechnique() . '</a>';
                            }
                            ?>
                        </li>
                        <li class="list-group-item d-flex flex-column">    <!-- tool  -->
                            <span  class="fw-bold">Outils :</span>
                            <?php
                            foreach ($data->getStep() as $item) {
                                echo '<span>' . $item->getTool() .'</span>';
                            }
                            ?>
                        </li>
                        <li class="list-group-item d-flex flex-column">    <!-- matter  -->
                            <span class="fw-bold">Matière :</span>
                            <?php
                            foreach ($data->getStep() as $item){
                                echo '<span>' . $item->getMatter() .'</span>';
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
