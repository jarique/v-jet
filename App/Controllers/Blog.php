<?php

namespace App\Controllers;

use App\Config;
use Core\View;
use App\Models\Post;
use App\Models\Comment;

class Blog extends \Core\Controller
{
    public function showPostsAction()
    {
        $posts = (new Post())->findAll();

        View::renderTemplate('Blog/show_posts.html', [
            'base_url' => BASE_URL,
            'posts'    => $posts
        ]);
    }

    public function showPostAction()
    {
        $id = $this->routeParams['id'];

        $post = (new Post())->findOneById($id);

        $comments = (new Comment())->findAllByPostId($id);

        View::renderTemplate('Blog/show_post.html', [
            'post'     => $post,
            'comments' => $comments,
        ]);
    }

    public function addPostAction()
    {
        return;
    }

    public function addCommentAction()
    {
        return;
    }
}
