<?php
require 'config.php';
require 'models/Auth.php';
require 'dao/PostDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
$activeMenu = 'home';

$postDao = new PostDaoMysql($pdo);
$feed= $postDao->getHomeFeed($userInfo->id);

echo '<pre>';
print_r($feed);
exit;

require 'partials/header.php';
require 'partials/menu.php';
?>
<section class="feed mt-10">

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