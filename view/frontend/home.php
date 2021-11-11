<?php ob_start(); ?>

    <div class="image_instagram ">
        <img src="../../public/wallpaper/sum.jpg" id="img-home" class="img-home" alt="...">
        <h1 id="author_name"> Tatyana</h1>
    </div>
    <div>
        <p class="author_description">
            <?php echo($edito); ?>
        </p>
    </div>
    <div class="set_images" id="set_images">
        <?php
            foreach ($posts as $post)
            {
        ?>
        <figure class="figure">
            <a class="article" href="?controller=PostController&action=showPostById&id=<?= $post->getId() ?>"
                   title="Voir l'oeuvre">
                <figcaption class="figure-caption">
                    <h1>
                        <?php echo $post->getTitle() ?>
                    </h1> <br> 
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
