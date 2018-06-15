<?php $title = 'Les nouvelles technologies'; ?>
<?php //echo "Vue des posts is ok !<br/>"; ?>

<?php ob_start(); ?>
<h1>Les nouvelles technologies !</h1>

<?php
    while($data = $posts->fetch()){
?>
        <div class="news">
            <h3>
                <?= htmlspecialchars($data['title']) ?>
                <em>le <?= $data['creation_date_fr'] ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($data['content'])) ?>
                <br />
                <em><a href="index.php?action=Viewpost&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
            </p>
        </div>
    <?php
    }
    $posts->closeCursor();
    ?>
 <!-- Affiche le nombre de pages d'articles à afficher (par convention, une page affiche 5 articles) -->
    <p>Page :
        <?php for($looper = 0; $looper <= $nbPages; $looper++){
?>
    <a href="index.php?action=listPosts&page=<?= $looper+1 ?>">
        <?= $looper+1 ?>
    </a>
<?php
    }
?>
    </p>
<?php $content = ob_get_clean(); ?>

<?php require'template.php'; ?>