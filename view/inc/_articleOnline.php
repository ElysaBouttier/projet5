<h3><u>Articles en lignes</u></h3>
<br />
<br />
<!-- Table on pannel config -->
<table class="table table-striped table-hover" id="onlinePosts">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Dernière modification</th>
            <th class="pannel-th-action">Action</th>
        </tr>
    </thead>
    <?php
    if ($postsPagination != null) {
        foreach ($postsPagination as $index => $post) {
    ?>
            <tbody>
                <tr <?php echo $index % 2 ? ' class="even"' : ''; ?>>
                    <td><a href="?controller=PostController&action=showPostById&id=<?= $post->getId() ?>" title="Lire le billet"><?= (html_entity_decode($post->getTitle())) ?></a></td>

                    <td><?= substr(nl2br(html_entity_decode($post->getContent())), 0, 100) ?></td>
                    <td class="pannel-td-date"><?= $post->getUpdateDate() ?></td>
                    <td class="pannel-td-action">
                        <a href="?controller=PostController&action=showEditPostView&id=<?= $post->getId() ?>" title="Modifier le billet"><i class="fas fa-pencil-alt"></i></a>
                        <a href="?controller=PostController&action=deletePost&id=<?= $post->getId() ?>" title="Supprimer le billet" onclick="return(confirm('ATTENTION ! Voulez-vous définitivement supprimer cet article ?'))">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            </tbody>

    <?php
        }
    }
    ?>
</table>
<?php
if ($postsPagination != null) {
    $postsNum->render();
}
?>