<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Healthkeep - Main</title>
    <meta name="viewport" content="initial-scale = 1, user-scalable = no">
    <link rel="stylesheet" href="resourses/css/bootstrap.css">
    <link rel="stylesheet" href="resourses/css/styles.css">
    <script src="resourses/js/jquery-2.1.0.js"></script>
    <script src="resourses/js/bootstrap.js"></script>
</head>
<body>
<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href='<?php echo WEB_URL ;?>'>
                <div class="logo">
                    <img src="resourses/img/logo.png">
                    <p>Health<span>Keep</span></p>
                </div>
            </a>
        </div>
        <nav class="navbar-collapse bs-navbar-collapse collapse" role="navigation" style="height: 1px;">
            <ul class="nav navbar-nav">
                <li class="search inp-group">
                    <input type="text" class="" placeholder="Search"><span><i class="glyphicon glyphicon-search"></i></span>
                </li>
            </ul>
            <div class="alerts">
                <a href="<?php echo WEB_URL ;?>/msg" class="mail">
                    <?php if (defined('PROFILE_MSGS') && PROFILE_MSGS > 0): ?><div class="circle red flex-center"><span id="topInboxCount"><?php echo PROFILE_MSGS; ?></span></div><?php endif; ?>
                </a>
                <a href="#" class="user"></a>
            </div>
        </nav>
    </div>
</header>
<div class="container page-container">
    <div class="row">
