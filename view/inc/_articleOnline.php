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
                <td><a href="?controller=PostController&action=showPostById&id=<?= $post->getId() ?> "
                    title="Voir l'oeuvre"><?php (html_entity_decode($post->getTitle())) ?></a></td>
                <td><?php $post->getCreationDate() ?></td>
                <td><?php $post->getUpdateDate() ?></td>
                <td align="center">
                    <a href="?controller=PostController&action=editPostAction&id=<?= $post->getId() ?>" 
                    title="Modifier le billet">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a href="" title="Supprimer le billet">
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