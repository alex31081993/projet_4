<?php

namespace controller;

class Frontend
{

    public function listPosts()
    {
        $postManager = new \model\PostManager(); // Création d'un objet
        $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet
        if ($posts === false) {
            throw new Exception('Impossible d\'afficher les posts');
        } else {
            require('view/frontend/listPostsView.php');
        }
    }

    public function post()
    {
        $postManager = new \model\PostManager();
        $commentManager = new \model\CommentManager();

        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);
        if ($post === false && $comments === false) {
            throw new Exception('Impossible d\'afficher le post');
        } else {
            require('view/frontend/postView.php');
        }
    }

    public function addComment($postId, $author, $comment)
    {
        $commentManager = new \model\CommentManager();

        $affectedLines = $commentManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new \Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

}