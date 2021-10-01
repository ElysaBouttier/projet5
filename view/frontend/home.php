<?php ob_start(); ?>

    <div class="image_instagram ">
        <img src="../../public/img/beige2.jpg" class="img-home" alt="...">
        <h1 class="author_name"> T a t y a n a </h1>
    </div>
    <div>
        <p class="author_description">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
    </div>
    <div class="set_images" id="set_images">
        <?php
            foreach ($posts as $post)
            {
        ?>
        <figure class="figure">
            <a href="" class="article">
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
