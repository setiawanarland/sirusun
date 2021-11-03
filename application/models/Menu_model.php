<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

	public function getSubmenus() {
		$querySubmenu = "SELECT `user_menu`.`id`, `user_menu`.`menu`, `user_sub_menu`.*
						 FROM `user_sub_menu`
						 JOIN `user_menu`
						 ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
						 ORDER BY `user_menu`.`id` ASC";
		return $this->db->query($querySubmenu)->result_array(); 
	}

	public function getMenu($id) {
		return $this->db->get_where('user_menu', ['id' => $id])->row_array();
	}

	public function getSubmenu($id) {
		return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
	}
}