<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class Laporan extends CI_Controller
   {
     public function __construct()
     {
       parent::__construct();

       $this->load->model('rusak_model');

       if ($this->session->userdata('logged_in')<>1) {
           redirect(site_url('auth'));
       }

       $this->load->model('rusak_model');
    }

    public function index(){
      $this->tmp->display('ka_instalasi/cetak_rusak');
    }

    public function cetak(){

      $data = $this->rusak_model->action_result([
        'K.kode_kerusakan','K.nama_kerusakan','K.ruangan','P.tanggal'
      ],$this->input->post('dari'),$this->input->post('sampai'));

      $pdf = new FPDF('P','cm','A4');
      $pdf->SetMargins(3,1);
      $pdf->AliasNbPages();
      $pdf->AddPage();

      $pdf->Ln();
      $pdf->setTextColor(128,0,0);
      $pdf->setFont('Arial','B',14);
      $pdf->Text(3,2,'LAPORAN KERUSAKAN SARANA PRASARANA');
      $pdf->setFont('Arial','B',12);
      $pdf->Text(3,2.5,'RSUD KAJEN KAB.PEKALONGAN');
      $pdf->setTextColor(0,0,0);
      $pdf->setFont('Arial','',10);
      $pdf->Text(5,1.9,'');
      $pdf->Line(18,3,3,3);

      $pdf->ln(1.6);
      $pdf->Ln(1);
      $pdf->write(0,'Periode : ' .$this->input->post('dari'). ' s/d ' .$this->input->post('sampai'));
      $pdf->ln(0.3);

      $pdf->Cell(1,0.5,'No',1,0,'C');
      $pdf->Cell(3,0.5,'Kode Kerusakan',1,0,'C');
      $pdf->Cell(5,0.5,'Nama Kerusakan',1,0,'L');
      $pdf->Cell(4,0.5,'Ruang',1,0,'L');
      $pdf->Cell(4,0.5,'Periode',1,0,'L');
      $pdf->Ln();
      $no = 1;

      foreach ($data as $row)
      {
        $pdf->Cell(1,0.5,$no++,1,0,'C');
        $pdf->Cell(3,0.5,$row['kode_kerusakan'],1,0,'C');
        $pdf->Cell(5,0.5,$row['nama_kerusakan'],1,0,'L');
        $pdf->Cell(4,0.5,$row['ruangan'],1,0,'L');
        $pdf->Cell(4,0.5,$row['tanggal'],1,0,'L');
        $pdf->Ln();
      }

      $pdf->Cell(16,0.7,"Dicetak pada : ".date("d-m-Y"),0,0,'L');
      $pdf->ln(1);

      $pdf->ln(2);
      $pdf->SetFont('Arial','',9);
      $pdf->Cell(25,0.7,"Kajen, ".date("d-m-Y"),0,10,'C');
      $pdf->SetFont('Arial','',9);
      $pdf->Cell(25,0.7,"Kepala Instalasi RSUD Kajen",0,10,'C');
      $pdf->ln(1);
      $pdf->SetFont('Arial','',9);
      $pdf->Cell(25,0.7,"Ismet Asani, S.Kom",0,10,'C');
      $pdf->ln(1);

      $pdf->Output("laporan_kerusakan.pdf","I");
    }
}
