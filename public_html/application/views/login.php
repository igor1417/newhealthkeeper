        <form class="login-form form-horizontal">
        <? echo form_open('login', array('class' => 'login-form form-horizontal')); ?>

            <div class="logo marg-b-15">
                <img src="resourses/img/logo.png">
                <p>Health<span>Keep</span></p>
            </div>
            <? echo form_input(array('name' => 'Login', 'class' => 'form-control marg-b-15', 'placeholder' => 'Login')); ?>
            <? echo form_password(array('name' => 'Password', 'class' => 'form-control marg-b-15', 'placeholder' => 'Password')); ?>
            <? echo form_submit(array('name' => 'Submit', 'value' => 'Login', 'class' => 'btn btn-default btn-login marg-b-15 center-block width-100')); ?>
            <? echo form_button(array('name' => 'Register', 'content' => 'Register', 'class' => 'btn btn-default btn-register marg-b-15 center-block width-100')); ?>
            <a href="#" class="forgot-pass-link">Forgot password?</a>
        <? echo form_close(); ?>