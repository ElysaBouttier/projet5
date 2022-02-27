<?php ob_start(); ?>
<div id="overlay">
</div>
<!-- main img -->
<div class="image_instagram col-12">
    <img src="../../public/img/grey.jpg" id="img-home" class="img-home col-10" alt="...">
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
            <figcaption class="article">
                <a class="figure-caption" href="?controller=PostController&action=showPostById&id=<?= $post->getId() ?>" title="Voir l'oeuvre">
                    <img src="../../public/img/<?php echo $post->getMiniatureImg() ?>" class="figure-img" alt="...">
                </a>
                <span class="figcaption-span">
                    <h1 class="title-caption">
                        <?php echo $post->getTitle() ?>
                    </h1>
                    <p>
                        <?php echo $post->getContent() ?>
                    </p>
                </span>
            </figcaption>
        </figure>
    <?php
    }
    ?>
</div>

<!-- JS -->
<script src="../../public/js/front.js"></script>
<script src="../../public/js/main.js"></script>

<?php $content = ob_get_clean(); ?>

<!-- Vue require -->
<?php require_once('template.php'); ?>