<?php

namespace service;

use controller\Frontend;
use model\CommentManager;
use model\PostManager;

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
}