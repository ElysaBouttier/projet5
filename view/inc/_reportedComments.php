<h3><u>Commentaires signalés</u></h3>
<br />
<br />

<!-- Commentaires DESKTOP -->
<table class="table table-striped table-hover" id="reportedComments">
    <thead>
        <tr>
            <th class="text-center">Nom de l'oeuvre</th>
            <th class="text-center">Auteur</th>
            <th class="text-center">Date de publication</th>
            <th class="text-center">Commentaire</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <?php
    if ($commentsPagination != null) {
    foreach ($comments as $comment) {
    ?>
        <tbody>
            <tr>
                <td><a href="?controller=PostController&action=showPostById&id=<?= $post->getId() ?>"
                   title="Lire le billet"><?= (html_entity_decode($post->getTitle())) ?></a></td>
                <td><?php echo html_entity_decode($comment->getUsername()) ?></td>
                <td><?= $comment->getDate() ?></a></td>
                <td><a href="?controller=PostController&action=showPostById&id=<?= $post->getId() ?>"
                   title="Lire le billet"><?= $comment->getContent() ?></a></td>
                <td>
                    <a href="?controller=CommentController&action=validComment&id=<?= $comment->getId() ?>" title="Valider le commentaire">
                        <i class="fas fa-solid fa-check"></i>
                    </a>
                    <a href="?controller=CommentController&action=deleteComment&id=<?= $comment->getId() ?>" title="Supprimer le commentaire">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        </tbody>
    <?php
    }}
    ?>
</table>
<?php
if ($commentsPagination != null) {
    $commentsNum->render();
}
?>
