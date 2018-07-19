<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class User extends CI_Controller
   {
     public function __construct()
     {
       parent::__construct();

       $this->load->model('user_model');

       if ($this->session->userdata('logged_in')<>1) {
           redirect(site_url('auth'));
       }
     }

     public function index(){
       $data['user'] = $this->user_model->get_user();
       $this->tmp->display('ka_instalasi/daftar_admin',$data);
     }

     public function form_tambah(){
       $this->tmp->display('ka_instalasi/admin_tambah');
     }

     public function tambah(){
       $data = [
         'id' => $this->input->post('id'),
         'username' => $this->input->post('username'),
         'password' => 'admin',
         'NIP' => $this->input->post('nip'),
         'jabatan' => $this->input->post('jabatan'),
         'type' => 'admin'
       ];

       $this->user_model->insert($data);
       $this->session->set_flashdata('success_message','Berhasil menambahkan data');
       redirect(site_url('ka_instalasi/user'));

     }

     public function form_ubah($id)
     {
       $data['user'] = $this->user_model->select($id);
       $data['jabatan'] = $this->jabatan();
       $this->tmp->display('ka_instalasi/admin_ubah',$data);
     }

     public function ubah(){
       $this->user_model->actionUPDATE([
         'username' => $this->input->post('username'),
         'NIP' => $this->input->post('nip'),
         'jabatan' => $this->input->post('jabatan'),
         'password' => $this->input->post('password')
       ],['id'=>$this->input->post('id')]);
       $this->session->set_flashdata('success_message','Berhasil mengubah data');
       redirect(site_url('ka_instalasi/user'));
     }

     function jabatan(){
        return array('staff'=>'Staff','koordinator'=>'Koordinator');
     }

     public function hapus($id){
       $this->user_model->delete($id);
       redirect(site_url('ka_instalasi/user'));
     }




   }
