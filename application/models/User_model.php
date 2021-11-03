<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function getAllUser() {
		$querySubmenu = "SELECT `user_role`.`id`, `user_role`.`role`, `user`.*
						 FROM `user`
						 JOIN `user_role`
						 ON `user`.`role_id` = `user_role`.`id`";
		return $this->db->query($querySubmenu)->result_array(); 
	}




}