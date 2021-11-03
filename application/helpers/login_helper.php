<?php

function is_logged_in()
{
	// instance ci
	$ci = get_instance();
	// check session email
	if (!$ci->session->userdata('username')) {
		// if not login redirect to login page
		redirect('auth');
	} else {
		// if logged in
		// then check role id and menu access 
		$role_id = $ci->session->userdata('role_id');
		$menu = $ci->uri->segment(1);
		// this query : select * from user_menu where menu = $menu
		$queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
		$menu_id = $queryMenu['id'];
		// this query : select * from user_access_menu where role_id = $role_id AND menu_id = $menu_id
		$userAcces = $ci->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);

		// role access
		if ($userAcces->num_rows() < 1) {
			// if user haven't access to spesific menu
			// redirect to page controller auth method blocked/blocked page
			redirect('auth/blocked');
		} // end role access

		// access rusun
		$user_id = $ci->session->userdata('user_id');

		if (($ci->uri->segment(1) == 'main' && $ci->uri->segment(2) == 'kamar') ||
			($ci->uri->segment(1) == 'main' && $ci->uri->segment(2) == 'penghuni') ||
			($ci->uri->segment(1) == 'main' && $ci->uri->segment(2) == 'tagihan')
		) {

			$rusun_id = $ci->uri->segment(3);
			$rusun_access = $ci->db->get_where('user_access_rusun', ['user_id' => $user_id, 'rusun_id' => $rusun_id]);

			if ($rusun_access->num_rows() < 1) {
				// if user haven't access to spesific menu
				// redirect to page controller auth method blocked/blocked page
				redirect('auth/blocked');
			}
		} // end access rusun
	}
}

function check_access($role_id, $menu_id)
{
	$ci = get_instance();

	$ci->db->where('role_id', $role_id);
	$ci->db->where('menu_id', $menu_id);
	$result = $ci->db->get('user_access_menu');

	if ($result->num_rows() > 0) {
		return "checked='checked'";
	}
}

function check_rusun_access($rusun_id, $user_id)
{
	$ci = get_instance();

	$ci->db->where('rusun_id', $rusun_id);
	$ci->db->where('user_id', $user_id);
	$result = $ci->db->get('user_access_rusun');

	if ($result->num_rows() > 0) {
		return "checked='checked'";
	}
}

function rusunId()
{

	$ci = get_instance();

	$user_id = $ci->session->userdata('user_id');
	$query = "SELECT `user_access_rusun`.*, `rusun`.*
				  FROM `rusun`
				  JOIN `user_access_rusun`
				  ON `user_access_rusun`.`rusun_id` = `rusun`.`id`
				  WHERE `user_access_rusun`.`user_id` = $user_id";
	$result = $ci->db->query($query)->result_array();
	return intval($result[0]['rusun_id']);
}

	// function check_active($isActive) {
	// 	$ci = get_instance();

	// 	$ci->db->where('is_active', $isActive);
	// 	$result = $ci->db->get('user');

	// 	if ($result->num_rows() > 0) {
	// 		return "checked";
	// 	}
	// }
