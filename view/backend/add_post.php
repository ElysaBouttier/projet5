<?php ob_start(); ?>

<div class="container">

    <h1 class="text-center title-add-post">Créer un post</h1>
    <form action="?controller=PostController&action=addPost" method="POST">
        <div class="d-flex">
            <p class="text-end">Titre :</p>
            <label for="title" class="">
                <input class="" type="title" id="title" name="title" placeholder="Titre">
            </label>
        </div>

        <div class="d-flex">
            <p class="text-end">Image de présentation :</p>
            <label for="miniature-img" class="">
                <input class="input-add-post" type="file" id="miniature-img" name="miniature-img" accept="image/png, image/jpeg">
            </label>
        </div>
        <input type="submit" class="d-flex justify-content-center mx-auto" value="Créer l'oeuvre">
    </form>

    <p>Show last Post</p>
    <?php
        $lastPost->getTitle();
        $lastPost->getContent();
    ?>
    <form action="?controller=ImageController&action=addImage&post_id=<?= $post->getLastPostId()?>" method="POST">
        <div class="d-flex">
            <p class="text-end">Image de présentation :</p>
            <label for="miniature-img" class="">
                <input class="input-add-post" type="file" id="miniature-img" name="miniature-img" accept="image/png, image/jpeg">
            </label>
        </div>
        <br/>
        <div class="d-flex">
            <p class="text-end">Titre :</p>
            <label for="title" class="">
                <input class="" type="title" id="title" name="title" placeholder="Titre">
            </label>
        </div>
        <input type="submit" class="d-flex justify-content-center mx-auto" value="Créer l'oeuvre">
    </form>
    <p>btn ajout photo</p>
    <p> s'afficher fenetre modal avec form</p>
</div>

<?php $content = ob_get_clean(); ?>

<!-- Vue require -->
<?php require_once('./view/frontend/template.php'); ?>