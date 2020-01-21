<?php

/**
 * 
 */
class dashboard_model extends CI_Model
{
	
	function tampil_data()
	{
		$this->db->select('
			`pembayaran`.*
			, `siswa`.`id_peserta`
			, `siswa`.`nm_peserta`
			, `rekening`.`id_rekening`
			, `rekening`.`nm_bank`');
		$this->db->join('siswa', '`pembayaran`.`id_peserta` = `siswa`.`id_peserta`');
		$this->db->join('rekening', '`rekening`.`id_rekening` = `pembayaran`.`id_rekening`');
		$this->db->from('pembayaran');
		$this->db->where('pembayaran`.`status`', 'Proses');

		$query = $this->db->get();
		return $query->result();
	}

	function edit($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	function get_foto($username)
	{
		$this->db->from('admin');
		$this->db->where('username', $username);
		$result = $this->db->get('');
		if ($result->num_rows() > 0) {
			return $result->row();
		}
	}

	function countproses()
	{
		$query = $this->db->query('SELECT COUNT(*) AS total FROM pembayaran WHERE STATUS="Proses"');
		return $query->result();
	}

	function countditolak()
	{
		$query = $this->db->query('SELECT COUNT(*) AS total FROM pembayaran WHERE STATUS="Ditolak"');
		return $query->result();
	}

	function countditerima()
	{
		$query = $this->db->query('SELECT COUNT(*) AS total FROM pembayaran WHERE STATUS="Diterima"');
		return $query->result();
	}

	function tampil_data1()
	{
		$query = $this->db->query("SELECT
			`sertifikat`.*
			, `siswa`.*
			, `sertifikat`.status as status1
			FROM
			`sertifikat`
			INNER JOIN `siswa` 
			ON (`sertifikat`.`id_peserta` = `siswa`.`id_peserta`)
			WHERE `sertifikat`.`status`= 'Belum'");
		return $query->result();
	}
}