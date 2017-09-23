<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>DES | Input Data</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>datepicker/css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>bower_components/HighChart/css/highcharts.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <style>
            #myDiv {
                position: relative;
                background-color: #C0DBF0;
                width: 400px;
                padding: 20px;
            }

            .loading-overlay {
                display: none;
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: #fff;
                opacity: 0.6;
                z-index:100000
            }

            .spin-loader {
                height: 100px;
                background: url("http://i62.tinypic.com/2hzsro.gif") no-repeat center center transparent;
                position: relative;
                top: 25%;
            }
        </style>
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
                        Peramalan Double Exponential Pelangaran Lalu Lintas Polrestabes Surabaya
                    </h1>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <label for="exampleInputEmail1">Pasal Pelanggaran</label>
                                                <input type="text" class="form-control" id="pasal" placeholder="Masukkan Pasal Pelanggaran" name="pasal">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="exampleInputEmail1">Tahun Pelanggaran</label>
                                                <input type="text" class="form-control" id="tahun" placeholder="Masukkan Tahun Actual Pelanggaran" name="tahun" value="2014">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="exampleInputEmail1">Excel Tahun Pertama</label>
                                                <input type="file" class="form-control" id="pertama" name="pertama">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="exampleInputEmail1">Excel Tahun Kedua</label>
                                                <input type="file" class="form-control" id="kedua" name="kedua">
                                            </div>
                                            <div class="col-sm-6" style="margin-top: 10px;">
                                                <button type="button" class="btn btn-primary col-sm-12" onclick="lihatData();">Lihat Data</button>
                                            </div>
                                            <div class="col-sm-6" style="margin-top: 10px;">
                                                <button type="button" class="btn btn-danger col-sm-12" onclick="simpanData();">Simpan Data Ke Database</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="loader"></div>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h4 class="text-center">Data Tahun 2014</h4>
                                            <table class="table table-striped table-bordered" id="table-1">
                                                <thead>
                                                    <tr>
                                                        <th>Bulan</th>
                                                        <th>Tahun</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>January</th>
                                                        <th id="one-1"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>February</th>
                                                        <th id="one-2"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Maret</th>
                                                        <th id="one-3"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>April</th>
                                                        <th id="one-4"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Mei</th>
                                                        <th id="one-5"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Juni</th>
                                                        <th id="one-6"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Juli</th>
                                                        <th id="one-7"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Agustus</th>
                                                        <th id="one-8"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>September</th>
                                                        <th id="one-9"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Oktober</th>
                                                        <th id="one-10"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>November</th>
                                                        <th id="one-11"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Desember</th>
                                                        <th id="one-12"></th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-6">
                                            <h4 class="text-center">Data Tahun 2015</h4>
                                            <table class="table table-striped table-bordered" id="table-2">
                                                <thead>
                                                    <tr>
                                                        <th>Bulan</th>
                                                        <th>Tahun</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>January</th>
                                                        <th id="two-1"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>February</th>
                                                        <th id="two-2"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Maret</th>
                                                        <th id="two-3"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>April</th>
                                                        <th id="two-4"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Mei</th>
                                                        <th id="two-5"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Juni</th>
                                                        <th id="two-6"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Juli</th>
                                                        <th id="two-7"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Agustus</th>
                                                        <th id="two-8"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>September</th>
                                                        <th id="two-9"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Oktober</th>
                                                        <th id="two-10"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>November</th>
                                                        <th id="two-11"></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Desember</th>
                                                        <th id="two-12"></th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="button" class="btn btn-danger" onclick="prosesData();">Process</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="hitung" class="content"></section>
                <section>
                    <div id="container"></div>
                </section>
            </div>
            <!--footer-->
            <?php echo "$footer"; ?>
            <!--end footer-->
        </div>

        <script src="<?php echo base_url('assets/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo base_url('assets/'); ?>bower_components/HighChart/js/highcharts.js"></script>
        <script src="<?php echo base_url('assets/'); ?>datepicker/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url('assets/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('assets/'); ?>bower_components/fastclick/lib/fastclick.js"></script>
        <script src="<?php echo base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
        <script src="<?php echo base_url('assets/'); ?>dist/js/demo.js"></script>
        <script>
                                                $(document).ready(function () {
                                                    $("#tahun").datepicker({
                                                        format: "yyyy", // Notice the Extra space at the beginning
                                                        viewMode: "years",
                                                        minViewMode: "years"
                                                    });
                                                });
                                                function lihatData() {
                                                    var pasal = $('#pasal').val();
                                                    var tahun = $('#tahun').val();
                                                    var pertama = $('#pertama')[0].files[0];
                                                    var kedua = $('#kedua')[0].files[0];
                                                    var formData = new FormData();
                                                    formData.append("pasal", pasal);
                                                    formData.append("tahun", tahun);
                                                    formData.append("pertama", pertama);
                                                    formData.append("kedua", kedua);
                                                    $.ajax({
                                                        url: "<?php echo base_url(); ?>proses/input",
                                                        type: 'POST',
                                                        dataType: 'json',
                                                        data: formData,
                                                        async: false,
                                                        cache: false,
                                                        contentType: false,
                                                        processData: false,
                                                        beforeSend: function (xhr) {
                                                            $('.loading-overlay').show();
                                                            $('#hitung').html("");
                                                        },
                                                        success: function (response, textStatus, jqXHR) {
                                                            if (response.error == 1) {
                                                                alert(response.message);
                                                            } else {
                                                                for (var i = 0; i < response.file1.length; i++) {
                                                                    $('#one-' + (i + 1)).text(response.file1[i]);
                                                                }
                                                                for (var i = 0; i < response.file2.length; i++) {
                                                                    $('#two-' + (i + 1)).text(response.file2[i]);
                                                                }
                                                            }

                                                        },
                                                        complete: function (jqXHR, textStatus) {
                                                            $('.loading-overlay').hide();
                                                        }
                                                    });
                                                }

                                                function prosesData() {
                                                    var data1 = [];
                                                    var data2 = [];
                                                    $('#table-1').find("tbody").find("tr").each(function (i) {
                                                        var td = $(this).find("th");
                                                        data1.push(td.eq(1).text())
                                                    });

                                                    $('#table-2').find("tbody").find("tr").each(function (i) {
                                                        var td = $(this).find("th");
                                                        data2.push(td.eq(1).text())
                                                    });

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

                                                function simpanData() {
                                                    var pasal = $('#pasal').val();
                                                    var tahun = $('#tahun').val();
                                                    var pertama = $('#pertama')[0].files[0];
                                                    var kedua = $('#kedua')[0].files[0];
                                                    var formData = new FormData();
                                                    formData.append("pasal", pasal);
                                                    formData.append("tahun", tahun);
                                                    formData.append("pertama", pertama);
                                                    formData.append("kedua", kedua);
                                                    $.ajax({
                                                        url: "<?php echo base_url(); ?>proses/simpan",
                                                        type: 'POST',
                                                        dataType: 'json',
                                                        data: formData,
                                                        async: false,
                                                        cache: false,
                                                        contentType: false,
                                                        processData: false,
                                                        beforeSend: function (xhr) {
                                                            $('.loading-overlay').show();
                                                        },
                                                        success: function (response, textStatus, jqXHR) {
                                                            if (response.error == 1) {
                                                                alert(response.message);
                                                            } else {
                                                                if (response == 1) {
                                                                    alert("berhasil simpan data");
                                                                } else {
                                                                    alert("gagal simpan data");
                                                                }
                                                            }

                                                        },
                                                        complete: function (jqXHR, textStatus) {
                                                            $('.loading-overlay').hide();
                                                        }
                                                    });
                                                }
        </script>
    </body>
</html>
