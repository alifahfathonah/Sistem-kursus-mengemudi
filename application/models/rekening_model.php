<?php

class rekening_model extends CI_Model
{
	function tampil_data()
	{
		return $this->db->get('rekening');
	}

	function edit_data($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	function hapus_data($id_rekening)
	{
		$this->db->where('id_rekening', $id_rekening);
		$this->db->delete('rekening');
		return TRUE;
	}
}