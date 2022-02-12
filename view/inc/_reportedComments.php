<h3><u>Commentaires signalés</u></h3>
<br />
<br />

<!-- Commentaires DESKTOP -->
<table class="table table-striped table-hover" id="reportedComments">
    <thead>
        <tr>
            <th>Nom de l'oeuvre</th>
            <th>Auteur</th>
            <th>Date de publication</th>
            <th>Commentaire</th>
            <th class="pannel-th-action">Action</th>
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
                <td><?php //echo html_entity_decode($comment->getUsername($comment->getUserId())) ?></td>
                <td class="pannel-td-date"><?= $comment->getDate() ?></a></td>
                <td><a href="?controller=PostController&action=showPostById&id=<?= $post->getId() ?>"
                   title="Lire le billet"><?= $comment->getContent() ?></a></td>
                <td class="pannel-td-action">
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
