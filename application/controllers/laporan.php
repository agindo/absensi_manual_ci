<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model(array('Model_Karyawan','Model_Absensi','Model_Crud'));
	}

	public function lap1(){
		if(isset($_POST['lap1_submit'])){
			$date_lap1 = $this->input->post('text_date_lap1');
			$data['record'] = $this->Model_Absensi->search1($date_lap1);
		}else{
			if(isset($_POST['cetak_lap1_submit'])){
				$this->load->library('cfpdf');
				$pdf = new FPDF('P','mm','A4');
				$pdf->AddPage();

				$date_lap1 = $this->input->post('text_date_lap1');
				$data = $this->Model_Absensi->search1($date_lap1);
				$lata = $this->Model_Absensi->search1($date_lap1)->row_array();

				//$pdf->cell(30, 7, '', 0, 1, 'C');
				$pdf->cell(30, 7, '', 0, 1, 'C');

				$pdf->Image(base_url().'asset/img/logo_abc.jpg',10,12,-100);

				$pdf->SetFont('Arial','',16);
				//$pdf->cell(30, 7, '', 0, 0, 'C');
				$pdf->Cell(190,10,'LAPORAN ABSENSI / HARI',0,1,'R');
				$pdf->Ln(8);
				$pdf->SetFont('Arial','',11);
				$pdf->Cell(190,6,'Hari, Tanggal : '.$lata['hari'].", ".$lata['tgl']." ".$lata['bln']." ".$lata['thn'],0,1,'L');

				$pdf->Ln(4);

				$pdf->setFont('Arial','', 12);
				//$pdf->cell(30, 7, '', 0, 0, 'C');
				$pdf->cell(15, 7, 'No', 1, 0, 'C');
				$pdf->cell(95, 7, 'Nama Karyawan', 1, 0);
				$pdf->cell(40, 7, 'Shift I', 1, 0, 'C');
				$pdf->cell(40, 7, 'Shift II', 1, 1, 'C');

				$pdf->setFont('Arial','', 10);
				
				$no=1;
				foreach ($data->result() as $value) {
					//$pdf->cell(30, 7, '', 0, 0, 'C');
					$pdf->cell(15, 7, $no, 1, 0, 'C');
					$pdf->cell(95, 7, $value->nama_karyawan, 1, 0);
					$pdf->cell(20, 7, $value->jam_masuk, 1, 0, 'C');
					$pdf->cell(20, 7, $value->jam_keluar, 1, 0, 'C');
					$pdf->cell(20, 7, $value->jam_lembur_masuk, 1, 0, 'C');
					$pdf->cell(20, 7, $value->jam_lembur_keluar, 1, 1, 'C');	
					$no++;
				}

				$pdf->output();								
			}else{
				$data['record'] = $this->Model_Absensi->show_lap1();
			}				
		}

		$this->template->load('template','laporan/lap1',$data);
	}

	public function lap2(){
		if(isset($_POST['lap2_submit'])){			
			$nama = $this->input->post('text_karyawan_lap2');
			$bulan = $this->input->post('bulan_lap2');
			$tahun = $this->input->post('tahun_lap2');
			$parameter = array('nama_karyawan' => $nama);
			$data['ada'] = 1;
			$data['record'] = $this->Model_Absensi->search2($nama, $bulan, $tahun);
			$data['pata']	= $this->Model_Absensi->search3($parameter)->row_array();
			$data['wata']   = $this->Model_Crud->show_datetime($bulan, $tahun)->row_array();
		}else{
			if(isset($_POST['cetak_lap2_submit'])){
				$this->load->library('cfpdf');



				$pdf = new FPDF('P','mm','A4');
				$pdf->AddPage();

				//$pdf->cell(30, 7, '', 0, 1, 'C');
				$pdf->cell(30, 7, '', 0, 1, 'C');
				$pdf->Image(base_url().'asset/img/logo_abc.jpg',10,10,-100);

				$pdf->SetFont('Arial','',16);
				//$pdf->cell(40, 7, '', 0, 0, 'C');
				$pdf->Cell(190,6,'LAPORAN ABSENSI / BULAN',0,1,'R');

				$pdf->Ln(10);

				$nama = $this->input->post('text_karyawan_lap2');
				$bulan = $this->input->post('bulan_lap2');
				$tahun = $this->input->post('tahun_lap2');
				$parameter = array('nama_karyawan' => $nama);

				$bata	= $this->Model_Absensi->search3($parameter)->row_array();
				$kata   = $this->Model_Crud->show_datetime($bulan, $tahun)->row_array();

				$pdf->setFont('Arial','', 12);
				//$pdf->cell(40, 7, '', 0, 0, 'C');
				$pdf->cell(40, 7, 'Nama Karyawan', 0, 0, 'L');
				$pdf->cell(5, 7, ':', 0, 0, 'C');
				$pdf->cell(145, 7, $bata['nama_karyawan'], 0, 1, 'L');

				//$pdf->cell(40, 7, '', 0, 0, 'C');
				$pdf->cell(40, 7, 'Bulan', 0, 0, 'L');
				$pdf->cell(5, 7, ':', 0, 0, 'C');
				$pdf->cell(145, 7, $kata['bln']." ".$kata['thn'], 0, 1, 'L');

				$pdf->cell(40, 3, '', 0, 1, 'C');

				$pdf->setFont('Arial','', 12);
				//$pdf->cell(40, 7, '', 0, 0, 'C');
				$pdf->cell(15, 7, 'No', 1, 0, 'C');
				$pdf->cell(95, 7, 'Hari, Tanggal', 1, 0);
				$pdf->cell(40, 7, 'Shift I', 1, 0, 'C');
				$pdf->cell(40, 7, 'Shift II', 1, 1, 'C');

				$pdf->setFont('Arial','', 10);

				$data = $this->Model_Absensi->search2($nama, $bulan, $tahun);
				$no = 1;
				foreach ($data->result() as $value) {
					//$pdf->cell(40, 7, '', 0, 0, 'C');
					$pdf->cell(15, 7, $no, 1, 0, 'C');
					$pdf->cell(95, 7, $value->hari.", ".$value->tgl." ".$value->bln." ".$value->thn, 1, 0);
					$pdf->cell(20, 7, $value->jam_masuk, 1, 0, 'C');
					$pdf->cell(20, 7, $value->jam_keluar, 1, 0, 'C');
					$pdf->cell(20, 7, $value->jam_lembur_masuk, 1, 0, 'C');
					$pdf->cell(20, 7, $value->jam_lembur_keluar, 1, 1, 'C');
					$no++;
				}

				$pdf->output();								
			}else{
				$data['ada'] = 0;
			}		
		}
		
		$data['kata'] = $this->Model_Karyawan->show();	
		$this->template->load('template','laporan/lap2',$data);
	}

}

