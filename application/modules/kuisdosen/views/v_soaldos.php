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
                $("#id_soal").val("");
                $("#soal_kepuasan").val("");
                $("#id_jenis_survei").val("");
                $("#status").val("");
                $("#title_addedit").html('<h2>Tambah Data : Soal</h2>');
                $("#btn").html('Simpan');
            }
        }

        function hideForm() {
            $("#pnladd").slideUp("slow");
            $("#pnldata").slideUp("slow");
            $("#btn-tmb").show("slow");
        }

        function editData(id_soal, soal_kepuasan, id_jenis_survei, status) {
            $("#id_soal").val(id_soal);
            $("#soal_kepuasan").val(soal_kepuasan);
            $("#id_jenis_survei").val(id_jenis_survei);
            $("#status").val(status);
            $("#title_addedit").html('<h2>Edit Data : Soal</h2>');
            $("#btn").html('Update');
            showForm(id_soal);
        }
    </script>

<script>
    document.getElementById("statusCheckbox").addEventListener("change",function(){
        var xhr = new XMLHttpRequest();
        xhr.open("POST","URLKU",true);
        xhr.setRequestHeader("x_content","aplication/x-www-form-urlencoded");
        xhr.send("status" + this.checked);

        xhr.send("status" + this.checked + "&id" +idData)

        xhr.onreadystatechange = function(){
            if(xhr.readyState === 4 && xhr.status === 200){}
        };
    });
</script>


    <style>
        #pnladd {
            display: none;
        }

        #pnldata {
            display: none;
        }
    </style>

    <!-- <div id='breadcrumb'>
        <ul>
            <li><a href="<?php echo site_url('home') ?>" onclick="ga('send', 'event', 'Breadcrumbs', 'Level 1', 'trycss_height_width_intro')">Home</a></li>
            <li><a onclick="ga('send', 'event', 'Breadcrumbs', 'Level 2', 'trycss_height_width_intro')">Pengaturan</a></li>
            <li><a onclick="ga('send', 'event', 'Breadcrumbs', 'Level 1', 'trycss_height_width_intro')"><b> Coba </b></a></li>
            <li> </li>
        </ul>
    </div>
    <div style="width: 100%; height:1px; border: inset purple;"></div>
    <div style="width: 100%; height:10px; border: 0px solid white;"></div> -->

    <div class="body clearfix">
        <div class="x_panel col-sm-12">
            <div class="x_title">
                <h2><small>Pg: </small><b>Daftar Soal Kuis Dosen</b></h2>
                <ul class="nav navbar-right">
                    <li><a class="close-link" href="<?php echo base_url('home'); ?>"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <?php if (($akun[0]->zp[0] == "1") || ($akun[0]->zp[2] == "1")) { ?>
                        <div class="col-sm-12" id="pnladd">
                            <div class="col-sm-12" style="background: #D3D3D3;">
                                <form class="" action="<?php echo base_url() . 'kuisdosen/simpan_data'; ?>" method="post" novalidate="">
                                    <!-- spacebar -->
                                    <div style="width: 100%; height:7px; border: 0px solid white;"></div>
                                    <span class="section" id="title_addedit">Data Soal</span>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-2 col-sm-2 label-align">Soal<span class="required"> *</span></label>
                                        <div class="col-md-8 col-sm-8">
                                            <input class="form-control" data-validate-length-range="4" data-validate-words="2" id="soal_kepuasan" name="soal_kepuasan" placeholder="Pertanyaan" required="required">
                                            <input type="hidden" id="id_soal" name="id_soal">
                                        </div>
                                    </div>
                                    <div class="ln_solid">
                                        <div class="form-group">
                                            <!-- spacebar -->
                                            <div style="width: 100%; height:10px; border: 0px solid white;"></div>
                                            <div class="col-md-6 offset-md-2">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <button type="reset" onclick="hideForm();" class="btn btn-danger">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- spacebar -->
                        <div id="pnldata" style="width: 100%; height:20px; border: 0px solid white;"></div>
                    <?php } ?>

                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <?php if ($akun[0]->zp[0] == "1" && $akun[0]->zp[2] == "0") { ?>
                                <td width="3%">
                                    <button type="button" id="btn-tmb" class="btn btn-primary btn-circle" onclick="showForm();"><i class="glyphicon glyphicon-plus"></i>Tambah</button>
                                </td>
                            <?php } ?>
                            <?php echo form_open('kuisdosen/delete_data'); ?>
                            <input type="hidden" id="id_del_arr" name="id_del_arr" value="">

                            <table id="listdata" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <?php if ($akun[0]->zp[4] == "1") { ?>
                                            <td width="3%">
                                                <button type="submit" id="btnck" disabled="disabled" class="btn btn-danger btn-circle" onclick="return confirm('Anda Yakin')"><i class="glyphicon glyphicon-trash"></i></button>
                                            </td>
                                        <?php } ?>
                                        <td width="3%"><b>No</b></td>
                                        <td><b>Pertanyaan</b></td>
                                        <td><b>Jenis Survei</b></td>
                                        <td><b><input type="checkbox" id="statusCheckbox"></b></td>
                                        <?php if ($akun[0]->zp[2] == "1") { ?>
                                            <?php if ($akun[0]->zp[0] == "1") { ?>
                                                <td width="3%">
                                                    <button type="button" id="btn-tmb" class="btn btn-primary btn-circle" onclick="showForm();"><i class="glyphicon glyphicon-plus"></i></button>
                                                </td>
                                            <?php } else { ?>
                                                <td width="3%"><b>Edit</b></td>
                                            <?php } ?>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;
                                    foreach ($data as $i) {
                                        $no++; ?>
                                        <tr>
                                            <?php if ($akun[0]->zp[4] == "1") { ?>
                                                <td>
                                                    <input type="checkbox" <?= $i->ada; ?> class="chkCheckBoxId filled-in chk-col-red" value="<?php echo $i->id_soal; ?>" name="idsoal[]" id="<?php echo $no; ?>" onclick="cekit(<?php echo $no; ?>)" />
                                                    <label for="<?php echo $no; ?>"></label>
                                                </td>
                                            <?php } ?>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $i->soal_kepuasan; ?></td>
                                            <td><?php echo $i->jenis_survei; ?></td>
                                            <td>
                                                <?php if ($i->status == 1) {
                                                    echo '<div class="badge badge-success">Aktif</div>';
                                                } else if ($i->status == 0) {
                                                    echo '<div class="badge badge-danger">Tidak Aktif</div>';
                                                } else {
                                                    echo '<div class="badge badge-warning">Ambigu</div>';
                                                }; ?>
                                            </td>

                                            <?php if ($akun[0]->zp[2] == "1") { ?>
                                                <td>
                                                    <button type="button" <?= $i->ada; ?> class="btn btn-success btn-circle" onclick="editData('<?php echo $i->id_soal; ?>','<?php echo $i->soal_kepuasan; ?>','<?php echo $i->id_jenis_survei; ?>','<?php echo $i->status; ?>');"><i class="glyphicon glyphicon-pencil"></i></button>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>