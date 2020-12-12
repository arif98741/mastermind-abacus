<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <meta name="keywords" content="">
    <meta name="description" content="Mastermind Abacus Bangladesh Limited">
    <meta name="author" content="RamomCoder">
    <title><?php echo translate('login'); ?></title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png'); ?>">

    <!-- Web Fonts  -->
    <link href="<?php echo is_secure('fonts.googleapis.com/css?family=Signika:300,400,600,700'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/font-awesome/css/all.min.css'); ?>">
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.js'); ?>"></script>

    <!-- sweetalert js/css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/sweetalert/sweetalert-custom.css'); ?>">
    <script src="<?php echo base_url('assets/vendor/sweetalert/sweetalert.min.js'); ?>"></script>
    <!-- login page style css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/login_page/css/style.css'); ?>">
    <script type="text/javascript">
        const base_url = '<?php echo base_url() ?>';
    </script>
</head>
<body style="background-color: #777;">
<div class="auth-main">
    <div class="container">

            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-right-1 col-sm-12 col-xs-12 no-padding">
                <div class="sign-area">
                    <div class="sign-hader">
                        <img src="<?php echo base_url('uploads/app_image/logo.png'); ?>" height="54" alt="">
                        <h2><?php echo $global_config['institute_name']; ?></h2>
                        <p><?php echo $global_config['address']; ?></p>
                    </div>
                    <?php echo form_open($this->uri->uri_string()); ?>
                    <div class="form-group <?php if (form_error('email')) echo 'has-error'; ?>">
                        <div class="input-group input-group-icon">
                                        <span class="input-group-addon">
                                            <span class="icon">
                                                <i class="far fa-user"></i>
                                            </span>
                                        </span>
                            <input type="text" class="form-control" name="email"
                                   value="<?php echo set_value('email'); ?>"
                                   placeholder="<?php echo translate('username'); ?>"/>
                        </div>
                        <span class="error"><?php echo form_error('email'); ?></span>
                    </div>
                    <div class="form-group <?php if (form_error('password')) echo 'has-error'; ?>">
                        <div class="input-group input-group-icon">
                                        <span class="input-group-addon">
                                            <span class="icon"><i class="fas fa-unlock-alt"></i></span>
                                        </span>
                            <input type="password" class="form-control input-rounded" name="password"
                                   placeholder="<?php echo translate('password'); ?>"/>
                        </div>
                        <span class="error"><?php echo form_error('password'); ?></span>
                    </div>

                    <div class="forgot-text">
                        <div class="checkbox-replace">
                            <label class="i-checks"><input type="checkbox" name="remember"
                                                           id="remember"><i></i> <?php echo translate('remember'); ?>
                            </label>
                        </div>
                        <div class="">
                            <a href="<?php echo base_url('authentication/forgot'); ?>"><?php echo translate('lose_your_password'); ?></a>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="btn_submit" class="btn btn-block btn-round">
                            <i class="fas fa-sign-in-alt"></i> <?php echo translate('login'); ?>
                        </button>
                    </div>
                    <div class="sign-footer">
                        <p><?php echo $global_config['footer_text']; ?></p>
                    </div>
                    <?php echo form_close(); ?>
                </div>

            </div>
    </div>
</div>

<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/jquery-placeholder/jquery-placeholder.js'); ?>"></script>
<!-- backstretch js -->
<script src="<?php echo base_url('assets/login_page/js/custom.js'); ?>"></script>

<?php
$alertclass = "";
if ($this->session->flashdata('alert-message-success')) {
    $alertclass = "success";
} else if ($this->session->flashdata('alert-message-error')) {
    $alertclass = "error";
} else if ($this->session->flashdata('alert-message-info')) {
    $alertclass = "info";
}
if ($alertclass != ''):
    $alert_message = $this->session->flashdata('alert-message-' . $alertclass);
    ?>
    <script type="text/javascript">
        swal({
            toast: true,
            position: 'top-end',
            type: '<?php echo $alertclass;?>',
            title: '<?php echo $alert_message;?>',
            confirmButtonClass: 'btn btn-default',
            buttonsStyling: false,
            timer: 8000
        })
    </script>
<?php endif; ?>
</body>
</html>