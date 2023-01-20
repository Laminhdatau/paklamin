<?php

class Data_views_array {

var $CI;

        public function __construct() {

                $this->CI =& get_instance();

        }

        public function action_per_module($array_modules) {

           $array_to_display = array();
           $array_view_data = array();

            if (!$array_modules) {
                return false;
            }
            else {
                while (list($key, $this_data) = each($array_modules)) {

                    /*
                    *  $this_data[0] -  is the controller name
                    * loading this model
                    */

                   $this->CI->load->library($this_data[0]);

                      if ($this_data[2] == 'NULL') {
                           /*
                           * if there are no arguments (method and passing variable)
                           * the model is called
                           */
                           $data = $this->CI->$this_data[0];

                      }
                        else {
                          /*
                          * getting method and passing variable from arguments
                          */
                //echo $this_data[2]. " - json<br>";
                          $obj = json_decode($this_data[2]);
                          $method = key(get_object_vars($obj));
                //echo $method. " - method<br>";

                          $pass_var = $obj->$method;

                         /*
                          * getting data for view
                          */
                          $data = $this->CI->$this_data[0]->$method($pass_var);

                        }


                    /*
                    * name of the View
                    */
                    $view = $this_data[1];

                    /*
                    * adding the pair of View to the $array_view_data 
                    */
                    array_push($array_view_data, $view);
                    array_push($array_view_data, $data);
                    /*
                    * passing View Array to Display array
                    */
                    array_push($array_to_display, $array_view_data);
                    /*
                    * clear the array of the pair of View and passing variable
                    */
                    unset($array_view_data);
                    $array_view_data = array();

                }
            }

            return $array_to_display;
        }

}