<style>
    .wizard_verticle ul.wizard_steps li a.done::before,
    .wizard_verticle ul.wizard_steps li a.done .step_no {
        background: #FFA600;
        color: #fff;
    }
</style>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Pengisian Kuisioner <small> Apa?</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
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

                    <form class="form-horizontal form-label-left" action="<?= base_url('survei/prosesSurvei'); ?>" method="get">
                        <input type="teks" name="id_answer">
                        <input type="teks" name="survei">
                        <input type="teks" name="soal">
                        <input type="teks" name="option">
                        <div class="stepContainer" style="height: 400px;">
                            <div id="step-1" class="content" style="display: block;">
                                <h2 class="soal1" style="background-color: #FFA600; color: #fff;width: 70%;height:5%;padding: 5px;"><b><?php echo $bagian1['bagian_soal']; ?></b></h2>
                                <!-- <form action="" method="post"> -->
                                <table>

                                    <?php $ns = 0;
                                    foreach ($soal1 as $s) {
                                        $ns++; ?>
                                        <tr>
                                            <td width="100%">
                                                <h2><input type="hidden" name="soal" value="<?= set_value($s->id_soal); ?>" readonly><?= $ns; ?>. <?= $s->soal_kepuasan; ?></h2>
                                            </td>
                                        </tr>
                                        <tr>
                                            <table>
                                                <tr>

                                                    <td width="15%"></td>
                                                    <td>
                                                        <?php $no = 0;
                                                        foreach ($option1 as $o) {
                                                            $no++; ?>
                                                            <h4>
                                                                <!-- <input type="radio" name="option<?= $ns; ?>" id="option<= $no ?>" required> -->
                                                                <input type="radio" name="option[<?= $ns; ?>]" id="option<?= $no ?>" required readonly>
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
                                <h2 class="soal2" style="background-color: #FFA600; color: #fff;width: 70%;height:5%;padding: 5px;"><b><?php echo $bagian2['bagian_soal']; ?></b></h2>

                                <!-- <form action="" method="post"> -->
                                <table>

                                    <?php $ns = 0;
                                    foreach ($soal2 as $s) {
                                        $ns++; ?>
                                        <tr>
                                            <td width="100%">
                                                <h2><input type="hidden" name="soal" value="<?= set_value($s->id_soal); ?>" readonly><?= $ns; ?>. <?= $s->soal_kepuasan; ?></h2>
                                            </td>
                                        </tr>
                                        <tr>
                                            <table>
                                                <tr>

                                                    <td width="15%"></td>
                                                    <td>
                                                        <?php $no = 0;
                                                        foreach ($option2 as $o) {
                                                            $no++; ?>
                                                            <h4>

                                                                <input type="radio" name="option[<?= $ns; ?>]" id="option<?= $no ?>" required>

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
                                <h2 class="soal3" style="background-color: #FFA600; color: #fff;width: 70%;height:5%;padding: 5px;"><b><?php echo $bagian3['bagian_soal']; ?></b></h2>
                                <!-- <form action="" method="post"> -->
                                <table>
                                    <?php $ns = 0;
                                    foreach ($soal3 as $s) {
                                        $ns++; ?>
                                        <tr>
                                            <td width="100%">
                                                <h2><input type="hidden" name="soal" id="soal" value="<?= set_value($s->id_soal); ?>" readonly><?= $ns; ?>. <?= $s->soal_kepuasan; ?></h2>
                                            </td>
                                        </tr>
                                        <tr>
                                            <table>
                                                <tr>

                                                    <td width="15%"></td>
                                                    <td>
                                                        <?php $no = 0;
                                                        foreach ($option3 as $o) {
                                                            $no++; ?>
                                                            <h4>
                                                                <!-- <input type="radio" name="option<= $ns; ?>" id="option<= $no ?>"> -->
                                                                <input type="radio" name="option[<?= $ns; ?>]" id="option<?= $no ?>" required>
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
                            <div id="step-4" class="content" style="display: none;">
                                <h2 class="kritiksaran" style="background-color: #FFA600; color: #fff;width: 70%;height:5%;padding: 5px;"><b>Kritik dan Saran</b></h2>
                                <!-- ===================================KRITIK Saran -->
                                <div class="x_content">
                                    <div id="alerts"></div>
                                    <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">

                                        <div class="btn-group">
                                            <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                                            <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                                        </div>
                                        <div class="btn-group">
                                            <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                                            <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                                            <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                                            <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                                        </div>
                                        <div class="btn-group">
                                            <a class="btn btn-info" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                                            <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                                            <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                                            <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                                        </div>

                                        <div class="btn-group">
                                            <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                                            <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                                        </div>
                                    </div>
                                    <div id="editor-one" class="editor-wrapper placeholderText" contenteditable="true"></div>
                                    <textarea name="komentar" id="komentar" style="display:none;"></textarea>

                                </div>
                                <!-- ===========================END KRITIK SARAN -->


                            </div>
                        </div>
                        <br>
                        <br><br>

                        <div class="mt-5">
                            <input type="submit" value="Submit" class="btn btn-success" onclick="prosesSurvei()">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let radios = document.querySelectorAll("input[type='radio']");
    radios.forEach(function(radio) {
        radio.addEventListener("change", function() {
            let step = document.querySelector("a[href='#step-" + this.name + "']");
            step.classList.add("done");
            console.log(step);
        });
    });
</script>