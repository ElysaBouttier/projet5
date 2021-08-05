<?php ob_start(); ?>

<div class="container">
    <h1 class="col-md-6 offset-md-3 title_blog">Titre de l'article</h1>
        <?php
        require_once ('../inc/_article.php');
        ?>
<!-- add like/love notation system -->
<div class="row add_comments">

    <div class="col-6">
    <?php
    require_once ('../inc/_addComment.php');
    ?>
    </div>

    <div class=" col-6">
        <h3>Commentaires :</h3>
        
    </div>

</div>

</div>

<?php $content = ob_get_clean(); ?>

<!-- Vue require -->
<?php require_once('template.php'); ?>
