<main>
    <section>
        <div class="d-grid py-3 gap-3 mx-auto">
            <?php

            foreach ($data as $key => $item){
                ?>
                <article class="card">
                    <h2 class="card-header"><?=$key?></h2>
                    <div class="card-body">
                        <div class="row row-cols-2">
                            <?php
                            foreach ($item as $art){
                            $img = $art->getStep();
                            if(isset($img[0])){
                            ?>
                            <div class="illustration"
                                 style="background-image: url('/uploads/<?=$img[0]->getImgName()?>')"></div><?php
                            }
                            ?>
                            <div><?php
                                echo '<span>' . $art->getTitle() . '</span>
                                    <p>' . $art->getDescription() . '</p>';
                                ?>
                            </div><?php
                            }
                            ?>
                        </div>
                    </div>
                </article>
                <?php
            }
            ?>
        </div>
        <div class="toast-container position-fixed top-0 start-50 translate-middle-x">
            <div id="liveToast" class="toast align-items-center" data-bs-autohide="false" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        Inscrivez-vous et accéder aux projets
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </section>
</main>