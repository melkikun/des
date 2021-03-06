<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>DES | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?= base_url('assets') ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url('assets') ?>/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/AdminLTE.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>HALAMAN LOGIN</b></a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg"></p>
                <?php
                if ($this->session->flashdata('berhasil_register')) {
                    ?>
                    <div class="alert alert-success text-center">
                        <strong><?php echo $this->session->flashdata('berhasil_register') ?></strong> 
                    </div>
                    <?php
                }
                if ($this->session->flashdata('gagal_login')) {
                    ?>
                    <div class="alert alert-danger text-center">
                        <strong><?php echo $this->session->flashdata('gagal_login') ?></strong> 
                    </div>
                    <?php
                }
                ?>
                <?php
                $attribute = array("method" => "post", "id" => "form-login", "class" => "form");
                echo form_open("user/login", $attribute);
                ?>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Masukkan Username" name="username">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Masukkan Password" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <a href="<?php echo base_url(); ?>register" class="btn btn-warning btn-block btn-flat">Register</a>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
                <?php
                form_close();
                ?>
            </div>
            <!-- /.login-box -->

            <!-- jQuery 3 -->
            <script src="<?= base_url('assets') ?>/bower_components/jquery/dist/jquery.min.js"></script>
            <!-- Bootstrap 3.3.7 -->
            <script src="<?= base_url('assets') ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
            <script>
//                $(function () {
//                    $('input').iCheck({
//                        checkboxClass: 'icheckbox_square-blue',
//                        radioClass: 'iradio_square-blue',
//                        increaseArea: '20%' // optional
//                    });
//                });
            </script>
    </body>
</html>
