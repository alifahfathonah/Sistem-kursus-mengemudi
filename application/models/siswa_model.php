<?php

class siswa_model extends CI_Model
{
	function tampil_data()
	{
		return $this->db->get('siswa');
	}

	function edit_data($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	function hapus_data($id_peserta)
	{
		$this->db->where('id_peserta', $id_peserta);
		$this->db->delete('siswa');
		return TRUE;
	}

	function get_foto($id_siswa)
	{
		$this->db->from('siswa');
		$this->db->where('id_siswa', $id_siswa);
		$result = $this->db->get('');
		if ($result->num_rows() > 0) {
			return $result->row();
		}
	}
}