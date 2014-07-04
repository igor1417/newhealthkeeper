        <? echo form_open('login', array('class' => 'login-form form-horizontal')); ?>

            <div class="logo marg-b-15">
                <img src="resourses/img/logo.png">
                <p>Health<span>Keep</span></p>
            </div>
            
            <?php
				if(isset($_SESSION["emailDup"]) && $_SESSION["emailDup"]!=""){
					$emailDup=$_SESSION["emailDup"];
			?>
					<div class="alert alert-warning">
						The email <?php echo $emailDup; ?> is already registered, please login
					</div>
				<?php
					$_SESSION["emailDup"]="";
				}
				if(isset($_GET["email"])){
				?>
				<div class="alert alert-error">
					Unknown email address
				</div>
				<?php
				}else if(isset($_GET["password"])){
				?>
				<div class="alert alert-error">
					Invalid email/password combination
				</div>
				<?php
				}else if(isset($_GET["refresh"])){
				?>
				<div class="alert alert-error">
					We could not log you in. Please try again.
				</div>
				<?php
				}
				?>
				
			<? if($errorMsg != '') : ?>
					<div class="alert alert-error">
						<?= $errorMsg ?>
					</div>
			<? endif ?>
            
            <? echo form_input(array('name' => 'email', 'class' => 'form-control marg-b-15', 'placeholder' => 'Email')); ?>
            <? echo form_password(array('name' => 'password', 'class' => 'form-control marg-b-15', 'placeholder' => 'Password')); ?>
            <? echo form_submit(array( 'value' => 'login', 'class' => 'btn btn-default btn-login marg-b-15 center-block width-100')); ?>
            <? echo form_button(array('name' => 'register', 'content' => 'Register', 'class' => 'btn btn-default btn-register marg-b-15 center-block width-100')); ?>
            <a href="#" class="forgot-pass-link">Forgot password?</a>
        <? echo form_close(); ?>