<?php
class Post {
    public $id;
    public $id_user;
    public $type; // text / photo
    public $created_at;
    public $body;
    public $mine;
    public $user;
    public $likeCount;
    public $liked;
    public $comments;
}

interface PostDAO {
    public function insert(Post $p);
    public function getUserFeed($id_user);
    public function getHomeFeed($id_user);
    public function getPhotosFrom($id_user);
}