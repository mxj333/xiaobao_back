<?php
    $cakeDescription = '销保网';
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap/bootstrap.css') ?>
    <?= $this->Html->css('main.css') ?>

    <?php echo  $this->Html->script(array('jquery/jquery.min', 'bootstrap/bootstrap.min', 'public'));?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div class="container">
        <?= $this->Flash->render() ?>
        <!-- Begin page content -->
        <?= $this->fetch('content') ?>  
    </div>  
    <footer>
        <nav class="navbar navbar-default navbar-fixed-bottom">
            <div class="container-fluid">
                <ul class="nav nav-pills nav-justified">
                    <li role="presentation"><a href="/home">主页</a></li>
                    <li role="presentation" class="active"><a href="/home/start">考试</a></li>
                    <li role="presentation" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">我的<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">修改资料</a></li>
                            <li><a href="#">退出</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </footer>
</body>
</html>
