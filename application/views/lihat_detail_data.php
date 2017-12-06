<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | General Form Elements</title>
        <meta content="widtd=device-widtd, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
                    <h1 class="text-center">
                        Laporan data pelanggaran lalu lintas 
                        polrestabes surabaya <br>
                        tahun : <?php echo $data[0]['tahun_pelanggaran']; ?> <br>
                        pasal : <?php echo $data[0]['pasal_pelanggaran']; ?> 
                    </h1>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h4 class="text-center">Data Tahun <?php echo $data[0]['tahun_pelanggaran']; ?></h4>
                                            <table class="table table-striped table-bordered" id="table-1">
                                                <tdead>
                                                    <tr>
                                                        <td>Bulan</td>
                                                        <td>Tahun</td>
                                                    </tr>
                                                </tdead>
                                                <tbody>
                                                    <tr>
                                                        <td>January</td>
                                                        <td id="one-1"><?php echo $data[0]['tahun_pertama']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>February</td>
                                                        <td id="one-2"><?php echo $data[1]['tahun_pertama']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Maret</td>
                                                        <td id="one-3"><?php echo $data[2]['tahun_pertama']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>April</td>
                                                        <td id="one-4"><?php echo $data[3]['tahun_pertama']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mei</td>
                                                        <td id="one-5"><?php echo $data[4]['tahun_pertama']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Juni</td>
                                                        <td id="one-6"><?php echo $data[5]['tahun_pertama']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Juli</td>
                                                        <td id="one-7"><?php echo $data[6]['tahun_pertama']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Agustus</td>
                                                        <td id="one-8"><?php echo $data[7]['tahun_pertama']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>September</td>
                                                        <td id="one-9"><?php echo $data[8]['tahun_pertama']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Oktober</td>
                                                        <td id="one-10"><?php echo $data[9]['tahun_pertama']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>November</td>
                                                        <td id="one-11"><?php echo $data[10]['tahun_pertama']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Desember</td>
                                                        <td id="one-12"><?php echo $data[11]['tahun_pertama']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-6">
                                            <h4 class="text-center">Data Tahun <?php echo $data[0]['tahun_pelanggaran'] + 1; ?></h4>
                                            <table class="table table-striped table-bordered" id="table-2">
                                                <tdead>
                                                    <tr>
                                                        <td>Bulan</td>
                                                        <td>Tahun</td>
                                                    </tr>
                                                </tdead>
                                                <tbody>
                                                    <tr>
                                                        <td>January</td>
                                                        <td id="two-1"><?php echo $data[0]['tahun_kedua']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>February</td>
                                                        <td id="two-2"><?php echo $data[1]['tahun_kedua']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Maret</td>
                                                        <td id="two-3"><?php echo $data[2]['tahun_kedua']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>April</td>
                                                        <td id="two-4"><?php echo $data[3]['tahun_kedua']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mei</td>
                                                        <td id="two-5"><?php echo $data[4]['tahun_kedua']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Juni</td>
                                                        <td id="two-6"><?php echo $data[5]['tahun_kedua']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Juli</td>
                                                        <td id="two-7"><?php echo $data[6]['tahun_kedua']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Agustus</td>
                                                        <td id="two-8"><?php echo $data[7]['tahun_kedua']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>September</td>
                                                        <td id="two-9"><?php echo $data[8]['tahun_kedua']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Oktober</td>
                                                        <td id="two-10"><?php echo $data[9]['tahun_kedua']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>November</td>
                                                        <td id="two-11"><?php echo $data[10]['tahun_kedua']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Desember</td>
                                                        <td id="two-12"><?php echo $data[11]['tahun_kedua']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--                                        <div class="col-sm-6">
                                                                                    <button type="button" class="btn btn-danger" onclick="prosesData();">Process</button>
                                                                                </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="hitung" class="content"></section>
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
        <script>
            $(document).ready(function () {
                prosesData();
            });
            function prosesData() {

                var data1 = [];
                var data2 = [];
<?php
foreach ($data as $key => $value) {
    ?>
                    data1.push("<?php echo $value['tahun_pertama']; ?>");
                    data2.push("<?php echo $value['tahun_kedua']; ?>");
    <?php
}
?>

                $.ajax({
                    type: 'GET',
                    url: "<?php echo base_url(); ?>proses/proses-data",
                    data: {data1: data1, data2: data2},
                    beforeSend: function (xhr) {
                        $('.loading-overlay').show();
                    },
                    success: function (response, textStatus, jqXHR) {
                        $('#hitung').html(response);
                    },
                    complete: function (jqXHR, textStatus) {
                        $('.loading-overlay').hide();
                    }
                });
            }
        </script>
    </body>
</html>
