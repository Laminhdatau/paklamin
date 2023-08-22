<div class="main_content">
    <div class="container-fluid">
        <div class="x_panel">
            <div class="">
                <h2>Grafik Hasil Survei Dosen</h2>
            </div>
            <div class="x_content text-center">
                <div class="form-floating col-md-12 col-sm-12">
                    <select name="dosen" id="dosen" class="form-control">
                    <option value="">--PILIH DOSEN--</option>

                        <?php foreach ($datadosen as $dd) { ?>
                            <option value="<?= $dd->kd_dosen; ?>"><?= $dd->nama_lengkap; ?></option>
                        <?php } ?>
                    </select>

                </div>

            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="clearfix"></div>

            <div class="col-md-4 col-sm-4 " id="listfoto">
                <div class="x_panel tile fixed_height_500 overflow_hidden">
                    <div class="x_title">
                        <h2>Dosen</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="w-100">

                            <tr>
                                <td>
                                    <div class="col-lg-2 col-md-2 col-sm-2 ">
                                        <img class="img-circle mx-auto" id="foto" src="" alt="" style="width: 150px; height: 150px;">
                                    </div>
                                </td>

                            </tr>
                            <br>
                        </table>
                        <br>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 " id="penilai">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Penilai</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content text-left">
                        <p id="semua"></p> <br>
                        <p id="semuakelas"></p>
                    </div>
                </div>
            </div>

            <!-- <div class="col-md-12 col-sm-12  ">

            </div> -->

        </div>

        <div class="col-md-12 col-sm-12" id="lamin">
            <div class="col-md-3 col-sm-3">
                <div class="x_panel">
                    <ul>
                        <p>Keterangan :</p>
                    </ul>
                    <div class="clearfix"></div>
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
                        <div class="x_content">
                            <p><button style="background-color: <?= $color; ?>;" class="btn"></button> <?= $o->jawaban ?> </p>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="x_panel">
                    <div class="x_title">
                        <b>A. Kegiatan Awal Pembelajaran</b>
                        <ul class="nav navbar-right panel_toolbox">
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <canvas id="grafika"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="x_panel">
                    <div class="x_title">
                        <b>B. Pelaksanaan Pembelajaran</b>
                        <ul class="nav navbar-right panel_toolbox">
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <canvas id="grafikb"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="x_panel">
                    <div class="x_title">
                        <b>C. Penilaian Hasil Belajar</b>
                        <ul class="nav navbar-right panel_toolbox">
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <canvas id="grafikc"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-sm-9">


                <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail Grafik</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Matakuliah</th>
                                    <th>Kegiatan Awal Pembelajaran</th>
                                    <th>Pelaksanaan Pembelajaran</th>
                                    <th>Penilaian Hasil Belajar</th>
                                </tr>
                            </thead>
                            <tbody id="listMK">

                            </tbody>
                            <!-- <tfoot id="kaki">
                                <tr>
                                    <th colspan="2" class="text-center">Total</th>

                                    <th>50%</th>
                                    <th>50%</th>
                                    <th>50%</th>
                                </tr>
                            </tfoot> -->
                        </table>
                        <div class="x_title">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <br><br><br>


        <div id="laminket" class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Saran dan Masukan</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content" id="tw">

                </div>
            </div>
        </div>

    </div>
</div>



<script src="<?= base_url('assets/'); ?>vendors/echarts/dist/echarts.min.js"></script>

<script type="text/javascript">
    $('#lamin').hide();
    $('#comment').hide();
    $('#penilai').hide();
    $('#laminket').hide();
    $('#listfoto').hide();
    $('#dosen').change(function() {
        $('#lamin').show();
        $('#comment').show();
        $('#penilai').show();
        $('#laminket').show();
        $('#listfoto').show();


        var dosen = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'grafik/getGrafik/',
            data: 'dosen=' + dosen,
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
            url: 'grafik/getSeluruh',
            data: 'dosen=' + dosen,
            success: function(response) {
                var datas = JSON.parse(response);
                var foto = datas[1][0].kd_dosen;
                var totalMhs = datas[1][0].total_mhs;
                var jumlahSeluruh = datas[2][0].jumlah_seluruh;
                var jumlahKelas = datas[3][0].jumlah_kelas;
                var listMK = datas[4]
                var komens = datas[5];
                $('#semua').html('<b>' + totalMhs + '</b>' + " Dari " + '<b>' + jumlahSeluruh + '</b>' + " Mahasiswa");
                $('#semuakelas').html('<b>' + jumlahKelas + '</b>' + " Kelas");
                var urlGambar = '<?= base_url('file/images/pasphoto/') ?>' + foto + '.jpeg ';
                $('#foto').attr('src', urlGambar);

                $('#listMK').empty();
                for (i = 0; i < listMK.length; i++) {
                    var namaMK = listMK[i].nama_mata_kuliah;
                    a = i + 1;
                    $('#listMK').append('<tr><td>' + a + '</td>' +
                        '<td>' + namaMK + '</td></tr>');
                }
                // // $('#kome').empty();
                // for (r = 0; r < komens.length; r++) {
                //     var kom = komens[r].komentar;
                //     $('#tw').append();
                // }
                $('#tw').empty();
                for (t = 0; t < komens.length; t++) {
                    var kom = komens[t].komentar;
                    var tan = komens[t].tan;
                    var bul = komens[t].bulan;
                    $('#tw').append('<article class="media event mb-2"><a class="pull-left date"><p class="day">' + tan + '</p>' + '<p class="month">' + bul + '</p></a>' + '<div class="media-body""><p>' + kom + '</p></div></article>');
                }
            }
        });
    });
</script>