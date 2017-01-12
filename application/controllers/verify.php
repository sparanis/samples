<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verify extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		
	}

	
	public function index(){
		$VerificationCode = $this->uri->segment(2);
		$account_verify = $this->user_model->verify_account($VerificationCode);
		if($account_verify == true){
			$this->session->set_flashdata('message', 'Account successfully verified!');
		}else{
			$this->session->set_flashdata('message', 'Invalid verification code!');
		}

		//echo $this->db->last_query();
		redirect(base_url('login'));
       

	}

	

	

}