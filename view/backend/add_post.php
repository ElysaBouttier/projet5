<?php ob_start(); ?>

<div class="container">

    <h1 class="text-center title-add-post">Créer un post</h1>
    <form class="add-post-form" action="?controller=PostController&action=addPost" method="POST">
        <div class="d-flex">
            <p class="text-end add-post-title-form">Titre :</p>
            <label for="title" class="add-post-label-title">
                <input class=".add-post-input-title" type="title" style="width:100%" id="title" name="title" placeholder="Titre">
            </label>
        </div>

        <div class="d-flex row add-post-img-div">
            <p class="text-end  add-post-img-title">Image de présentation :</p>
            <label for="miniature-img" class="">
                <input class="input-add-post" type="file" id="miniature-img" name="miniature-img" accept="image/png, image/jpeg">
            </label>
        </div>
        <input type="submit" class="d-flex mx-auto" value="Créer l'oeuvre">
    </form>

    
    <p>btn ajout photo</p>
    <p> s'afficher fenetre modal avec form</p>
</div>

<?php $content = ob_get_clean(); ?>

<!-- Vue require -->
<?php require_once('./view/frontend/template.php'); ?>