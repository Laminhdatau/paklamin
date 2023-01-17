

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    function showForm() {
        $("#panel").slideDown("slow");
        $("#panel1").slideUp("slow");
        $("#btn-tmb").hide("slow");
    }

    function hideForm() {
        $("#panel").slideUp("slow");
        $("#panel1").slideDown("slow");
        $("#btn-tmb").show("slow");
    }


</script>
<ol class="breadcrumb breadcrumb-bg-teal">
    <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
    <li class="active"><i class="material-icons">settings</i>Pengaturan</li>
    <li class="active"><i class="material-icons">archive</i>Kontrak Kuliah</li>
</ol>
    
        <div class="body">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
    
<div id="btn-tmb"></div>
<style>
    #panel{
        display: none
    }
</style>
                              
<div id="panel">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card" id="toggle" id="" tabindex="-1">
        <div class="header bg-cyan">
            <h2>
            <small>Registrasi</small>
            </h2>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" action="login/regis/daftar" method="POST">
                    <div class="msg"></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <!-- <input type="text" class="form-control" name="kd_user" placeholder="N I K" required autofocus> -->
                            <select name="kd_user" id="" class="form-control">
                       <option value="">N A M A</option>
                       <?php foreach ($bd as $a) { ?>
                       <option value="<?= $a->nik?>"><?= $a->nama_lengkap?></option>
                        <?php }?>
                       </select>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="user1" placeholder="Email Address" required>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <!-- <input type="numerik" class="form-control" name="id_level" placeholder="level" required> -->
                       <select name="id_level" id="" class="form-control">
                       <option value="">L E V E L</option>
                       <?php foreach ($lv as $a) { ?>
                       <option value="<?= $a->id_level?>"><?= $a->level?></option>
                        <?php }?>
                       </select>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                        <!-- <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label> -->
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">D A F T A R</button>
                    <button type="button" onclick="hideForm();" class="btn btn-block btn-lg bg-pink waves-effect" data-dismiss="modal" id="btn-tmb" onclick="showForm();">C A N C E L</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <!-- <a href="sign-in.html">You already have a membership?</a> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
        <div class="card"  id="panel1">
            <div class="header bg-blue">
                <h2>
                    DAFTAR AKUN
                </h2>
            <ul class="header-dropdown m-r--5">
                <button type="button" class="btn bg-green waves-effect" id="btn-tmb" onclick="showForm();" ><small style="color: #0e95cf;">REGISTRASI</small></button></td>
                </li>
                    </ul>
            </div>
            <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation"><a href="#1" data-toggle="tab">
                                
                                </a></li>
                            </ul>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable">
                                    <thead  class="bg-red">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Level</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $no=1; foreach ($ld as $a) {   ?>
                                    <tr>
                                    <td class="text-center"><?= $no++;?></td>
                                    <td><?= $a->user?></td>
                                    <td><?= $a->level?></td>
                                    <td></td>
                                    </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            <h6 style="color: #FFFFFF;"></h6>
                            </div>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade" id="1">
                                </div>
                            </div>
                        </div>
                