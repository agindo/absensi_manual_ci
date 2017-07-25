<?php
	class Model_Posisi extends CI_Model{

		function show(){
			$this->db->order_by('id', 'desc');
			return $this->db->get('posisi');
		}

	}
