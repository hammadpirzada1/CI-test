<?php

class Articlesmodel extends CI_Model
{
	public function articles_list(){
		$user_id = $this->session->get_userdata('user_id');
		$articles = $this->db->get_where('articles', array('user_id' => $user_id ));
	}
}