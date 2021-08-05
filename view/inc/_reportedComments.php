<h3><u>Commentaires signalés</u></h3>
<br />
<br />

<!-- Commentaires DESKTOP -->
<table class="table table-striped table-hover" id="reportedComments">
    <thead>
        <tr>
            <th class="text-center">Titre</th>
            <th class="text-center">Auteur</th>
            <th class="text-center">Date de publication</th>
            <th class="text-center">Commentaire</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <?php
    foreach ($comments as $comment) {
    ?>
        <tbody align="center">
            <tr>
                <td><?= $comment->getUsername() ?></td>
                <td><?= $comment->getTitleArticle() ?></td>
                <td><a href="?controller=PostController&action=showAction&blogpost_id=<?= $comment->getIdBlogPost() ?>" title="Lire le commentaire"><?= substr(nl2br(html_entity_decode($comment->getContent())), 0, 25) . '...' ?></a></td>
                <td><?= $comment->getDateCommentary() ?></td>
                <td>
                    <a href="?controller=AdminController&action=editCommentAction&commentary_id=<?= $comment->getIdCommentary() ?>" title="Valider le commentaire">
                        <i class="fas fa-solid fa-check"></i>
                    </a>
                    <a href="?controller=AdminController&action=deleteCommentAction&commentary_id=<?= $comment->getIdCommentary() ?>" title="Supprimer le commentaire" onclick="return(confirm('ATTENTION ! Voulez-vous définitivement supprimer ce commentaire ?'))">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        </tbody>
    <?php
    }
    ?>
</table>