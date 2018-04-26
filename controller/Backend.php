<?php

namespace controller;


class Backend extends Controller
{
    private $postManagerBackend;
    private $postManager;
    private $commentManager;
    private $connectAdminManager;

    public function __construct($postManagerBackend, $commentManager, $connectAdminManager, $postManager)
    {

        $this->postManagerBackend = $postManagerBackend;
        $this->commentManager = $commentManager;
        $this->connectAdminManager = $connectAdminManager;
        $this->postManager = $postManager;

    }

    public function addPost($title, $chapeau, $content)
    {
        if (isset ($_SESSION['pseudo'])) {
            if (!empty($_POST['title']) && !empty($_POST['chapeau']) && !empty($_POST['content'])) {
                $affectedLines = $this->postManagerBackend->postContent($title, $chapeau, $content);
                if ($affectedLines === false) {
                    throw new \Exception('Impossible d\'ajouter le post !');
                } else {
                    $this->redirct('index.php');
                }
            } else {
                throw new \Exception('Tous les champs ne sont pas remplis !');
            }
        } else {
            throw  new  \Exception('Vous n\'etes pas connecter !');
        }
    }

    public function viewAddPost()
    {
        if (isset ($_SESSION['pseudo'])) {
            require('view/backend/addPostView.php');
        } else {
            throw new \Exception('Vous etes pas autorisé a crée un post');
        }
    }

    public function viewPostAdmin()
    {
        if (isset ($_SESSION['pseudo'])) {
            $post = $this->postManager->getPost($_GET['id']);
            if ($post === false) {
                throw new \Exception('Aucun billet à modifier');
            } else {
                $this->render('view/backend/updatePostView.php', [
                    'post' => $post,
                ]);
            }
        } else {
            throw new \Exception('Vous n\'etes pas connecter !');
        }
    }

    public function viewAdminConnect()
    {
        require('view/backend/connectAdminView.php');
    }

    public function logOut()
    {
        $_SESSION = array();
        session_destroy();
        $this->redirct('index.php');
    }

    public function login()
    {
        if (!empty(htmlspecialchars($_POST['pseudo'])) and !empty(htmlspecialchars($_POST['pass']))) {
            $result = $this->connectAdminManager->getByPseudo($_POST['pseudo']);
            if ($result) {
                if (password_verify($_POST['pass'], $result->getPass())) {
                    session_start();
                    $_SESSION['pseudo'] = $_POST['pseudo'];
                    $this->redirct('index.php');
                } else {
                    $this->redirct('index.php?action=connectAdminView&error=1');
                }
            } else {
                $this->redirct('index.php?action=connectAdminView&error=1');
            }
        } else {
            throw new \Exception('Impossilbe d\'afficher la page demander !');
        }
    }

    public function deletePost()
    {
        if (isset ($_SESSION['pseudo'])) {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $affectedLines1 = $this->postManagerBackend->deleteContent($_GET['id']);
                $affectedLines2 = $this->postManagerBackend->deleteComments($_GET['id']);
                if (($affectedLines1 === false) and ($affectedLines2 === false)) {
                    throw new \Exception('Impossible de surpimer le post !');
                } else {
                    $this->redirct('index.php');
                }
            } else {
                throw new \Exception('Aucun identifiant de billet envoyé');
            }
        } else {
            throw new \Exception('Vous n\'etes pas connecter');
        }
    }


    public function deleteComment()
    {
        if (isset ($_SESSION['pseudo'])) {
            $deleteComment = $this->postManagerBackend->deleteComment($_GET['id']);
            if ($deleteComment === false) {
                throw new \Exception('impossible de suprimer le commentaire');
            } else {
                $this->redirct('index.php');
            }
        } else {
            throw new \Exception('vous n\'etes pas connecter !');
        }
    }

    public function updatePost($id, $title, $chapeau, $content)
    {
        if (isset ($_SESSION['pseudo'])) {
            if (!empty($title) && !empty($chapeau) && !empty($content)) {
                $affectedLines = $this->postManagerBackend->updatePost($id, $title, $chapeau, $content);
                if ($affectedLines === false) {
                    throw new \Exception('Impossible d\'ajouter le post !');
                } else {
                    $this->redirct('index.php');
                }
            } else {
                throw new \Exception('Tout les champs ne sont pas remplis');
            }
        } else {
            throw new \Exception('Vous n\'etes pas connecter');
        }
    }

    public function reportComment($id)
    {
        if (isset($_GET['id'])) {
            $reportComment = $this->commentManager->reportComment($id);
            if ($reportComment === false) {
                throw new \Exception('Impossible de signalé le post');
            } else {
                $this->redirct('index.php');
            }
        } else {
            throw new \Exception('Aucun commentaire a signalé');
        }
    }

    public function reportCommentVerified($id)
    {
        if (isset($_GET['id'])) {
            $reportCommentVerified = $this->commentManager->reportCommentVerified($id);
            if ($reportCommentVerified === false) {
                throw new \Exception('Impossible de signalé le post');
            } else {
                $this->redirct('index.php');
            }
        } else {
            throw new \Exception('Aucun commentaire a signalé');
        }
    }

    public function adminView()
    {
        if (isset ($_SESSION['pseudo'])) {
            $commentsReport = $this->commentManager->getsCommentReport();
            if ($commentsReport === false) {
                throw new \Exception('impossible');
            } else {
                $this->render('view/backend/adminView.php', [
                    'comments' => $commentsReport,
                ]);
            }
        } else {
            throw new \Exception('Vous n\'etes pas connecter !');
        }
    }
}