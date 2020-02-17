<?php

class User extends MY_Controller
{
	public function index(){
		$this->load->view('header1');
		$this->load->view('public/articles');
		$this->load->view('footer');
	}
}