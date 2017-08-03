<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | General Form Elements</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php echo "$header"; ?>
            <?php echo "$sidebar"; ?>
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        General Form Elements
                        <small>Preview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">General Elements</li>
                    </ol>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <?php
                                echo form_open_multipart('proses/input');
                                ?>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label for="exampleInputEmail1">Judul</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Judul">
                                            </div>

                                            <div class="col-sm-6"> 
                                                <label for="exampleInputPassword1">Tahun 1</label>
                                                <input type="file" class="form-control" id="tahun1" class="form-control" name="tahun1">
                                            </div>
                                            
                                            <div class="col-sm-6"> 
                                                <label for="exampleInputPassword1">Tahun 1</label>
                                                <input type="file" class="form-control" id="tahun1" class="form-control" name="tahun2">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary col-sm-12">Submit</button>
                                </div>
                                <?php
                                echo form_close();
                                ;
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!--footer-->
<?php echo "$footer"; ?>
            <!--end footer-->
        </div>

        <script src="<?php echo base_url('assets/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo base_url('assets/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('assets/'); ?>bower_components/fastclick/lib/fastclick.js"></script>
        <script src="<?php echo base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
        <script src="<?php echo base_url('assets/'); ?>dist/js/demo.js"></script>
    </body>
</html>
