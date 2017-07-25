<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model(array('Model_Crud','Model_Posisi'));
	}

	public function index(){
		$table = $this->uri->segment(1);
		$data['record'] = $this->Model_Crud->show($table);
		$data['kata']   = $this->Model_Posisi->show();	
		$this->template->load('template','karyawan/index',$data);
	}

	public function add(){
		if(isset($_POST['karyawan_submit'])){
			$table = $this->uri->segment(1);

			$this->db->select_max('id');
			$query = $this->db->get($table);
			$result = $query->row()->id;

			$data = array(
						'id' => $result+1, 
						'nama_karyawan' => $this->input->post('text_karyawan'),
						'nama_posisi' => $this->input->post('text_posisi')
					);

			$this->Model_Crud->add($table, $data);
			redirect('karyawan');
		}
	}

	public function update(){
		if(isset($_POST['karyawan_submit'])){
			$table = $this->uri->segment(1);
			$id    = $this->input->post('text_id_karyawan');
			$data  = array(
						'nama_karyawan' => $this->input->post('text_karyawan'),
						'nama_posisi'   => $this->input->post('text_posisi')
					 );

			$this->Model_Crud->update($table, $data, $id);
			redirect($table);			
		}else{
			$table 	   = $this->uri->segment(1);
			$parameter = array('id' => $this->uri->segment(3));
			$data['record'] = $this->Model_Crud->get_one($table, $parameter)->row_array();
			$data['kata']   = $this->Model_Posisi->show();	
			$this->template->load('template','karyawan/update',$data);
		}
	}

	public function delete(){
		$table = $this->uri->segment(1);
		$id    = $this->uri->segment(3);

		$this->Model_Crud->delete($table, $id);
		redirect($table);		
	}
	
}

