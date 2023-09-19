<?php
class PostLikeDaoMysql {

    private $pdo;

    public function __construct(PDO $driver){
        $this->pdo =  $driver;
    }

    public function getLikeCount($id_post){
        $sql = $this->pdo->prepare("SELECT COUNT(*) as c FROM postLikes WHERE id_post = :id_post");
        $sql->bindValue(":id_post", $id_post);
        $sql->execute();
        $data = $sql->fetch();
        return $data['c'];
    }

    public function isLiked($id_post, $id_user){

    }

    public function likeToogle($id_post, $id_user){

    }

}