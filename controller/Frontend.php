<?php

namespace controller;

class Frontend extends Controller
{
    private $postManager;
    private $commentManager;

    public function __construct($postManager, $commentManager)
    {

        $this->postManager = $postManager;
        $this->commentManager = $commentManager;

    }

    public function listPosts()
    {
        $posts = $this->postManager->getPosts();
        if ($posts === false) {
            throw new \Exception('Impossible d\'afficher les posts');
        } else {
            $this->render('view/frontend/listPostsView.php' , [
                'posts' => $posts,
            ]);
        }
    }

    public function post()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $post = $this->postManager->getPost($_GET['id']);
            $comments = $this->commentManager->getComments($_GET['id']);
            if ($post === false && $comments === false) {
                throw new \Exception('Impossible d\'afficher le post');
            } else {
                $this->render('view/frontend/postView.php' , [
                    'post' => $post,
                    'comments' => $comments,
                ]);
            }
        } else {
            throw new \Exception('Aucun identifiant de billet envoyé');
        }
    }

    public function addComment($postId, $author, $comment)
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                $affectedLines = $this->commentManager->postComment($postId, $author, $comment);
                if ($affectedLines === false) {
                    throw new \Exception('Impossible d\'ajouter le commentaire !');
                } else {
                    $this->redirct('index.php?action=post&id=' . $postId);
                }
            } else {
                throw new \Exception('Tous les champs ne sont pas remplis !');
            }
        } else {
            throw new \Exception('Aucun identifiant de billet envoyé');
        }
    }

}