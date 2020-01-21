<?php


class sertifikat_model extends CI_Model
{

	function getdata()
	{
		$query = $this->db->query("SELECT
			`sertifikat`.*
			, `siswa`.*
			, `sertifikat`.status as status1
			FROM
			`sertifikat`
			INNER JOIN `siswa` 
			ON (`sertifikat`.`id_peserta` = `siswa`.`id_peserta`)");
		return $query->result();
	}

	function getsertifikat($id_sertifikat)
	{
		$query = $this->db->query("SELECT * FROM sertifikat where id_sertifikat='$id_sertifikat'");
		return $query->row();
	}

	function getnilai($id_peserta)
	{
		$query = $this->db->query("SELECT
			`siswa`.*
			, `penilaian`.*
			FROM
			`penilaian`
			INNER JOIN `siswa` 
			ON (`penilaian`.`id_peserta` = `siswa`.`id_peserta`)
			WHERE siswa.id_peserta = '$id_peserta'");
		return $query->row();
	}

	function cekscan($id_sertifikat)
	{
		$query = $this->db->query("SELECT * FROM sertifikat WHERE id_sertifikat = '$id_sertifikat'");
		return $query->row();
	}
}