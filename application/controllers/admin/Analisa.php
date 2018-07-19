<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Analisa
 *
 * @author nurul_cholis
 */
class Analisa extends CI_Controller {
    //put your code here
    public function __construct() {

        parent::__construct();

        if ($this->session->userdata('logged_in') <> 1) {
          redirect(site_url('auth'));
        }

        $this->load->model(array('periode_model', 'kriteria_model', 'penilaian_model', 'rusak_model'));
        $this->load->library("algoritma");
    }

    public function index() {

      $data['periode'] = $this->periode_model->select_all();
      $data['kode_periode'] = $this->input->get('kode_periode');

      $data['input'] = array();
      //validasi jika periode belum ada
      $counta = $this->penilaian_model->actionCOUNT([
          "P.kode_periode" => $data['kode_periode']
      ]);

      if($counta < 1) {
          $this->session->set_flashdata("error_message", "Periode tidak ditemukan");
      }else{
            $data['input'] = $this->kriteria_model->actionVIEW("KT.*");
            foreach ($data['input'] as $key => $value) {
                $data['input'][$key]['att'] = strtoupper($value['atribut']);
                //menampilkan kerusakan dan nilai indikator berdasarkan kode_kriteria
                $data['input'][$key]['data'] = $this->penilaian_model->actionVIEW([
                    "P.kode_kerusakan",
                    "K.nama_kerusakan",
                    "I.nilai"
                        ], [
                    "P.kode_kriteria" => $value['kode_kriteria'],
                    "P.kode_periode" => $data['kode_periode']
                ]);
            }
        }
        $this->tmp->display('admin/analisa',$data);
        //$this->page->render_page('modul/analisa', $data);
    }


    public function cetak(){

      $data = $this->penilaian_model->laporan([
        'H.kode_kerusakan','K.nama_kerusakan','H.nilai'
      ]);

      $pdf = new FPDF('P','cm','A4');
      $pdf->SetMargins(3,1);
      $pdf->AliasNbPages();
      $pdf->AddPage();

      $pdf->Ln();
      $pdf->setTextColor(128,0,0);
      $pdf->setFont('Arial','B',14);
      $pdf->Text(5,2,'LAPORAN ANALISA PRIORITAS PERBAIKAN');
      $pdf->setFont('Arial','B',12);
      $pdf->Text(7,2.5,'MENGGUNAKAN METODE SAW');
      $pdf->setTextColor(0,0,0);
      $pdf->setFont('Arial','',10);
      $pdf->Text(5,1.9,'');
      $pdf->Line(18,3,3,3);

      $pdf->Ln(2);
      $pdf->Ln(1);


      $pdf->setFont('Arial','',12);
      $pdf->Text(4,4,'Berikut ini adalah rekomendasi sistem pendukung keputusan penentuan');
      $pdf->Text(3,4.5,'prioritas pemeliharaan sarana RSUD Kajen Kabupaten Pekalongan :');
      //$pdf->setTextColor(0,0,0);
      //$pdf->setFont('Arial','',10);
      //$pdf->Text(5,1.9,'');
      //$pdf->Line(18,3,3,3);


      $pdf->ln(1.5);

      $pdf->Cell(1,0.5,'No',1,0,'C');
      $pdf->Cell(4,0.5,'Kode Kerusakan',1,0,'C');
      $pdf->Cell(5,0.5,'Nama Kerusakan',1,0,'C');
      $pdf->Cell(4,0.5,'Nilai',1,0,'C');
      $pdf->Ln();
      $no = 1;

      foreach ($data as $row)
      {
        $pdf->Cell(1,0.5,$no++,1,0,'C');
        $pdf->Cell(4,0.5,$row['kode_kerusakan'],1,0,'C');
        $pdf->Cell(5,0.5,$row['nama_kerusakan'],1,0,'L');
        $pdf->Cell(4,0.5,round($row['nilai'],3),1,0,'C');
        $pdf->Ln();
      }

      $pdf->Ln(1);
      $pdf->setFont('Arial','',12);
      $pdf->Text(4,9.5,'Demikian, agar digunakan dengan sebaik-baiknya hasil dari rekomendasi');
      $pdf->Text(3,10,'sistem pendukung keputusan diatas.');



      //$pdf->ln(1);
      $pdf->ln(3);
      $pdf->SetFont('Arial','',10);
      $pdf->Cell(25,0.7,"Kajen, ".date("d-m-Y"),0,10,'C');
      $pdf->SetFont('Arial','',9);
      $pdf->Cell(25,0.7,"Kepala Instalasi RSUD Kajen",0,10,'C');
      $pdf->ln(1);
      $pdf->SetFont('Arial','U',10);
      $pdf->Cell(25,0.7,"YANUAR ERZAQ, S.KM",0,10,'C');
      $pdf->SetFont('Arial','',10);
      $pdf->Cell(25,0.7,"NIP.1230022",0,10,'C');
      $pdf->ln();

      $pdf->Output("laporan_analisa".date("d-m-Y").".pdf","I");

    }

}