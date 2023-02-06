<div class="x_panel">
    <div class="x_title">
        <h2>Grafik Hasil Survei</h2>
    </div>
    <div class="x_content">
        <p>Simple table with project listing with progress and editing options</p>

        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">No</th>
                    <th style="width: 20%">Dosen</th>
                    <th style="width: 20%">Foto</th>
                    <th>Hasil Survei</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        <a>Saiful Bahri Musa</a>
                    </td>
                    <td>
                        <ul class="list-inline">
                            <li>
                                <img src="<?= base_url(); ?>/file/images/pasphoto/pria.png" class="avatar" alt="Avatar">
                            </li>
                        </ul>
                    </td>
                    <td class="project_progress col-md-6">
                        <canvas id="myChart"></canvas>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>
                        <a>Saiful Bahri Musa</a>
                    </td>
                    <td>
                        <ul class="list-inline">
                            <li>
                                <img src="<?= base_url(); ?>/file/images/pasphoto/pria.png" class="avatar" alt="Avatar">
                            </li>
                        </ul>
                    </td>
                    <td class="project_progress">
                        <canvas id="myChart" style="width: 400px;display: block;height: 200px;"></canvas>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<script src="<?= base_url('assets/'); ?>vendors/echarts/dist/echarts.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<script>
    var myChart = document.getElementById("myChart");

    Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 10;
    var dataKu = {
        labels: [
            <?php foreach ($data as $d) :
                echo "'  $d->bagian_soal ' ,";
            endforeach; ?>
        ],
        datasets: [{
            data: [
                <?php foreach ($data as $d) :
                    echo "'  $d->jumlah ' ,";
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