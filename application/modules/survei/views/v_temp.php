
<link href="<?= base_url('assets'); ?>/build/css/custom.min.css" rel="stylesheet">
<script defer="" referrerpolicy="origin" src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyR2VudGVsZWxsYSUyMEFsZWxhISUyMCU3QyUyMCUyMiUyQyUyMnglMjIlM0EwLjUwNTc2MjE1MjE4Mjc2ODclMkMlMjJ3JTIyJTNBMTAyNCUyQyUyMmglMjIlM0E3NjglMkMlMjJqJTIyJTNBNjU2JTJDJTIyZSUyMiUzQTUyNyUyQyUyMmwlMjIlM0ElMjJodHRwcyUzQSUyRiUyRmNvbG9ybGliLmNvbSUyRnBvbHlnb24lMkZnZW50ZWxlbGxhJTJGZm9ybV93aXphcmRzLmh0bWwlMjIlMkMlMjJyJTIyJTNBJTIyaHR0cHMlM0ElMkYlMkZjb2xvcmxpYi5jb20lMkZwb2x5Z29uJTJGZ2VudGVsZWxsYSUyRmZvcm0uaHRtbCUyMiUyQyUyMmslMjIlM0EyNCUyQyUyMm4lMjIlM0ElMjJVVEYtOCUyMiUyQyUyMm8lMjIlM0EtNDgwJTJDJTIycSUyMiUzQSU1QiU1RCU3RA=="></script>

<script nonce="0e30a846-95ab-4df6-95ee-4a5ff450ffd2">(function(w,d){!function(f,g,h,i){f[h]=f[h]||{};f[h].executed=[];f.zaraz={deferred:[],listeners:[]};f.zaraz.q=[];f.zaraz._f=function(j){return function(){var k=Array.prototype.slice.call(arguments);f.zaraz.q.push({m:j,a:k})}};for(const l of["track","set","debug"])f.zaraz[l]=f.zaraz._f(l);f.zaraz.init=()=>{var m=g.getElementsByTagName(i)[0],n=g.createElement(i),o=g.getElementsByTagName("title")[0];o&&(f[h].t=g.getElementsByTagName("title")[0].text);f[h].x=Math.random();f[h].w=f.screen.width;f[h].h=f.screen.height;f[h].j=f.innerHeight;f[h].e=f.innerWidth;f[h].l=f.location.href;f[h].r=g.referrer;f[h].k=f.screen.colorDepth;f[h].n=g.characterSet;f[h].o=(new Date).getTimezoneOffset();if(f.dataLayer)for(const s of Object.entries(Object.entries(dataLayer).reduce(((t,u)=>({...t[1],...u[1]})))))zaraz.set(s[0],s[1],{scope:"page"});f[h].q=[];for(;f.zaraz.q.length;){const v=f.zaraz.q.shift();f[h].q.push(v)}n.defer=!0;for(const w of[localStorage,sessionStorage])Object.keys(w||{}).filter((y=>y.startsWith("_zaraz_"))).forEach((x=>{try{f[h]["z_"+x.slice(7)]=JSON.parse(w.getItem(x))}catch{f[h]["z_"+x.slice(7)]=w.getItem(x)}}));n.referrerPolicy="origin";n.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(f[h])));m.parentNode.insertBefore(n,m)};["complete","interactive"].includes(g.readyState)?zaraz.init():f.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script>



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




<div class="stepContainer" style="height: 501px;">
    <div id="step-11" class="content" style="display: block;">
        <h2 class="StepTitle">Step 1 Content</h2>
        <form class="form-horizontal form-label-left">
            <span class="section">Personal Info</span>
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
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
    </div>
    <div id="step-33" class="content" style="display: none;">
        <h2 class="StepTitle">Step 3 Content</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
    </div>
    <div id="step-44" class="content" style="display: none;">
        <h2 class="StepTitle">Step 4 Content</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
    </div>
</div>
<div class="actionBar">
    <div class="msgBox">
        <div class="content"></div><a href="#" class="close">X</a>
    </div>
    <div class="loader">Loading</div><a href="#" class="buttonFinish buttonDisabled btn btn-default">Finish</a><a href="#" class="buttonNext btn btn-success">Next</a><a href="#" class="buttonPrevious buttonDisabled btn btn-primary">Previous</a>
</div>


<script src="<?= base_url('assets'); ?>/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
<script src="<?= base_url('assets'); ?>/build/js/custom.min.js"></script>