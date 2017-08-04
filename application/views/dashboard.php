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
                                <div class="box-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <label for="exampleInputEmail1">Pasal Pelanggaran</label>
                                                <input type="text" class="form-control" id="pasal" placeholder="Masukkan Pasal Pelanggaran" name="pasal" value="287">
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
                                            <div class="col-sm-6">
                                                <label for="exampleInputEmail1">&nbsp;</label>
                                                <button type="button" class="btn btn-primary" onclick="lihatData();">Lihat Data</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-6">
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
        <script>
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
//                                                                $('#table-1').find("tbody").empty();
//                                                                $('#table-2').find("tbody").empty();
                                                        },
                                                        success: function (response, textStatus, jqXHR) {
                                                            if (response.error == 1) {
                                                                alert(response.error);
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

                                                        }
                                                    });
                                                }

                                                function prosesData() {
                                                alert("123");
                                                    $('#table-1 tr:eq(2) td').each(function () {
                                                        alert($(this).text());
                                                    });
                                                }
        </script>
    </body>
</html>
