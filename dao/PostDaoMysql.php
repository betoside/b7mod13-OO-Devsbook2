<?php
require_once 'models/Post.php';
require_once 'dao/UserRelationDaoMysql.php';
require_once 'dao/UserDaoMysql.php';
require_once 'dao/PostLikeDaoMysql.php';
require_once 'dao/PostCommentDaoMysql.php';

class PostDaoMysql implements PostDAO {

    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function insert(Post $p) {
        $sql = $this->pdo->prepare("INSERT INTO posts (
            id_user, type, created_at, body
        ) VALUES (
            :id_user, :type, :created_at, :body
        )");
        $sql->bindValue(":id_user", $p->id_user);
        $sql->bindValue(":type", $p->type);
        $sql->bindValue(":created_at", $p->created_at);
        $sql->bindValue(":body", $p->body);
        $sql->execute();
    }

    public function getUserFeed($id_user){
        // echo '<pre>';
        // var_dump($id_user);
        // exit;
        $array = [];
        
        $sql = $this->pdo->prepare("SELECT * FROM posts 
            WHERE id_user = :id_user
            ORDER BY created_at DESC");
        $sql->bindValue(':id_user', $id_user);
        $sql->execute();
            
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            $array = $this->_postListToObject($data, $id_user);
        }

        return $array;
    }

    public function getHomeFeed($id_user){

        $array = [];
        
        // 1. pegar a lista dos usuarios que EU/logado sigo
        $urDao = new UserRelationDaoMysql($this->pdo);
        $userList = $urDao->getFollowing($id_user);
        $userList[] = $id_user;

        // echo '<pre>';
        // print_r($userList);
        // exit;

        // 2. pegar posts ordenados pela data
        $sql = $this->pdo->query("SELECT * FROM posts 
            WHERE id_user IN (".implode(',', $userList).")
            ORDER BY created_at DESC");
            
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);

            // 3. transformar o resultado em objetos
            $array = $this->_postListToObject($data, $id_user);
        }

        return $array;
    }

    public function getPhotosFrom($id_user){
        $array = [];
        
        $sql = $this->pdo->prepare("SELECT * FROM posts 
            WHERE id_user = :id_user 
            AND type = 'photo'
            ORDER BY created_at DESC");

        $sql->bindValue(":id_user", $id_user);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            // 3. transformar o resultado em objetos
            $array = $this->_postListToObject($data, $id_user);
            // echo '<pre>';
            // var_dump($id_user) . '<br>';
            // var_dump($sql);
            // exit;
        }

        return $array;
    }

    private function _postListToObject($post_list, $id_user){
        // tem que retornar um array com varios objetos dentro dele.
        // $post_list
        // $id_user / avatar, nome
        
        
        $posts = [];
        $userDao = new UserDaoMysql($this->pdo);
        $postLikeDao = new PostLikeDaoMysql($this->pdo);
        $PostCommentDaoMysql = new PostCommentDaoMysql($this->pdo);
        
        foreach($post_list as $post_item){
            $newPost = new Post();
            $newPost->id = $post_item['id'];
            // $newPost->id_user = $post_item['id_user'];
            $newPost->type = $post_item['type'];
            $newPost->created_at = $post_item['created_at'];
            $newPost->body = $post_item['body'];
            $newPost->mine = false;
            
            if($post_item['id_user'] == $id_user){
                $newPost->mine = true;
            }
            
            // complementar com informações adicionais
            // informacoes do usuario
            // echo 'teste';
            // exit;
            // echo '<pre>';
            // var_dump($post_list) . '<br>';
            // var_dump($post_item);
            // exit;
            $newPost->user = $userDao->findById($post_item['id_user']);
            
            // informações sobre like
            $newPost->likeCount = $postLikeDao->getLikeCount($newPost->id);
            $newPost->liked = $postLikeDao->isLiked($newPost->id, $id_user);
            // echo $newPost->liked;
            // exit;

            // informações sobre comments
            $newPost->comments = $PostCommentDaoMysql->getComments($newPost->id);

            $posts[] = $newPost;
        }
        return $posts;
    }
}