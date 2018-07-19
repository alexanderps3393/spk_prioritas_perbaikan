<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class Kriteria extends CI_Controller {

        public function __construct() {

         parent::__construct();

         $this->load->model('kriteria_model');

         if ($this->session->userdata('logged_in')<>1) {
             redirect(site_url('auth'));
         }
       }

        public function index(){
          $data['kriteria'] = $this->kriteria_model->select_all();
          $this->tmp->display('admin/kriteria_list',$data);
        }

        public function form_tambah(){
            $data['kode_kriteria'] = $this->kriteria_model->kode_kriteria();
            $this->tmp->display('admin/kriteria_tambah',$data);
        }

        public function form_ubah($id){
           $data['row'] = $this->kriteria_model->select($id);
           $data['atribut'] = $this->atribut();
           $data['kode_kriteria'] = $this->kriteria_model->kode_kriteria();
           $this->tmp->display('admin/kriteria_ubah',$data);
        }

        public function tambah(){
          $data = [
            'kode_kriteria'=>$this->kriteria_model->kode_kriteria(),
            'nama_kriteria'=>$this->input->post('nama_kriteria'),
            'atribut' => $this->input->post('atribut'),
            'bobot' => $this->input->post('bobot')
          ];

          $this->kriteria_model->insert($data);
          $this->kriteria_model->insert_penilaian($data['kode_kriteria']);
          $this->session->set_flashdata('success_message','Berhasil menambahkan data');
          redirect(site_url('admin/kriteria'));
        }


        public function ubah(){
          $data = array(
            //'kode_kriteria'=>$this->input->post('kode_kriteria'),
            'nama_kriteria'=>$this->input->post('nama_kriteria'),
            'atribut' => $this->input->post('atribut'),
            'bobot' => $this->input->post('bobot')
          );

          //print_r($data);

          $this->kriteria_model->update($this->input->post('kode_kriteria'),$data);
          $this->session->set_flashdata('success_message','Berhasil mengubah data');
          redirect(site_url('admin/kriteria'));

        }

        public function hapus($id){
          $this->kriteria_model->delete($id);
          redirect(site_url('admin/kriteria'));
        }

        function atribut(){
            return  ['benefit'=>'benefit','cost'=>'cost'];

        }
   }
