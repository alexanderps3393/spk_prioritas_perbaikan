<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class Periode extends CI_Controller
   {
     public function __construct()
     {
       parent::__construct();

       $this->load->model('periode_model');

       if ($this->session->userdata('logged_in')<>1) {
           redirect(site_url('auth'));
       }
     }

     public function index(){
       $data['periode'] = $this->periode_model->select_all();
       $this->tmp->display('admin/periode_list',$data);
     }

     public function form_tambah(){
         $data['kode_periode'] = $this->periode_model->kode_periode();
         $this->tmp->display('admin/periode_tambah',$data);
     }

     public function tambah(){
       $data = [
         'kode_periode'=>$this->periode_model->kode_periode(),
         'tanggal'=>$this->input->post('tanggal'),
       ];

       $this->periode_model->insert($data);
       $this->session->set_flashdata('success_message','Berhasil menambahkan data');
       redirect(site_url('admin/periode'));

     }

     public function form_ubah($id)
     {
       $data['row'] = $this->periode_model->select($id);
       $data['kode_periode'] = $this->periode_model->kode_periode();
       $this->tmp->display('admin/periode_ubah',$data);
     }

     public function ubah(){
       $this->periode_model->update($this->input->post('kode_periode'),['tanggal'=>$this->input->post('tanggal')]);
       $this->session->set_flashdata('success_message','Berhasil mengubah data');
       redirect(site_url('admin/periode'));
     }

     public function hapus($id){
       $this->periode_model->delete($id);
       redirect(site_url('admin/periode'));
     }
   }
