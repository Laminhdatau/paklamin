<!DOCTYPE html>
<html lang="en">

<head>
  <title>SIAKAD - POLITEKNIK GORONTALO</title>
  <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/plugins/login-new/css/style.css" rel="stylesheet">

<body class="body" style="background-image: url('<?php echo base_url(); ?>assets/plugins/login-new/images/bg_poligon.jpg'); ">
  <div class="logo">
    <!-- <img src="<?php echo base_url(); ?>assets/plugins/login-new/images/newpoligon.png"> -->
  </div>
  <div>
    <div class="veen">
      <div class="login-btn splits">
        <p>Silahkan Login?</p>

        <button class="active">Login</button>
      </div>
      <div class="rgstr-btn splits okee">
        <p>Lupa Password?</p>
        <button>Info</button>
      </div>
      <div class="wrapper">
        <form id="login" tabindex="500" action="silahkan" method="post">
          <div class="site-link">
            <img src="<?php echo base_url(); ?>assets/plugins/login-new/images/newpoligon.png">
          </div>
          <h3>Login</h3>
          <div class="mail">
            <input type="text" class="form-control" name="user" placeholder="" required autofocus>
            <label>Username</label>
          </div>
          <div class="passwd">
            <input type="password" class="form-control" name="password" placeholder="" required>
            <label>Password</label>
            <!--   <span class="glyphicon glyphicon-eye-open"></span> -->
          </div>
          <div class="submit">
            <button type="submit" style="color: #fff;" class="dark">Login</button>
          </div>

          <center>
            <h4 style=" margin-top: 20px; font-size: 10pt; ">
              <strong>
                <span style=" color: red;">
                  <?php echo $this->session->flashdata('error'); ?>
                  <?php echo $this->session->flashdata('belum_aktif'); ?>
                </span>
              </strong>
            </h4>
          </center>


        </form>
        <form id="register" tabindex="502">
          <div class="textinfo" style="margin-bottom:80px;">
            <div class="textinfoimg">
              <img src="<?php echo base_url(); ?>assets/plugins/login-new/images/newpoligon.png">
            </div>
            <p>Ubah password Anda secara berkala. Gunakan password minimal 8 karakter (huruf kapital, huruf kecil, dan angka).</p>
            <!-- <br> -->
            <p>Jangan lupa gunakan Log Out untuk mencegah pihak yang tidak berwenang melakukan sesuatu yang tidak diinginkan pada data Anda.</p>
            <!-- <br> -->
            <p>Jangan menggunakan tanggal lahir atau hal-hal umum lainnya sebagai password.</p>
            <!-- <br> -->
            <p>Silahkan hubungi ke masing - masing prodi untuk memperbaiki password anda.!</p>
          </div>
        </form>
      </div>
    </div>
  </div>
  <style type="text/css">
    .site-link img {
      width: 250px;
      height: 70px;
      margin-top: -5px;
    }
    .textinfo .textinfoimg img {
      width: 250px;
      margin-bottom: 30px;
    }
  </style>

  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/login-new/js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/login-new/js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/login-new/js/bm.js"></script>
</body>

</html>