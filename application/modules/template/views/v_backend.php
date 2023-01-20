<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?= base_url(); ?>file/images/logo.png" type="image/ico" />

  <title>SIAKAD - POLTEKGO</title>

  <?php if ($modules == "kurikulum") { ?>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" />
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js">
    </script>

  <?php } ?>

  <?php if (cekmodule($modules)) {   ?>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <?php } ?>

  <!-- Bootstrap -->
  <link href="<?= base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?= base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?= base_url(); ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?= base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="<?= base_url(); ?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="<?= base_url(); ?>assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="<?= base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?= base_url(); ?>assets/build/css/custom.css" rel="stylesheet">

  <!-- Datatables -->
  <link href="<?= base_url(); ?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

</head>


<?php if (cekmodule($modules)) {   ?>
  <script type="text/javascript" class="init">
    $(document).ready(function() {
      $('#listdata').DataTable({
        stateSave: true,
        destroy: true,
        lengthMenu: [
          [10],
          ['10']
        ],
        paging: true,
        searching: true
      });
    });
  </script>
<?php } ?>


<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title">
            <a class="user-profile"> <img src="<?= base_url(); ?>file/images/ls.png" alt=""><span> SISTEM INFORMASI AKADEMIK</span></a>
          </div>

          <div class="clearfix"></div>
          <!-- <br /> -->

          <!-- sidebar menu -->
          <?php
          foreach ($cap as $key) {
            $datamenu['caption'] = $key->caption;
          }
          $datamenu['modules'] = $modules;
          $datamenu['akun'] = $ses;

          // print_r(json_encode($datamenu)); 

          $this->load->view('v_menu', $datamenu['akun']);
          ?>
          <!-- /sidebar menu  -->

          <!-- sidebar footer  -->

          <div class="sidebar-footer hidden-small">
          </div>
          <!-- /sidebar footer  -->
        </div>
      </div>


      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <?php foreach ($akun as $a) {
                    $photo = "file/images/pasphoto/$a->nik.jpg";
                    if (!file_exists($photo)) {
                      $photo = "file/images/pasphoto/pria.png";
                    }
                  ?>
                    <img src="<?= base_url() . $photo; ?>" alt="" class="img-circle profile_img" />
                  <?php } ?>



                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <?php foreach ($akun as $a) { ?>
                    <div align="center" class="nav navbar-nav">
                      <code><b><?= $a->nama_lengkap; ?></b></code>
                      <br>
                      <code><b><?= $a->tipe ?></b></code>
                    </div>
                  <?php } ?>

                  <a class="dropdown-item" href="<?php echo site_url('biodata') ?>"> Profile</a>
                  <a class="dropdown-item" href="javascript:;">
                    <span>Settings</span></a>
                  <a class="dropdown-item" href="<?php echo site_url('keluar') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                </div>
              </li>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <!--          <div class="">
            <div class="page-title">
              <div class="title_left"> -->
        <?php
        $pri = $this->db->query("SELECT '1,1,1,1' as zp, '1' as zs")->result();
        $datactrl['akun'] = $pri;
        // $datactrl['lstitle'] = "breadcrumb-bg-deep-purple";
        $datactrl['judul'] = "bg-blue-grey";
        // echo $pri[0]->zp; die;
        if ($pri[0]->zs[0] != "1" || $pri[0]->zp[6] == "0") {
          $datactrl = "";
          $modules = "home";
          $layout  = "v_home";
        }
        $this->load->view($modules . '/' . $layout, $datactrl);
        ?>

        <!--               </div>
            </div>
          </div> -->
      </div>

      <footer>
        <style>
          .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 15pt;
            background-color: #242424;
            color: white;
            text-align: center;
          }
        </style>
        <div class="footer">
          <a>SIAKAD-POLTEKGO</a>
          <b>Version: </b> 3.0.0
      </footer>
    </div>
  </div>

  <!-- jQuery -->
  <script src="<?= base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?= base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url(); ?>assets/vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="<?= base_url(); ?>assets/vendors/nprogress/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="<?= base_url(); ?>assets/vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- gauge.js -->
  <script src="<?= base_url(); ?>assets/vendors/gauge.js/dist/gauge.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="<?= base_url(); ?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="<?= base_url(); ?>assets/vendors/iCheck/icheck.min.js"></script>
  <!-- Skycons -->
  <script src="<?= base_url(); ?>assets/vendors/skycons/skycons.js"></script>
  <!-- Flot -->
  <script src="<?= base_url(); ?>assets/vendors/Flot/jquery.flot.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/Flot/jquery.flot.pie.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/Flot/jquery.flot.time.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/Flot/jquery.flot.stack.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="<?= base_url(); ?>assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="<?= base_url(); ?>assets/vendors/DateJS/build/date.js"></script>
  <!-- JQVMap -->
  <script src="<?= base_url(); ?>assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="<?= base_url(); ?>assets/vendors/moment/min/moment.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Datatables -->
  <script src="<?= base_url(); ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/jszip/dist/jszip.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="<?= base_url(); ?>assets/build/js/custom.min.js"></script>

</body>

</html>