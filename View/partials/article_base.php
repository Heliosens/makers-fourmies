<!--    title   -->
    <header class="text-center mt-3">
        <h2><?=html_entity_decode($value->getTitle())?></h2>
    </header>
    <!-- description-->
    <div class="text-center mt-3 w-75 mx-auto">
        <p><?=html_entity_decode($value->getDescription())?></p>
    </div>
<!--    steps-->
    <div class="d-flex flex-wrap justify-content-evenly mt-3">
        <article class="row w-75 row-cols-1 row-cols-md-2 justify-content-center">
            <?php
            foreach ($value->getStep() as $item){
                echo '
                <div class="d-flex flex-column align-items-center pb-3">
                <div class="picture" title="'. html_entity_decode($item->getTitle()) .'" style="background-image: url(/uploads/'.
                    $item->getImgName() .');" ></div>
                      <span>' . html_entity_decode($item->getDescription()) . '</span>
                </div>';
            }
            ?>
        </article>
<!--    technical sheet-->
        <aside class="ps-3 w-25">
            <ul class="list-group">
                <li class="list-group-item">                    <!-- type  -->
                    <span class="fw-bold"><?=$value->getType()->getTypeName()?></span>
                </li>
                <li class="list-group-item d-flex flex-column">    <!-- category  -->
                    <?php
                    foreach ($value->getCategory() as $item){
                        echo '<span class="fw-bold">' . $item->getName() . '</span>';
                    }
                    ?>
                </li>
                <li class="list-group-item d-flex flex-column">    <!-- technique  -->
                    <span  class="fw-bold">Technique :</span>
                    <?php
                    foreach ($value->getTechnic() as $item){
                        echo '<a class="text-dark" href="/index?c=articles&p=one_technic&o=' .
                            $item->getIdTech() . '">' . $item->getTechnique() . '</a>';
                    }
                    ?>
                </li>
                <li class="list-group-item d-flex flex-column">    <!-- tool  -->
                    <span  class="fw-bold">Outils :</span>
                    <?php
                    foreach ($value->getStep() as $item) {
                        echo '<span>' . $item->getTool() .'</span>';
                    }
                    ?>
                </li>
                <li class="list-group-item d-flex flex-column">    <!-- matter  -->
                    <span class="fw-bold">Matière :</span>
                    <?php
                    foreach ($value->getStep() as $item){
                        echo '<span>' . $item->getMatter() .'</span>';
                    }
                    ?>
                </li>
            </ul>
        </aside>
    </div>
    <div class="d-flex justify-content-between border-bottom border-secondary">
        <p class="">Article par : <?=$value->getAuthor()->getPseudo()?></p>
        <?php
        if(Controller::testAccess(['admin', 'modo'])){?>
            <div>
                <a href="/index.php?c=articles&p=status_change&o=<?=$value->getId()?>" title="changement de statut">
                    <i class="fa-solid fa-toggle-on"></i>
                </a>
                <span><?=Config::stateName($value->getState()->getId())?></span>
                <a  class="text-decoration-none text-dark"
                    href="/index.php?c=articles&p=del_article&o=<?=$value->getId()?>">
                    <i class="fa-solid fa-trash-can p-1" title="supprimer l\'article"></i>
                </a>
            </div>
        <?php
        }
        ?>
    </div>
