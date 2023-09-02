<?php
class Post {
    public $id;
    public $id_user;
    public $type; // text / photo
    public $created_at;
    public $body;
    public $mine;
    public $user;
}

interface PostDAO {
    public function insert(Post $p);
    public function getHomeFeed($id_user);
}