<?php if ($akun[0]->zp[6] == "0") { ?>
<?php } else { ?>


    <style>
        #pnladd {
            display: none;
        }

        #pnldata {
            display: none;
        }

        div .x_panel {
            color: black;
        }
    </style>

    <!--  <div id='breadcrumb'>
        <ul>
            <li><a href="<?php echo site_url('home') ?>" onclick="ga('send', 'event', 'Breadcrumbs', 'Level 1', 'trycss_height_width_intro')">Home</a></li>
            <li><a onclick="ga('send', 'event', 'Breadcrumbs', 'Level 2', 'trycss_height_width_intro')">Pengaturan</a></li>
            <li><a onclick="ga('send', 'event', 'Breadcrumbs', 'Level 1', 'trycss_height_width_intro')"><b> Coba </b></a></li>
            <li>  </li>
        </ul> </div> <div style="width: 100%; height:1px; border: inset purple;"></div> <div style="width: 100%; height:10px; border: 0px solid white;"></div> -->

    <div class="body clearfix">
        <div class="x_panel col-sm-12 col-xs-10">
            <div class="x_title">

                <h2><small>Pg: </small><b> SURVEI KEPUASAN</b></h2>
                <ul class="nav navbar-right">
                    <li><a class="close-link" href="<?php echo base_url('home'); ?>"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content text-black">
                <div class="row">
                    <button id="buttonmulai" class="btn btn-circle btn-success mx-auto" onclick="startCountdown()">Mulai Isi Kuisioner</button>
                    <div class="col-sm-12 col-xs-12 justify-content-between">
                        <!-- =============================================== -->
                        <br />

                        <span><b>
                                <p class="text-center text-danger" id="countdown"></p>
                            </b></span>

                        <table id="formkuis" class="col-md-12 col-sm-12 col-xs-10 table table-bordered">

                            <thead>
                                <?php echo $this->session->flashdata('message'); ?>
                                <tr>
                                    <th>MATAKULIAH</th>
                                    <th>DOSEN</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $lamin = "";
                                $lamin1 = "";
                                foreach ($data as $dk) {


                                    if ($dk->ada_mk) {
                                        $button1 = "warning";
                                    } else {
                                        $button1 = "secondary";
                                    }
                                    if ($dk->ada_dosen) {
                                        $button2 = "warning";
                                    } else {
                                        $button2 = "secondary";
                                    }


                                ?>

                                    <tr>
                                        <td>
                                            <?php if ($lamin == $dk->kd_mata_kuliah) { ?>
                                                <span></span>
                                            <?php } else {
                                                $lamin = $dk->kd_mata_kuliah;
                                                $ul = "#";

                                                if ($dk->ada_mk != "") {
                                                    $ul = base_url($dk->ada_mk);
                                                }
                                            ?>

                                                <a href="<?= $ul; ?>" class="btn btn-round alert-<?= $button1; ?>"><?= $dk->nama_mata_kuliah; ?></a>


                                            <?php } ?>

                                        </td>
                                        <td>
                                            <?php if ($lamin1 == $dk->kd_dosen) { ?>
                                                <span></span>
                                            <?php } else {
                                                $lamin1 = $dk->kd_dosen;
                                                $ul = "#";
                                                if ($dk->ada_dosen != "") {
                                                    $ul = base_url($dk->ada_dosen);
                                                }
                                            ?>
                                                <a href="<?= $ul; ?>" class="btn btn-round alert-<?= $button2; ?>"><?= $dk->nama_dosen; ?></a>
                                            <?php } ?>
                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>



<script>
    $(document).ready(function() {
        // Fetch the active periods from the controller using AJAX
        $.ajax({
            url: "<?php echo base_url('survei/get_active_periods'); ?>",
            dataType: "json",
            success: function(data) {
                // Check if there are any active records
                if (data.length > 0) {
                    // Set the countdown timer to the end of the first active record
                    var waktu_selesai = new Date(data[0].waktu_selesai).getTime();
                    countDownDate = waktu_selesai;

                    // Enable the start button
                    $("#buttonmulai").prop("disabled", false);
                } else {
                    // Disable the start button
                    $("#buttonmulai").prop("disabled", true);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });

        // setInterval for countdown timer
        var countDownDate = new Date().getTime() + 60000; // 60 seconds from now

        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the countdown timer
            $("#countdown-timer").html(minutes + "m " + seconds + "s ");

            // If the countdown is finished, display "EXPIRED" and disable the button
            if (distance < 0) {
                clearInterval(x);
                $("#countdown-timer").html("EXPIRED");
                $("#buttonmulai").prop("disabled", true);
            }
        }, 1000);

        // Click event for the start button
        $("#buttonmulai").on("click", function() {
            // Redirect to the questionnaire page
            window.location = "<?php echo base_url('survei'); ?>";
        });
    });
</script>