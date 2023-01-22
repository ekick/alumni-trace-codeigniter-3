<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed') ;

/* load the MX_Controller class */
require APPPATH."third_party/MX/Controller.php";

//Parent Controller extends hmvc Controller load
class MY_Controller extends MX_Controller
{
    public function __construct(){
        parent::__construct();
    }

}
?>