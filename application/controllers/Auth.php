<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// check if user logged in
		if ($this->session->userdata('username')) {
			redirect('main/dashboard');
		}

		// // rules form login
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		// // check form isnt run
		if ($this->form_validation->run() == false) {

			$this->load->view('auth/login');
		} else {

			// check form is run
			$this->_login();
		}
	}

	private function _login()
	{

		// get data email and password form form input login
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// check email from database and set value into variabel $user
		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		// check user is exist
		if ($user) {

			// check activated user
			if ($user['is_active'] == 1) {

				// check password user
				if (password_verify($password, $user['password'])) {

					// set data value for session
					$data = [
						'username' => $user['username'],
						'user_id' => $user['id'],
						'role_id' => $user['role_id'],
						'logged' => 'logged'
					];
					// set session
					$this->session->set_userdata($data);
					// $this->session->set_flashdata('logged', '<div class="alert alert-danger solid">Password is wrong!</div>');

					// redirect to dashboard user view
					redirect('main/dashboard');
				} else {

					// set flashdata when password is wrong
					$this->session->set_flashdata('message', '<div class="alert alert-danger solid">Password is wrong!</div>');
					// redirect to controller auth / view login
					redirect('auth');
				}
			} else {

				// set flashdata when iser not activated
				$this->session->set_flashdata('message', '<div class="alert alert-danger solid" role="alert">Username has not activated!</div>');
				// redirect to controller auth / view login
				redirect('auth');
			}
		} else {

			// set flashdata when email isnt registered
			$this->session->set_flashdata('message', '<div class="alert alert-danger solid">Username is not registered!</div>');
			// redirect to controller auth / view login
			redirect('auth');
		}
	}

	public function registration()
	{

		// rules form registration
		$this->form_validation->set_rules('username', 'Userame', 'required|trim|is_unique[user.username]', ['is_unique' => 'Username has been registered!']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password2]', [
			'matches' => 'Password not match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

		// check form validation isnt run
		if ($this->form_validation->run() == false) {

			$this->load->view('auth/registration');
		} else {
			// send data from value input from form
			$data = [
				'username' => htmlspecialchars($this->input->post('username'), true),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role_id' => 1,
				'is_active' => 1,
				'date_create' => time()
			];

			// // insert into table user
			$this->db->insert('user', $data);
			// // set flashdata when insert success
			$this->session->set_flashdata('message', '<div class="alert alert-success solid">Your Account has been registered!</div>');
			// // redirect to controller auth / view login
			redirect('auth');
		}
	}

	public function logout()
	{

		// unset session
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('logged');

		// set flashdata when logout
		$this->session->set_flashdata('message', '<div class="alert alert-success solid" role="alert">You have been Log Out!</div>');
		// redirect to controller auth / view login
		redirect('auth');
	}

	public function blocked()
	{
		$data['title'] = 'Blocked';
		$this->load->view('auth/blocked', $data);
	}
}
