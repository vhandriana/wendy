<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class User_model extends CI_Model
{		
	public function getUser()
	{
		$query = "SELECT `user`.*, `user_role`.`role`
					FROM `user` JOIN `user_role`
					ON `user`.`role_id` = `user_role`.`id`
				";

		return $this->db->query($query)->result_array();
		}
}