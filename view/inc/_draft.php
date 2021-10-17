<h3><u>Brouillons enregistrés</u></h3>
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
    foreach ($drafts as $draft)
    {
        ?>
        <tbody align="center">
        <tr>
            <td><a href="?controller=PostController&action=showPostById&id=<?= $draft->getId() ?>"
                   title="Lire le billet"><?= (html_entity_decode($draft->getTitle())) ?></a></td>
                   
            <td><?= substr(nl2br(html_entity_decode($draft->getContent())), 0, 15) ?></td>
            <td><?= $draft->getUpdateDate() ?></td>
            <td align="center">
                <a href="?controller=PostController&action=showEditPostView&id=<?= $draft->getId() ?>"
                   title="Modifier le billet">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                <a href="?controller=PostController&action=deletePost&id=<?= $draft->getId() ?>"
                   title="Supprimer le billet"
                   onclick="return(confirm('ATTENTION ! Voulez-vous définitivement supprimer ce Brouillon ?'))">
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