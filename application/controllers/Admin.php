<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Menu_model', 'menu');
		$this->load->model('User_model', 'user');
		$this->load->model('Rusun_model', 'rusun');
		$this->load->model('Kamar_model', 'kamar');

		// a function in file helper
		is_logged_in();
	}

	public function index() {

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Si Rusun Disperkimtan';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');

	}

	

	// ===================================================================
	// USER METHOD
	// ===================================================================

	public function user() {
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->model('Menu_model', 'menu');
		$data['users'] = $this->user->getAllUser();
		$data['roles'] = $this->db->get('user_role')->result_array();
		$data['title'] = 'Si Rusun Disperkimtan';

		// rules form registration
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', ['is_unique' => 'Username has been registered!']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password2]', [
			'matches' => 'Password not match!',
			'min_length' => 'Password too short!']);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');
		$this->form_validation->set_rules('role_id', 'User Role', 'required');

		// check form validation isnt run
		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/user', $data);
			$this->load->view('templates/footer');
		
		} else {
			// send data from value input from form
			$data = [
						'username' => htmlspecialchars($this->input->post('username'), true),
						'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
						'role_id' => $this->input->post('role_id'),
						'is_active' => 1,
						'date_create' => time()
					];

		// // insert into table user
		$this->db->insert('user', $data);
		// // set flashdata when insert success
		$this->session->set_flashdata('message', 'Add User is');
		$this->session->set_flashdata('flash', 'Successfully!');
		// // redirect to controller auth / view login
		redirect('admin/user');

		}
	}

	public function userActivation() {
		$id = $this->input->post('id');
		$isActive = $this->input->post('isActive');

		if ($isActive == 1) {
			$this->db->set('is_active', 0, FALSE);
			$this->db->where('id', $id);
			$this->db->update('user');

			$this->session->set_flashdata('message', 'Non-Activated User is');
			$this->session->set_flashdata('flash', 'Successfully!');
		} else {
			$this->db->set('is_active', 1, FALSE);
			$this->db->where('id', $id);
			$this->db->update('user');

			$this->session->set_flashdata('message', 'Activated User is');
			$this->session->set_flashdata('flash', 'Successfully!');
		}
	}

	public function addUser() {

		// rules form registration
		$this->form_validation->set_rules('username', 'Userame', 'required|trim|is_unique[user.username]', ['is_unique' => 'Username has been registered!']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password2]', [
			'matches' => 'Password not match!',
			'min_length' => 'Password too short!']);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

		// check form validation isnt run
		if ($this->form_validation->run() == false) {

			$this->load->view('admin/user');
		
		} else {
			// send data from value input from form
			$data = [
						'username' => htmlspecialchars($this->input->post('username'), true),
						'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
						'role_id' => $this->input->post('role_id'),
						'is_active' => 1,
						'date_create' => time()
					];

		// // insert into table user
		$this->db->insert('user', $data);
		// // set flashdata when insert success
		$this->session->set_flashdata('message', 'Add User is');
		$this->session->set_flashdata('flash', 'Successfully!');
		// // redirect to controller auth / view login
		redirect('admin/user');

		}

	}


	// ===================================================================
	// MENU METHOD
	// ===================================================================

	public function menu() {
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['menus'] = $this->db->get('user_menu')->result_array();
		$data['title'] = 'Si Rusun Disperkimtan';


		// rules form registration
		$this->form_validation->set_rules('menu', 'Menu Name', 'required');

		// check form validation isnt run
		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/menu', $data);
			$this->load->view('templates/footer');
		
		} else {

			$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
			// // set flashdata when insert success
			$this->session->set_flashdata('message', 'Add Menu is');
			$this->session->set_flashdata('flash', 'Successfully!');
			// // redirect to controller auth / view login
			redirect('admin/menu');

		}
	}

	public function editMenu($id) {
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Si Rusun Disperkimtan';
		$data['menu'] = $this->menu->getmenu($id);

		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run() == false) {
			

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/edit-menu', $data);
			$this->load->view('templates/footer');
		} else {
			$data = ['menu' => $this->input->post('menu')];
			$this->db->where('id', $id);
			$this->db->update('user_menu', $data);
			$this->session->set_flashdata('message', 'Editing Menu is');
			$this->session->set_flashdata('flash', 'Successfully!');
			redirect('admin/menu');
		}
	}

	public function deleteMenu($id) {

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Si Rusun Disperkimtan';
		$this->db->delete('user_menu', ['id' => $id]);
		
		$this->session->set_flashdata('message', 'Deleting Menu');
		$this->session->set_flashdata('flash', 'Successfully!');
		redirect('admin/menu');

	}

	public function submenu() {
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Si Rusun Disperkimtan';
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$data['submenus'] = $this->menu->getSubmenus();

		$this->form_validation->set_rules('submenu', 'Submenu Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/submenu', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
						'menu_id' => $this->input->post('menu_id'),
						'sub_menu' => $this->input->post('submenu'),
						'url' => $this->input->post('url'),
						'icon' => $this->input->post('icon'),
						'is_active' => $this->input->post('is_active')
					];

			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('message', 'New Submenu');
			$this->session->set_flashdata('flash', 'Added!');
			redirect('admin/submenu');
		}

	}

	public function editSubmenu($id) {
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Si Rusun Disperkimtan';
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$data['submenu'] = $this->menu->getSubmenu($id);

		$this->form_validation->set_rules('submenu', 'Submenu Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/edit-submenu', $data);
			$this->load->view('templates/footer');
		
		} else {

			$data = [
						'menu_id' => $this->input->post('menu_id'),
						'sub_menu' => $this->input->post('submenu'),
						'url' => $this->input->post('url'),
						'icon' => $this->input->post('icon'),
						'is_active' => $this->input->post('is_active')
					];

			$this->db->where('id', $id);
			$this->db->update('user_sub_menu', $data);
			$this->session->set_flashdata('message', 'Editing Submenu');
			$this->session->set_flashdata('flash', 'Successfully!');
			redirect('admin/submenu');
		}
	}

	public function submenuActivation() {
		$id = $this->input->post('id');
		$isActive = $this->input->post('isActive');

		if ($isActive == 1) {
			$this->db->set('is_active', 0, FALSE);
			$this->db->where('id', $id);
			$this->db->update('user_sub_menu');

			$this->session->set_flashdata('message', 'Non-Activated Submenu is');
			$this->session->set_flashdata('flash', 'Successfully!');
		} else {
			$this->db->set('is_active', 1, FALSE);
			$this->db->where('id', $id);
			$this->db->update('user_sub_menu');

			$this->session->set_flashdata('message', 'Activated Submenu is');
			$this->session->set_flashdata('flash', 'Successfully!');
		}
	}

	public function deleteSubmenu($id) {

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Si Rusun Disperkimtan';
		$this->db->delete('user_sub_menu', ['id' => $id]);
		
		$this->session->set_flashdata('message', 'Deleting Submenu');
		$this->session->set_flashdata('flash', 'Successfully!');
		redirect('admin/submenu');

	}



	// ===================================================================
	// ROLE METHOD
	// ===================================================================

	public function role() {

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Si Rusun Disperkimtan';
		$data['roles'] = $this->db->get('user_role')->result_array();

		$this->form_validation->set_rules('role', 'Role', 'required');

		if ($this->form_validation->run() == false) {
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/role', $data);
			$this->load->view('templates/footer');
		} else {

			$this->db->insert('user_role', ['role' => $this->input->post('role')]);
			$this->session->set_flashdata('message', 'New Role');
			$this->session->set_flashdata('flash', 'Added!');
			redirect('admin/role');
			
		}
	}

	public function roleAccess($role_id) {

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Si Rusun Disperkimtan';
		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
		// $this->db->where('id !=', 1);
		$data['menus'] = $this->db->get('user_menu')->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer');

	}

	public function changeAccess() {
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
					'role_id' => $role_id,
					'menu_id' => $menu_id
				];

		$result = $this->db->get_where('user_access_menu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('message', 'Changing Access');
		$this->session->set_flashdata('flash', 'Successfully!');
	}

	public function editRole($role_id) {
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Si Rusun Disperkimtan';
		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->form_validation->set_rules('role', 'Role', 'required');

		if ($this->form_validation->run() == false) {
			

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/edit-role', $data);
			$this->load->view('templates/footer');
		} else {
			$data = ['role' => $this->input->post('role')];
			$this->db->where('id', $role_id);
			$this->db->update('user_role', $data);
			$this->session->set_flashdata('message', 'Editing Role');
			$this->session->set_flashdata('flash', 'Successfully!');
			redirect('admin/role');
		}
	}

	public function deleteRole($role_id) {

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Si Rusun Disperkimtan';
		$this->db->delete('user_role', ['id' => $role_id]);
		
		$this->session->set_flashdata('message', 'Deleting Role');
		$this->session->set_flashdata('flash', 'Successfully!');
		redirect('admin/role');

	}





	// ===================================================================
	// PASSWORD METHOD
	// ===================================================================

	public function resetPassword($user_id) {
		$user = $this->db->get_where('user', ['id' => $user_id])->row_array();
		$newPassword = password_hash($user['username'], PASSWORD_DEFAULT);

		$this->db->set('password', $newPassword);
		$this->db->where('id', $user_id);
		$this->db->update('user');

		$this->session->set_flashdata('message', 'Reset Password');
		$this->session->set_flashdata('flash', 'Successfully!');
		redirect('admin/user');
	}



	// ===================================================================//
	//                         RUSUN METHOD 							  //
	// ===================================================================//

	public function rusun() {
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['rusun'] = $this->rusun->getAllRusun();

		$this->form_validation->set_rules('nama-rusun', 'Nama Rusun', 'required');
		$this->form_validation->set_rules('alamat-rusun', 'Alamat Rusun', 'required');

		if ($this->form_validation->run() == false) {
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/rusun', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
						'nama_rusun' => $this->input->post('nama-rusun'),
						'alamat_rusun' => $this->input->post('alamat-rusun'),
						'is_active' => $this->input->post('is_active'),
						'date_create' => time()
					];

			$this->db->insert('rusun', $data);
			$this->session->set_flashdata('message', 'New Rusun');
			$this->session->set_flashdata('flash', 'Added!');
			redirect('admin/rusun');
		}

	}

	public function rusunAccess($rusun_id) {

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['rusun'] = $this->db->get_where('rusun', ['id' => $rusun_id])->row_array();
		// $this->db->where('id !=', 1);
		$data['users'] = $this->db->get('user')->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/rusun-access', $data);
		$this->load->view('templates/footer');

	}

	public function changeAccessRusun() {
		$rusun_id = $this->input->post('rusunId');
		$user_id = $this->input->post('userId');

		$data = [
					'rusun_id' => $rusun_id,
					'user_id' => $user_id
				];

		$result = $this->db->get_where('user_access_rusun', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_rusun', $data);
		} else {
			$this->db->delete('user_access_rusun', $data);
		}

		$this->session->set_flashdata('message', 'Changing Access');
		$this->session->set_flashdata('flash', 'Successfully!');
	}

	public function editRusun($rusun_id) {
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['rusun'] = $this->db->get_where('rusun', ['id' => $rusun_id])->row_array();

		$this->form_validation->set_rules('nama-rusun', 'Nama Rusun', 'required');
		$this->form_validation->set_rules('alamat-rusun', 'Alamat Rusun', 'required');

		if ($this->form_validation->run() == false) {
			

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/edit-rusun', $data);
			$this->load->view('templates/footer');
		} else {
			
			$data = [
				'nama_rusun' => $this->input->post('nama-rusun'),
				'alamat_rusun' => $this->input->post('alamat-rusun'),
				'is_active' => $this->input->post('is_active')
			];

			$this->db->where('id', $rusun_id);
			$this->db->update('rusun', $data);
			$this->session->set_flashdata('message', 'Editing Rusun');
			$this->session->set_flashdata('flash', 'Successfully!');
			redirect('admin/rusun');
		}
	}

	public function deleteRusun($rusun_id) {

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$this->db->delete('rusun', ['id' => $rusun_id]);
		
		$this->session->set_flashdata('message', 'Deleting Rusun');
		$this->session->set_flashdata('flash', 'Successfully!');
		redirect('admin/rusun');

	}

	public function rusunActivation() {
		$id = $this->input->post('id');
		$isActive = $this->input->post('isActive');

		if ($isActive == 1) {
			$this->db->set('is_active', 0, FALSE);
			$this->db->where('id', $id);
			$this->db->update('rusun');

			$this->session->set_flashdata('message', 'Non-Activated Rusun is');
			$this->session->set_flashdata('flash', 'Successfully!');
		} else {
			$this->db->set('is_active', 1, FALSE);
			$this->db->where('id', $id);
			$this->db->update('rusun');

			$this->session->set_flashdata('message', 'Activated Rusun is');
			$this->session->set_flashdata('flash', 'Successfully!');
		}
	}




	// ===================================================================//
	//                         LANTAI METHOD 							  //
	// ===================================================================//


	public function lantai($rusun_id = 1) {
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['lantai'] = $this->rusun->getLantai($rusun_id);
		$data['total_lantai'] = $this->rusun->getTotalLantaiByRusun($rusun_id);
		$data['rusun'] = $this->db->get('rusun')->result_array();

		$this->form_validation->set_rules('rusun-id', 'Nama Rusun', 'required');
		$this->form_validation->set_rules('nama-lantai', 'Nama Lantai', 'required');
		$this->form_validation->set_rules('harga-lantai', 'Harga Lantai', 'required|numeric');

		if ($this->form_validation->run() == false) {
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/lantai', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
						'rusun_id' => $this->input->post('rusun-id'),
						'nama_lantai' => $this->input->post('nama-lantai'),
						'harga_lantai' => $this->input->post('harga-lantai'),
						'is_active' => $this->input->post('is_active')
					];

			$this->db->insert('lantai', $data);
			$this->session->set_flashdata('message', 'New Lantai');
			$this->session->set_flashdata('flash', 'Added!');
			redirect('admin/lantai/'. $this->input->post('rusun-id'));
		}

	}

	public function editLantai($lantai_id) {
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['lantai'] = $this->db->get_where('lantai', ['id' => $lantai_id])->row_array();
		$data['rusun'] = $this->db->get('rusun')->result_array();

		$this->form_validation->set_rules('rusun-id', 'Nama Rusun', 'required');
		$this->form_validation->set_rules('nama-lantai', 'Nama Lantai', 'required');
		$this->form_validation->set_rules('harga-lantai', 'Harga Lantai', 'required|numeric');

		if ($this->form_validation->run() == false) {
			

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/edit-lantai', $data);
			$this->load->view('templates/footer');
		} else {
			
			$data = [
				'rusun_id' => $this->input->post('rusun-id'),
				'nama_lantai' => $this->input->post('nama-lantai'),
				'harga_lantai' => $this->input->post('harga-lantai'),
				'is_active' => $this->input->post('is_active')
			];

			$this->db->where('id', $lantai_id);
			$this->db->update('lantai', $data);
			$this->session->set_flashdata('message', 'Editing Lantai');
			$this->session->set_flashdata('flash', 'Successfully!');
			redirect('admin/lantai/'. $this->input->post('rusun-id'));
		}
	}

	public function deleteLantai($lantai_id) {

		$lantai = $this->db->get_where('lantai', ['id' => $lantai_id])->row_array();

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$this->db->delete('lantai', ['id' => $lantai_id]);
		
		$this->session->set_flashdata('message', 'Deleting Lantai');
		$this->session->set_flashdata('flash', 'Successfully!');
		redirect('admin/lantai/'. $lantai['rusun_id']);

	}




	// ===================================================================//
	//                         KAMAR METHOD 							  //
	// ===================================================================//

	public function kamar($rusun_id = 1) {
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['kamar'] = $this->rusun->getKamar($rusun_id);
		$data['total_kamar'] = $this->rusun->getTotalKamarByRusun($rusun_id);
		$data['rusun'] = $this->db->get('rusun')->result_array();

		$this->form_validation->set_rules('rusun-id', 'Nama Rusun', 'required');
		$this->form_validation->set_rules('lantai-id', 'Nama Lantai', 'required');
		$this->form_validation->set_rules('no-kamar', 'Nomor Kamar', 'required|numeric');

		if ($this->form_validation->run() == false) {
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/kamar', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
						'lantai_id' => $this->input->post('lantai-id'),
						'rusun_id' => $this->input->post('rusun-id'),
						'no_kamar' => $this->input->post('no-kamar'),
						'status' => 0
					];

			$this->db->insert('kamar', $data);
			$this->session->set_flashdata('message', 'New Kamar');
			$this->session->set_flashdata('flash', 'Added!');
			redirect('admin/kamar/'. $this->input->post('rusun-id'));
		}

	}

	public function getLantaiByRusunChange() {

		$rusun_id = $this->input->post('rusunId');
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$lantai = $this->rusun->getLantai($rusun_id);

		foreach ($lantai as $lnt) {

			echo '<option value="'. $lnt['id'] .'">'. $lnt['nama_lantai'] .'</option>';
			
		}
	}

	public function getHargaByLantaiChange() {
		$lantai_id = $this->input->post('lantaiId');
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$harga_lantai = $this->db->get_where('lantai', ['id' => $lantai_id])->row_array();
		echo rupiah($harga_lantai['harga_lantai']);
	}

	public function editKamar($kamar_id) {
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['kamar'] = $this->db->get_where('kamar', ['id' => $kamar_id])->row_array();
		$data['lanatai'] = $this->db->get('lantai')->result_array();
		$data['rusun'] = $this->db->get('rusun')->result_array();

		$this->form_validation->set_rules('no-kamar', 'Nomor Kamar', 'required|numeric');

		if ($this->form_validation->run() == false) {
			

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/edit-kamar', $data);
			$this->load->view('templates/footer');
		} else {
			
			$data = [
				
				'no_kamar' => $this->input->post('no-kamar')
				
			];

			$this->db->where('id', $kamar_id);
			$this->db->update('kamar', $data);
			$this->session->set_flashdata('message', 'Editing Kamar');
			$this->session->set_flashdata('flash', 'Successfully!');
			redirect('admin/kamar/'. $this->input->post('rusun-id'));
		}
	}

	public function deleteKamar($kamar_id) {

		$kamar = $this->db->get_where('kamar', ['id' => $kamar_id])->row_array();
		
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$this->db->delete('kamar', ['id' => $kamar_id]);
		
		$this->session->set_flashdata('message', 'Deleting Kamar');
		$this->session->set_flashdata('flash', 'Successfully!');
		redirect('admin/kamar/'. $kamar['rusun_id']);

	}







}