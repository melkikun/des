<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>DES | Lihat Data</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>bower_components/HighChart/css/highcharts.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php echo "$header"; ?>
            <?php echo "$sidebar"; ?>
            <div class="content-wrapper">
                <div class="loading-overlay">
                    <div class="spin-loader"></div>
                </div>
                <section class="content-header">
                    <h1>
                        Laporan data pelanggaran lalu lintas polrestabes surabaya
                    </h1>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">Tahun</th>
                                                        <th class="text-center">Pasal</th>
                                                        <th class="text-center">Lihat Data</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    foreach ($data as $key => $value) {
                                                        ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $i;?></td>
                                                            <td class="text-center"><?php echo $value['tahun_pelanggaran'];?></td>
                                                            <td class="text-center"><?php echo $value['pasal_pelanggaran'];?></td>
                                                            <td class="text-center"><a type="button" href="<?php echo base_url()."data/".$value['id'];?>" class="btn btn-danger">Lihat Data</a></td>
                                                        </tr>
                                                        <?php
                                                        $i++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="loader"></div>
                </section>
            </div>
            <!--footer-->
            <?php echo "$footer"; ?>
            <!--end footer-->
        </div>

        <script src="<?php echo base_url('assets/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo base_url('assets/'); ?>bower_components/HighChart/js/highcharts.js"></script>
        <script src="<?php echo base_url('assets/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('assets/'); ?>bower_components/fastclick/lib/fastclick.js"></script>
        <script src="<?php echo base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
        <script src="<?php echo base_url('assets/'); ?>dist/js/demo.js"></script>
    </body>
</html>
