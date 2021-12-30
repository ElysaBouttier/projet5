<?php ob_start(); ?>

<!-- main img -->
<div class="image_instagram col-12">
    <img src="../../public/wallpaper/.jpg" id="img-home" class="img-home col-10" alt="...">
    <h1 id="author_name" class="author_name col-8"> Tatyana</h1>
</div>

<!-- edito text -->
<div class="edito row">
    <p class="author_description col-11">
        <?php echo ($edito); ?>
    </p>
</div>

<!-- set of posts -->
<div class="set_images row" id="set_images">
    <?php
    foreach ($posts as $post) {
    ?>
            <figure class="figure">
                <a class="article" href="?controller=PostController&action=showPostById&id=<?= $post->getId() ?>" title="Voir l'oeuvre">
                    <figcaption class="figure-caption">
                        <h1 class="title-caption">
                            <?php echo $post->getTitle() ?>
                        </h1>
                        <p>
                            <?php echo $post->getContent() ?>
                        </p>
                    </figcaption>
                    <img src="../../public/img/<?php echo $post->getMiniatureImg() ?>" class="figure-img" alt="...">
                </a>
            </figure>
    <?php
    }
    ?>
</div>

<?php $content = ob_get_clean(); ?>

<!-- Vue require -->
<?php require_once('template.php'); ?>