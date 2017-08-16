<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model(array('model_posisi','model_crud'));
	}

	public function lap1()
	{
		$data['url'] = $this->uri->segment(1);
		$this->load->view('header');
		$this->load->view('lap1');
		$this->load->view('footer',$data);
	}

	public function lap2()
	{
		$data['url'] = $this->uri->segment(1);
		$this->load->view('header');
		$this->load->view('lap2');
		$this->load->view('footer',$data);
	}

	public function lap3()
	{
		$data['url'] = $this->uri->segment(1);
		$this->load->view('header');
		$this->load->view('lap3');
		$this->load->view('footer',$data);
	}

}
