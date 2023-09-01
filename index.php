<?php
require 'config.php';
require 'models/Auth.php';
require 'dao/UserRelationDaoMysql.php';


$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
$activeMenu = 'home';

//  pegar os feeds
// 1. pegar a lista dos usuarios que EU/logado sigo
$urDao = new UserRelationDaoMysql($pdo);
$userList = $urDao->getRelationsFrom($userInfo->id);

echo '<pre>';

print_r($userList);
exit;

// 2. por enqto criar umas relacoes fakes para testes
// 3. transformar o resultado em objetos


require 'partials/header.php';
require 'partials/menu.php';
?>
<section class="feed mt-10">

<?php
// echo '<pre>';
// print_r($userInfo);
?>
    <div class="row">
        <div class="column pr-5">
        
            <?php require 'partials/feed-editor.php'; ?>

        </div>
        <div class="column side pl-5">
            222
        </div>
    </div>

</section>
<?php
require 'partials/footer.php';
?>