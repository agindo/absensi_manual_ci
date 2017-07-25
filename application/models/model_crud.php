<?php
	class Model_Crud extends CI_Model{

		function show($table){
			$this->db->order_by('id', 'desc');
			return $this->db->get($table);
		}

		function add($table, $data){
			$this->db->insert($table, $data);
		}

		function update($table, $data, $id){
			$this->db->where('id', $id);
			$this->db->update($table, $data);
		}

		function get_one($table, $parameter){
			return $this->db->get_where($table, $parameter);
		}

		function delete($table, $id){
			$this->db->where('id', $id);
			$this->db->delete($table);
		}

		function show_datetime($month, $year){
			return $this->db->query("SELECT CASE $month WHEN 1 THEN 'Januari' WHEN 2 THEN 'Febuari' WHEN 3 THEN 'Maret' WHEN 4 THEN 'April' WHEN 5 THEN 'Mei' WHEN 6 THEN 'Juni' WHEN 7 THEN 'Juli' WHEN 8 THEN 'Agustus' WHEN 9 THEN 'September' WHEN 10 THEN 'Oktober' WHEN 11 THEN 'November' WHEN 12 THEN 'Desember' END AS bln, $year AS thn");
		}
		
	}
