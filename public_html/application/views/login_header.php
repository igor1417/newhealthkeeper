<!DOCTYPE html>
<html>
<head>
    <title>Healthkeep - Main</title>
    <meta name="viewport" content="initial-scale = 1, user-scalable = no">
    <link rel="stylesheet" href="<?= base_url(); ?>resourses/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url(); ?>resourses/css/styles.css">
    <script src="<?= base_url(); ?>resourses/js/jquery-2.1.0.js"></script>
    <script src="<?= base_url(); ?>resourses/js/bootstrap.js"></script>
    <script>
		function registerUser() {
			
			var email = $('#email');
			var username = $('#username');
			var gender = $('#gender');
			var token = $('#token');
			$('#submit').hide();
			
			username.removeClass('hidden');
			gender.removeClass('hidden');
		
// 			alert(gender.val());
			$('#login_form').attr('action', '<?= base_url(); ?>login/register');
			$('#register').attr("onclick", "$('#login_form').submit()");
			
		}
    </script>
</head>
<body>
<!-- ***************** HEADER ********************* -->
<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand">
                <div class="logo">
                    <img src="<?= base_url(); ?>resourses/img/logo.png">
                    <p>Health<span>Keep</span></p>
                </div>
            </a>
        </div>
        <nav class="navbar-collapse bs-navbar-collapse collapse" role="navigation" style="height: 1px;">
            <ul class="nav navbar-nav">
                <li class="search inp-group hidden">
                    <input type="text"  placeholder="Search"><span><i class="glyphicon glyphicon-search"></i></span>
                </li>
            </ul>
            <div class="alerts hidden">
                <a href="#" class="mail">
                    <div class="circle red flex-center"><span>3</span></div>
                </a>
                <a href="#" class="user"></a>
            </div>
        </nav>
    </div>
</header>
<div class="container page-container login-bg">
    <div class="row row-login">