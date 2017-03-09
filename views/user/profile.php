<?php $title = 'Profile';?>
<?php include ROOT.'/views/user/noCatsHeader.php'?>

<h1 class='hello'>Hello Username</h1>
<ul>
    <li><a href="/edit"> Редактировать данные</a></li>
    <li><a href="/history"> Список покупок</a></li>
    <?php if($access): ?>
    <li><a href='/admin/console'> admin panel</a></li>
    <?php endif;?>
</ul>
<hr class='hier'>
<?php include ROOT.'/views/site/footer.php'?>