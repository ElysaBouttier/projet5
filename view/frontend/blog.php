<?php ob_start(); ?>


<div class="container">
    <!-- Title of the article / draft -->
    <h1 class="col-md-6 offset-md-3 title_blog"><?php echo html_entity_decode($post->getTitle()) ?></h1>

    <div class="content_body">
        <div class="carousel_img">
            <!-- Carousel -->
            <?php
            require_once('./view/inc/_article.php');
            ?>
        </div>

        <!-- add like/love notation system -->
        <div class="like_activity col-9">
            <?php
            if (isset($_SESSION) && empty($_SESSION)) {
            ?>
                <div class="notations">
                    <div class="blog_icon">
                        <!-- Like notation -->
                        <div class="fontawesome-btn">
                            <i class="far fa-thumbs-up img-fontawesome"></i>
                        </div>
                        <!-- Love notation -->
                        <div class="fontawesome-btn">
                            <i class="far fa-heart img-fontawesome"></i>
                        </div>
                    </div>
                    <div class="count_notations">
                        <p class="number-fontawesome"><?php echo $post->getLikeQuantity() ?></p>
                        <p class="number-fontawesome-heart"><?php echo $post->getHeartQuantity() ?></p>
                    </div>

                </div>

            <?php
            } else {
            ?>

                <div class="notations">
                    <div class="blog_icon">
                        <!-- Like notation -->
                        <form class="" action="?controller=PostController&action=addThumb&id=<?php echo $post->getId() ?>" method="POST" enctype="multipart/form-data">
                            <div class="like-fontawesome">
                                <button class="fontawesome-btn" type="submit">
                                    <i class="far fa-thumbs-up img-fontawesome"></i>
                                </button>
                            </div>
                        </form>

                        <!-- Love notation -->
                        <form class="" action="?controller=PostController&action=addLove&id=<?php echo $post->getId() ?>" method="POST" enctype="multipart/form-data">
                            <div class="love-fontawesome">
                                <button type="submit" class="fontawesome-btn">
                                    <i class="far fa-heart img-fontawesome"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="count_notations">
                        <p class="number-fontawesome"><?php echo $post->getLikeQuantity() ?></p>
                        <p class="number-fontawesome-heart"><?php echo $post->getHeartQuantity() ?></p>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>


        <!-- Add comment system, only if user is connected -->
        <div class="comments col-9">
            <!-- Show comment system, for everybody -->
            <div class="blog_see_comment">
                <?php
                require_once('./view/inc/_showComment.php');
                ?>
            </div>

            <?php
            if (isset($_SESSION) && !empty($_SESSION)) {
            ?>
                <div class="blog_add_comment">
                    <?php
                    require_once('./view/inc/_addComment.php');
                    ?>
                </div>
            <?php
            }
            ?>

        </div>

    </div>

</div>

<?php $content = ob_get_clean(); ?>

<!-- Vue require -->
<?php require_once('template.php'); ?>