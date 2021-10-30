<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 0"></button>
        <?php
        for ($i = 1; $i <= $imageCount; $i++) {
        ?>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $i ?>" aria-current="true" aria-label="Slide <?php echo $i ?>"></button>
        <?php
        }
        ?>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <!-- TODO : Si pas d'image pas de diapo // message : ajouter img pr visualiser post-->
            <img src="../../public/img/<?php echo $images[0]->getUrl()?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <p><?php echo $images[0]->getContent()?></p>
            </div>
        </div>
        <?php
        foreach ($images as $image) {
        ?>
            <div class="carousel-item">
                <img src="../../public/img/<?php echo $image->getUrl() ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <p><?php echo html_entity_decode($image->getContent()) ?> </p>
                    <p><?php echo html_entity_decode($imageCount) ?> nombre img </p>

                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>