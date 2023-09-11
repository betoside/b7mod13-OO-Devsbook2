<?php
class UserRelation {
    private $id;
    private $user_from;
    private $user_to;

}

interface UserRelationDAO {
    public function insert(UserRelation $u);
    public function getFollowing($id);
    public function getFollowers($id);
}