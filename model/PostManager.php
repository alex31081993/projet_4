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
	    	$post->setId($data['id']);
	    	$post->setTitle($data['title']);
	    	$post->setChapeau($data['chapeau']);
	    	$post->setContent($data['content']);
	    	$post->setCreationDate($data['creation_date_fr']);

	    	$posts[] = $post;
	    }

        return $posts;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, chapeau, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
}