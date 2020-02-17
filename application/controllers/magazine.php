<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magazine extends CI_Controller {
/**
	Index page for magazine controller
**/
	public function index(){
		if (! $this->session->userdata('user_id')) {
			return redirect('login');
		}

		$this->load->library('table');
		$this->load->view('admin/admin_header');
		$magazines = array();
		$this->load->model(array('Issue', 'Publication'));
		$issues = $this->Issue->get();
		foreach ($issues as $issue) {
			$publication = new Publication();
			$publication->load($issue->publication_id);
			$magazines[] = array(
				$publication->publication_name,
				$issue->issue_number,
				$issue->issue_date_publication,
				$issue->issue_cover ? 'Y' : 'N',
				anchor('magazine/view/' . $issue->issue_id, 'View') . ' | ' .
				anchor('magazine/convertpdf/' . $issue->issue_id, 'View in PDF') . ' | ' .
				anchor('magazine/delete/' . $issue->issue_id, 'Delete'),
			);
		}

		$this->load->view('magazine/magazines', array('magazines' => $magazines, ));
		$this->load->view('admin/admin_footer');

	}

	// Add a Magazine
	public function add(){
		$this->load->view('admin/admin_header');
		$config = array(
			'upload_path' => 'upload',
			'allowed_types' => 'gif|jpg|png',
			'max_size' => 250,
			'max_width' => 1920,
			'max_height' => 1080,
		);
		$this->load->library('upload', $config);
		$this->load->helper('form');
		//Populate publication.
		$this->load->model('Publication');
		$publications = $this->Publication->get();
		$publication_form_options = array();
		foreach ($publications as $id => $publication) {
			$publication_form_options[$id] = $publication->publication_name;
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules(array(
			array(
				'field' => 'publication_id',
				'label' => 'Publication',
				'rules' => 'required',
			),
			array(
				'field' => 'issue_number',
				'label' => 'Issue Number',
				'rules' => 'required|is_numeric',
			),
			array(
				'field' => 'issue_date_publication',
				'label' => 'Publication Date',
				'rules' => 'required|callback_date_validation',
			),
		));
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');

		$check_file_upload = FALSE;
		if (isset($_FILES['issue_cover']['error']) && $_FILES['issue_cover']['error'] != 4) {
			$check_file_upload = TRUE;
		}

		if(! $this->form_validation->run() || ($check_file_upload && !$this->upload->do_upload('issue_cover')) ){
			$this->load->view('magazine/magazine_form', array('publication_form_options' => $publication_form_options,
			));
		}
		else{
			$this->load->model('Issue');
			$issue = new Issue();
			$issue->publication_id = $this->input->post('publication_id');
			$issue->issue_number = $this->input->post('issue_number');
			$issue->issue_date_publication = $this->input->post('issue_date_publication');
			$upload_data = $this->upload->data();
			if (isset($upload_data['file_name'])) {
				$issue->issue_cover = $upload_data['file_name'];
			}
			$issue->save();
			$this->load->view('magazine/magazine_form_success', array('issue' => $issue));
		}
		$this->load->view('admin/admin_footer');
	}

	/**
	Date validation callback
	takes string input and return boolean value
	**/
	public function date_validation($input){
		$test_date = explode('-', $input);
		if (!@checkdate($test_date[1], $test_date[2], $test_date[0])) {
			$this->form_validation->set_message('date_validation', 'This %s field must be in YYYY-MM-DD fromat.');
			return FALSE;
		}
		else{
			return TRUE;
		}
	}

	//for view a magazine
	public function view($issue_id){
		$this->load->view('admin/admin_header');
		$this->load->helper('html');
		$this->load->model(array('Issue', 'Publication'));
		$issue = new Issue();
		$issue->load($issue_id);
		if (!$issue->issue_id) {
			show_404();
		}
		$publication = new Publication();
		$publication->load($issue->publication_id);
		$this->load->view('magazine/magazine', array(
			'issue' => $issue,
			'publication' => $publication
		));
		$this->load->view('admin/admin_footer');
	}

	public function delete($issue_id){
		$this->load->view('admin/admin_header');
		$this->load->model(array('Issue'));
		$issue = new Issue();
		$issue->load($issue_id);
		if(!$issue->issue_id){
			show_404();
		}
		$issue->delete();
		$this->load->view('magazine/magazine_deleted', array(
			'issue_id' => $issue_id, 
		));
		$this->load->view('admin/admin_footer');
	}

	public function convertpdf($issue_id){
		
		$this->load->helper('html');
		$this->load->model(array('Issue', 'Publication'));
		$issue = new Issue();
		$issue->load($issue_id);
		if (!$issue->issue_id) {
			show_404();
		}
		$publication = new Publication();
		$publication->load($issue->publication_id);
		$this->load->view('magazine/magazine', array(
			'issue' => $issue,
			'publication' => $publication
		));

		// Get output html
		$html = $this->output->get_output();
        
        // Load pdf library
        $this->load->library('pdf');

        $dompdf = new PDF();

        // Load HTML content
        $dompdf->load_html($html);

        //enabling for image render
        $dompdf->set_option('isRemoteEnabled', TRUE);

        // // (Optional) Setup the paper size and orientation
        // $this->pdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF (1 = download and 0 = preview)
        $dompdf->stream("test.pdf", array('Attachment'=>0));
        
	}
}