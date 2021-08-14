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
        <figure class="figure">
            <a href="" class="article">
                <figcaption class="figure-caption">A caption for the above image.</figcaption>
                <img src="../../public/img/beige.jpg" class="figure-img" alt="...">
            </a>
        </figure>
        <figure class="figure">
            <a href="" class="article">
                <figcaption class="figure-caption">A caption for the above image.</figcaption>
                <img src="../../public/img/beige1.jpg" class="figure-img " alt="...">
            </a>
        </figure>
    </div>

<?php $content = ob_get_clean(); ?>

<!-- Vue require -->
<?php require_once('template.php'); ?>
