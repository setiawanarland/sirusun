<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('Rusun_model', 'rusun');
	
		// a function in file helper
		is_logged_in();
	}


	public function list($rusun_id) {

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


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('kamar/index', $data);
		$this->load->view('templates/footer');
	} 


}