<?php ob_start(); ?>

    
<div class="container">
    <h1 class="col-md-6 offset-md-3 title_blog">Titre de l'article</h1>
        
<!-- add like/love notation system -->
<div class="add_comments">

    <div class="col-12">
        <?php
            require_once ('./view/inc/_article.php');
        ?>
    </div>

    <div class="comments col-12">
        <?php
            if (isset($_SESSION) && !empty($_SESSION) && $_SESSION['is_admin'] != 0 ) {
        ?>
            <div class="col-5">
                
                <?php
                    require_once ('./view/inc/_addComment.php'); 
                ?>
            </div>
        <?php
            }
        ?>
        <div class="col-5">
            <?php
                require_once ('./view/inc/_showComment.php');    
            ?>   
        </div>
    </div>

</div>

</div>

<?php $content = ob_get_clean(); ?>

<!-- Vue require -->
<?php require_once('template.php'); ?>
