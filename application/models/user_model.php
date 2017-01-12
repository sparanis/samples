<?php 
class User_model extends CI_Model{
	function add_user($data, $user_id = null){
        if ($user_id) {
            $this->db->where('user_id',$user_id);
           $this->db->update('tbl_users', $data);
        }else{
            $this->db->insert('tbl_users', $data);
        }
    }
    public function verify_account($VerificationCode) {
        $this->db->where('verification_Code', $VerificationCode);
        $query = $this->db->get('tbl_users');
        if($query->num_rows() > 0) {
            $this->db->where('user_id', $query->row('user_id'));
            $this->db->set('status', 'active');
            $this->db->update('tbl_users');
            return true;
        } else {
            return false;
        }
    }

    function check_if_user_exist($social_id){
    	$this->db->where('social_id',$social_id);
    	$query = $this->db->get('tbl_users');
    	if($query->num_rows() > 0) {
    		return $query->row('user_id');
    	}else{
    		return false;
    	}
    }
     public function retrieve_password($EmailAddress){
        $this->db->where('email', $EmailAddress);
        $query = $this->db->get('tbl_users');
        if($query->num_rows() > 0){
            return $query->row('password');
        }
    }

    function check_if_email_exist($email){
        $this->db->where('email',$email);
        $query = $this->db->get('tbl_users');
        if($query->num_rows() > 0) {
            return $query->row('user_id');
        }else{
            return false;
        }
    }


    function get_user($user_id){
        $this->db->where('user_id',$user_id);
        $query = $this->db->get('tbl_users');
        return $query->row();

    }

    function check_user($data){
        $this->db->where($data); 
        $this->db->where('Status', 'active'); 
        $query = $this->db->get('tbl_users');
        $user_id = $query->row('user_id');
        $email = $query->row('email');
        $name = $query->row('name');
        $status = $query->row('status');
        if ($user_id != null) {
            $data = array(
                'user_id' => $user_id, 
                'status' => $status,
                'email' => $email,
                'name' => $name
            );
            return $data;
        }else{
            return "not found";
        }  
    }

    function get_details_by_team_creator($team_creator){

        $this->db->where('team_creator', $team_creator);
        $query = $this->db->get('tbl_team');
        return $query->row();
    }

}