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
    <script src="resourses/js/hk-main.js"></script>

</head>
<body>

<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">
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
            <ul class="nav navbar-nav sidebar hidden-lg hidden-md hidden-sm">
                <li class="sb-item">
                    <a href="#">My profile</a>
                </li>
                <li class="sb-item">
                    <a href="#">My Diary</a>
                </li>
                <li class="sb-item">
                    <a href="#">Meet Others</a>
                </li>
                <li class="sb-item">
                    <a href="#">My Team</a>
                </li>
                <li class="sb-item">
                    <a href="#">My Doctors</a>
                </li>
                <li class="sb-item iconed">
                    <a href="#">
                        <i class="glyphicon glyphicon-envelope"></i>
                        <div>
                            <p>Message</p>
                            <p>My Doctor</p>
                        </div>
                    </a>
                </li>
                <li class="sb-item iconed">
                    <a href="#">
                        <i class="glyphicon glyphicon-pencil"></i>
                        <div>
                            <p>Request</p>
                            <p>Accountment</p>
                        </div>
                    </a>
                </li>
                <li class="sb-item iconed">
                    <a href="#">
                        <i class="glyphicon glyphicon-edit"></i>
                        <div>
                            <p>Request</p>
                            <p>Rx Refill</p>
                        </div>
                    </a>
                </li>
                <li class="sb-item">
                    <a href="#">Conditions</a>
                </li>
                <li class="sb-item">
                    <a href="#">Symptoms</a>
                </li>
                <li class="sb-item">
                    <a href="#">Medications</a>
                </li>
                <li class="sb-item">
                    <a href="#">Procedures</a>
                </li>
            </ul>
            <div class="alerts">
                <a href="#" class="mail">
                    <div class="circle red flex-center"><span>3</span></div>
                </a>
                <a href="#" class="user"></a>
            </div>
        </nav>
    </div>
</header>