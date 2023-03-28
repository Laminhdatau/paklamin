<style>
    .wizard_verticle ul.wizard_steps li a.done::before,
    .wizard_verticle ul.wizard_steps li a.done .step_no {
        background: #FFA600;
        color: #fff;
    }

    .wizard_verticle ul.wizard_steps {
        display: table;
        list-style: none;
        position: relative;
        width: 20%;
        float: left;
        margin: 0 0 20px;
    }
</style>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <?= $this->session->flashdata('message'); ?>

        <form class="form-horizontal form-label-left" action="<?= base_url('survei/prosesSurvei'); ?>" id="kuesioner" method="post">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pengisian Kuisioner <small><b> <?= $nama = str_replace("%20", " ", $nama); ?></b></small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content col-md-12 col-sm-12 col-xs-12">
                    <div id="wizard_verticle" class="form_wizard wizard_verticle">
                        <ul class="list-unstyled wizard_steps anchor">
                            <li>
                                <a href="#step-1" class="selected" isdone="1" rel="1">
                                    <span class="step_no">1</span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-2" class="disabled" isdone="0" rel="2">
                                    <span class="step_no">2</span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-3" class="disabled" isdone="0" rel="3">
                                    <span class="step_no">3</span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-4" class="disabled" isdone="0" rel="4">
                                    <span class="step_no">4</span>
                                </a>
                            </li>
                        </ul>
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
                            <!-- </form> -->
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

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    CKEDITOR.replace('komentar');
</script>
<script>
    // saat halaman dimuat, scroll ke bagian atas
    window.scrollTo(0, 0);

    // fungsi untuk scroll ke bagian bawah halaman
    function scrollBottom() {
        window.scrollTo(0, document.body.scrollHeight);
    }

    // saat tombol "Next" di klik, scroll ke bagian bawah halaman
    document.querySelector('#wizard_verticle .next').addEventListener('click', function() {
        scrollBottom();
    });
</script>

<script src="<?= base_url('assets'); ?>/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>

<script>
    function validateForm() {
        var forms = document.getElementsByClassName('form-horizontal');
        var valid = true;

        // loop through each form
        for (var i = 0; i < forms.length; i++) {
            var radios = forms[i].querySelectorAll('input[type="radio"]');
            var radioChecked = false;

            // loop through each radio button
            for (var j = 0; j < radios.length; j++) {
                if (radios[j].checked) {
                    radioChecked = true;
                    break;
                }
            }

            // if none of the radio buttons are checked, set valid to false and display an error message
            if (!radioChecked) {
                valid = false;
                alert('Please select one option.');
                break;
            }
        }

        return valid;
    }
</script>