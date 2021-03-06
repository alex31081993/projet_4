<?php

namespace model;

use entity\Post;

class PostManager extends Manager

{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, chapeau, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
        $posts = [];
        while ($data = $req->fetch(\PDO::FETCH_ASSOC)) {
            $post = new Post();
            $post->hydrate($data);
            $posts[] = $post;
        }
        return $posts;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, chapeau, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $data = $req->fetch(\PDO::FETCH_ASSOC);
        $post = new Post();
        $post->hydrate($data);
        return $post;
    }
}