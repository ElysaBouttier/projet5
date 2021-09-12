<?php ob_start(); ?>

<div class="container">

    <h1 class="text-center title-add-post">Créer un post</h1>
    <form class="add-post-form" action="?controller=PostController&action=addPost" method="POST">
        <div class="d-flex">
            <p class="text-start add-post-title-form">Titre :</p>
            <label for="title" class="add-post-label-title">
                <input class=".add-post-input-title" type="title" style="width:100%" id="title" name="title" placeholder="Titre">
            </label>
        </div>

        <div class="d-flex add-post-img-div">
            <p class="text-start  add-post-img-title">Image de présentation : </p>
            <label for="miniature-img" class="">
                <input class="input-add-post" type="file" id="miniature-img" name="miniature-img" accept="image/png, image/jpeg">
            </label>
        </div>
        <div class="d-flex row add-post-text-div">
            <p class="text-start  add-post-text-title">Texte de présentation :</p>
            <textarea id="story" name="story" rows="5" cols="33"></textarea>
        </div>
        <input type="submit" class="d-flex mx-auto btn btn-primary" value="Créer l'oeuvre">
    </form>

<!-- Uniquement si on a validé le post , après validation => autre controlleur-->

    <p>
        <button class="btn btn-primary">Ajouter une image</button>
    </p>
    <!-- Uniquement si image -->
    <p> Si article : afficher article</p>
</div>

<?php $content = ob_get_clean(); ?>

<!-- Vue require -->
<?php require_once('./view/frontend/template.php'); ?>