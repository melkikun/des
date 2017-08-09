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
                    <?php for ($x = 0, $alpha=0.1; $x < count($absolute); $x++, $alpha+=0.1): ?>
                        <div id="menu<?= $x ?>" class="tab-pane fade">
                            <h3>ALPHA <?=$alpha?></h3>
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
                                            <td class="text-center"><?php echo $s1[$x][$i]; ?></td>
                                            <td class="text-center"><?php echo $s2[$x][$i]; ?></td>
                                            <td class="text-center"><?php echo $at[$x][$i]; ?></td>
                                            <td class="text-center"><?php echo $bt[$x][$i]; ?></td>
                                            <td class="text-center"><?php echo $peramalan[$x][$i]; ?></td>
                                            <td class="text-center"><?php echo $error[$x][$i]; ?></td>
                                            <td class="text-center"><?php echo $absolute[$x][$i]; ?></td>
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
                                        <td class="text-center"><?php echo number_format($at[$x][11]+$bt[$x][11],2);?></td>
                                        <td class="text-center">-</td>
                                        <td class="text-center"><?php echo number_format(array_sum($absolute[$x])/count($bulan),2);?></td>
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
                Kesimpulan : Dapat disimpulkan dalam peramalan ini MAPE yang terkecil terdapat pada alpha <b><i><?php echo $alphaTerkecil['alpha'] ?></i></b> 
                dengan nilai MAPE <b><i><?php echo number_format($mape, 2) ?></i></b>,
                dan hasil peramalan bulan januari tahun berikutnya adalah <?php echo number_format(($alphaTerkecil['a'][11] + $alphaTerkecil['b'][11]), 2, ",", "."); ?> kecelakaan
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <h4 class="text-center">Prediksi tahun 2015 menggunakan alpha <?php echo $alphaTerkecil['alpha'] ?></h4>
            </div>
        </div>
    </div>
</div>