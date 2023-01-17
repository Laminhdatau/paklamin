<?php


class M_pdf {

    function m_pdf() {
        //$CI = & get_instance();
    }

    public function load($param = NULL) {
        include_once APPPATH . '/third_party/mpdf/mpdf.php';
        if ($param === NULL) {
            $param = '"en-GB-x","A4","","",10,10,10,10,6,3';
            return new mPDF($param);
        }
        return new mPDF($param);
    }

}
