<?php
	class Model_Karyawan extends CI_Model{

		function show(){
			$this->db->from('karyawan');
			$this->db->order_by('id', 'desc');
			return $this->db->get('');
		}

	}
