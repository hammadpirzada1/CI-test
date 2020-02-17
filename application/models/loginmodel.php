<?php 

class Loginmodel extends CI_Model 
{	
	public function validate_login($username, $password)
	{
		$query = $this->db->get_where( 'users' , array('username'=>$username, 'password'=>$password));
		if ($query->num_rows()) {
			//print_r($query->row());exit;
			return $query->row()->user_id;
		}
		else{
			return FALSE;
		}
	}
}