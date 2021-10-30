<?php ob_start(); ?>


<div class="container">
    <?php var_dump($post) ?>
    <h1 class="col-md-6 offset-md-3 title_blog"><?php echo html_entity_decode($post->getTitle()) ?></h1>

    <div class="content_body">

        <div class="col-10 carousel_img">
            <?php
            require_once('./view/inc/_article.php');
            ?>
        </div>
       <!-- add like/love notation system --> 
        <div class="like_activity col-9">
            <form class="" action="?controller=PostController&action=addThumb&id=<?php echo $post->getId() ?>" method="POST" enctype="multipart/form-data">
                <div class="like-fontawesome">
                    <button type="submit" class="fontawesome-btn">
                    <i class="far fa-thumbs-up img-fontawesome"></i>
                    <p class="number-fontawesome">5</p>
                    </button>
                </div>
            </form>

            <form class="" action="?controller=PostController&action=addLove&id=<?php echo $post->getId() ?>" method="POST" enctype="multipart/form-data">
                <div class="like-fontawesome">
                    <button type="submit" class="fontawesome-btn">
                    <i class="far fa-heart img-fontawesome"></i>
                    <p class="number-fontawesome-heart">5</p>
                    </button>
                </div>
            </form>
        </div>

        <div class="comments col-12">
            <?php
            if (isset($_SESSION) && !empty($_SESSION) && $_SESSION['is_admin'] != 0) {
            ?>
                <div class="col-5">

                    <?php
                    require_once('./view/inc/_addComment.php');
                    ?>
                </div>
            <?php
            }
            ?>
            <div class="col-5">
                <?php
                require_once('./view/inc/_showComment.php');
                ?>
            </div>
        </div>

    </div>

</div>

<?php $content = ob_get_clean(); ?>

<!-- Vue require -->
<?php require_once('template.php'); ?>