<?php
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/UserDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
$activeMenu = 'search';

$userDao = new UserDaoMysql($pdo);

$searchTerm = filter_input(INPUT_GET, 's');
if(empty($searchTerm)){
    header('Location: '.$base);
    exit;
}


require 'partials/header.php';
require 'partials/menu.php';
?>
<section class="feed mt-10">

    <div class="row">
        <div class="column pr-5">

            <h2>Pesquisa por: <?=$searchTerm;?></h2>

        </div>
        <div class="column side pl-5">
            
            <div class="box banners">
                <div class="box-header">
                    <div class="box-header-text">Patrocinios</div>
                    <div class="box-header-buttons">
                        
                    </div>
                </div>
                <div class="box-body">
                    <a href=""><img src="assets/images/php-nivel-1.jpg" /></a>
                    <a href=""><img src="assets/images/php-nivel-1.jpg" /></a>
                </div>
            </div>
            <div class="box">
                <div class="box-body m-10">
                    Criado com ❤️ por B7Web
                </div>
            </div>
            
        </div>
    </div>

</section>
<?php
require 'partials/footer.php';
?>