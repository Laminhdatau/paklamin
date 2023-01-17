<?php

class Home extends MX_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    function index(){
        $a['layout'] = 'v_home';
        $a['modules'] = 'home';
        echo Modules::run('template/backend', $a);
    }
    
}
