<div class="main_content">


    <div class="x_panel">
        <div class="x_title">
            <h2>Grafik Hasil Survei</h2>
        </div>
        <div class="x_content">
            <div class="form-floating col-md-6 col-sm-6">
                <select name="dosen" id="dosen" class="form-control">
                    <?php foreach ($datadosen as $dd) { ?>
                        <option value="<?= $dd->kd_dosen; ?>"><?= $dd->nama_lengkap; ?></option>
                    <?php } ?>
                </select>

            </div>
            <div class="form-floating col-md-6 col-sm-6">
                <a class="btn btn-info" href="<?= base_url('grafik/detailGrafik'); ?>">LIHAT DETAIL GRAFIK</a>
            </div>
        </div>

    </div>

    <div class="col-md-12 col-sm-12" id="lamin">
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


</div>




<script src="<?= base_url('assets/'); ?>vendors/echarts/dist/echarts.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script> -->

<script type="text/javascript">
    $('#lamin').hide();
    $('#dosen').change(function() {
        $('#lamin').show();


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
       


    });
</script>