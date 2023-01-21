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
                <h2>Form Wizards <small>Sessions</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div id="wizard_verticle" class="form_wizard wizard_verticle">
                    <ul class="list-unstyled wizard_steps anchor">
                        <li>
                            <a href="#step-11" class="selected" isdone="1" rel="1">
                                <span class="step_no">1</span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-22" class="disabled" isdone="0" rel="2">
                                <span class="step_no">2</span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-33" class="disabled" isdone="0" rel="3">
                                <span class="step_no">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-44" class="disabled" isdone="0" rel="4">
                                <span class="step_no">4</span>
                            </a>
                        </li>
                    </ul>

                    <div class="stepContainer" style="height: 383px;">
                        <div id="step-11" class="content" style="display: block;">
                            <h2 class="StepTitle">Step 1 Content</h2>
                            <form class="form-horizontal form-label-left">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">First Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="first-name2" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Last Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="last-name2" name="last-name" required="required" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Middle Name / Initial</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="middle-name2" class="form-control " type="text" name="middle-name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
                                    <div class="col-md-6 col-sm-6">
                                        <div id="gender2" class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                                                <input type="radio" name="gender" value="male" class="join-btn"> &nbsp; Male &nbsp;
                                            </label>
                                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                                                <input type="radio" name="gender" value="female" class="join-btn" checked=""> Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="birthday2" class="date-picker form-control" required="required" type="text">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="step-22" class="content" style="display: none;">
                            <h2 class="StepTitle">Step 2 Content</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                        <div id="step-33" class="content" style="display: none;">
                            <h2 class="StepTitle">Step 3 Content</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                        <div id="step-44" class="content" style="display: none;">
                            <h2 class="StepTitle">Step 4 Content</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

