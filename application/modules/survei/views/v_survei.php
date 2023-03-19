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
        <div class="x_panel col-sm-12 col-xs-12">
            <div class=" text-center">

                <h1 class="text-center "><b> Survei Kepuasan</b></h1>
                <hr class="border-top border-5  ">

            </div>
            <div class="x_content text-black">
                <h6 class="text-center">Silahkan Isi Kuisioner Dosen dan Matakuliah dibawah ini sesuai dengan pendapat anda..!!</h6>
                <h6>Ket: </h6>
                <h6><button class="btn alert-warning"></button> : Belum Terisi</h6>
                <h6><button class="btn alert-secondary"></button> : Sudah Terisi</h6>
                <div class="row">
                    <div class="col-sm-12 col-xs-12 justify-content-between">
                        <table id="formkuis" class="col-md-12 col-sm-12 col-xs-10 table-bordered table-hover">
                            <thead>
                                <?php echo $this->session->flashdata('message'); ?>
                                <tr class="col-12">
                                    <th class="h5 text-center p-3 font-weight-bold" >
                                        MATAKULIAH
                                    </th>
                                    <th class="h5 text-center p-3 font-weight-bold">
                                        DOSEN
                                    </th>
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
                                        <td class="p-2 text-center">
                                            <?php if ($lamin == $dk->kd_mata_kuliah) { ?>
                                                <span></span>
                                            <?php } else {
                                                $lamin = $dk->kd_mata_kuliah;
                                                $ul = "#";

                                                if ($dk->ada_mk != "") {
                                                    $ul = base_url($dk->ada_mk);
                                                }
                                            ?>

                                                <a href="<?= $ul; ?>" class="btn alert-<?= $button1; ?>"><?= $dk->nama_mata_kuliah; ?></a>


                                            <?php } ?>

                                        </td>
                                        <td class="p-2 text-center">
                                            <?php if ($lamin1 == $dk->kd_dosen) { ?>
                                                <span></span>
                                            <?php } else {
                                                $lamin1 = $dk->kd_dosen;
                                                $ul = "#";
                                                if ($dk->ada_dosen != "") {
                                                    $ul = base_url($dk->ada_dosen);
                                                }
                                            ?>
                                                <a href="<?= $ul; ?>" class="btn alert-<?= $button2; ?> "><?= $dk->nama_dosen; ?></a>
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
