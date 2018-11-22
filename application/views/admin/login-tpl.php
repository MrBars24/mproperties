<?php include('includes/header-login.php'); ?>
    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                <img src="<?php echo base_url('assets/frontend/images/logo.svg'); ?>" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <?php echo form_open_multipart('admin/login', array('class'=>'login-form', 'id'=>'login_form')); ?>
                <div class="form-title">
                    <span class="form-title">Welcome.</span>
                    <span class="form-subtitle">Please login.</span>
                </div>
                <?php if($this->session->flashdata('message')): ?>
                <div class="alert alert-danger">
                    <strong>Error!</strong> <?=$this->session->flashdata('message')?>
                </div>
                <?php endif; ?>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" value="<?=$this->session->flashdata('username')?>" /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" value="<?=$this->session->flashdata('password')?>" /> </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-block red uppercase">Login</button>
                </div>
            </form>
            <!-- END LOGIN FORM -->
        </div>
        <div class="copyright hide"> <?php echo date('Y'); ?> © MicroProperties. </div>
        <!-- END LOGIN -->
        <?php include('includes/scripts-login.php'); ?>
    </body>

</html>

<script>
var Login = function() {

    var handleLogin = function() {

        $('.login-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                username: {
                    required: true
                },
                password: {
                    required: true
                },
                remember: {
                    required: false
                }
            },

            messages: {
                username: {
                    required: "Username is required."
                },
                password: {
                    required: "Password is required."
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit   
                $('.alert-danger', $('.login-form')).show();
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },

            submitHandler: function(form) {
                form.submit(); // form validation success, call ajax form submit
            }
        });

        $('.login-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.login-form').validate().form()) {
                    $('.login-form').submit(); //form validation success, call ajax form submit
                }
                return false;
            }
        });
    }

    return {
        //main function to initiate the module
        init: function() {

            handleLogin();

        }

    };

}();

jQuery(document).ready(function() {
    Login.init();
});    
</script>