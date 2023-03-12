<div class="main_content">
    <div class="x_panel">
        <div class="x_title">
            <h2>Grafik Hasil Survei</h2>
        </div>
        <div class="x_content">
            <div class="form-floating col-md-12 col-sm-12">
                <select name="mk" id="mk" class="form-control">
                    <?php foreach ($datamk as $mm) { ?>
                        <option value="<?= $mm->kd_mata_kuliah; ?>"><?= $mm->nama_mata_kuliah; ?></option>
                    <?php } ?>
                </select>
            </div>
            <!-- <div class="form-floating col-md-6 col-sm-6">
                <a class="btn btn-info" href="<?= base_url('grafik/detailGrafik'); ?>">LIHAT DETAIL GRAFIK</a>
            </div> -->
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="xpanel col-md-12 col-sm-12" id="penilai">
        <div class="col-md-3 col-sm-3 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Penilai</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content text-left">
                    <h5 id="semua"></h5> <br>
                    <h5 id="semuakelas"></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="x_panel col-md-12 col-sm-12" id="lamin">
        <div class="col-md-4 col-sm-6">
            <div class="x_panel">
                <div class="x_title">
                    <h2>A. Kegiatan Awal Pembelajaran</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <canvas id="grafika"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="x_panel">
                <div class="x_title">
                    <h2>B. Pelaksanaan Pembelajaran</h2>
                    <ul class="nav navbar-right panel_toolbox">

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <canvas id="grafikb"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="x_panel">
                <div class="x_title">
                    <h2>C. Penilaian Hasil Belajar</h2>
                    <ul class="nav navbar-right panel_toolbox">

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <canvas id="grafikc"></canvas>
                </div>
            </div>
        </div>
    </div>


    <!-- ==================================================GRAFIK KHUSUS PANTAUAN MAHASISWA DAN KELAS -->




    <div id="laminket" class="col-md-12 col-sm-12">
        <div class="col-sm-3 col-md-3">
            <?php

            foreach ($opt as $o) {


                switch ($o->id_jawaban) {
                    case 1:
                        $color = 'purple';
                        break;
                    case 2:
                        $color = 'orange';
                        break;
                    case 3:
                        $color = 'yellow';
                        break;
                    case 4:
                        $color =  'green';
                        break;
                    case 5:
                        $color =  'blue';
                        break;
                    default:
                        $color = 'white';
                }
            ?>
                <h2> <button style="background-color: <?= $color; ?>;" class="btn"></button> <?= $o->jawaban ?> </h2>
            <?php } ?>
        </div>

        <div class="col-sm-9 col-md-9">
            <h4>Saran dan Masukan</h4>
            <div class="x-panel">
                <ul class="messages">
                    <li>
                        <div class="message_date" id="tw">


                        </div>
                        <div class="message_wrapper " id="kome">

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>

<script src="<?= base_url('assets/'); ?>vendors/echarts/dist/echarts.min.js"></script>
<script type="text/javascript">
    $('#lamin').hide();
    $('#penilai').hide();
    $('#laminket').hide();
    $('#mk').change(function() {
        $('#lamin').show();
        $('#penilai').show();
        $('#laminket').show();

        var mk = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'grafik/getGrafikMk/',
            data: 'mk=' + mk,
            success: function(response) {
                var list = JSON.parse(response);
                const myChart = [];
                myChart[1] = document.getElementById("grafika");
                myChart[2] = document.getElementById("grafikb");
                myChart[3] = document.getElementById("grafikc");
                Chart.defaults.global.defaultFontFamily = "Lato";
                Chart.defaults.global.defaultFontSize = 15;
                let lbl = [];
                let dt = [];
                const a = [];
                let j = "1";

                const labelx = [];
                const datax = [];
                for (var i = 0; i < list.length; i++) {
                    if (j !== list[i]['id_bagian_soal']) {

                        labelx.push(lbl);
                        datax.push(dt);

                        lbl = [];
                        dt = [];
                    }

                    lbl.push(list[i]['jawaban']);
                    dt.push(list[i]['persentase']);
                    j = list[i]['id_bagian_soal'];
                    console.log(j);
                }

                labelx.push(lbl);
                datax.push(dt);


                let dataKu = [];
                for (i = 0; i < labelx.length; i++) {
                    dataKu[i] = {
                        labels: labelx[i]

                            ,
                        datasets: [{
                            // label: "Hasil",
                            data: datax[i],
                            backgroundColor: [
                                'purple',
                                'orange',
                                'yellow',
                                'green',
                                'blue'
                            ],
                            borderColor: [
                                'purple',
                                'orange',
                                'yellow',
                                'green',
                                'blue'
                            ],
                            borderWidth: 1
                        }]
                    };
                }
                //


                myChart1 = new Chart(myChart[1], {
                    type: 'pie',

                    data: dataKu[0]

                });
                myChart2 = new Chart(myChart[2], {
                    type: 'pie',


                    data: dataKu[1]
                });
                myChart3 = new Chart(myChart[3], {
                    type: 'pie',

                    data: dataKu[2]
                });

            }


        });


        $.ajax({
            type: 'POST',
            url: 'grafik/getSeluruhMkPunya',
            data: 'mk=' + mk,
            success: function(response) {
                var datas = JSON.parse(response);
                var totalMhsmk = datas[6][0].ttl_mhs;
                var jumlahSeluruh = datas[7][0].jumlah_seluruh;
                var jumlahKelas = datas[8][0].jumlah_kelas;
                var komens = datas[9];
                $('#semua').html('<b>' + totalMhsmk + '</b>' + " Dari " + '<b>' + jumlahSeluruh + '</b>' + " Responden");
                $('#semuakelas').html('<b>' + jumlahKelas + '</b>' + " Kelas");

                for (r = 0; r < komens.length; r++) {
                    var kom = komens[r].komentar;
                    r = r + 1;
                    $('#kome ul').empty();
                    $('#kome').append('<ul><h6 class="heading">' + r + kom + '</h6></ul>');

                }
                for (t = 0; t <= komens.length; t++) {
                    var tan = komens[t].tan;
                    var bul = komens[t].bulan;
                    $('#tw').empty();
                    $('#tw').append(
                        '<h3 class="date text-info">' + tan + '</h3>' +
                        '<p class="month">' + bul + '</p>'
                    );
                }
            }
        });




    });
</script>