<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posisi extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Model_Crud');
	}

	public function index(){
		$table = $this->uri->segment(1);
		$data['record'] = $this->Model_Crud->show($table);	
		$this->template->load('template','posisi/index', $data);
	}

	public function add(){
		if(isset($_POST['posisi_submit'])){
			$table  = $this->uri->segment(1);

			$this->db->select_max('id');
			$query  = $this->db->get($table);
			$result = $query->row()->id;

			$data   = array(
						'id' => $result+1, 
						'nama_posisi' => $this->input->post('text_posisi')
					  );

			$this->Model_Crud->add($table, $data);
			redirect($table);
		}		
	}

	public function update(){
		if(isset($_POST['posisi_submit'])){
			$table = $this->uri->segment(1);
			$id    = $this->input->post('text_id_posisi');
			$data  = array(
						'nama_posisi' => $this->input->post('text_posisi')
					 );

			$this->Model_Crud->update($table, $data, $id);
			redirect($table);			
		}else{
			$table = $this->uri->segment(1);
			$id = $this->uri->segment(3);
			$parameter = array('id' => $id);
			$data['record'] = $this->Model_Crud->get_one($table, $parameter)->row_array();
			$this->template->load('template','posisi/update',$data);
		}
	}

	public function delete(){
		$table = $this->uri->segment(1);
		$id    = $this->uri->segment(3);

		$this->Model_Crud->delete($table, $id);
		redirect($table);		
	}

}

