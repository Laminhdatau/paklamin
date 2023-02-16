<div class="x_panel">
    <div class="x_title">
        <h2 class="mt-3">Cari Nama Hasil Survei</h2>
    </div>
    <div class="x_content">

        <?php $no = 0;
        $k = 0;
        $s = "";
        $dt = [];
        $bagian = [];
        $jumlah = [];
        $persentase = [];
        foreach ($datati as $g) {
            // print_r($g->nama_lengkap);
            if ($s != $g->nama_lengkap) {
                if ($no > 0) {
                    $dt[$no]['bagian'] = $bagian;
                    $dt[$no]['jumlah'] = $jumlah;
                    $dt[$no]['persentase'] = $persentase;
                }
                $no++;

                $dt[$no] = array(

                    "nama" => $g->nama_lengkap,
                    "foto" => $g->kd_dosen . '.jpeg',
                );
                $s = $g->nama_lengkap;
                $k = 0;
                $bagian = [];
                $jumlah = [];
                $persentase = [];
            }
            $k++;
            $bagian[$k] = $g->bagian_soal;
            $jumlah[$k] = $g->jumlah;
            $persentase[$k] = $g->persentase;
        }
        if ($no > 0) {
            $dt[$no]['bagian'] = $bagian;
            $dt[$no]['jumlah'] = $jumlah;
            $dt[$no]['persentase'] = $persentase;
        }
        ?>
        <textarea hidden id="dataGrafik"><?php echo json_encode($dt); ?></textarea>


        <div class="form-floating">
            <select class="form-control selectpicker" data-live-search="true">
                <?php foreach ($datadosen as $dd) { ?>
                    <option value=""><?= $dd->nama_lengkap; ?></option>
                <?php } ?>

            </select>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4 col-sm-4 ">
                <div class="x_panel tile fixed_height_320">
                   
                    <div class="x_content">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th>Hasil Survei</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 1; $i <= count($dt); $i++) { ?>
                                    <tr>
                                        <td>
                                            <canvas style="width: 50px;height: 20px;" id="myChart[<?= $i; ?>]"></canvas>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 ">
                <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                        <h2>BAGIAN B</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="" style="width:100%">
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 ">
                <div class="x_panel tile fixed_height_320">
                    <div class="x_title">
                        <h2>BAGIAN C</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="" style="width:100%">

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="<?= base_url('assets/'); ?>vendors/echarts/dist/echarts.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<script>
    <?php for ($j = 1; $j <= count($dt); $j++) { ?>
        var myChart = document.getElementById("myChart[<?= $j; ?>]");
        Chart.defaults.global.defaultFontFamily = "Lato";
        Chart.defaults.global.defaultFontSize = 10;
        var dataKu = {
            labels: [
                <?php foreach ($dt[$j]['bagian'] as $b) { ?>

                    "<?= $b; ?>",
                <?php } ?>
            ],
            datasets: [{
                label: "Hasil",
                data: [
                    <?php foreach ($dt[$j]['persentase'] as $m) { ?> "<?= $m; ?>",
                    <?php } ?>
                ],
                backgroundColor: [
                    'purple',
                    'orange',
                    'yellow'
                ],
                borderColor: [
                    'purple',
                    'orange',
                    'yellow'
                ],
                borderWidth: 1
            }]
        };
        // console.log(dataKu);

        var myChart = new Chart(myChart, {
            type: 'doughnut',
            data: dataKu
        });
    <?php } ?>
    console.log(dataKu);
</script>