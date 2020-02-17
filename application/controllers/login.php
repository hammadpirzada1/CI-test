<?php 

class Login extends MY_Controller
{
	public function index(){
		if ($this->session->userdata('user_id')) {
			// return redirect('admin/dashboard');
			return redirect('magazine');
		}
		$this->load->view('header1');
		$this->load->view('public/admin_login');
		$this->load->view('footer');
	}

	public function admin_login(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required|alpha_numeric|trim');
		$this->form_validation->set_rules('password','Password','required');
		
		$this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');

		if($this->form_validation->run() == TRUE){
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			$this->load->model('loginmodel');

			$login_id = $this->loginmodel->validate_login($username, $password);
			
			if($login_id){
				$this->session->set_userdata('user_id', $login_id);
				// return redirect('admin/dashboard');
				return redirect('magazine');
			}
			else{
				$this->session->set_flashdata('login_failed', 'Invalid Username/Password');
				return redirect('login');
			}
		}
		else{
			$this->load->view('header1');
			$this->load->view('public/admin_login');
			$this->load->view('footer');
		}
	}

	public function logout(){
		$this->session->unset_userdata('user_id');
		return redirect('login');
	}

}
