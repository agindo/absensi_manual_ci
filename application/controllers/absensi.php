<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Absensi extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model(array('Model_Crud','Model_Karyawan','Model_Absensi'));
	}

	public function index(){
		$data['kata']   = $this->Model_Karyawan->show();
		$data['record'] = $this->Model_Absensi->show();	
		$this->template->load('template','absensi/index',$data);
	}

	public function add(){
		if(isset($_POST['absensi_submit'])){
			$table  = $this->uri->segment(1);

			$this->db->select_max('id');
			$query  = $this->db->get($table);
			$result = $query->row()->id;
			
			
			$data   = array(
						'id' => $result+1, 
						'nama_karyawan' => $this->input->post('text_karyawan'),
						//'posisi' => $this->input->post('text_karyawan'),
						'jam_masuk' => $this->input->post('text_jam_masuk'),
						'jam_keluar' => $this->input->post('text_jam_keluar'),
						'jam_lembur_masuk' => $this->input->post('text_jam_lembur_masuk'),
						'jam_lembur_keluar' => $this->input->post('text_jam_lembur_keluar'),
						'tanggal' => $this->input->post('text_tanggal')
					  );

			$this->Model_Crud->add($table, $data);
			redirect($table);
		}
	}

	public function update(){
		if(isset($_POST['absensi_submit'])){
			$table = $this->uri->segment(1);
			$id    = $this->input->post('text_id_absensi');
			$data   = array( 
						'nama_karyawan' => $this->input->post('text_karyawan'),
						'jam_masuk' => $this->input->post('text_jam_masuk'),
						'jam_keluar' => $this->input->post('text_jam_keluar'),
						'jam_lembur_masuk' => $this->input->post('text_jam_lembur_masuk'),
						'jam_lembur_keluar' => $this->input->post('text_jam_lembur_keluar'),
						'tanggal' => $this->input->post('text_tanggal')
					  );

			$this->Model_Crud->update($table, $data, $id);
			redirect($table);			
		}else{
			$table 	   = $this->uri->segment(1);
			$parameter = array('id' => $this->uri->segment(3));
			$data['kata']   = $this->Model_Karyawan->show();
			$data['record'] = $this->Model_Crud->get_one($table, $parameter)->row_array();	
			$this->template->load('template','absensi/update',$data);
		}		
	}

	public function delete(){
		$table = $this->uri->segment(1);
		$id    = $this->uri->segment(3);

		$this->Model_Crud->delete($table, $id);
		redirect($table);		
	}
	
}

