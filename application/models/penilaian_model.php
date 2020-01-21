<?php


class penilaian_model extends CI_Model
{

	function getdata($id_instruktur)
	{
		$query = $this->db->query("SELECT
			`siswa`.*
			, `jadwal`.*
			,`siswa`.`status` AS status_siswa
			FROM
			`jadwal`
			INNER JOIN `siswa` 
			ON (`jadwal`.`id_peserta` = `siswa`.`id_peserta`)
			WHERE id_instruktur = '$id_instruktur' AND siswa.`status` = 'Penilaian'
			ORDER BY tgl_selesai ASC");
		return $query->result();
	}

	function getabsendata($id_jadwal)
	{
		$query = $this->db->query("SELECT * FROM absensi WHERE id_jadwal = '$id_jadwal'");
		return $query->result();
	}

	function getjadwaldata($id_jadwal)
	{
		$query = $this->db->query("SELECT * FROM jadwal WHERE id_jadwal = '$id_jadwal'");
		return $query->row();
	}

	function getsiswa($id_peserta)
	{
		$query = $this->db->query("SELECT * FROM siswa WHERE id_peserta = '$id_peserta'");
		return $query->row();
	}
}