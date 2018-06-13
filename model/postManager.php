<?php
namespace TP_MVC\Blog\Model;

require_once('manager.php');
class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        if(isset($_GET['page'])){
            $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY id DESC LIMIT '.(($_GET['page']-1)*5).',5') or die(print_r($db->errorInfo()));
        }else{
            $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY id DESC LIMIT 0, 5');
        }

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function getNbPages(){
        $db = $this->dbConnect();
        $selectCount = $db->query('SELECT COUNT(*) AS nb_posts FROM posts');
        $count = $selectCount->fetch();

        return $count['nb_posts']/5;
    }
}