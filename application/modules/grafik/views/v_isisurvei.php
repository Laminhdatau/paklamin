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
                <h2><small>Pg: </small><b> Survei <?php echo $jenis['jenis_survei'] . " : " . $nama; ?></b></h2>
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
                        <form action="" method="post">
                            <table>

                                <?php $ns = 0;
                                foreach ($soal as $s) {
                                    $ns++; ?>
                                    <tr>
                                        <td width="100%">
                                            <h2><?= $ns; ?>. <?= $s->soal_kepuasan; ?></h2>
                                        </td>
                                    </tr>
                                    <tr>
                                        <table>
                                            <tr>

                                                <td width="15%"></td>
                                                <td>
                                                    <?php $no = 0;
                                                    foreach ($option as $o) {
                                                        $no++; ?>
                                                        <h4><input type="radio" name="option<?= $ns; ?>" id="option<?= $no ?>"><?= " ".$o->jawaban; ?></h4>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </tr>
                                <?php } ?>
                            </table>
                        </form>
                        <div class="ln_solid"></div>
                        <!-- ====================================================== -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>