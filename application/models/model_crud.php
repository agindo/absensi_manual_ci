<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Crud extends CI_Model {

	public function add($table, $data)
	{
		$this->db->insert($table, $data);
	}

	public function get_by_id($table, $id)
	{
		$this->db->from($table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function update($table, $where, $data)
	{
		$this->db->update($table, $data, $where);
	}

	public function delete($table, $id)
	{
		$this->db->where('id', $id);
		$this->db->delete($table);
	}

}
