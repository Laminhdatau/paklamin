<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Mini Pie</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>


<script src="<?= base_url('assets/'); ?>vendors/echarts/dist/echarts.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<script>
    var myChart = document.getElementById("myChart");

    Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 18;

    var dataKu = {
        labels: [
            <?php foreach ($data as $d) :
                echo "'  $d->bagian_soal ' ,";
            endforeach; ?>
        ],
        datasets: [{
            data: [
                <?php foreach ($data as $d) :
                    echo "'  $d->jumlah_survei ' ,";
                endforeach; ?>
            ],
            backgroundColor: [
                "purple",
                "orange",
                "yellow"
            ]
        }]
    };

    var myChart = new Chart(myChart, {
        type: 'pie',
        data: dataKu
    });
    console.log(dataKu);
</script>