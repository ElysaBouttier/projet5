<div class="row">
    
    <div>
    <h4>Ajouter un commentaire : </h4><br />

    <form action="?controller=CommentController&action=addComment&id=<?php echo $_GET['id'] ?>" method="post">            
            <label for="username">Auteur : </label><br>
            <input id="username" name="username" class="form-control" value="<?php echo $_SESSION['username'] ?>" readonly="readonly" /><br>
            <label for="content" class="add-comment-label">Contenu : </label><br>
            <textarea id="content" name="content" class="form-control" value=""></textarea><br>
            <input type="submit" class="btn btn-primary" value="Publier">
    <form>
    </div>
     
</div>
