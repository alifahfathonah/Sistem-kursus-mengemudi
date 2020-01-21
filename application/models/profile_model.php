<?php

class profile_model extends CI_Model
{

	function getdata($id_peserta)
	{
		$query = $this->db->query("SELECT * FROM siswa WHERE id_peserta = '$id_peserta'");
		return $query->row();
	}

	function getjadwal($id_peserta)
	{
		$query = $this->db->query("SELECT * FROM jadwal WHERE id_peserta = '$id_peserta'");
		return $query->row();
	}

	function hitunghari($id_peserta)
	{
		$query = $this->db->query("SELECT DATEDIFF(CURRENT_DATE, tgl_selesai) AS sisa FROM jadwal WHERE id_peserta = '$id_peserta'");
		return $query->row();
	}

	function getabsen($id, $pertemuan)
	{
		$query = $this->db->query("SELECT * FROM absensi where id_jadwal ='$id' AND pertemuan ='$pertemuan'");
		return $query->row();
	}

	function getnilai($id_peserta)
	{
		$query = $this->db->query("SELECT
			`penilaian`.*
			, `instruktur`.`id_instruktur`
			, `siswa`.`id_peserta`
			, `instruktur`.`nm_instruktur`
			FROM
			`penilaian`
			INNER JOIN `siswa` 
			ON (`penilaian`.`id_peserta` = `siswa`.`id_peserta`)
			INNER JOIN `instruktur` 
			ON (`penilaian`.`id_instruktur` = `instruktur`.`id_instruktur`)
			WHERE penilaian.`id_peserta` = '$id_peserta'");
		return $query->row();
	}

	function cekserti($id_peserta)
	{
		$query = $this->db->query("SELECT COUNT(*) AS jumlah FROM sertifikat WHERE id_peserta = '$id_peserta'");
		return $query->row();
	}

	function ceksertifikat($id_peserta)
	{
		$query = $this->db->query("SELECT * FROM sertifikat WHERE id_peserta = '$id_peserta'");
		return $query->row();
	}
}
