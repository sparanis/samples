<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('spotch_model');
		
	}

	
	public function index(){
		if($this->session->userdata('user_id') !=""){  
			 redirect(base_url().'account');
		}else{
			$this->load->library('facebook'); // Automatically picks appId and secret from config
       

			$user = $this->facebook->getUser();

	        if ($user) {
	            try {
	                $user_profile = $this->facebook->api('/me');

	                // /print_r($user_profile);

		            $fb_id = $user_profile['id'];
		            $email =  $user_profile['email'];
		            $firstname =  $user_profile['first_name'];
		            $lastname =  $user_profile['last_name'];
		            
		            $today = date('Y-m-d g:i:s');

		            $user_id = uniqid('Spotch');

		            $data = array(
		            	'user_id' => $user_id,
						'social_id' => $fb_id,
						'social_site' =>'facebook',
						'name' => $firstname." ".$lastname,
						'email' => $email,
						'password' => '',
						'date_registered' => $today,
						'status' =>'active',
						'media_id' => ''
		            );

		            $user_id_db = $this->user_model->check_if_user_exist($fb_id);

		            if (!$user_id_db) {
		            	$this->user_model->add_user($data);
		            }else{
		            	$user_id = $user_id_db;
		            }

		            
		            $newdata = array(
		            	'email' => $email,
		                'name' =>$firstname." ".$lastname,
		                'fb_id' => $fb_id,
		                'user_id' => $user_id
		            );

		            $this->facebook->destroySession();
		            $this->session->set_userdata($newdata);
		            redirect(base_url().'account');

	            } catch (FacebookApiException $e) {
	                $user = null;
	            }
	            $data['logout_url'] = site_url('logout'); // Logs off application
	        }else {
	           $this->facebook->destroySession();
	        }

			if(!$user){
	            $data['url'] = $login = $this->facebook->getLoginUrl(array("scope"=>"email,publish_actions"));
	         
	            $data = array(
	    			'login_url' => $data['url'],
	    			'file'=> 'register'
				);
				
	         	 $this->load->view('includes/template',$data);

	        }
		}
		
       

	}

	public function ajax_validate_emailaddress() {
		$EmailAddress = $this->input->get('email_register');
	
		$emailaddress_valid = $this->user_model->validate_emailaddress($EmailAddress);
		echo json_encode(array(
		    'valid' => $emailaddress_valid,
		));

	}
	

	public function register_user(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$email = $this->input->post('email');

		$check_email = $this->user_model->check_if_email_exist($email);
		if ($check_email == false) {
			$user_id = uniqid('Spotch');
			$today = date('Y-m-d g:i:s');
			$verification_code = uniqid('Sp');
            $data = array(
            	'user_id' => $user_id,
				'social_id' => '',
				'social_site' =>'spotch',
				'name' => $username,
				'email' => $email,
				'password' => $password,
				'date_registered' => $today,
				'status' =>'inactive',
				'media_id' => '',
				'verification_code' => $verification_code 
            );
			$this->user_model->add_user($data);
           	$this->ajax_send_verification_email($email, $verification_code);

		}else{
			echo "Exist";	
		}

	}

	public function ajax_send_verification_email($EmailAddress = null, $verification_code = null) {
	    
		$teams_result = $this->spotch_model->get_teams();

        $number_teams =  count($teams_result);

        $games_result = $this->spotch_model->get_games();

        $number_games = count($games_result);

	    $config['protocol'] = 'sendmail';
	    $config['mailpath'] = '/usr/sbin/sendmail';
	    $config['charset'] = 'utf-8'; 
	    $config['wordwrap'] = TRUE;

	    $this->email->initialize($config);
	    $this->email->to($EmailAddress);
	    $this->email->from('spotch@gmail.com');
	    $this->email->subject('Spotch');
	    $email_message = 'へようこそ Spotch!
			今日、 '.$number_teams .' SPOTCHの チームがあります。あなたは全国の '. $number_games.' 試合の上で参加することができます。
			あなたの自由な時間を楽しみ、あなたのチームメイトと反対派から新しいゲーム戦略を学びます。



			あなたのアカウントを確認するには、このリンクをクリックしてください'. base_url('verify/' . $verification_code) . "

	    	よろしく,
	    	Spotch Team";
	    $this->email->message($email_message);
	    $this->email->send();
	    echo $this->email->print_debugger();
	}


	function forgot_password(){
		$config['protocol'] = 'sendmail';
	    $config['mailpath'] = '/usr/sbin/sendmail';
	    $config['charset'] = 'utf-8'; 
	    $config['wordwrap'] = TRUE;

	    $this->email->initialize($config);
		$email = $this->input->post('email');

      	$result = $this->user_model->check_if_email_exist($email);

      	if ($result == false) {
        	echo "申し訳ありませんが、この電子メールのdoesntが存在します.";
     	}else{
        	$check_email = $this->user_model->retrieve_password($email);

	        $this->email->from($email, 'Spotch');
	        $this->email->to($email); 
	        $this->email->subject('Spotch');

	        $email_message = "良い一日、ここにあなたのパスワードです。
		    " . $check_email ."
		    質問があれば、 support@spotch.comメールでお問い合わせください
		    
		   
		    よろしく,
	    	Spotch Team";

	        $this->email->message($email_message);  

	        $this->email->send();

      	}
	}
	function verify_user(){
		$VerificationCode = $this->uri->segment(2);
		$account_verify = $this->user_model->verify_account($VerificationCode);
		if($account_verify == true)
			$this->session->set_flashdata('message', 'Account successfully verified!');
		else
			$this->session->set_flashdata('message', 'Invalid verification code!');

		redirect(base_url('login'));

	}


	function login_user(){
		$username = $this->input->post('email');
		$password = $this->input->post('password');


		$data = array(
			'email' =>$username , 
			'password' =>$password , 
		);
		$result = $this->user_model->check_user($data);

		if ($result != 'not found') {

		    $newdata = array(
            	'email' => $result['email'],
                'name' =>$result['name'],
                'fb_id' => '',
                'user_id' =>  $result['user_id']
            );
			$this->session->set_userdata($newdata);
	     	$user['user_status'] = $result['status'];
			echo json_encode($user);

		}else{
			$user['user_status'] = 'Invalid user';
			echo json_encode($user);
		}



	}
	public function logout(){
		  $this->session->sess_destroy();
		  redirect(base_url());
	}


	

}