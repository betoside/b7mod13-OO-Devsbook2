<?php
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/UserRelationDaoMysql.php';
require_once 'dao/UserDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();

$id = filter_input(INPUT_GET, 'id');

if(!empty($id)){

    $userRelationDao = new UserRelationDaoMysql($pdo);
    $userDao = new UserDaoMysql($pdo);

    $relation = new UserRelation();
    $relation->user_from = $userInfo->id;
    $relation->user_to = $id;

    if($userDao->findById($id)){
        if($userRelationDao->isFollowing($userInfo->id, $id)){
            $userRelationDao->delete($relation);
        } else {
            $userRelationDao->insert($relation);
        }
    }
    header('Location: '.$base.'/perfil.php?id='.$id);
    exit;
}
header('Location: '.$base);
exit;