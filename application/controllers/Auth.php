<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('auth_model');
    }

    public function index(){
        $this->load->view('login');
    }

    public function login(){
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $valid = $this->auth_model->cek_login($username,$password);

      if($valid){
        foreach($valid as $val){
          $id = $val->id;
          $user = $val->username;
          $password = $val->password;
          $type = $val->type;

          if($type == 'admin'){
            $data = [
              'adm_name' => $user,
              'adm_pass' => $password,
              'adm_type' => $type,
              'adm_id'   => $id,
              'logged_in'=> true
            ];
            $this->session->set_userdata($data);
            redirect('admin/home');
          }

          if($type == 'ka_instalasi'){
            $data = [
              'ka_name' => $user,
              'ka_pass' => $password,
              'ka_type' => $type,
              'ka_id' => $id,
              'logged_in' => true
            ];
            $this->session->set_userdata($data);
            redirect('ka_instalasi/home');
          }
        }
      }else{
        $this->session->set_flashdata('error_message','Username or password salah');
        redirect('auth');
      }
    }

    public function admin_logout() {
      $data = [
        'adm_name',
        'adm_pass',
        'adm_type',
        'adm_id',
        'logged_in'
      ];
      $this->session->unset_userdata($data);
	  $this->session->sess_destroy();
      $this->session->set_flashdata('pesan','Admin log out');
      redirect('auth');
    }

    public function ka_instalasi_logout(){
      $data = [
        'ka_name',
        'ka_pass',
        'ka_type',
        'ka_id',
        'logged_in'
      ];
      $this->session->unset_userdata($data);
      $this->session->set_flashdata('pesan','Ka Instalasi log out');
      redirect('auth');
    }

    public function ubah(){
      $this->page->render_page('modul/ubah_password');
    }

    public function aksi_ubah($id){
      $this->form_validation->set_rules('user','User','required');
      $this->form_validation->set_rules('lama','Lama','required');
      $this->form_validation->set_rules('baru','Baru','required');
      $this->form_validation->set_rules('ulang','Ulang','required');

      if($this->form_validation->run())
      {
        $cek = $this->login_model->action_count('*',
          ['username'=>$this->input->post('user'),'password'=>$this->input->post('lama')]);
        if($cek==1){
          if($this->input->post('baru')==$this->input->post('ulang')){
            $this->login_model->action_update([
              'password' => $this->input->post('baru')
              ],['username'=>$this->input->post('user')]);
          }
        }
        redirect(site_url('login'));
      }
    }

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */
