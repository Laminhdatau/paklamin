<?php if ($akun[0]->zp[6] == "0") { ?>
<?php } else { ?>

    <script>
        function cekit($idx) {
            hideForm();
            var sArr = $("#id_del_arr").val();
            if (sArr != "") {
                sArr = sArr.replace("]", "");
                sArr = sArr.replace("[", "");
            }
            var gV = document.getElementById($idx);
            if (gV.checked) {
                if (sArr == "") {
                    sArr = sArr + '"' + gV.value + '"';
                    j = 1;
                } else {
                    sArr = sArr + ',"' + gV.value + '"';
                }
            } else {
                sHp = '"' + gV.value + '"';
                sArr = sArr.replace(sHp, "");
            }
            sArr = sArr.replace(",,", ",");
            sArr = "[" + sArr + "]";
            sArr = sArr.replace(",]", "]");
            sArr = sArr.replace("[,", "[");
            if (sArr.length <= 2) {
                sArr = "";
            }
            var bCek = (sArr == "");
            $("#id_del_arr").val(sArr);
            document.getElementById("btnck").disabled = bCek;
        }

        function showForm(id = null) {
            $("#pnladd").slideDown("slow");
            $("#pnldata").slideDown("slow");
            $("#btn-tmb").hide("slow");

            if (id == null) {
                $("#id_jenis_survei").val("");
                $("#jenis_survei").val("");
                $("#title_addedit").html('<h2>Tambah Data : Soal</h2>');
                $("#btn").html('Simpan');
            }
        }

        function hideForm() {
            $("#pnladd").slideUp("slow");
            $("#pnldata").slideUp("slow");
            $("#btn-tmb").show("slow");
        }

        function editData(id_jenis_survei, jenis_survei) {
            $("#id_jenis_survei").val(id_jenis_survei);
            $("#jenis_survei").val(jenis_survei);
            $("#title_addedit").html('<h2>Edit Data : Soal</h2>');
            $("#btn").html('Update');
            showForm(id);
        }
    </script>

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
        <div class="x_panel col-sm-12">
            <div class="x_title">
                <h2><small>Pg: </small><b> SURVEI KEPUASAN</b></h2>
                <ul class="nav navbar-right">
                    <li><a class="close-link" href="<?php echo base_url('home'); ?>"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content text-black">
                <div class="row">
                    <div class="col-sm-12 justify-content-between">
                        <!-- =============================================== -->
                        <br />
                        <table class="col-md-6 col-sm-6 table table-bordered">
                            <thead>
                                <tr>
                                    <th>DOSEN</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($data as $dk) : ?>
                                    <tr>
                                        <td>
                                            <a href="<?= base_url('survei/isisurvei/'.$dk->kd_dosen.'/'.$dk->nama_dosen); ?>" class="btn btn-danger"><?= $dk->nama_dosen; ?></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <table class="col-md-6 col-sm-6 table table-bordered">
                            <thead>
                                <tr>
                                    <th>MATAKULIAH</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $dm) : ?>
                                    <tr>
                                        <td>
                                            <a href="<?= base_url('survei/isisurvei/'.$dm->kd_mata_kuliah.'/'.$dm->nama_mata_kuliah); ?>" class="btn btn-danger"><?= $dm->nama_mata_kuliah; ?></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="ln_solid"></div>
                        <!-- ====================================================== -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>