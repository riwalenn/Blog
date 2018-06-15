<?php
//echo "Controller is ok !<br/>";
// Chargement des classes
require_once('model\PostManager.php');
require_once('model\CommentManager.php');

//Controller displaying all posts group by 5-pack
function listPosts()
{
    $postManager = new \TP_MVC\Blog\Model\PostManager(); 

    $posts = $postManager->getPosts();
    $nbPages = $postManager->getNbPages(); 

    require ('view\frontend\listPostsView.php');
}

//Controller that assumes displaying one post and its comments
function post()
{
    $postManager = new \TP_MVC\Blog\Model\PostManager();
    $commentManager = new \TP_MVC\Blog\Model\CommentManager();
    
    $nbPagesC = $commentManager->getNbPagesC();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->listComments($_GET['id']);

    require ('view\frontend\postView.php');
}


function comment()
{
    $postManager = new \TP_MVC\Blog\Model\PostManager();
    $commentManager = new \TP_MVC\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $viewComment = $commentManager->viewComment($_GET['idC']);
    require ('view\frontend\commentView.php');
}

//Controller able to post comments on each post
function addComment($postId, $author, $comment)
{
    $commentManager = new \TP_MVC\Blog\Model\CommentManager();

    $addComment = $commentManager->addComment($postId, $author, $comment);

    if ($addComment === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=Viewpost&id=' . $postId);
    }
}

#Editer un commentaire
function editComment($viewCommentId, $comment)
{
    $postManager = new \TP_MVC\Blog\Model\PostManager();
    $commentManager = new \TP_MVC\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $editComment = $commentManager->editComment($viewCommentId, $comment);
    if ($editComment === false){
        throw new Exception('Impossible de modifier le commentaire');
        
    }else{
        header('Location: index.php?action=Viewpost&id=' . $_GET['id']);
    }
}