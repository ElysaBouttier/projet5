<h3><u>Articles en lignes</u></h3>
<br />
<br />
<!-- Table on pannel config -->
<table class="table table-striped table-hover" id="onlinePosts">
    <thead>
        <tr>
            <th class="text-center">Titre</th>
            <th class="text-center">Date de publication</th>
            <th class="text-center">Dernière modification</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <?php
    foreach ($posts as $post) {
    ?>
        <tbody align="center">
            <tr>
                <td><a href="?controller=PostController&action=showAction&blogpost_id=<?= $post->getId() ?>" title="Lire le billet"><?= (html_entity_decode($post->getTitle())) ?></a></td>
                <td><?= $post->getCreationDate() ?></td>
                <td><?= $post->getUpdateDate() ?></td>
                <td align="center">
                    <a href="?controller=AdminController&action=editPostAction&blogpost_id=<?= $post->getId() ?>" title="Modifier le billet">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a href="?controller=AdminController&action=deletePostAction&blogpost_id=<?= $post->getId() ?>" title="Supprimer le billet" onclick="return(confirm('ATTENTION ! Voulez-vous définitivement supprimer ce billet ?'))">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        </tbody>
    <?php
    }
    ?>
</table>

<hr>