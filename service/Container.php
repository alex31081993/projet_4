<?php

namespace service;

use controller\Backend;
use controller\Frontend;
use model\CommentManager;
use model\ConnectAdminManager;
use model\PostManager;
use model\PostManagerBackend;

class Container {

    public function getPostManager()
    {
        return new PostManager();
    }

    public function getCommentManager()
    {
        return new CommentManager();
    }

    public function getControllerFrontend()
    {
        return new Frontend($this->getPostManager(), $this->getCommentManager());
    }

    public function getConnectAdminManager()
    {
        return new ConnectAdminManager();
    }

    public function getPostManagerBackend()
    {
        return new PostManagerBackend();
    }

    public function getControllerBackend()
    {
        return new Backend($this->getPostManagerBackend(), $this->getCommentManager(), $this->getConnectAdminManager(), $this->getPostManager());
    }
}