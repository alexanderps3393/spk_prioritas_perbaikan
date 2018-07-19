<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class Rusak extends CI_Controller
   {
     public function __construct()
     {
       parent::__construct();

       $this->load->model(array('rusak_model','periode_model'));
	   //$this->load->library('this');

       if ($this->session->userdata('logged_in')<>1) {
           redirect(site_url('auth'));
       }

     }

     public function index(){
       $data['kode_periode'] = $this->input->get('kode_periode');
       $data['rusak_periode'] = $this->rusak_model->data_rusak_periode($data['kode_periode']);
       $data['periode'] = $this->periode_model->select_all();
       $this->tmp->display('admin/rusak_list',$data);
     }

     public function form_tambah(){
         $data['kode_periode'] = $this->input->get('kode_periode');
         $data['kode_rusak']= $this->rusak_model->kode_rusak();
         $data['periode'] = $this->periode_model->select_all();
         $this->tmp->display('admin/rusak_tambah',$data);
     }

      public function tambah(){
       $data = [
         'kode_kerusakan' => $this->rusak_model->kode_rusak(),
         'nama_kerusakan' => $this->input->post('nama_kerusakan'),
         'ruangan' => $this->input->post('ruang'),
         'kode_periode' => $this->input->post('kode_periode')
       ];

       $this->rusak_model->insert($data);
       $this->rusak_model->insert_penilaian($data['kode_kerusakan'],$data['kode_periode']);
       $this->session->set_flashdata('success_message','Berhasil menambahkan data');
       redirect('admin/rusak?kode_periode='.$data["kode_periode"]);

     }

     public function form_ubah($id)
     {
       $data['data'] = $this->rusak_model->select($id);
       $data['kode_periode'] = $this->input->get('kode_periode');
       $data['periode'] = $this->periode_model->select_all();
       $this->tmp->display('admin/rusak_ubah',$data);
     }

     public function ubah(){
       $data = [
         //'kode_kerusakan' => $this->rusak_model->kode_rusak(),
         'nama_kerusakan' => $this->input->post('nama_kerusakan'),
         'ruangan' => $this->input->post('ruang'),
         'kode_periode' => $this->input->post('kode_periode')
       ];

        $this->rusak_model->update($this->input->post('kode_kerusakan'),$data);
        $this->session->set_flashdata('success_message','Berhasil menambahkan data');
        redirect('admin/rusak?kode_periode='.$this->input->get('kode_periode'));
     }

     public function hapus($id){
       $this->rusak_model->delete($id);
       redirect('admin/rusak?kode_periode='.$this->input->get('kode_periode'));
     }

	 public function cetak(){
		$this->tmp->display('admin/cetak_rusak');
	 }

	 public function do_cetak(){
		$data = $this->rusak_model->action_result(
			['K.kode_kerusakan','K.nama_kerusakan','K.ruangan','P.tanggal'],
			$this->input->post('dari'),$this->input->post('sampai')
		);

		 //cetak
        //$this = new Fthis('P','cm','A4');
        $this->SetMargins(3,1);
        $this->AliasNbPages();
        $this->AddPage();

        $this->Ln();
        $this->setTextColor(128,0,0);
        $this->setFont('Arial','B',14);
        $this->Text(3,2,'LAPORAN DATA KERUSAKAN');
        $this->setFont('Arial','B',12);
        $this->Text(3,2.5,'Rsud Kajen Pekalongan');
        $this->setTextColor(0,0,0);
        $this->setFont('Arial','',10);
        $this->Text(5,1.9,'');
        $this->Line(18,3,3,3);

        $this->ln(1.6);
        $this->Ln(1);
        $this->write(0,'Periode : ' .$this->input->post('dari'). ' s/d ' .$this->input->post('sampai'));
        $this->ln(0.3);

        $this->Cell(1,0.5,'No',1,0,'C');
        $this->Cell(3,0.5,'Kode Kerusakan',1,0,'C');
        $this->Cell(3,0.5,'Nama Kerusakan',1,0,'C');
        $this->Cell(5,0.5,'Ruangan',1,0,'C');
        //$this->Cell(3,0.5,'Total',1,0,'C');
        $this->Ln();
        $no = 1;
        if($data>0)
        {
           foreach ($data as $row)
            {
            $this->Cell(1,0.5,$no++,1,0,'C');
            $this->Cell(3,0.5,$row['kode_kerusakan'],1,0,'C');
            $this->Cell(3,0.5,$row['nama_kerusakan'],1,0,'C');
            $this->Cell(5,0.5,$row['ruangan'],1,0,'C');
            //$this->Cell(3,0.5,$row['total'],1,0,'C');
            $this->Ln();
            }
        }else
        {
            echo '<script>alert("data tidak ada");</script>';
        }
        $this->Output("laporan_kerusakan.this","I");

	 }


   }
