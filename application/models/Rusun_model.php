<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rusun_model extends CI_Model
{

	public function getAllRusun()
	{
		$queryRusun = "SELECT COUNT(`lantai`.`rusun_id`) AS lantai, `rusun`.* 
					   FROM `rusun` 
					   LEFT JOIN `lantai` 
					   ON `rusun`.`id` = `lantai`.`rusun_id`
					   GROUP BY `lantai`.`rusun_id`";

		return $this->db->query($queryRusun)->result_array();
	}

	public function getLantai($rusun_id = 1)
	{
		$queryLantai = "SELECT * FROM `lantai` WHERE `rusun_id` = $rusun_id";

		return $this->db->query($queryLantai)->result_array();
	}

	public function getKamar($rusun_id = 1)
	{
		$queryKamar = "SELECT `lantai`.`id`, `lantai`.`nama_lantai`, `lantai`.`harga_lantai`,  `kamar`.* 
					   FROM `kamar`
					   JOIN `lantai`
					   ON `kamar`.`lantai_id` = `lantai`.`id` 
					   WHERE `kamar`.`rusun_id` = $rusun_id
					   ORDER BY `kamar`.`lantai_id`
					   ";

		return $this->db->query($queryKamar)->result_array();
	}

	public function getTotalKamarByRusun($rusun_id)
	{
		$query = "SELECT COUNT(`kamar`.`rusun_id`) AS kamar, `rusun`.* 
				  FROM `rusun` 
		   	      INNER JOIN `kamar` 
				  ON `rusun`.`id` = `kamar`.`rusun_id`
				  WHERE `kamar`.`rusun_id` = $rusun_id";

		return $this->db->query($query)->row_array();
	}

	public function getTotalLantaiByRusun($rusun_id)
	{
		$query = "SELECT COUNT(`lantai`.`rusun_id`) AS lantai, `rusun`.* 
				  FROM `rusun` 
		   	      INNER JOIN `lantai` 
				  ON `rusun`.`id` = `lantai`.`rusun_id`
				  WHERE `lantai`.`rusun_id` = $rusun_id";

		return $this->db->query($query)->row_array();
	}

	public function getRusunByUser($user_id)
	{
		$query = "SELECT `user_access_rusun`.*, `rusun`.*
				  FROM `rusun`
				  JOIN `user_access_rusun`
				  ON `user_access_rusun`.`rusun_id` = `rusun`.`id`
				  WHERE `user_access_rusun`.`user_id` = $user_id";

		return $this->db->query($query)->result_array();
	}

	public function getPenghuni($rusun_id)
	{
		$query = "SELECT `kamar`.`id` as kamar_id, `kamar`.`no_kamar`, `kamar`.`lantai_id`, 
				  `lantai`.`harga_lantai`, 
				  `penghuni`.*
				  FROM `penghuni`
				  JOIN `kamar` ON `penghuni`.`kamar_id` = `kamar`.`id`
                  JOIN `lantai` ON `kamar`.`lantai_id` = `lantai`.`id`
				  WHERE `kamar`.`rusun_id` = $rusun_id AND `penghuni`.`status` = 1";

		return $this->db->query($query)->result_array();
	}

	public function getTagihanPenghuni($rusun_id, $bulan, $tahun)
	{

		$query = "SELECT `kamar`.`id` as kamar_id, `kamar`.`no_kamar`, `kamar`.`lantai_id`, 
				  `lantai`.`harga_lantai`, `tagihan`.*, 
				  `penghuni`.*
				  FROM `penghuni`
				  JOIN `tagihan` ON `penghuni`.`id` = `tagihan`.`penghuni_id`
				  JOIN `kamar` ON `penghuni`.`kamar_id` = `kamar`.`id`
                  JOIN `lantai` ON `kamar`.`lantai_id` = `lantai`.`id`
				  WHERE `kamar`.`rusun_id` = $rusun_id AND `penghuni`.`status` = 1 AND MONTH(`tagihan`.`tgl_tenggat`) = $bulan AND YEAR(`tagihan`.`tgl_tenggat`) = $tahun";

		return $this->db->query($query)->result_array();
	}

	public function getTagihan($penghuni_id, $bulan, $tahun)
	{
		$query = "SELECT `lantai`.`rusun_id`, `lantai`.`harga_lantai`, `kamar`.`id` AS kamar_id, `tagihan`.* FROM tagihan
				  JOIN `penghuni` ON `tagihan`.`penghuni_id` = `penghuni`.`id`
				  JOIN `kamar` ON `penghuni`.`kamar_id` = `kamar`.`id`
				  JOIN `lantai` ON `kamar`.`lantai_id` = `lantai`.`id`
				  WHERE `tagihan`.`penghuni_id` = $penghuni_id AND `tagihan`.`bulan` = $bulan AND `tagihan`.`tahun` = $tahun";

		return $this->db->query($query)->row_array();
	}

	public function getDaftarPendapatan($rusun_id, $bulan, $tahun)
	{
		$query = "SELECT `penghuni`.`nama_penghuni`, `kamar`.`no_kamar`, `lantai`.`rusun_id`, `lantai`.`harga_lantai`, `tagihan`.* 
				  FROM `tagihan` 
				  JOIN `penghuni` ON `tagihan`.`penghuni_id` = `penghuni`.`id` 
				  JOIN `kamar` ON `penghuni`.`kamar_id` = `kamar`.`id`
				  JOIN `lantai` ON `kamar`.`lantai_id` = `lantai`.`id`
				  WHERE `is_bayar` = 1 AND `lantai`.`rusun_id` = $rusun_id AND `tagihan`.`bulan` = $bulan AND `tagihan`.`tahun` = $tahun";

		return $this->db->query($query)->result_array();
	}

	public function getPendapatanByRusun($rusun_id, $bulan, $tahun)
	{
		$query = "SELECT `lantai`.`rusun_id`, SUM(`jumlah`) AS jumlah_pendapatan 
				  FROM `pendapatan`
				  JOIN `tagihan` ON `pendapatan`.`tagihan_id` = `tagihan`.`id`
				  JOIN `penghuni` ON `tagihan`.`penghuni_id` = `penghuni`.`id` 
				  JOIN `kamar` ON `penghuni`.`kamar_id` = `kamar`.`id`
				  JOIN `lantai` ON `kamar`.`lantai_id` = `lantai`.`id` 
				  WHERE `lantai`.`rusun_id` = $rusun_id AND `pendapatan`.`bulan` = $bulan AND `pendapatan`.`tahun` = $tahun";

		return $this->db->query($query)->row_array();
	}

	public function totalPendapatan()
	{
		$query = "SELECT SUM(`jumlah`) AS `jumlah_pendapatan` FROM `pendapatan`";

		return $this->db->query($query)->row_array();
	}

	public function daftarTotalPendapatan()
	{
		$query = "SELECT `rusun`.`nama_rusun`, SUM(`pendapatan`.`jumlah`) AS jml_pendapatan, COUNT(`rusun`.`id`)
				  FROM `pendapatan`
				  JOIN `tagihan` ON `pendapatan`.`tagihan_id` = `tagihan`.`id`
				  JOIN `penghuni` ON `tagihan`.`penghuni_id` = `penghuni`.`id`
				  JOIN `kamar` ON `penghuni`.`kamar_id` = `kamar`.`id`
				  JOIN `lantai` ON `kamar`.`lantai_id` = `lantai`.`id`
				  JOIN `rusun` ON `lantai`.`rusun_id` = `rusun`.`id`
				  GROUP BY `rusun`.`id`";

		return $this->db->query($query)->result_array();
	}

	public function pendapatanBulan($bulan, $tahun)
	{
		$query = "SELECT SUM(`jumlah`) AS `jumlah_pendapatan` FROM `pendapatan` 
				  WHERE `bulan` = $bulan AND `tahun` = $tahun";

		return $this->db->query($query)->row_array();
	}

	public function daftarPendapatanBulan($bulan, $tahun)
	{
		$query = "SELECT `rusun`.`nama_rusun`, SUM(`pendapatan`.`jumlah`) AS jml_pendapatan, COUNT(`rusun`.`id`)
				  FROM `pendapatan`
				  JOIN `tagihan` ON `pendapatan`.`tagihan_id` = `tagihan`.`id`
				  JOIN `penghuni` ON `tagihan`.`penghuni_id` = `penghuni`.`id`
				  JOIN `kamar` ON `penghuni`.`kamar_id` = `kamar`.`id`
				  JOIN `lantai` ON `kamar`.`lantai_id` = `lantai`.`id`
				  JOIN `rusun` ON `lantai`.`rusun_id` = `rusun`.`id`
				  WHERE `pendapatan`.`bulan` = $bulan AND `pendapatan`.`tahun` = $tahun
				  GROUP BY `rusun`.`id`";

		return $this->db->query($query)->result_array();
	}

	public function totalPendapatanByRusun($rusun_id, $tahun)
	{
		$query = "SELECT `lantai`.`rusun_id`, SUM(`jumlah`) AS jumlah_pendapatan 
				  FROM `pendapatan`
				  JOIN `tagihan` ON `pendapatan`.`tagihan_id` = `tagihan`.`id`
				  JOIN `penghuni` ON `tagihan`.`penghuni_id` = `penghuni`.`id` 
				  JOIN `kamar` ON `penghuni`.`kamar_id` = `kamar`.`id`
				  JOIN `lantai` ON `kamar`.`lantai_id` = `lantai`.`id` 
				  WHERE `lantai`.`rusun_id` = $rusun_id AND `pendapatan`.`tahun` = $tahun";

		return $this->db->query($query)->row_array();
	}

	public function pendapatanRusunByMonthYear($rusun_id, $bulan, $tahun)
	{
		$query = "SELECT `lantai`.`rusun_id`, SUM(`jumlah`) AS jumlah_pendapatan 
				  FROM `pendapatan`
				  JOIN `tagihan` ON `pendapatan`.`tagihan_id` = `tagihan`.`id`
				  JOIN `penghuni` ON `tagihan`.`penghuni_id` = `penghuni`.`id` 
				  JOIN `kamar` ON `penghuni`.`kamar_id` = `kamar`.`id`
				  JOIN `lantai` ON `kamar`.`lantai_id` = `lantai`.`id` 
				  WHERE `lantai`.`rusun_id` = $rusun_id AND `pendapatan`.`bulan` = $bulan AND `pendapatan`.`tahun` = $tahun";

		return $this->db->query($query)->row_array();
	}

	public function tahunPendapatanRusun($rusun_id)
	{
		$query = "SELECT `pendapatan`.`tahun` AS tahun 
				  FROM `pendapatan`
				  LEFT JOIN `tagihan` ON `pendapatan`.`tagihan_id` = `tagihan`.`id`
				  LEFT JOIN `penghuni` ON `tagihan`.`penghuni_id` = `penghuni`.`id` 
				  LEFT JOIN `kamar` ON `penghuni`.`kamar_id` = `kamar`.`id`
				  LEFT JOIN `lantai` ON `kamar`.`lantai_id` = `lantai`.`id` 
				  WHERE `lantai`.`rusun_id` = $rusun_id
				  GROUP BY `pendapatan`.`tahun`";

		return $this->db->query($query)->result_array();
	}

	public function daftarTunggakan()
	{
		$query = "SELECT `rusun`.`id` AS rusun_id, `rusun`.`nama_rusun`, SUM(`lantai`.`harga_lantai`) AS jumlah_tunggakan, COUNT(`rusun`.`id`)
				  FROM `tagihan`
				  JOIN `penghuni` ON `tagihan`.`penghuni_id` = `penghuni`.`id`
				  JOIN `kamar` ON `penghuni`.`kamar_id` = `kamar`.`id`
				  JOIN `lantai` ON `kamar`.`lantai_id` = `lantai`.`id`
				  JOIN `rusun` ON `lantai`.`rusun_id` = `rusun`.`id`
				  WHERE MONTH(`tagihan`.`tgl_tenggat`) < MONTH(CURRENT_DATE()) AND `tagihan`.`is_bayar` = 0
				  GROUP BY `rusun`.`id`";

		return $this->db->query($query)->result_array();
	}

	public function detailTunggakan($rusun_id)
	{
		$query = "SELECT *
				  FROM `tagihan`
				  JOIN `penghuni` ON `tagihan`.`penghuni_id` = `penghuni`.`id`
				  JOIN `kamar` ON `penghuni`.`kamar_id` = `kamar`.`id`
				  JOIN `lantai` ON `kamar`.`lantai_id` = `lantai`.`id`
				  JOIN `rusun` ON `lantai`.`rusun_id` = `rusun`.`id`
				  WHERE MONTH(`tagihan`.`tgl_tenggat`) < MONTH(CURRENT_DATE()) AND `tagihan`.`is_bayar` = 0 AND `rusun`.`id` = $rusun_id
				  GROUP BY `rusun`.`id`";

		return $this->db->query($query)->result_array();
	}

	public function jumlahTunggakan()
	{
		$query = "SELECT SUM(`lantai`.`harga_lantai`) AS jumlah_tunggakan
				  FROM `tagihan`
				  JOIN `penghuni` ON `tagihan`.`penghuni_id` = `penghuni`.`id`
				  JOIN `kamar` ON `penghuni`.`kamar_id` = `kamar`.`id`
				  JOIN `lantai` ON `kamar`.`lantai_id` = `lantai`.`id`
				  JOIN `rusun` ON `lantai`.`rusun_id` = `rusun`.`id`
				  WHERE MONTH(`tagihan`.`tgl_tenggat`) < MONTH(CURRENT_DATE()) AND `tagihan`.`is_bayar` = 0";

		return $this->db->query($query)->row_array();
	}
}
