<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">MAPE</a></li>
                    <li><a data-toggle="tab" href="#menu1">Alpha 0.1</a></li>
                    <li><a data-toggle="tab" href="#menu2">Alpha 0.2</a></li>
                    <li><a data-toggle="tab" href="#menu3">Alpha 0.3</a></li>
                    <li><a data-toggle="tab" href="#menu4">Alpha 0.4</a></li>
                    <li><a data-toggle="tab" href="#menu5">Alpha 0.5</a></li>
                    <li><a data-toggle="tab" href="#menu6">Alpha 0.6</a></li>
                    <li><a data-toggle="tab" href="#menu7">Alpha 0.7</a></li>
                    <li><a data-toggle="tab" href="#menu8">Alpha 0.8</a></li>
                    <li><a data-toggle="tab" href="#menu9">Alpha 0.9</a></li>
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
                                $alpha = 0.1;
                                $terkecil = 9999999999;
                                foreach ($data as $key => $value) {
                                    if ($terkecil > $value['mape'])
                                        $terkecil = $alpha;
                                    ?>
                                    <tr <?php if ($mape == $value['mape']) echo "style='background-color:red;'"; ?>>
                                        <td><?php echo $value['alpha']; ?></td>
                                        <td><?php echo number_format($value['a'][11] + $value['b'][11], 2); ?></td>
                                        <td><?php echo number_format($value['totalAbsolute'], 2); ?></td>
                                        <td><?php echo number_format($value['mape'], 2); ?></td>
                                    </tr>
                                    <?php
                                    $aplha = $alpha + 0.1;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php for ($x = 1; $x <= 9; $x++): ?>
                        <div id="menu<?= $x ?>" class="tab-pane fade">
                            <h3>&nbsp;</h3>
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
                                    $alpha = "alpha0$x";
                                    $absolute = 0;
                                    for ($i = 0; $i < count($data[$alpha]['peramalan']); $i++):
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $bulan[$i]; ?></td>
                                            <td class="text-center"><?php echo $data1[$i]; ?></td>
                                            <td class="text-center"><?php echo $data1[$i]; ?></td>
                                            <td class="text-center"><?php echo number_format($data[$alpha]['s1'][$i], 2); ?></td>
                                            <td class="text-center"><?php echo number_format($data[$alpha]['s2'][$i], 2); ?></td>
                                            <td class="text-center"><?php echo number_format($data[$alpha]['a'][$i], 2); ?></td>
                                            <td class="text-center"><?php echo number_format($data[$alpha]['b'][$i], 2); ?></td>
                                            <td class="text-center"><?php echo number_format($data[$alpha]['peramalan'][$i], 2); ?></td>
                                            <td class="text-center"><?php echo number_format($data[$alpha]['error'][$i], 2); ?></td>
                                            <td class="text-center"><?php echo number_format($data[$alpha]['absolute'][$i], 2); ?></td>
                                        </tr>
                                        <?php
                                        $absolute += $data[$alpha]['absolute'][$i];
                                    endfor;
                                    ?>
                                    <tr>
                                        <td class="text-center">Januari</td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">-</td>
                                        <td class="text-center"><?php echo number_format(($data[$alpha]['b'][11] + $data[$alpha]['a'][11]), 2); ?></td>
                                        <td class="text-center">-</td>
                                        <td class="text-center"><?php echo number_format($absolute / 12, 2); ?></td>
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
            <div class="box-body">
                Kesimpulan : Dapat disimpulkan dalam peramalan ini MAPE yang terkecil terdapat pada alpha <b><i><?php echo $terkecil ?></i></b> 
                dengan nilai MAPE <b><i><?php echo number_format($mape,2) ?></i></b>,
                dan hasil peramalan bulan januari tahun berikutnya adalah <?php echo number_format($next, 0, ",", ".");?> kecelakaan
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
               <h4 class="text-center">Prediksi Tahun 2015</h4>
            </div>
        </div>
    </div>
</div>