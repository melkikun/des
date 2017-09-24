<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">MAPE</a></li>
                    <li><a data-toggle="tab" href="#menu0">Alpha 0.1</a></li>
                    <li><a data-toggle="tab" href="#menu1">Alpha 0.2</a></li>
                    <li><a data-toggle="tab" href="#menu2">Alpha 0.3</a></li>
                    <li><a data-toggle="tab" href="#menu3">Alpha 0.4</a></li>
                    <li><a data-toggle="tab" href="#menu4">Alpha 0.5</a></li>
                    <li><a data-toggle="tab" href="#menu5">Alpha 0.6</a></li>
                    <li><a data-toggle="tab" href="#menu6">Alpha 0.7</a></li>
                    <li><a data-toggle="tab" href="#menu7">Alpha 0.8</a></li>
                    <li><a data-toggle="tab" href="#menu8">Alpha 0.9</a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <h3>&nbsp;</h3>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Alpha <?php echo $data['mape']; ?></th>
                                    <th>Peramalan</th>
                                    <th>APE</th>
                                    <th>MAPE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 0, $alpha = 0.1; $i < count($absolute); $i++, $alpha += 0.1) {
                                    ?>
                                    <tr <?php if ($i == $index) echo "style='background-color:red;'"; ?>>
                                        <td><?php echo $alpha; ?></td>
                                        <td><?php echo number_format(($at[$i][11] + $bt[$i][11]), 2); ?></td>
                                        <td><?php echo number_format(array_sum($absolute[$i]), 2); ?></td>
                                        <td><?php echo number_format(array_sum($absolute[$i]) / 12, 2); ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                    for ($x = 0, $alpha = 0.1; $x < count($absolute); $x++, $alpha += 0.1):
                        ?>
                        <div id="menu<?= $x ?>" class="tab-pane fade">
                            <h3>ALPHA <?= $alpha ?></h3>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Bulan</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">Xt</th>
                                        <th class="text-center">S't</th>
                                        <th class="text-center">S''t</th>
                                        <th class="text-center">Nilai a</th>
                                        <th class="text-center">Nilai b</th>
                                        <th class="text-center">Ramalan</th>
                                        <th class="text-center">Pe</th>
                                        <th class="text-center">Mape</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ramalanSelanjutnya = 0;
                                    $totalMape = 0;
                                    for ($i = 0; $i < count($data1); $i++):
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $bulan[$i]; ?></td>
                                            <td class="text-center"><?php echo $data1[$i]; ?></td>
                                            <td class="text-center"><?php echo $data1[$i]; ?></td>
                                            <td class="text-center"><?php echo number_format($s1[$x][$i], 2); ?></td>
                                            <td class="text-center"><?php echo number_format($s2[$x][$i], 2); ?></td>
                                            <td class="text-center"><?php echo number_format($at[$x][$i], 2); ?></td>
                                            <td class="text-center"><?php echo number_format($bt[$x][$i], 2); ?></td>
                                            <td class="text-center"><?php echo number_format($peramalan[$x][$i], 2); ?></td>
                                            <td class="text-center"><?php echo number_format($error[$x][$i], 2); ?></td>
                                            <td class="text-center"><?php echo number_format($absolute[$x][$i], 2); ?></td>
                                        </tr>
                                        <?php
                                    endfor;
                                    ?>
                                    <tr>
                                        <td class="text-center">Bulan Selanjutnya</td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">-</td>
                                        <td class="text-center"><?php echo number_format($at[$x][11] + $bt[$x][11], 2); ?></td>
                                        <td class="text-center">-</td>
                                        <td class="text-center"><?php echo number_format(array_sum($absolute[$x]) / count($bulan), 2); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body text-danger">
                Kesimpulan : Dapat disimpulkan dalam peramalan ini MAPE yang terkecil terdapat pada alpha <b><i><?php echo $alphax ?></i></b> 
                dengan nilai MAPE <b><i><?php echo number_format(array_sum($absolute[$index]) / count($bulan), 2) ?></i></b>,
                dan hasil peramalan bulan januari tahun berikutnya adalah <?php echo number_format($at[$index][11] + $bt[$index][11], 2); ?> kecelakaan
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <h4 class="text-center">Prediksi tahun berikutnya menggunakan alpha <?php echo $alphax ?></h4>
                <div class="col-sm-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Periode</th>
                                <th class="text-center">Hasil Peramalan</th>
                                <th class="text-center">Data Actual</th>
                                <th class="text-center">PE</th>
                                <th class="text-center">APE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 12, $j = 0; $i < count($nextPeramalan['s1Peramalan']); $i++, $j++) {
                                ?>
                                <tr>
                                    <th class="text-center"><?php echo $bulan[$j]; ?></th>
                                    <th class="text-center"><?php echo number_format($nextPeramalan['peramalanPeramalan'][$i], 2); ?></th>
                                    <th class="text-center"><?php echo number_format($data2[$j], 2); ?></th>
                                    <th class="text-center"><?php echo number_format($nextPeramalan['errorPeramalan'][$i], 2); ?></th>
                                    <th class="text-center"><?php echo number_format($nextPeramalan['absolutePeramalan'][$i], 2); ?></th>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <h4 class="text-center">Chart(Grafik)</h4>
                <div class="col-sm-6">
                    <div id="container"></div>
                </div>
                <div class="col-sm-6">
                    <div id="container2"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var data1 = <?php echo json_encode($data1, JSON_NUMERIC_CHECK); ?>;
    var data2 = <?php echo json_encode($data2, JSON_NUMERIC_CHECK); ?>;
    $(document).ready(function () {
        Highcharts.chart('container', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Grafik Tahun Pertama '
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Data Kecelakaan'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                    name: 'Tahun 1',
                    data: data1
                }]
        });
        Highcharts.chart('container2', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Grafik Tahun Kedua '
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Data Kecelakaan'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                    name: 'Tahun 2',
                    data: data2
                }]
        });
    });
</script>