<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Menu_model extends CI_Model
{		
	public function getSubMenu()
	{
		$query = "SELECT `user_sub_menu`.*, `user_menu1`.`menu`
					FROM `user_sub_menu` JOIN `user_menu1`
					ON `user_sub_menu`.`menu_id` = `user_menu1`.`id`
				";

		return $this->db->query($query)->result_array();
		}
}