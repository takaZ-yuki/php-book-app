<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= "PHP質問広場: {$this->fetch('title')}" ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->script('main.js') ?>
    <?= $this->Html->css('app.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

<header class="header">
<nav class="navbar navbar-expand-lg navbar-light background-white">
        <div class="container col-md-7 col-12">
            <a class="navbar-brand" href="/">
                <i class="fas fa-tree"></i> PHP質問広場
            </a>

            <button
                type="button"
                class="navbar-toggler"
                data-toggle="collapse"
                data-target="#Navber">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="Navber">
                <?php if ($this->request->getSession()->read('Auth.User.id')): ?>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <?= $this->Html->link('質問一覧',
                            ['controller' => 'Questions', 'action' => 'index'], ['class' => 'nav-link']) ?>
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link('質問を投稿する',
                            ['controller' => 'Questions', 'action' => 'add'], ['class' => 'nav-link']) ?>
                        </li>
                    </ul>
                <?php endif; ?>

                <ul class="navbar-nav ml-auto">
                    <?php if ($this->request->getSession()->read('Auth.User.id')): ?>
                        <li class="nav-item">
                            <?= $this->Html->link($this->request->getSession()->read('Auth.User.nickname'),
                                ['controller' => 'Users', 'action' => 'edit'], ['class' => 'nav-link']) ?>
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link('ログアウト',
                                ['controller' => 'Logout', 'action' => 'index'], ['class' => 'nav-link']) ?>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <?= $this->Html->link('ユーザー登録',
                                ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-link']) ?>
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link('ログイン',
                                ['controller' => 'Login', 'action' => 'index'], ['class' => 'nav-link']) ?>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<?= $this->Flash->render() ?>

<?= $this->fetch('sub-header') ?>

<section class="main background-light">
    <div class="container pt-5 col-md-7 col-12">
        <?= $this->fetch('content') ?>
    </div>
</section>

<footer class="footer background-dark d-flex justify-content-center align-items-center">
    <small>© <?= date('Y') ?> PHP質問広場 All Rights Reserved.</small>
</footer>

</body>
</html>
