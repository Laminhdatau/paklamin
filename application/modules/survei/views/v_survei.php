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
                    <div class="col-sm-12 col-xs-12 justify-content-between">
                        <!-- =============================================== -->
                        <br />
                        <table class="col-md-12 col-sm-12 col-xs-10 table table-bordered">
                            <thead>
                            <?php echo $this->session->flashdata('message'); ?>
                                <tr>
                                    <th>DOSEN</th>
                                    <th>MATAKULIAH</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($data as $dk) : ?>
                                    <tr>
                                        <td>
                                        
                                            <a href="<?= base_url('survei/isisurvei/1/' . $dk->kd_dosen . '/' .$dk->kd_mata_kuliah . '/' . $dk->nama_dosen); ?>" class="btn btn-danger" ><?= $dk->nama_dosen; ?></a>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('survei/isisurvei/2/' . $dk->kd_mata_kuliah . '/' . $dk->nama_mata_kuliah); ?>" class="btn btn-danger"><?= $dk->nama_mata_kuliah; ?></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>