<div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
    <!-- Carousel -->
    <div class="carousel-inner">
        <?php
        if ($images) {
        ?>
            <!-- First Img and Coment on carousel -->
            <div class="carousel-item active">
                <div class="carousel-img-div col-7">
                    <img src="../../public/img/<?php echo $images[0]->getUrl() ?>" class="carousel-img" alt="...">
                </div>
                <div class="caroussel-img-content">
                    <div class="carousel-caption">
                        <p class="carousel-caption-p"><?php echo $images[0]->getContent() ?></p>
                    </div>
                </div>
            </div>

            <!-- Img and comment on carousel -->
            <?php
            for ($i = 1; $i < count($images); $i++) {
            ?>
                <div class="carousel-item">
                    <div class="carousel-img-div col-7">
                        <img src="../../public/img/<?php echo $images[$i]->getUrl() ?>" class="carousel-img" alt="...">
                    </div>
                    <div class="caroussel-img-content">
                        <div class="carousel-caption">
                            <p class="carousel-caption-p"><?php echo html_entity_decode($images[$i]->getContent()) ?> </p>
                        </div>
                    </div>
                </div>
            <?php
            }
        }
        // Condition to see text if there 's no img on the article
        if (!$images) {
            ?>
            <p class="text-center">Ajoutez une image pour visualiser le post</p>
            <br>
        <?php
        }
        ?>
    </div>

    <?php
    if ($images) {
    ?>
        <!-- btn control -->
        <button class="carousel-control-prev carousel-control" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next carousel-control" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    <?php
    }
    ?>
</div>