<?php
defined('BASEPATH') or exit('No direct script access allowed');


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Main extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		// load model
		$this->load->model('Rusun_model', 'rusun');
		// a function in file helper
		is_logged_in();
	}

	public function dashboard()
	{

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		if ($data['user']['role_id'] == 1) {

			$data['rusun'] = $this->db->get('rusun')->result_array();

			$data['total_pendapatan'] = $this->rusun->totalPendapatan();
			$data['pendapatan_bulan_ini'] = $this->rusun->pendapatanBulan(date('m'), date('Y'));
			$data['pendapatan_bulan_lalu'] = $this->rusun->pendapatanBulan(date('m') - 1, date('Y'));
			$data['jumlah_tunggakan'] = $this->rusun->jumlahTunggakan();

			$this->db->select('tahun');
			$this->db->group_by('tahun');
			$data['tahun_pendapatan'] = $this->db->get('pendapatan')->result_array();

			$data['tagihan'] = $this->rusun->getTagihanPenghuni($data['rusun'][0]['id'], date('m'), date('Y'));

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('dashboard/index', $data);
			$this->load->view('templates/footer');
		}

		if ($data['user']['role_id'] == 2) {
			$rusun_id = rusunId();
			$data['rusun'] = $this->db->get_where('rusun', ['id' => $rusun_id])->result_array();
			$data['rusun_id'] = $rusun_id;

			$data['total_pendapatan'] = $this->rusun->totalPendapatanByRusun($rusun_id, date('Y'));
			$data['pendapatan_bulan_ini'] = $this->rusun->pendapatanRusunByMonthYear($rusun_id, date('m'), date('Y'));
			$data['pendapatan_bulan_lalu'] = $this->rusun->pendapatanRusunByMonthYear($rusun_id, date('m') - 1, date('Y'));
			$data['jumlah_tunggakan'] = $this->rusun->jumlahTunggakanRusun($rusun_id);

			$data['tahun_pendapatan'] = $this->rusun->tahunPendapatanRusun($rusun_id);
			$data['tagihan'] = $this->rusun->getTagihanPenghuni($rusun_id, date('m'), date('Y'));

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('dashboard/index', $data);
			$this->load->view('templates/footer');
		}
	}

	public function kamar($rusun_id)
	{

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['rusun'] = $this->rusun->getRusunByUser($data['user']['id']);
		$data['lantai'] = $this->rusun->getLantai($rusun_id);
		$data['kamar'] = $this->rusun->getKamar($rusun_id);
		$data['total_kamar'] = $this->rusun->getTotalKamarByRusun($rusun_id);

		$this->db->where('status', 0);
		$this->db->where('rusun_id', $rusun_id);
		$data['total_kosong'] = $this->db->count_all_results('kamar');

		$this->db->where('status', 1);
		$this->db->where('rusun_id', $rusun_id);
		$data['total_terisi'] = $this->db->count_all_results('kamar');

		$this->form_validation->set_rules('nama-penghuni', 'Nama Penghuni', 'required|trim');
		$this->form_validation->set_rules('nik-penghuni', 'NIK Penghuni', 'required|trim|numeric|min_length[16]|is_unique[penghuni.nik_penghuni]');
		$this->form_validation->set_rules('no-kk-penghuni', 'No. KK Penghuni', 'required|trim|numeric|min_length[16]|is_unique[penghuni.no_kk_penghuni]');
		$this->form_validation->set_rules('pekerjaan-penghuni', 'Pekerjaan Penghuni', 'required|trim');
		$this->form_validation->set_rules('alamat-penghuni', 'Alamat Penghuni', 'required|trim');
		$this->form_validation->set_rules('telp-penghuni', 'No. Telp. Penghuni', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('kamar/index', $data);
			$this->load->view('templates/footer');
		} else {

			// var_dump($this->input->post('kamar-id'))

			// set name file upload
			$ktp_penghuni = date('m-y') . '_ktp_' . $this->input->post('nama-penghuni') . '.jpg';
			$kk_penghuni = date('m-y') . '_kk_' . $this->input->post('nama-penghuni') . '.jpg';
			// change name file upload
			$_FILES['ktp-penghuni']['name'] = $ktp_penghuni;
			$_FILES['kk-penghuni']['name'] = $kk_penghuni;

			$data = [
				'kamar_id' => $this->input->post('kamar-id'),
				'nama_penghuni' => $this->input->post('nama-penghuni'),
				'nik_penghuni' => $this->input->post('nik-penghuni'),
				'no_kk_penghuni' => $this->input->post('no-kk-penghuni'),
				'ktp_penghuni' => implode("_", explode(" ", $ktp_penghuni)),
				'kk_penghuni' => implode("_", explode(" ", $kk_penghuni)),
				'pekerjaan' => $this->input->post('pekerjaan-penghuni'),
				'alamat' => $this->input->post('alamat-penghuni'),
				'no_telp' => $this->input->post('telp-penghuni'),
				'tgl_masuk' => date('Y-m-d'),
				'status' => 1
			];

			// insert into table penghuni
			$this->db->insert('penghuni', $data);

			// insert into table tagihan
			$penghuni_id = $this->db->insert_id();
			$tagihan = [
				'penghuni_id' => $penghuni_id,
				'bulan' => date('m'),
				'tahun' => date('Y'),
				'tgl_tenggat' => date('Y-m-t'),
				'is_bayar' => 0
			];
			$this->db->insert('tagihan', $tagihan);

			// update kamar with status 1
			$this->db->set('status', 1);
			$this->db->where('id', $this->input->post('kamar-id'));
			$this->db->update('kamar');

			// config file upload
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '2048';
			$config['overwrite'] = TRUE;
			$config['upload_path'] = './assets/images/penghuni';
			// run library upload
			$this->load->library('upload', $config);

			// upload file ktp
			if (!$this->upload->do_upload('ktp-penghuni')) {
				echo $this->upload->display_errors();
			}
			// upload file kk
			if (!$this->upload->do_upload('kk-penghuni')) {
				echo $this->upload->display_errors();
			}

			$this->session->set_flashdata('message', 'Tambah Penghuni');
			$this->session->set_flashdata('flash', 'Successfully!');
			redirect('main/kamar/' . $rusun_id);
		}
	}

	public function penghuni($rusun_id)
	{

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['rusun'] = $this->rusun->getRusunByUser($data['user']['id']);
		$data['rusun_id'] = $rusun_id;
		$data['penghuni'] = $this->rusun->getPenghuni($rusun_id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('penghuni/index', $data);
		$this->load->view('templates/footer');
	}

	public function penghuniCheckout($penghuni_id, $kamar_id, $rusun_id)
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->set('status', 0);
		$this->db->where('id', $penghuni_id);
		$this->db->update('penghuni');

		$this->db->set('status', 0);
		$this->db->where('id', $kamar_id);
		$this->db->update('kamar');

		$this->session->set_flashdata('message', 'Penghuni Checkout');
		$this->session->set_flashdata('flash', 'Successfully!');
		redirect('main/penghuni/' . $rusun_id);
	}

	public function tagihan($rusun_id, $bulan, $tahun)
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['rusun'] = $this->rusun->getRusunByUser($data['user']['id']);
		$data['tagihan'] = $this->rusun->getTagihanPenghuni($rusun_id, $bulan, $tahun);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('tagihan/index', $data);
		$this->load->view('templates/footer');
	}

	public function bayar($penghuni_id, $bulan, $tahun)
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$tagihan = $this->rusun->getTagihan($penghuni_id, $bulan, $tahun);

		$pendapatan = [
			'tagihan_id' => $tagihan['id'],
			'jumlah' => $tagihan['harga_lantai'],
			'bulan' => date('m'),
			'tahun' => date('Y')
		];

		$this->db->insert('pendapatan', $pendapatan);

		$this->db->set('is_bayar', 1);
		$this->db->where('id', $tagihan['id']);
		$this->db->update('tagihan');

		$this->session->set_flashdata('message', 'Bayar Tagihan');
		$this->session->set_flashdata('flash', 'Successfully!');
		redirect('main/tagihan/' . $tagihan['rusun_id'] . '/' . $pendapatan['bulan'] . '/' . $pendapatan['tahun']);
	}


	public function pendapatan($rusun_id, $bulan, $tahun)
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['rusun'] = $this->rusun->getRusunByUser($data['user']['id']);

		$this->db->select('nama_rusun');
		$data['nama_rusun'] = $this->db->get_where('rusun', ['id' => $rusun_id])->row_array();
		$data['pendapatan'] = $this->rusun->getDaftarPendapatan($rusun_id, $bulan, $tahun);
		$data['total_pendapatan_rusun'] = $this->rusun->getPendapatanByRusun($rusun_id, $bulan, $tahun);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pendapatan/index', $data);
		$this->load->view('templates/footer');
	}

	public function totalPendapatan()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['rusun'] = $this->db->get('rusun')->result_array();
		$data['pendapatan'] = $this->rusun->daftarTotalPendapatan();
		$data['total_pendapatan'] = $this->rusun->totalPendapatan();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pendapatan/total', $data);
		$this->load->view('templates/footer');
	}

	public function pendapatanBulanIni()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['rusun'] = $this->db->get('rusun')->result_array();
		$data['pendapatan'] = $this->rusun->daftarPendapatanBulan(date('m'), date('Y'));
		$data['pendapatan_bulan_ini'] = $this->rusun->pendapatanBulan(date('m'), date('Y'));

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pendapatan/bulan-ini', $data);
		$this->load->view('templates/footer');
	}

	public function pendapatanBulanLalu()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['rusun'] = $this->db->get('rusun')->result_array();
		$data['pendapatan'] = $this->rusun->daftarPendapatanBulan(date('m') - 1, date('Y'));
		$data['pendapatan_bulan_lalu'] = $this->rusun->pendapatanBulan(date('m') - 1, date('Y'));

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pendapatan/bulan-lalu', $data);
		$this->load->view('templates/footer');
	}

	public function tunggakan()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['rusun'] = $this->db->get('rusun')->result_array();
		$data['daftar_tunggakan'] = $this->rusun->daftarTunggakan();
		$data['jumlah_tunggakan'] = $this->rusun->jumlahTunggakan();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('tunggakan/index', $data);
		$this->load->view('templates/footer');
	}

	public function detailTunggakan($rusun_id)
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['rusun'] = $this->db->get_where('rusun', ['id' => $rusun_id])->row_array();
		$data['detail_tunggakan'] = $this->rusun->detailTunggakan($rusun_id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('tunggakan/detail', $data);
		$this->load->view('templates/footer');
	}

	public function tambahTagihan()
	{
		$tagihan = $this->db->get_where('tagihan', ['bulan' => date('m') - 1])->result_array();

		foreach ($tagihan as $tghn) {
			$tagihan_baru = [
				'penghuni_id' => $tghn['penghuni_id'],
				'bulan' => date('m'),
				'tahun' => date('Y'),
				'tgl_tenggat' => date('Y-m-t'),
				'is_bayar' => 0
			];
			$this->db->insert('tagihan', $tagihan_baru);
		}
	}

	public function sendMessage()
	{
		// $penghuni = $this->rusun->getTagihanBroadcast(date('m') - 1, date('Y'));
		$penghuni = [
			[
				'no_telp' => '085299987685'
			],
			[
				'no_telp' => '082311274540'
			]
		];

		$pesan = nl2br("You will find the \n newlines in this string \r\n on the browser window.");

		foreach ($penghuni as $p) {
			// function broadcast in login_helper.php
			broadcast($p['no_telp'], $pesan);
		}
	}

	public function laporan($rusun_id, $tahun)
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['rusun'] = $this->rusun->getRusunByUser($data['user']['id']);
		$data['tahun'] = $tahun;
		$data['kamar'] = $this->db->get_where('kamar', ['rusun_id' => $rusun_id])->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('laporan/index', $data);
		$this->load->view('templates/footer');
	}

	public function export($rusun_id, $tahun)
	{
		$kamar = $this->db->get_where('kamar', ['rusun_id' => $rusun_id])->result();
		// var_dump($kamar);
		// die();

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->getStyle('A:P')->getAlignment()->setHorizontal('center');
		$sheet->getStyle('A:P')->getAlignment()->setVertical('center');
		$sheet->freezePane('A3');

		foreach (range('A', 'Z') as $columnID) {
			$sheet->getColumnDimension($columnID)->setAutoSize(true);
		}

		$sheet->setCellValue('A1', 'No. Kamar')->mergeCells('A1:A2');
		$sheet->setCellValue('B1', 'Penghuni')->mergeCells('B1:B2');
		$sheet->setCellValue('C1', 'Pekerjaan')->mergeCells('C1:C2');
		$sheet->setCellValue('D1', 'Pembayaran Bulanan')->mergeCells('D1:O1');

		$i = 1;
		foreach (range('d', 'o') as $v) {
			$sheet->setCellValue($v . '2', $i);
			$i++;
		}

		$sheet->setCellValue('P1', 'Jumlah')->mergeCells('P1:P2');

		$kolom = 3;
		$penghuni_kamar = 3;
		$jumlah_kamar = count($kamar) + 3;

		foreach ($kamar as $kmr) {


			$query = "SELECT `kamar`.*, `lantai`.`harga_lantai`, `penghuni`.*, `tagihan`.`tgl_tenggat`, `tagihan`.`is_bayar`, SUM(`lantai`.`harga_lantai`) AS jumlah
                      FROM `penghuni`
                      LEFT JOIN `tagihan` ON `penghuni`.`id` = `tagihan`.`penghuni_id`
                      LEFT JOIN `kamar` ON `penghuni`.`kamar_id` = `kamar`.`id`
                      LEFT JOIN `lantai` ON `kamar`.`lantai_id` = `lantai`.`id`
                      LEFT JOIN `rusun` ON `lantai`.`rusun_id` = `rusun`.`id`
                      WHERE `penghuni`.`kamar_id` = $kmr->id AND YEAR(`tagihan`.`tgl_tenggat`) = $tahun
                      GROUP BY `penghuni`.`id`";
			$penghuni = $this->db->query($query)->result();

			// print no_kamar
			if (count($penghuni) > 1) {
				$sheet->setCellValue('A' . $kolom, $kmr->no_kamar)->mergeCells('A' . $kolom . ':A' . ($kolom + (count($penghuni) - 1)));
				$penghuni_kamar = $kolom;
				$kolom = $kolom + (count($penghuni) - 1);
			} else {
				$sheet->setCellValue('A' . $kolom, $kmr->no_kamar);
			}

			// print col nama penghuni & pekerjaan
			foreach ($penghuni as $pghn) {
				if ($pghn->kamar_id == $kmr->id) {

					if (count($penghuni) > 1) {
						$sheet->setCellValue('B' . $penghuni_kamar, $pghn->nama_penghuni);
						$sheet->setCellValue('C' . $penghuni_kamar, $pghn->pekerjaan);
					} else {

						$sheet->setCellValue('B' . $kolom, $pghn->nama_penghuni);
						$sheet->setCellValue('C' . $kolom, $pghn->pekerjaan);
					}
				} else {
					$sheet->setCellValue('B' . $kolom, '');
					$sheet->setCellValue('C' . $kolom, '');
				}

				// print col pembayaran bulanan
				$j = 1;
				foreach (range('d', 'o') as $v) {

					if (count($penghuni) > 1) {

						if ($j == date('m', strtotime($pghn->tgl_tenggat)) && $pghn->is_bayar == 1) {
							$sheet->setCellValue($v . $penghuni_kamar, $pghn->harga_lantai);
						} elseif ($j == date('m', strtotime($pghn->tgl_tenggat)) && $pghn->is_bayar != 1) {
							$sheet->setCellValue($v . $penghuni_kamar, '  x   ');
						} elseif ($j < date('m', strtotime($pghn->tgl_masuk))) {
							$sheet->setCellValue($v . $penghuni_kamar, '      ');
						} else {
							$sheet->setCellValue($v . $penghuni_kamar, '      ');
						}
					} else {
						if ($j == date('m', strtotime($pghn->tgl_tenggat)) && $pghn->is_bayar == 1) {
							$sheet->setCellValue($v . $kolom, $pghn->harga_lantai);
						} elseif ($j == date('m', strtotime($pghn->tgl_tenggat)) && $pghn->is_bayar != 1) {
							$sheet->setCellValue($v . $kolom, '  x   ');
						} elseif ($j < date('m', strtotime($pghn->tgl_masuk))) {
							$sheet->setCellValue($v . $kolom, '      ');
						} else {
							$sheet->setCellValue($v . $kolom, '      ');
						}
					}

					$j++;
				}
				// print col jumlah
				if (count($penghuni) > 1) {
					$sheet->setCellValue('P' . $penghuni_kamar, '=SUM(D' . $penghuni_kamar . ':O' . $penghuni_kamar . ')');
				} else {
					$sheet->setCellValue('P' . $kolom, '=SUM(D' . $kolom . ':O' . $kolom . ')');
				}

				$penghuni_kamar++;
			}

			$kolom++;
		}

		// print row TOTAL
		$sheet->setCellValue('A' . $kolom, 'TOTAL')->mergeCells('A' . $kolom . ':C' . $kolom);
		foreach (range('d', 'o') as $v) {
			$sheet->setCellValue($v . $kolom, '=SUM(' . $v . '3:' . $v . ($jumlah_kamar - 1) . ')');
		}
		$sheet->setCellValue('P' . $kolom, '=SUM(P3:P' . ($jumlah_kamar - 1) . ')');

		$writer = new Xlsx($spreadsheet);

		$query_rusun = "SELECT `nama_rusun` FROM `rusun` WHERE `id` = $rusun_id";
		$nama_rusun = $this->db->query($query_rusun)->row();

		$filename = 'Laporan ' . $nama_rusun->nama_rusun . ' Tahun ' . $tahun;

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output'); // download file 

	}
}
