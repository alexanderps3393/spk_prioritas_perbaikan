<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

     function __construct()
     {
         parent::__construct();

         if ($this->session->userdata('logged_in')<>1) {
             redirect(site_url('auth'));
         }
         $this->load->model('user_model');
     }

     public function index()
     {
        $data['user'] = $this->user_model->get_user();
        $this->tmp->display('admin/home',$data);
     }
     public function help(){
         $this->tmp->display('help');
     }
  }
