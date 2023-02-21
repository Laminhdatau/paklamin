<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">

        <?php
        for ($i = 1; $i <= 9; $i++) {

            $mn[$i] = 0;
        }
        $level = who_am_i($this->session->userdata('security')->id_cession);

        switch ($level) {
            case 8:
                $mn[8] = 1;
                break;
            case 13:
                $mn[1] = 1;
                $mn[2] = 1;
                $mn[3] = 1;
                $mn[4] = 1;
                $mn[6] = 1;
                $mn[7] = 1;
                break;
            case 4:
                $mn[6] = 1;
                $mn[7] = 1;
                break;
            case 2:
                $mn[5] = 1;
            case 1:
                $mn[6] = 1;
                $mn[7] = 1;
                break;
        }

        ?>

        <ul class="nav side-menu">
            <li>
                <a href="<?php echo base_url('home'); ?>">
                    <i class="fa fa-home"></i> Halaman Utama </a>
                <ul class="nav child_menu"></ul>
            </li>

            <?php if ($level != 8) {

            ?>
                <li><a><i class="fa fa-edit"></i> Man. Kuisioner <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <?php if ($mn[1]) { ?>
                            <li><a href="<?php echo base_url('kuisdosen'); ?>">Kuis Dosen</a></li>
                        <?php } ?>
                        <?php if ($mn[2]) { ?>
                            <li><a href="<?php echo base_url('kuismatakuliah'); ?>">Kuis Mata Kuliah</a></li>
                        <?php } ?>
                        <?php if ($mn[3]) { ?>
                            <li><a href="<?php echo base_url('angket'); ?>">Option Jawaban</a></li>
                        <?php } ?>
                        <?php if ($mn[4]) { ?>
                            <li><a href="<?php echo base_url('jenissurvei'); ?>">Jenis Survei</a></li>
                        <?php } ?>
                        <?php if ($mn[5]) { ?>
                            <li><a href="<?php echo base_url('periodekuisioner'); ?>">Periode Kuisioner</a></li>
                        <?php } ?>


                        <li><a>Grafik Hasil Survei <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" style="display: block;">

                                <li class="sub_menu"></li>
                                <?php if ($mn[6]) { ?>
                                    <li><a href="<?php echo base_url('grafik'); ?>">Grafik Dosen</a></li>
                                <?php } ?>
                                <?php if ($mn[7]) { ?>
                                    <li><a href="<?php echo base_url('grafik/index2'); ?>">Grafik Matakuliah</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                </li>
            <?php } else {

            ?>
                <?php if ($mn[8]) { ?>
                    <li><a><i class="fa fa-book"></i> Kuisioner <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">

                            <li><a href="<?php echo base_url('survei'); ?>">Kuisioner</a></li>

                        </ul>
                    </li>
            <?php }
            } ?>

        </ul>
    </div>
</div>