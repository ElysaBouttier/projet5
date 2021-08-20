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

        <div class="d-flex">
            <p class="text-end">Titre :</p>
            <label for="text-first-img" class="">
                <input class="" type="text-first-img" id="text-first-img" name="text-first-img" placeholder="Titre de l'image">
            </label>
        </div>

        <div class="d-flex">
            <p class="text-end">Image :</p>
            <label for="image" class="">
                <input class="" type="file" id="image" name="image" accept="image/png, image/jpeg">
            </label>
        </div>
        <input type="submit" class="d-flex justify-content-center mx-auto" value="Se Connecter">
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<!-- Vue require -->
<?php require_once('./view/frontend/template.php'); ?>