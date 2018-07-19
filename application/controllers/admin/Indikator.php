<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class Indikator extends CI_Controller {

     public function __construct() {

       parent::__construct();

       $this->load->model(array('indikator_model','kriteria_model'));

       if ($this->session->userdata('logged_in')<>1) {
           redirect(site_url('auth'));
       }

     }

     public function index(){
       $data['kriteria'] = $this->kriteria_model->select_all();
       $data['indikator'] = $this->indikator_model->select_all();
       $data['kode_kriteria'] = $this->input->get("kode_kriteria");
       $data['relasi'] = $this->indikator_model->relasi_indikator($this->input->get("kode_kriteria"));

       $this->tmp->display('admin/indikator_list',$data);
     }

     public function form_tambah(){
       $data['kriteria'] = $this->kriteria_model->select_all();
       $data['kode_kriteria'] = $this->input->get('kode_kriteria');

       $this->tmp->display('admin/indikator_tambah',$data);
     }

     public function form_ubah($id){
       $data['kriteria'] = $this->kriteria_model->select_all();
       $data['kode_kriteria'] = $this->input->get('kode_kriteria');
       $data['data'] = $this->indikator_model->select($id);
       $this->tmp->display('admin/indikator_ubah',$data);
     }

     public function tambah(){
        $data = [
         'kode_kriteria' => $this->input->post('kode_kriteria'),
         'kode_indikator' => $this->input->post('kode_indikator'),
         'nama_indikator' => $this->input->post('nama_indikator'),
         'nilai' => $this->input->post('nilai')
       ];

       $this->indikator_model->insert($data);
       $this->session->set_flashdata('success_message','Berhasil menambahkan data');
       redirect('admin/indikator?kode_kriteria='.$data['kode_kriteria']);
     }

     public function ubah(){
        $data = [
         'kode_kriteria' => $this->input->post('kode_kriteria'),
         //'kode_indikator' => $this->input->post('kode_indikator'),
         'nama_indikator' => $this->input->post('nama_indikator'),
         'nilai' => $this->input->post('nilai')
       ];
       //$data['action'] = ('Kriteria/update_data/'.$id);
       $this->indikator_model->update($this->input->post('kode_indikator'),$data);
       $this->session->set_flashdata('success_message','Berhasil mengubah data');
       redirect('admin/indikator');
     }

     public function hapus($id){
       $this->indikator_model->delete($id);
       redirect('admin/indikator?kode_kriteria='.$this->input->get('kode_kriteria'));
     }

   }
