<div class="x_panel">
    <div class="x_title">
        <h2>Grafik Hasil Survei</h2>
    </div>
    <div class="x_content">
        
        <?php $no=0; $k=0; $s=""; 
                    $dt=[];
                    $bagian=[];
                    $jumlah=[];
                    foreach($datatrp as $g){ 
                        // print_r($g->nama_lengkap);
                        if($s!=$g->nama_lengkap){
if($no>0){
    $dt[$no]['bagian']=$bagian;
    $dt[$no]['jumlah']=$jumlah;

}
                            $no++;

$dt[$no]=array(
    "nama"=>$g->nama_lengkap,
    "foto"=>$g->kd_dosen.'.jpeg',
);
$s=$g->nama_lengkap;
$k=0;
$bagian=[];
$jumlah=[];
                        }
$k++;
$bagian[$k]=$g->bagian_soal;
$jumlah[$k]=$g->jumlah;



                    }
                    if($no>0){
                        $dt[$no]['bagian']=$bagian;
                        $dt[$no]['jumlah']=$jumlah;
                    
                    }
                     ?>
                    <textarea hidden id="dataGrafik"><?php echo json_encode($dt); ?></textarea>
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
               <?php for($i=1;$i<=count($dt);$i++){?>
                <tr>
  
                    <td><?= $i; ?></td>
                    <td><?= $dt[$i]['nama']; ?></td>
                    <td><img style="width: 50px;height: 70px;" src="<?= base_url('file/images/pasphoto/').$dt[$i]['foto']?>" alt=""></td>
                    <td>
                        
                        <canvas style="width: 50px;height: 20px;" id="myChart[<?= $i; ?>]"></canvas>
                    </td>
                </tr>
                    <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<script src="<?= base_url('assets/'); ?>vendors/echarts/dist/echarts.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<script>
<?php for($j=1;$j<=count($dt);$j++){?>
    var myChart = document.getElementById("myChart[<?= $j; ?>]");
    Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 10;
    var dataKu = {
        labels: [
            <?php foreach($dt[$j]['bagian'] as $b) { ?>
                "<?= $b; ?>",
            <?php } ?>
        ],
        datasets: [{
            label:"Hasil",
            data: [
                <?php foreach($dt[$j]['jumlah'] as $m) { ?>
                "<?= $m; ?>",
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
        type: 'bar',
        data: dataKu
    });
    <?php } ?>
    console.log(dataKu);
</script>