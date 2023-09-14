<?php
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/UserDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();

$userDao = new UserDaoMysql($pdo);

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$birthdate = filter_input(INPUT_POST, 'birthdate');
$city = filter_input(INPUT_POST, 'city');
$work = filter_input(INPUT_POST, 'work');
$password = filter_input(INPUT_POST, 'password');
$password_confirmation = filter_input(INPUT_POST, 'password_confirmation');

// verificacoes mínimas
// tem que ter 2 infos: nome e email
if($nome && $email){

    $userInfo->name = $name;
    $userInfo->city = $city;
    $userInfo->work = $work;

    if($userInfo->email != $email){

        if($userDao->findByemail($email) === false){
            $userInfo->email = $email;
        } else {
            $_SESSION['flash'] = 'E-mail já existe.';
            header('Location: '.$base.'/configuracoes.php');
            exit;
        }

    }



    // $userDao->update($userInfo);
}
header('Location: '.$base.'/configuracoes.php');
exit;