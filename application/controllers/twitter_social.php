<?php
/**
 * Twitter OAuth library.
 * Sample controller.
 * Requirements: enabled Session library, enabled URL helper
 * Please note that this sample controller is just an example of how you can use the library.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Twitter_social extends CI_Controller
{
	/**
	 * TwitterOauth class instance.
	 */
	private $connection;
	
	/**
	 * Controller constructor
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->library('twitteroauth');
		$this->config->load('twitter');
		$this->load->model('user_model');
		$this->connection = $this->twitteroauth->create($this->config->item('twitter_consumer_token'), $this->config->item('twitter_consumer_secret'));
		
	}
	
	/**
	 * Here comes authentication process begin.
	 * @access	public
	 * @return	void
	 */
	public function auth(){
		if($this->session->userdata('access_token') && $this->session->userdata('access_token_secret'))
		{
			$this->reset_session();
			redirect(base_url('/twitter_social/auth'));
		}
		else
		{	

			$this->reset_session();
			// $this->session->sess_destroy();
			// Making a request for request_token
			$request_token = $this->connection->getRequestToken(base_url('/twitter_social/callback'));
			$this->session->set_userdata('request_token', $request_token['oauth_token']);
			$this->session->set_userdata('request_token_secret', $request_token['oauth_token_secret']);
			
			if($this->connection->http_code == 200)
			{
				$url = $this->connection->getAuthorizeURL($request_token);
				redirect($url);
			}
			else
			{
				// An error occured. Make sure to put your error notification code here.
				// redirect(base_url('/'));
				// print_r($request_token);
				// $this->session->sess_destroy();
				
			}
		}
	}
	
	/**
	 * Callback function, landing page for twitter.
	 * @access	public
	 * @return	void
	 */
	public function callback()
	{
		if($this->session->userdata('request_token') && $this->session->userdata('request_token_secret'))
		{
			// If user in process of authentication
			$this->connection = $this->twitteroauth->create($this->config->item('twitter_consumer_token'), $this->config->item('twitter_consumer_secret'), $this->session->userdata('request_token'), $this->session->userdata('request_token_secret'));
		}
		if($this->input->get('oauth_token') && $this->session->userdata('request_token') !== $this->input->get('oauth_token'))
		{
			$this->reset_session();
			redirect(base_url('/twitter_social/auth'));
		}
		else
		{
			$access_token = $this->connection->getAccessToken($this->input->get('oauth_verifier'));
			
			if ($this->connection->http_code == 200)
			{
				$this->session->set_userdata('access_token', $access_token['oauth_token']);
				$this->session->set_userdata('access_token_secret', $access_token['oauth_token_secret']);
				$this->session->set_userdata('twitter_user_id', $access_token['user_id']);
				$this->session->set_userdata('twitter_screen_name', $access_token['screen_name']);

				$this->session->unset_userdata('request_token');
				$this->session->unset_userdata('request_token_secret');
				$user_profile = $this->connection->get('account/verify_credentials');
			
				$twitter_id = $user_profile->id;
				$email =  "";
	            $firstname =  $user_profile->name;
	            $lastname =  "";

		     

	            $today = date('Y-m-d g:i:s');
		        $user_id = uniqid('Spotch');
	            $data = array(
	            	'user_id' => $user_id,
					'social_id' => $twitter_id,
					'social_site' =>'twitter',
					'name' => $firstname,
					'email' => '',
					'password' => '',
					'date_registered' => $today,
					'status' =>'active',
					'media_id' => ''
	            );

	            $twitter_id = $this->user_model->check_if_user_exist($twitter_id);

	            if ($twitter_id == false) {
	            	$this->user_model->add_user($data);
	            }
	            
	            $newdata = array(
	                'firstname' =>$firstname,
	                'user_id' => $user_id
	            );

	            $this->session->set_userdata($newdata);
	            redirect(base_url().'account');
           		
			}
			else
			{
				redirect(base_url('/'));
			}
		}
	}
	
	public function post($in_reply_to)
	{
		$message = $this->input->post('message');
		if(!$message || mb_strlen($message) > 140 || mb_strlen($message) < 1)
		{
			redirect(base_url('/'));
		}
		else
		{
			if($this->session->userdata('access_token') && $this->session->userdata('access_token_secret'))
			{
				$content = $this->connection->get('account/verify_credentials');
				if(isset($content->errors))
				{
					// Most probably, authentication problems. Begin authentication process again.
					$this->reset_session();
					redirect(base_url('/twitter_social/auth'));
				}
				else
				{
					$data = array(
						'status' => $message,
						'in_reply_to_status_id' => $in_reply_to
					);
					$result = $this->connection->post('statuses/update', $data);

					if(!isset($result->errors))
					{
						// Everything is OK
						redirect(base_url('/'));
					}
					else
					{
						// Error, message hasn't been published
						redirect(base_url('/'));
					}
				}
			}
			else
			{
				// User is not authenticated.
				redirect(base_url('/twitter_social/auth'));
			}
		}
	}
	
	/**
	 * Reset session data
	 * @access	private
	 * @return	void
	 */
	private function reset_session()
	{
		$this->session->unset_userdata('access_token');
		$this->session->unset_userdata('access_token_secret');
		$this->session->unset_userdata('request_token');
		$this->session->unset_userdata('request_token_secret');
		$this->session->unset_userdata('twitter_user_id');
		$this->session->unset_userdata('twitter_screen_name');
	}
}

/* End of file twitter.php */
/* Location: ./application/controllers/twitter.php */