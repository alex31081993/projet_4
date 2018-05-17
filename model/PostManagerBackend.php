<?php

namespace model;


use entity\Comment;
use entity\Post;

class PostManagerBackend extends Manager
{
    public function postContent(Post $post)
    {
        $db = $this->dbConnect();
        $contents = $db->prepare('INSERT INTO posts(title, chapeau, content, creation_date) VALUES(?, ?, ?, NOW())');
        $data = $contents->execute(array($post->getTitle(), $post->getChapeau(), $post->getContent()));

        $post = new Post();
        $post->hydrate($data);

        return $post;
    }

    public function deleteContent($id)
    {
        $db = $this->dbConnect();
        $contents = $db->prepare('DELETE FROM posts WHERE id =?');
        $data = $contents->execute(array($id));

        $deletePost = new Post();
        $deletePost->hydrate($data);

        return $deletePost;
    }

    public function deleteComments($id)
    {
        $db = $this->dbConnect();
        $contents = $db->prepare('DELETE FROM comments WHERE post_id =?');
        $data = $contents->execute(array($id));

        $deleteComments = new Post();
        $deleteComments->hydrate($data);

        return $deleteComments;
    }

    public function deleteComment(Comment $comment)
    {
        $db = $this->dbConnect();
        $contents = $db->prepare('DELETE FROM comments WHERE id =?');
        $data = $contents->execute(array($comment->getId()));

        $deleteComment = new Post();
        $deleteComment->hydrate($data);

        return $deleteComment;
    }

    public function updatePost(Post $post)
    {
        $db = $this->dbConnect();
        $contents = $db->prepare('UPDATE posts  set id = ?, title = ?, chapeau = ?, content = ?, creation_date = now() WHERE id =' .$post->getId());
        $data = $contents->execute(array($post->getId(), $post->getTitle(), $post->getChapeau(), $post->getContent()));

        $updatePost = new Post();
        $updatePost->hydrate($data);

        return $updatePost;

    }
}