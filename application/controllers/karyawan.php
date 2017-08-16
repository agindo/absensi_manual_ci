<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('model_karyawan','model_posisi','model_crud'));
	}

	public function index()
	{
		$data['url'] = $this->uri->segment(1);
		$data['record'] = $this->model_posisi->show_data();
		$this->load->view('header');
		$this->load->view('karyawan',$data);
		$this->load->view('footer', $data);
	}

	public function list_data()
	{
		$list = $this->model_karyawan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();

			$row[] = '<p class="text-center" style="margin:0px"><small>'.$no.'</small></p>';
			$row[] = '<small>'.$person->nama_karyawan.'</small>';
			$row[] = '<small>'.$person->nama_posisi.'</small>';
			$row[] = '<a class="btn btn-xs btn-primary btn-block" href="javascript:void(0)" title="Edit" onclick="edit('."'".$person->id."'".')"><i class="fa fa-pencil"></i></a>';
			$row[] = '<a class="btn btn-xs btn-danger btn-block" href="javascript:void(0)" title="Hapus" onclick="del('."'".$person->id."'".')"><i class="fa fa-remove"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $this->input->post('draw'),
						"recordsTotal" => $this->model_karyawan->count_all(),
						"recordsFiltered" => $this->model_karyawan->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);

	}

	public function add()
	{
		$this->db->select_max('id');
		$query = $this->db->get('karyawan');
		$result = $query->row()->id;

		$data = array(
					'id' => $result+1,
					'nama_karyawan' => $this->input->post('text_karyawan'),
					'nama_posisi' => $this->input->post('text_posisi')
				);

		$this->model_crud->add($this->uri->segment(1), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function edit($id)
	{
		$data = $this->model_crud->get_by_id($this->uri->segment(1), $id);
		echo json_encode($data);
	}

	public function update()
	{
		$data = array(
					'nama_karyawan' => $this->input->post('text_karyawan'),
					'nama_posisi' => $this->input->post('text_posisi')
				);
		$this->model_crud->update($this->uri->segment(1), array('id' => $this->input->post('text_id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function delete($id)
	{
		$this->model_crud->delete($this->uri->segment(1), $id);
		echo json_encode(array("status" => TRUE));
	}

}
