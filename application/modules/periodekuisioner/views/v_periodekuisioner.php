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
                $("#id_pkuesioner").val("");
                $("#tmt").val("");
                $("#tst").val("");
                $("#id_periode_perkuliahan").val("");
                $("#title_addedit").html('<h2>Tambah Data : Periode Kuisioner</h2>');
                $("#btn").html('Simpan');
            }
        }

        function hideForm() {
            $("#pnladd").slideUp("slow");
            $("#pnldata").slideUp("slow");
            $("#btn-tmb").show("slow");
        }

        function editData(id, tst, tmt, id_periode_perkuliahan) {
            $("#id_pkuesioner").val(id);
            $("#tst").val(tst);
            $("#tmt").val(tmt);
            $("#id_periode_perkuliahan").val(id_periode_perkuliahan);
            $("#title_addedit").html('<h2>Edit Data : Periode Kuisioner</h2>');
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
                <h2><small>Pg: </small><b>Periode Kuesioner</b></h2>
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
                                <form class="" action="<?php echo base_url() . 'periodekuisioner/simpan_data'; ?>" method="post" novalidate="">
                                    <!-- spacebar -->

                                    <?php if (!empty($periode)) { ?>


                                        <div style="width: 100%; height:7px; border: 0px solid white;"></div>
                                        <span class="section" id="title_addedit">Data Periode Kuisioner</span>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-2 col-sm-2 label-align">Bagian<span class="required"> *</span></label>
                                            <div class="col-md-8 col-sm-8">
                                                <select name="id_periode_perkuliahan" id="id_periode_perkuliahan" class="form-control">
                                                    <?php foreach ($periode as $d) { ?>
                                                        <option value="<?= $d->id_periode_perkuliahan; ?>"><?= $d->daritahun; ?>/<?= $d->sampaitahun; ?> - <?= $d->semester; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-2 col-sm-2 label-align">Mulai Tanggal<span class="required"> *</span></label>
                                            <div class="col-md-8 col-sm-8">
                                                <input type="datetime-local" class="form-control" data-validate-length-range="4" data-validate-words="2" id="tmt" name="tmt" required="required" required>
                                                <input type="hidden" id="id_pkuesioner" name="id_pkuesioner">
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-2 col-sm-2 label-align">Selesai Tanggal<span class="required"> *</span></label>
                                            <div class="col-md-8 col-sm-8">
                                                <input type="datetime-local" class="form-control" data-validate-length-range="4" data-validate-words="2" id="tst" name="tst" required="required" required>
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
                                    <?php } else { ?>
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <!-- spacebar -->
                                                <div style="width: 100%; height:10px; border: 0px solid white;"></div>
                                                <div class="x_panel" style="background-color: #D3D3D3;">

                                                    <div class="x_content text-center text-success">
                                                        <h2><b>Periode Kuisioner Sudah Diaktifkan</b></h2>

                                                    </div>
                                                </div>
                                                <div class="col-md-8 offset-md-5">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    <button type="reset" onclick="hideForm();" class="btn btn-danger">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
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
                            <?= $this->session->flashdata('message'); ?>
                            <?php echo form_open('periodekuisioner/delete_data'); ?>
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
                                        <td><b>Tanggal Mulai</b></td>
                                        <td><b>Tanggal Selesai</b></td>
                                        <td><b>Tahun Ajaran</b></td>
                                        <td><b>Semester</b></td>
                                        <td><b>Status</b></td>
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
                                                    <input <?= $i->ada ?> type="checkbox" class="chkCheckBoxId filled-in chk-col-red" value="<?php echo $i->id_pkuesioner; ?>" name="id_pkuesioner[]" id="<?php echo $no; ?>" onclick="cekit(<?php echo $no; ?>)" />
                                                    <label for="<?php echo $no; ?>"></label>
                                                </td>
                                            <?php } ?>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $i->tmt; ?></td>
                                            <td><?php echo $i->tst; ?></td>
                                            <td><?php echo $i->daritahun; ?>/<?php echo $i->sampaitahun; ?></td>
                                            <td><?php echo $i->semester; ?></td>
                                            <td>
                                                <?php if ($i->status == '1') { ?>
                                                    <a href="<?= base_url('periodekuisioner/matikan/' . $i->id_pkuesioner); ?>" class="btn " style="background-color: orange;"><i class="glyphicon glyphicon-ok"></i></a>
                                                <?php } elseif ($i->status == '0') { ?>
                                                    <a href="<?= base_url('periodekuisioner/aktifkan/' . $i->id_pkuesioner); ?>" class="btn btn-danger"><i class="glyphicon glyphicon-off"></i></a>
                                                <?php } else {
                                                } ?>

                                            </td>
                                            <?php if ($akun[0]->zp[2] == "1") { ?>
                                                <td>
                                                    <button <?= $i->ada ?> type="button" class="btn btn-success btn-circle" onclick="editData('<?php echo $i->id_pkuesioner; ?>','<?php echo $i->tmt; ?>','<?php echo $i->tst; ?>','<?php echo $i->id_periode_perkuliahan; ?>');"><i class="glyphicon glyphicon-pencil"></i></button>
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