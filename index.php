<?php
//echo "index is ok !<br />";
require('controller\frontend.php');

try {
    if (isset($_GET['action'])){
        $action = $_GET['action'];
        switch ($action) {
        case 'listPosts':
            ###liste des 5 derniers billets du blog
            listPosts();
            break;

        case 'Viewpost':
            ###Voir un billet du blog
            if (isset($_GET['id']) AND $_GET['id']>0){
                post();
            }else{
                throw new Exception('Aucun identifiant de billet envoyé');
                
            }
            break;

        case 'addComment':
            ###ajouter un commentaire
            addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            break;

        case 'viewComment':
            comment();
            break;

        case 'editComment':
            editComment($_GET['idC'], $_POST['comment']);
            break;
        
        default:
            ###liste des 5 derniers billets du blog
            listPosts();
            break;
        }
    }
    else{
        ###liste des 5 derniers billets du blog
        listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
