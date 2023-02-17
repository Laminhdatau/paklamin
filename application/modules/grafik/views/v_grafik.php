<div class="x_panel">
    <div class="x_title">
        <h2>Grafik Hasil Survei</h2>
    </div>
    <div class="x_content">
        <div class="form-floating">
            <select name="dosen" id="dosen" class="form-control">
                <?php foreach ($datadosen as $dd) { ?>
                    <option value="<?= $dd->kd_dosen; ?>"><?= $dd->nama_lengkap; ?></option>
                <?php } ?>

            </select>
        </div>
        <br>

    </div>
</div>
<canvas id="grafik"></canvas>



<script src="<?= base_url('assets/'); ?>vendors/echarts/dist/echarts.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

<script type="text/javascript">
    $('#dosen').change(function() {
        var dosen = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'grafik/getGrafik/',
            data: 'dosen=' + dosen,
            success: function(response) {
                // var myChart = document.getElementById("grafik");
                // Chart.defaults.global.defaultFontFamily = "Lato";
                // Chart.defaults.global.defaultFontSize = 10;
                // var dataKu = {
                //     labels: [],
                //     datasets: [{
                //         label: "Hasil",
                //         data: [],
                //         backgroundColor: [
                //             'purple',
                //             'orange',
                //             'yellow'
                //         ],
                //         borderColor: [
                //             'purple',
                //             'orange',
                //             'yellow'
                //         ],
                //         borderWidth: 1
                //     }]
                // };
                // // console.log(dataKu);

                // var myChart = new Chart(myChart, {
                //     type: 'bar',
                //     data: dataKu
                // });

                console.log(dosen);
            }
        });
    });
</script>