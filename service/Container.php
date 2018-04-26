<?php

namespace service;

use controller\Backend;
use controller\Frontend;
use model\CommentManager;
use model\ConnectAdminManager;
use model\PostManager;
use model\PostManagerBackend;

class Container
{
    private $pdo;

    public function getPostManager()
    {
        return new PostManager($this->getPDO());
    }

    public function getCommentManager()
    {
        return new CommentManager($this->getPDO());
    }

    public function getControllerFrontend()
    {
        return new Frontend($this->getPostManager(), $this->getCommentManager());
    }

    public function getConnectAdminManager()
    {
        return new ConnectAdminManager($this->getPDO());
    }

    public function getPostManagerBackend()
    {
        return new PostManagerBackend($this->getPDO());
    }

    public function getControllerBackend()
    {
        return new Backend($this->getPostManagerBackend(), $this->getCommentManager(), $this->getConnectAdminManager(), $this->getPostManager());
    }

    public function getPDO()
    {
        if ($this->pdo === null) {
            $this->pdo = new \PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', '');
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        return $this->pdo;
    }
}