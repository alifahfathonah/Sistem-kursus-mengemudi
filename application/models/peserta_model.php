<?php


class peserta_model extends CI_Model
{
	function getdata($id)
	{
		$query = $this->db->query("SELECT
			`siswa`.*
			, `jadwal`.*
			, siswa.`status` AS status_siswa
			FROM
			`jadwal`
			INNER JOIN `siswa` 
			ON (`jadwal`.`id_peserta` = `siswa`.`id_peserta`)
			WHERE id_instruktur = '$id'");
		return $query->result();
	}

	function getpeserta($id)
	{
		$query = $this->db->query("SELECT * FROM siswa WHERE id_peserta = '$id'");
		return $query->row();
	}

	function getjadwal($id)
	{
		$query = $this->db->query("SELECT * FROM jadwal WHERE id_peserta = '$id'");
		return $query->row();
	}
	
	function getabsen($id,$pertemuan)
	{
		$query = $this->db->query("SELECT * FROM absensi where id_jadwal ='$id' AND pertemuan ='$pertemuan'");
		return $query->row();
	}
}