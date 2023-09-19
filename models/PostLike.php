<?php
class PostLike {
    public $id;
    public $id_post;
    public $id_user;
    public $created_at;
}

interface PostLikeDAO{
    public function getLikeCount($id_post);
    public function isLiked($id_post, $id_user);
    public function likeToogle($id_post, $id_user);
}