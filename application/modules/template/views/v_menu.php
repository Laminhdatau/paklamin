<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">
            <li>
                <a href="<?php echo base_url('home'); ?>">
                    <i class="fa fa-home"></i> Halaman Utama </a>
                <ul class="nav child_menu"></ul>
            </li>

            <li><a><i class="fa fa-edit"></i> Man. Kuisioner <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo base_url('kuisdosen'); ?>">Kuis Dosen</a></li>
                    <li><a href="<?php echo base_url('kuismatakuliah'); ?>">Kuis Mata Kuliah</a></li>
                    <li><a href="<?php echo base_url('jenissurvei'); ?>">Jenis Survei</a></li>

                    <li><a>Grafik Hasil Survei <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: block;">
                            <li class="sub_menu"></li>
                            <li><a href="<?php echo base_url('grafik'); ?>">Prodi TI</a></li>
                            <li><a href="<?php echo base_url('grafik/getTHP'); ?>">Prodi THP</a></li>
                            <li><a href="<?php echo base_url('grafik/getMPP'); ?>">Prodi MPP</a></li>
                            <li><a href="<?php echo base_url('grafik/getTRP'); ?>">Prodi TRP</a></li>

                        </ul>
                    </li>
                </ul>
            </li>

            <li><a><i class="fa fa-book"></i> Kuisioner <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo base_url('survei'); ?>">Kuisioner</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>