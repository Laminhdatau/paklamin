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
            <div class="col-md-7 col-sm-7 " id="listfoto">
                <div class="x_panel tile fixed_height_500 overflow_hidden">
                    <div class="x_title">
                        <h2>Dosen</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="w-100">
                            <tr>
                                <th>
                                    <div class="col-lg-2 col-md-2 col-sm-2 ">
                                        <p class="">Dosen</p>
                                    </div>
                                </th>
                                <th>
                                    <div class="col-lg-7 col-md-7 col-sm-7 text-left">
                                        <p class="">Matakuliah Diampuh</p>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <div class="col-lg-2 col-md-2 col-sm-2 ">
                                        <img class="img-circle mx-auto" id="foto" src="" alt="" style="width: 150px; height: 150px;">
                                    </div>
                                </td>
                                <td>
                                    <div class="col-lg-7 col-md-7 col-sm-7 text-left">

                                        <h5 class="text-left" id="listMK"></h5>
                                    </div>
                                </td>
                            </tr>
                            <br>
                        </table>
                        <br>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-3 " id="penilai">
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

        <div class="col-md-12 col-sm-12" id="lamin">
            <div class="col-md-3 col-sm-3">
                <div class="x_panel">
                    <ul class="nav text-start panel_toolbox">
                        <h2>Keterangan :</h2>
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
                            <h2> <button style="background-color: <?= $color; ?>;" class="btn"></button> <?= $o->jawaban ?> </h2>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
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
            <div class="col-md-3 col-sm-3">
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
            <div class="col-md-3 col-sm-3">
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
        <br><br>
        <div id="laminket" class="col-md-12 col-sm-12">
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
                
                // if(myChart1){
                //     myChart1.destroy();
                // }else if(myChart2){
                //     myChart2.destroy();
                // }else if(myChart3){
                //     myChart3.destroy();
                // }

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

                for (i = 0; i < listMK.length; i++) {
                    var namaMK = listMK[i].nama_mata_kuliah;
                    $('#listMK').append('<li>' + namaMK + '</li>');
                }
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