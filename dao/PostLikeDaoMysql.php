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
        // echo $id_post . '<br>';
        // echo $id_user . '<br>';
        // exit;
        $sql = $this->pdo->prepare("SELECT * FROM postLikes 
            WHERE id_post = :id_post AND id_user = :id_user");
        $sql->bindValue(":id_post", $id_post);
        $sql->bindValue(":id_user", $id_user);
        $sql->execute();

        // echo $sql->rowCount();
        // echo $sql;
        // exit;
        
        if($sql->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function likeToogle($id_post, $id_user){
        if($this->isLiked($id_post, $id_user)){
            $sql = $this->pdo->prepare("DELETE FROM postLikes
            WHERE id_post = :id_post AND id_user = :id_user");
        } else {
            $sql = $this->pdo->prepare("INSERT INTO postLikes
            (id_post, id_user, created_at) VALUES 
            (:id_post, :id_user, NOW())");
        }
        $sql->bindValue(':id_post', $id_post);
        $sql->bindValue(':id_user', $id_user);
        $sql->execute();
    }

}