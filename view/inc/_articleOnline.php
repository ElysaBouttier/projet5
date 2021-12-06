<h3><u>Articles en lignes</u></h3>
<br />
<br />
<!-- Table on pannel config -->
<table class="table table-striped table-hover" id="onlinePosts">
    <thead>
        <tr>
            <th class="text-center">Titre</th>
            <th class="text-center">Description</th>
            <th class="text-center">Dernière modification</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <?php
    if ($postsPagination != null) {
        foreach ($postsPagination as $index => $post) {
    ?>
            <tbody>
                <tr <?php echo $index % 2 ? ' class="even"' : ''; ?>>
                    <td><a href="?controller=PostController&action=showPostById&id=<?= $post->getId() ?>" title="Lire le billet"><?= (html_entity_decode($post->getTitle())) ?></a></td>

                    <td><?= substr(nl2br(html_entity_decode($post->getContent())), 0, 15) ?></td>
                    <td><?= $post->getUpdateDate() ?></td>
                    <td>
                        <a href="?controller=PostController&action=showEditPostView&id=<?= $post->getId() ?>" title="Modifier le billet">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
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