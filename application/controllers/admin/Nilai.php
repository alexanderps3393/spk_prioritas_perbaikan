<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nilai extends CI_Controller {

    public function __construct() {

        parent::__construct();

        if ($this->session->userdata('logged_in') <> 1) {
            redirect(site_url('auth'));
        }

        $this->load->model(array('penilaian_model', 'kriteria_model', 'periode_model', 'rusak_model', 'indikator_model'));
    }

    public function index() {
        $data['periode'] = $this->periode_model->select_all();
        $data['kode_periode'] = $this->input->get('kode_periode');
        //menampilkan data kerusakan
        $data['kerusakan'] = array();
        if (!empty($this->input->get("kode_periode"))) {
            $data['kerusakan'] = $this->rusak_model->actionVIEW([
                "K.kode_kerusakan",
                "K.nama_kerusakan"
                    ], [
                "K.kode_periode" => $this->input->get("kode_periode")
            ]);
        }
        //menampilkan data kriteria
        $data['kriteria'] = $this->kriteria_model->actionVIEW([
            "KT.kode_kriteria",
            "KT.nama_kriteria"
        ]);
        //menampilkan dan menggabungkan data indikator kedalam kriteria
        foreach ($data['kriteria'] as $key => $k) {
            $data['kriteria'][$key]['indikator'] = $this->indikator_model->actionVIEW([
                "I.kode_indikator",
                "I.nama_indikator"
                    ], [
                "I.kode_kriteria" => $k['kode_kriteria']
            ]);
        }

        $this->tmp->display('admin/penilaian', $data);
    }

    public function form_ubah() {
        $this->tmp->display('admin/penilaian_ubah');
    }

    public function insert() {
        $kode_periode = $this->input->post("kode_periode");
        $kode_kerusakan = $this->input->post("kode_kerusakan");
        $kode_kriteria = $this->input->post("kode_kriteria");
        $kode_indikator = $this->input->post("kode_indikator");
        for ($index = 0; $index < count($kode_kerusakan); $index++) {
            //mengecek apakah sudah ada data dengan kombinasi kerusakan,kriteria,indikator dan periode yang sama
            $count_combine = $this->penilaian_model->actionCOUNT([
                "kode_periode" => $kode_periode,
                "kode_kerusakan" => $kode_kerusakan[$index],
                "kode_kriteria" => $kode_kriteria[$index]
            ]);
            if ($count_combine > 0) {
                //update
                $this->penilaian_model->actionUPDATE([
                    "kode_indikator" => $kode_indikator[$index]
                        ], [
                    "kode_periode" => $kode_periode,
                    "kode_kerusakan" => $kode_kerusakan[$index],
                    "kode_kriteria" => $kode_kriteria[$index]
                ]);
            } else {
                //insert
                $this->penilaian_model->actionINSERT([
                    "kode_periode" => $kode_periode,
                    "kode_kerusakan" => $kode_kerusakan[$index],
                    "kode_kriteria" => $kode_kriteria[$index],
                    "kode_indikator" => $kode_indikator[$index]
                ]);
            }
        }
        $this->session->set_flashdata("success_message", "Berhasil tambah data penilaian");
        redirect('admin/nilai?kode_periode='.$this->input->post("kode_periode"));
    }
}