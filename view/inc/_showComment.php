<h3>Commentaires :</h3>
<?php
    // For each comments in the blog
    foreach ($comments as $comment) {
        echo "<br />";
        echo html_entity_decode($username) . ", le : " . $comment->getDate() . "<br />";
        echo html_entity_decode($comment->getContent()) . "<br />";
        if (isset($_SESSION) && !empty($_SESSION) && ($comment->getStatus() < 5)) {
            echo '<a href="?controller=PostController&action=alertComment&id=' . $comment->getId() . '&id=' . $comment->getPostId() . '" onclick="return(confirm(\'ATTENTION ! Voulez-vous vraiment signaler ce commentaire ?\'))">Signaler</a>';
            echo "<br />";
        }
    }
?>