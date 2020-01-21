<?php

class instruktur_model extends CI_Model
{
	function tampil_data()
	{
		return $this->db->get('instruktur');
	}

	function edit_data($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	function hapus_data($id_instruktur)
	{
		$this->db->where('id_instruktur', $id_instruktur);
		$this->db->delete('instruktur');
		return TRUE;
	}

	function get_foto($id_instruktur)
	{
		$this->db->from('instruktur');
		$this->db->where('id_instruktur', $id_instruktur);
		$result = $this->db->get('');
		if ($result->num_rows() > 0) {
			return $result->row();
		}
	}
}