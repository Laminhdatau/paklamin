<div class="row">

  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Pengisian Kuisioner <small><b> <?= $nama = str_replace("%20", " ", $nama); ?></b></small></h2>
        <div class="clearfix"></div>
      </div>


      <div id="wizard_verticle" class="form_wizard wizard_verticle">
        <ul class="list-unstyled wizard_steps">
          <li>
            <a href="#step-1">
              <span class="step_no">1</span>
            </a>
          </li>
          <li>
            <a href="#step-2">
              <span class="step_no">2</span>
            </a>
          </li>
          <li>
            <a href="#step-3">
              <span class="step_no">3</span>
            </a>
          </li>
          <li>
            <a href="#step-4">
              <span class="step_no">4</span>
            </a>
          </li>
        </ul>

        <form class="form-horizontal form-label-left" action="<?= base_url('survei/prosesSurvei'); ?>" id="kuesioner" method="post" onsubmit="return validateForm();">

          <input type="hidden" value="<?= $id_jenis; ?>" name="id_jenis" id="id_jenis">
          <input type="hidden" value="<?= $kd; ?>" name="kd_dosen" id="kd_dosen">
          <input type="hidden" value="<?= $kd_mk; ?>" name="kd_mata_kuliah" id="kd_mata_kuliah">
          <div id="step-1" class="content" style="display: block;">
            <h2 class="soal1" style="background-color: #FFA600; color: #fff; width: 95%; height:5%;padding: 5px;"><b><?php echo $bagian1['bagian_soal']; ?></b></h2>
            <table>

              <?php $ns = 0;
              foreach ($soal1 as $s) {
                $ns++; ?>
                <tr>
                  <td width="100%">
                    <h2><?= $ns; ?>. <?= $s->soal_kepuasan; ?></h2>
                    <input type="hidden" value="<?= $s->id_soal; ?>" name="soal1[<?= $ns; ?>]" id="soal1[<?= $ns; ?>]">
                  </td>
                </tr>
                <tr>
                  <table>
                    <tr>

                      <td width="15%"></td>
                      <td>
                        <?php
                        foreach ($option1 as $o) {
                        ?>
                          <h4>

                            <input type="radio" value="<?= $o->id_jawaban; ?>" name="option1[<?= $ns; ?>]" id="option1[<?= $ns ?>]" required>
                            <?= " " . $o->jawaban; ?>
                          </h4>
                        <?php } ?>
                      </td>
                    </tr>
                  </table>
                </tr>
              <?php } ?>
            </table>
          </div>
          <div id="step-2" class="content" style="display: none;">
            <h2 class="soal2" style="background-color: #FFA600; color: #fff;width: 95%;height:5%;padding: 5px;"><b><?php echo $bagian2['bagian_soal']; ?></b></h2>
            <table>

              <?php $ns = 0;
              foreach ($soal2 as $s) {
                $ns++; ?>
                <tr>
                  <td width="100%">
                    <h2><?= $ns; ?>. <?= $s->soal_kepuasan; ?></h2>
                    <input type="hidden" value="<?= $s->id_soal; ?>" name="soal2[<?= $ns; ?>]" id="soal2[<?= $ns; ?>]">
                  </td>
                </tr>
                <tr>
                  <table>
                    <tr>

                      <td width="15%"></td>
                      <td>
                        <?php
                        foreach ($option2 as $o) {
                        ?>
                          <h4>
                            <input type="radio" value="<?= $o->id_jawaban; ?>" name="option2[<?= $ns; ?>]" id="option2[<?= $ns ?>]" required>

                            <?= " " . $o->jawaban; ?>
                          </h4>
                        <?php } ?>
                      </td>
                    </tr>
                  </table>
                </tr>
              <?php } ?>
            </table>
          </div>
          <div id="step-3" class="content" style="display: none;">
            <h2 class="soal3" style="background-color: #FFA600; color: #fff;width: 95%;height:5%;padding: 5px;"><b><?php echo $bagian3['bagian_soal']; ?></b></h2>
            <table>
              <?php $ns = 0;
              foreach ($soal3 as $s) {
                $ns++; ?>
                <tr>
                  <td width="100%">
                    <h2><?= $ns; ?>. <?= $s->soal_kepuasan; ?></h2>
                    <input type="hidden" value="<?= $s->id_soal; ?>" name="soal3[<?= $ns; ?>]" id="soal3[<?= $ns; ?>]">
                  </td>
                </tr>
                <tr>
                  <table>
                    <tr>

                      <td width="15%"></td>
                      <td>
                        <?php
                        foreach ($option3 as $o) {
                        ?>
                          <h4>
                            <input type="radio" value="<?= $o->id_jawaban; ?>" name="option3[<?= $ns; ?>]" id="option3[<?= $ns ?>]" required>
                            <?= " " . $o->jawaban; ?>
                          </h4>
                        <?php } ?>
                      </td>
                    </tr>
                  </table>
                </tr>
              <?php } ?>
            </table>

          </div>

          <div id="step-4" class="content" style="display: none;" style="max-height: 40px;">
            <h2 class=" kritiksaran" style="background-color: #FFA600; color: #fff;width: 95%;height:5%;padding: 5px;"><b>Kritik dan Saran</b></h2>
            <div class="x_content">
              <div id="alerts">Silahkan Deskripsikan/Berikan Masukan Anda</div>
              <textarea name="komentar" id="komentar" class="editor-wrapper placeholderText col-md-4" contenteditable="true"></textarea>
            </div>
          </div>
          <!-- End SmartWizard Content -->
      </div>

      </form>
    </div>
  </div>
</div>



<!-- jQuery Smart Wizard -->
<script src="<?= base_url('assets'); ?>/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>

<script>
  CKEDITOR.replace('komentar');
</script>
