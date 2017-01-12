<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teams extends CI_Controller {

    function __construct()

        {

            parent::__construct();

            $this->load->model('spotch_model');
            $this->load->model('location_model');
            $this->load->model('user_model');
            
        }

	public function index(){
		
		$data = array(
			'file'=> 'index'
			);
		$this->load->view('includes/template',$data);

	}

	 

	public function create(){
        
        if($this->session->userdata('user_id') !=""){    
        
            $team_id = $this->input->get("id");
            $user_id = $this->session->userdata('user_id');

            $result =  $this->spotch_model->check_member_team($user_id);

            
            if(!empty($result)){
                $has = "has a team";

                $team = $this->spotch_model->get_teams($result->group_id);
                if(!empty($team)){
                    $team_id_user = $team->team_id;
                    $team_creator  = $team->team_creator;
                    if($team_id==$team_id_user){
                        if($team_creator==$user_id){
                            $data = array(
                                'file'=> 'create'
                            );
                            $this->load->view('includes/template',$data);
                        }
                        else{
                            redirect("account");
                        }
                    }
                    else{
                        redirect("account");
                    }
                }
                else{
                    redirect("account");
                }
            }
            else{
                $data = array(
                    'file'=> 'create'
                );
                $this->load->view('includes/template',$data);
            }
        }
        else{
            redirect();
        }

	}

    
    public function get_teams(){

        $offset = $this->input->post('offset');        
        $search = $this->input->post('search');
        

        $keyword = $this->input->post('keyword');
        $level = $this->input->post('level');
        $prefecture = $this->input->post('prefecture');
        $city = $this->input->post('city');
        $team_location = $prefecture.'/'.$city;

      

        if ($keyword || $level || $prefecture || $city) {
            $result = $this->spotch_model->get_teams('',$keyword,$level,$team_location,$offset);
            
        }else{
            $result = $this->spotch_model->get_teams('','','','',$offset);
           
        }

        $total_teams = count($result); 

        $html = '';

        if (count($result) > 0) {
            // echo "<pre>";
            // print_r($result);
            //  echo "</pre>";
            // exit();
            foreach ($result as $team) {

                if ($team->media_id != 0) {
                    $featured_image = $this->spotch_model->get_featured($team->media_id);
                    if (!empty($featured_image)) {
                        $team_image = base_url().'uploads/'.$featured_image->path;
                        $team_image = '<img src="'.$team_image.'" alt="..." class="">';
                        
               
                    }   
                }else{
                    $random = mt_rand(1,5);
                    $team_image = base_url().'assets/img/color_500_00'.$random.'.png';
                    $team_image = '<img src="'.$team_image.'" alt="..." class="">';
                }
                $html .= '<div class="item col-sm-3 col-lg-3 col-md-3 col-xs-6">';
                $html .= ' <div class="product all-teams">';
                $html .= '  <div class="image">';
                $html .= '  <div class="quickview">';
                $html .= '  <a href="'.base_url().'team_details/?id='.$team->team_id.'" title="Quick View" class="btn btn-xs  btn-quickview" > クイックビュー </a>';
                $html .= '</div><a href="#">'.$team_image.'</a> <h4 class="team-name">'.$team->team_name.'</h4> </div>';
                if($team->team_level=="Excellent"){
                    $level_image = base_url().'assets/img/search_team_gold.png';
                    $html .= '<img src="'.$level_image.'" alt="..." class="level-image">';
                }
                elseif($team->team_level=="Intermediate"){
                    $level_image = base_url().'assets/img/search_team_silver.png';
                    $html .= '<img src="'.$level_image.'" alt="..." class="level-image">';
                }
                elseif($team->team_level=="Beginner"){
                    $level_image = base_url().'assets/img/search_team_bronze.png';
                    $html .= '<img src="'.$level_image.'" alt="..." class="level-image">';
                }
                   
                $html .= '  </a>';    
                $html .= '<div class="description">';    
                   
                $html .= '<div class="grid-description"><br>';  
                $html .= '<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">';
                $html .= '<i class="fa fa-map-marker fa-1x"></i>';
                $html .= '</div>';
                $html .= '<div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 team-location">';
                $myloc = explode("/",$team->team_location);
    
                $loc = $myloc;// array containing category ids

                $b = count($myloc)-1;
                
                    $html .= $myloc[1].', '.$myloc[0];
                
                $game_logs = $this->spotch_model->get_active_games_per_team($team->team_id);

		        $no_games = 0;
		        $wins = 0;
		        $loses=0;
		        $members = 0;

		        $n_members = $this->spotch_model->get_members($team->team_id);
		        $members = count($n_members);


		        if(!empty($game_logs)){
		        	$no_games = count($game_logs);
		            foreach ($game_logs as $row) {
		                $game = $this->spotch_model->get_game_by_id($row->game_id);
		                $my_team = $row->team;
		                $game_1 = $this->spotch_model->get_score($row->game_id,$team->team_id);
		                if(!empty($game_1)){
                            if($game_1->status=="Pending"){
                                $my_score = "No scores";
                            }
                            else if($game_1->status=="Active"){
    		                    if($game_1->score==0){
    		                        $my_score = "No scores";
    		                    }
    		                    else{
    		                        $my_score = $game_1->score;
    		                    }
                            }
		                }
		                else{
		                    $my_score = "No scores";
		                }


		                $other_team = $this->spotch_model->get_opponent($row->game_id,$team->team_id);
		                if(!empty($other_team)){

		                    $team = $this->spotch_model->get_teams($other_team->team);

                            if($other_team->status=="Pending"){
                                $other_team->score = "No scores";
                            }
                            else{
                                if($other_team->score==0){
    		                        $other_team->score = "No scores";
    		                    }
                            }

		                    if(!empty($team)){
		                        
		                        if($my_score=="No scores"){
		                        }
		                        else if($my_score > $other_team->score){
		                        	$wins++;
		                        }
		                        else if($my_score==$other_team->score){
		                        }
		                        else if($my_score < $other_team->score){
		                        	$loses++;
		                        }
		                    }
		                    else{
		                        
		                    }
		                }
		                else{

		                }
		                
		            }
		        }
		        else{
		        }
                

                $html .= '<h6>場所</h6>';
                $html .= '</div>';
                $html .= '<div class="clearfix"></div>';
                $html .= '<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">';
                $html .= '<i class="fa fa-calendar fa-1x"></i>';
                $html .= '</div>';
                $html .= '<div class="col-lg-9 col-md-9 col-xs-9 col-sm-9 team-created">';
                $html .= date("M d, Y",strtotime($team->date_created));
                $html .= '<h6>入会</h6>';
                $html .= '</div>';
                $html .= '<div class="clearfix"></div>';
                $html .= '<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">';
                $html .= '<i class="fa fa-file fa-11x"></i>';
                $html .= '</div>';
                $html .= '<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 team-record">';
                $html .= $wins;
                $html .= '<h6>勝</h6>';
                $html .= '</div>';  
                $html .= '<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 team-record">';
                $html .= $loses;
                $html .= '<h6>失う</h6>';
                $html .= '</div>';  
                $html .= '<div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 team-record">';
                $html .= $members;
                $html .= '<h6>メンバー</h6>';
                $html .= '</div>'; 
                $html .= '<div class="clearfix"></div>';
                $html .= ' </div>';    
                $html .= '</div>';    
                $html .= '<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 team-link"><a href="'.base_url().'team_details/?id='.$team->team_id.'"> <span class="add2cart"> チームページ </span> <span class="pull-right">></span></a></div>';
                $html .= '</div>';    
                $html .= '</div>';    
                $html .= '</div>';    
            }
        }else{
            $html .= 'No records';
        }

        $data['total_games'] = $total_teams;
        $data['html'] = $html;
        $data['offset'] = $offset+1;

        echo json_encode($data);
    }

   
	public function find_team(){
        $user_id = $this->session->userdata('user_id');
        $prefectures = $this->location_model->get_prefecture();
    
        $prefecture = '';
        $prefecture .= '<select class="form-control selected-prefecture">';
        foreach ($prefectures as $prefecture_entry) {
            
            $prefecture .= '<option data-id="'.$prefecture_entry->location_id.'">'.$prefecture_entry->location_name.'</option>';
        }

        $prefecture .= '</select>';
		if($this->session->userdata('user_id') !=""){
            $data = array(
    			'file'=> 'find',
                'user_id' => $user_id,
                'location' => $prefecture

    		);
    		$this->load->view('includes/template',$data);
        }
        else{
            redirect(base_url().'login');
        }

	}
	

    public function team_details(){
        $team_id = $this->input->get('id');
        $user_id = $this->session->userdata('user_id');
        $myteam = $this->spotch_model->check_member_team($user_id);
        $today = date("Y-m-d");
        if(!empty($myteam)){
            $myteam = $myteam->group_id;
        }
        else{
            $myteam = '-1';
        }

        $result = $this->spotch_model->get_teams($team_id);
        if ($result->media_id != 0) {
            $featured_image = $this->spotch_model->get_featured($result->media_id);
            if (!empty($featured_image)) {
                $team_image = base_url().'uploads/'.$featured_image->path;
                $team_image = '<img src="'.$team_image.'" alt="..." class="">';
                
       
            }   
        }else{
            $random = mt_rand(1,5);
            $team_image = base_url().'assets/img/color_500_00'.$random.'.png';
            $team_image = '<img src="'.$team_image.'" alt="..." class="">';
        }
        $html['team_id'] = $result->team_id;
        $html['description'] = $result->description;
        $html['team_creator'] = $result->team_creator;
        $myloc = explode("/",$result->team_location);
    
        $loc = $myloc;

        $b = count($myloc)-1;
        
        $html['team_location'] = $myloc[1].', '.$myloc[0];
        $html['team_name'] = $result->team_name;
        $html['team_image'] = $team_image;
        $html['team_level'] = $result->team_level;
        if($result->team_level=="Excellent"){
            $level_image = base_url().'assets/img/single_gold.png';
            $html['team_level_image'] = '<img src="'.$level_image.'" alt="..." class="level-image">';
        }
        elseif($result->team_level=="Intermediate"){
            $level_image = base_url().'assets/img/single_silver.png';
            $html['team_level_image'] = '<img src="'.$level_image.'" alt="..." class="level-image">';
        }
        elseif($result->team_level=="Beginner"){
            $level_image = base_url().'assets/img/single_bronze.png';
            $html['team_level_image'] = '<img src="'.$level_image.'" alt="..." class="level-image">';
        }
        $html['team_created'] = date("m/d/Y",strtotime($result->date_created));
        $html['team_actions'] = '';

        $creator = $this->user_model->get_user($result->team_creator);
        if(!empty($creator)){
            $email = $creator->email;
        }
        else{
            $email = '';
        }
        
            

        if($team_id!=$myteam){
            if($myteam!='-1'){
                $html['team_actions'] .= '<span class="pull-right">';
            	$html['team_actions'] .= '<a class="grey" id="ask-game" data-id="'.$team_id.'" href="javascript:void(0);"><i class="fa fa-question"></i> ゲームを求めます</a> ';
            	$html['team_actions'] .= '<a href="mailto:'.$email.'?Subject=test"  class="red" id="contact-team" data-id="'.$team_id.'" href="javascript:void(0);"><i class="fa fa-envelope"></i> コンタクト</a>';
            	$html['team_actions'] .= '</span>';
                
            }
            else{
            	$html['team_actions'] .= '<a class="blue" href="javascript:void(0);" id="join_team"><i class="fa fa-plus"></i> チームに入ります</a>';
                $html['team_actions'] .= '<span class="pull-right">';
            	$html['team_actions'] .= '<a class="grey" id="ask-game" data-id="'.$team_id.'" href="javascript:void(0);"><i class="fa fa-question"></i> ゲームを求めます</a> ';
            	$html['team_actions'] .= '<a href="mailto:'.$email.'?Subject=test" class="red" id="contact-team" data-id="'.$team_id.'" ><i class="fa fa-envelope"></i> コンタクト</a>';
            	$html['team_actions'] .= '</span>';
            }
        }
        else{
        	if($result->team_creator==$user_id){
        		$html['team_actions'] .= '<a class="blue" href="" id="disable-link"><i class="fa fa-plus"></i> チームを作成</a>';
        	}
        	else{
        		$html['team_actions'] .= '<a class="blue" href="" id="disable-link" ><i class="fa fa-plus"></i> このチームのメンバー</a>';
        	}
            
        }

        $myteam = $this->spotch_model->check_member_team($user_id);
        $today = date("Y-m-d");
        if(!empty($myteam)){
            $myteam_id = $myteam->group_id;
        }
        else{
            $myteam_id = '-1';
        }

        $games = $this->spotch_model->get_games_announcements_team($team_id);

        $html['game_lists'] = '';
        if(!empty($games)){
            foreach ($games as $row) {
                if($row->type=="Game"){
                    $games = $this->spotch_model->get_game_by_id($row->game_id);

                    if (!empty($games) > 0 ) {
                        $last_date = "";
                        
                            $date_of_game = $games->date_of_game;
                            $current_date = date('M d, Y',strtotime($date_of_game));
                            
                            if ($current_date == $last_date) {
                                
                            }else{
                                
                                $last_date = $current_date;
                                $html['game_lists'] .= '<h2>'.$last_date.'</h2>';
                                $check_date = date('Y-m-d',strtotime($last_date));
                                $result_by_date = $this->spotch_model->get_game_by_id($row->game_id,$check_date);

                                    //$game_date = $result_by_date->date_of_game;
                                    $get_user_details = $this->user_model->get_user($result_by_date->author);


                                    $time = date('H:i',strtotime($result_by_date->date_of_game));
                                    $html['game_lists'] .= '<div class="a-box">';
                                        $html['game_lists'] .= '<div class="col-md-2 a-type">';
                                            $html['game_lists'] .= '<div class="game">';
                                                $html['game_lists'] .= '<h1>'.$time.'</h1>';
                                            $html['game_lists'] .= '</div>';
                                        $html['game_lists'] .= '</div>';

                                        $html['game_lists'] .= '<div class="col-md-8 a-content">';
                                                $html['game_lists'] .= '<h1><a href="'.base_url().'game_details/?id='.$result_by_date->id.'">'.$result_by_date->title.'</a></h1>';
                                                if(strlen($result_by_date->description)>150){
                                                    $html['game_lists'] .= '<p>'.mb_substr($result_by_date->description,0,150).'</p>';
                                                }else{
                                                    $html['game_lists'] .= '<p>'.$result_by_date->description.'</p>';
                                                }

                                                $html['game_lists'] .='<div class="container_details">';
                                                $html['game_lists'] .='<div class="col-md-4">'.$result_by_date->game_location.'</div>';
                                                if($result_by_date->author!=$this->session->userdata('user_id')){
                                                    $html['game_lists'] .='<div class="col-md-4">わかりませんか？ <a href="javascript:void(0);"
                                                        data-email = "'.$get_user_details->email.'" data-user="'.$this->session->userdata('user_id').'" data-name="'.$result_by_date->author.'" data-id="'.$result_by_date->id.'" class="inquire" data-toggle="modal" data-target="#myinqury " data-backdrop="static" 
                                                        data-keyboard="false">問い合わせます</a>
                                                        </div>';//inquire    
                                                }
                                                else{
                                                    $html['game_lists'] .= '<div class="col-md-4"></div>';
                                                }
                                                        if($result_by_date->category=='Women')
                                                        {
                                                             $html['game_lists'] .='<div class="col-md-4">カテゴリー： <span style="color: #f965b1;">'.$result_by_date->category.'</span></div>';
                                                        }
                                                        else if($result_by_date->category=='Men')
                                                        {
                                                             $html['game_lists'] .='<div class="col-md-4">カテゴリー： <span style="color: #027cfe;">'.$result_by_date->category.'</span></div>';
                                                        }
                                                        else if($result_by_date->category=='Practice')
                                                        {
                                                             $html['game_lists'] .='<div class="col-md-4">カテゴリー： <span style="color: #39803e;">'.$result_by_date->category.'</span></div>';
                                                        }
                                                        else if($result_by_date->category=='Senior')
                                                        {
                                                             $html['game_lists'] .='<div class="col-md-4">カテゴリー： <span style="color: #ff9e04;">'.$result_by_date->category.'</span></div>';
                                                        }
                                                        else
                                                        {
                                                             $html['game_lists'] .='<div class="col-md-4">カテゴリー： <span style="color: #8e3389;">'.$result_by_date->category.'</span></div>';
                                                        }
                                                        if(ctype_digit($row->team)){
                                                            $team_name = '';
                                                        }
                                                        else{
                                                            $team_name = $row->team;
                                                        }

                                                        if($result_by_date->author==$this->session->userdata('user_id')){
                                                            $html['game_lists'] .='<div class="col-md-8" style="padding:0px;">このゲームを作成しました。</div>';            
                                                        }
                                                        else{
                                                            
                                                            if($row->status=="Active"){
                                                                if($games->category=="Practice" || $games->category=="Mix"){
                                                                    $html['game_lists'] .='<div class="col-md-8" style="padding:0px;">ゲームの下で参加 '.$team_name.'.</div>';   
                                                                }
                                                            }
                                                            else if($row->status=="Pending"){
                                                                $html['game_lists'] .='<div class="col-md-8" style="padding:0px;">ゲームの作成者からの確認を待っています。</div>';
                                                            }
                                                            else if($row->status=="Decline"){
                                                                $html['game_lists'] .='<div class="col-md-8" style="padding:0px;">要求が拒否されました。</div>';
                                                            }
                                                            
                                                        }

                                                        $today = date("Y-m-d");
                                                        $match_result = "";

                                                        if($games->category=="Women" || $games->category=="Men" || $games->category=="Senior"){
                                                            $match = $this->spotch_model->get_match($row->game_id);
                                                            if(!empty($match)){
                                                                if(count($match)==2){
                                                                    $match_result = "has match";
                                                                }
                                                                else{
                                                                    $match_result = "no match";
                                                                }
                                                            }
                                                        }
                                                        else{
                                                            $match = $this->spotch_model->get_match($row->game_id);
                                                            if(!empty($match)){
                                                                if(count($match)==2){
                                                                    $match_result = "has match";
                                                                }
                                                                else{
                                                                    $match_result = "no match";
                                                                }
                                                            }
                                                        }
                                                        $game_status = "";

                                                        if(date('Y-m-d',strtotime($games->date_of_game))>=$today){
                                                            if(date('Y-m-d',strtotime($games->date_of_game_from))<=$today && date('Y-m-d',strtotime($games->date_of_game_to))>=$today){
                                                                if($match_result=="has match"){
                                                                    $game_status = "close";
                                                                }
                                                                else{
                                                                    $game_status = "active";
                                                                }
                                                            }
                                                            else{
                                                                $game_status = "close";
                                                            }
                                                        }
                                                        else{
                                                            if($match_result=="has match"){
                                                                $game_status = "over";
                                                            }
                                                            else{
                                                                $game_status = "close";
                                                            }
                                                        }
                                                        
                                                        if($game_status=="active"){ 
                                                            $html['game_lists'] .='<div class="col-md-4" style="padding:0px;"><span style="color:#b4b2b2;">ゲームのステータス：</span> Open</div>';   
                                                        }
                                                        else if($game_status=="close"){
                                                            $html['game_lists'] .='<div class="col-md-4" style="padding:0px;"><span style="color:#b4b2b2;">ゲームのステータス：</span> Close</div>';
                                                        }
                                                        else if($game_status=="over"){
                                                            $html['game_lists'] .='<div class="col-md-4" style="padding:0px;"><span style="color:#b4b2b2;">ゲームのステータス：</span> Over</div>';
                                                        }
                                                          
                                                
                                                 $html['game_lists'] .= '<div class="clearfix"></div>'; //end of md-7
                                                        
                                        $html['game_lists'] .= '</div>'; //end of md-7
                                        //$game_date = $result_by_date->date_of_game;
                                        $member_type = "";

								        $member = $this->spotch_model->check_member_team($this->session->userdata('user_id'));
								        if(!empty($member)){
								        	$team = $this->spotch_model->get_teams($member->group_id);	
								        }
								        if(!empty($team)){
								            if($team->team_creator==$member->user_id){
								                $member_type = "leader";
								            }
								            else{
								                $member_type = "member";
								            }
								        }
								        else{
								            $member_type = "no team";
								        }
                                        $user_id = $this->session->userdata('user_id');
                                        $myteam = $this->spotch_model->check_member_team($user_id);
                                        
                                        if(!empty($myteam)){
                                            $myteam = $myteam->group_id;
                                        }
                                        else{
                                            $myteam = '-1';
                                        } 

                                        $author_info = $this->spotch_model->check_member_team($games->author);
                                        if(!empty($author_info)){
                                        	$author_team = $author_info->group_id;
                                        }
                                        else{
                                        	$author_team = '-1';
                                        }


                                       

                                        // $game_team = $this->spotch_model->get_other_team($games->id,$myteam);
                                        $html['game_lists'] .= '</div><div class="col-md-2">';

										if($member_type=="leader"){
								            if($games->category=="Women" || $games->category=="Men" || $games->category=="Senior"){
								             $check = $this->spotch_model->get_participant_per_game($games->id,$myteam);
								             if(!empty($check)){
								                if($games->author==$this->session->userdata('user_id')){
								                    $html['game_lists'] .= '<button class="btn btn-block btn-primary" id="join_game" data-id="'.$games->id.'" disabled>ゲームを作成</button>';
								                }
								                else{
								                    if($game_status=="active"){
								                        if($check->status=="Pending"){
								                            $html['game_lists'] .= '<button class="btn btn-block btn-primary" id="join_game" data-id="'.$games->id.'" disabled>要求されました</button>';
								                        }
								                        else{
								                            $html['game_lists'] .= '<button class="btn btn-block btn-primary" id="join_game" data-id="'.$games->id.'" disabled>参加しました</button>';
								                        }
								                        $html['game_lists'] .= '<button class="btn btn-block btn-info" id="inquire_game" data-id="'.$games->id.'">問い合わせます</button>';
								                    }
								                    else if($game_status=="over"){
								                        $html['game_lists'] .= '<button class="btn btn-block btn-primary" data-id="'.$games->id.'" disabled>ゲームオーバー</button>';
								                    }
								                    else if($game_status=="close"){
								                        $html['game_lists'] .= '<button class="btn btn-block btn-primary" data-id="'.$games->id.'" disabled>ゲーム閉じます</button>';
								                    }
								                }
								             }  
								             else{
								                $check_join = $this->spotch_model->get_participant_per_game_2($games->id,$user_id);
								                if($game_status=="active"){
								                    if(!empty($check_join)){
								                        if($check_join->status=="Pending"){
								                            $html['game_lists'] .= '<button class="btn btn-block btn-primary" id="join_game" data-id="'.$games->id.'" disabled>要求されました</button>';
								                        }
								                        else if($check_join->status=="Decline"){
								                            $html['game_lists'] .= '<button class="btn btn-block btn-primary" id="join_game" data-id="'.$games->id.'" disabled>辞退</button>';
								                        }

								                    }
								                    else{
								                        $html['game_lists'] .= '<button class="btn btn-block btn-primary" id="join_game" data-id="'.$games->id.'" data-value="'.$games->category.'">参加します</button>';
								                    }
								                    
								                    $html['game_lists'] .= '<button class="btn btn-block btn-info" id="inquire_game" data-id="'.$games->id.'">問い合わせます</button>';
								                }
								                else if($game_status=="over"){
								                    $html['game_lists'] .= '<button class="btn btn-block btn-primary" data-id="'.$games->id.'" disabled>ゲームオーバー</button>';
								                }
								                else if($game_status=="close"){
								                    $html['game_lists'] .= '<button class="btn btn-block btn-primary" data-id="'.$games->id.'" disabled>ゲーム閉じます</button>';
								                }
								             }  
								            }
								            else{
								                $check_join = $this->spotch_model->get_participant_per_game_2($games->id,$user_id);
								                if($game_status=="active"){
								                    if($games->author==$this->session->userdata('user_id')){
								                        $html['game_lists'] .= '<button class="btn btn-block btn-primary" id="join_game" data-id="'.$games->id.'" disabled>ゲームを作成</button>';
								                    }
								                    else{
								                        if(!empty($check_join)){
								                            if($check_join->status=="Pending"){
								                                $html['game_lists'] .= '<button class="btn btn-block btn-primary" id="join_game" data-id="'.$games->id.'" disabled>要求されました</button>';
								                            }
								                            else if($check_join->status=="Active"){
								                                $html['game_lists'] .= '<button class="btn btn-block btn-primary" id="join_game" data-id="'.$games->id.'" disabled>参加しました</button>';
								                            }
								                            else if($check_join->status=="Decline"){
								                                $html['game_lists'] .= '<button class="btn btn-block btn-primary" id="join_game" data-id="'.$games->id.'" disabled>辞退</button>';
								                            }
								                        }
								                        else{
								                            $html['game_lists'] .= '<button class="btn btn-block btn-primary" id="join_game" data-id="'.$games->id.'" data-value="'.$games->category.'">参加します</button>';
								                        }
								                        
								                    }
								                    
								                }
								                else if($game_status=="over"){
								                    $html['game_lists'] .= '<button class="btn btn-block btn-primary" data-id="'.$games->id.'" disabled>ゲームオーバー</button>';
								                }
								                else if($game_status=="close"){
								                    $html['game_lists'] .= '<button class="btn btn-block btn-primary" data-id="'.$games->id.'" disabled>ゲーム閉じます</button>';
								                }
								            }
								        }
								        else if($member_type=="member"){
								            if($games->category=="Women" || $games->category=="Men" || $games->category=="Senior"){
								             $check = $this->spotch_model->get_participant_per_game($games->id,$myteam);
								             if(!empty($check)){
								                if($game_status=="active"){
								                    $html['game_lists'] .= '<button class="btn btn-block btn-primary" id="join_game" data-id="'.$games->id.'" data-value="'.$games->category.'">参加します</button>';
								                    $html['game_lists'] .= '<button class="btn btn-block btn-info" id="inquire_game" data-id="'.$games->id.'">問い合わせます</button>';
								                }
								                else if($game_status=="over"){
								                    $html['game_lists'] .= '<button class="btn btn-block btn-primary" data-id="'.$games->id.'" disabled>ゲームオーバー</button>';
								                }
								                else if($game_status=="close"){
								                	if($author_team==$myteam_id){
								                		if(date('Y-m-d',strtotime($games->date_of_game))>=$today){
                                                            if(date('Y-m-d',strtotime($games->date_of_game_from))<=$today && date('Y-m-d',strtotime($games->date_of_game_to))>=$today){
										                		$html['game_lists'] .= '<button class="btn btn-block btn-primary" id="join_game" data-id="'.$games->id.'" data-value="'.$games->category.'">参加します</button>';
										                    	$html['game_lists'] .= '<button class="btn btn-block btn-info" id="inquire_game" data-id="'.$games->id.'">問い合わせます</button>';
										                	}
										                	else{
										                		$html['game_lists'] .= '<button class="btn btn-block btn-primary" data-id="'.$games->id.'" disabled>ゲーム閉じます</button>';
										                	}
										                }
										                else{
										                	$html['game_lists'] .= '<button class="btn btn-block btn-primary" data-id="'.$games->id.'" disabled>ゲーム閉じます</button>';
										                }
										            }
										            else{
										            	$html['game_lists'] .= '<button class="btn btn-block btn-primary" data-id="'.$games->id.'" disabled>ゲーム閉じます</button>';
										            }
								                	
								                }
								             }  
								             else{
								                $check_join = $this->spotch_model->get_participant_per_game_2($games->id,$user_id);
								                if($game_status=="active"){
								                    if(!empty($check_join)){
								                        if($check_join->status=="Pending"){
								                            $html['game_lists'] .= '<button class="btn btn-block btn-primary" id="join_game" data-id="'.$games->id.'" disabled>要求されました</button>';
								                        }
								                        else if($check_join->status=="Active"){
								                            $html['game_lists'] .= '<button class="btn btn-block btn-primary" id="join_game" data-id="'.$games->id.'" disabled>参加しました</button>';
								                        }
								                        else if($check_join->status=="Decline"){
								                            $html['game_lists'] .= '<button class="btn btn-block btn-primary" id="join_game" data-id="'.$games->id.'" disabled>辞退</button>';
								                        }
								                    }
								                    else{
								                            $html['game_lists'] .= '<button class="btn btn-block btn-primary" id="join_game" data-id="'.$games->id.'" data-value="'.$games->category.'">参加します</button>';
								                    }
								                    
								                    $html['game_lists'] .= '<button class="btn btn-block btn-info" id="inquire_game" data-id="'.$games->id.'">問い合わせます</button>';
								                }
								                else if($game_status=="over"){
								                    $html['game_lists'] .= '<button class="btn btn-block btn-primary" data-id="'.$games->id.'" disabled>ゲームオーバー</button>';
								                }
								                else if($game_status=="close"){
								                    $html['game_lists'] .= '<button class="btn btn-block btn-primary" data-id="'.$games->id.'" disabled>ゲーム閉じます</button>';
								                }
								             }  
								            }
								            else{
								                $check_join = $this->spotch_model->get_participant_per_game_2($games->id,$user_id);
								                if($game_status=="active"){
								                    if(!empty($check_join)){
								                        if($check_join->status=="Pending"){
								                            $html['game_lists'] .= '<button class="btn btn-block btn-primary" id="join_game" data-id="'.$games->id.'" disabled>要求されました</button>';
								                        }
								                        else if($check_join->status=="Active"){
								                            $html['game_lists'] .= '<button class="btn btn-block btn-primary" id="join_game" data-id="'.$games->id.'" disabled>参加しました</button>';
								                        }
								                        else if($check_join->status=="Decline"){
								                            $html['game_lists'] .= '<button class="btn btn-block btn-primary" id="join_game" data-id="'.$games->id.'" disabled>辞退</button>';
								                        }
								                    }
								                    else{
								                        $html['game_lists'] .= '<button class="btn btn-block btn-primary" id="join_game" data-id="'.$games->id.'" data-value="'.$games->category.'">参加します</button>';
								                    }
								                    
								                }
								                else if($game_status=="over"){
								                    $html['game_lists'] .= '<button class="btn btn-block btn-primary" data-id="'.$games->id.'" disabled>ゲームオーバー</button>';
								                }
								                else if($game_status=="close"){
								                    $html['game_lists'] .= '<button class="btn btn-block btn-primary" data-id="'.$games->id.'" disabled>ゲーム閉じます</button>';
								                }
								            }
								        }
								        else{
								            
								        }

                                        $html['game_lists'] .= '</div><div class="clearfix"></div>';
                                     $html['game_lists'] .= '</div>';
                                
                           
                            
                        }
                    }

                   
                    else{
                        $html['game_lists'] .= '';
                    }
                // 
                }
                else{
                    $author = $this->spotch_model->check_member_team($row->date_left);
                    if(!empty($author)){
                        $author_id = $author->group_id;
                    }
                    else{
                        $author_id = '-1';
                    }

                    if($team_id==$author_id){
                        $html['game_lists'] .= '<h2>'.date('M d, Y',strtotime($row->team)).' - '.date('M d, Y',strtotime($row->score)).'</h2>';
                        $html['game_lists'] .= '<div class="a-box">';
                        $html['game_lists'] .= '<div class="col-md-2 a-type a-announcement">';
                            $html['game_lists'] .= '<div class="game">';
                                $html['game_lists'] .= '<h1>パブリック</h1>';
                            $html['game_lists'] .= '</div>';
                        $html['game_lists'] .= '</div>';
                        $html['game_lists'] .= '<div class="col-md-8 a-content">';
                        $html['game_lists'] .= '<h1><a href="#">'.$row->game_id.'</a></h1>';
                        if(strlen($row->user_id)>140){
                            $html['game_lists'] .= '<p>'.mb_substr($row->user_id,0,140).'</p>';
                        }else{
                            $html['game_lists'] .= '<p>'.$row->user_id.'</p>';
                        }
                        $html['game_lists'] .= '</div>';

                        $html['game_lists'] .= '<div class="clearfix"></div>';
                        $html['game_lists'] .= '</div>';
                    }
                }
            }
        }
        else{
            //$html['game_lists'] .= 'announcement';
        }

        $game_logs = $this->spotch_model->get_active_games_per_team($team_id);

        $html['games'] = 0;
        $html['wins'] = 0;
        $html['loses']=0;
        $html['members'] = 0;
        $n_members = $this->spotch_model->get_members($team_id);
		$html['members'] = count($n_members);
        $html['game_logs'] = '';
        if(!empty($game_logs)){
        	$html['games'] = count($game_logs);
            foreach ($game_logs as $row) {
                $game = $this->spotch_model->get_game_by_id($row->game_id);
                $my_team = $row->team;
                $game_1 = $this->spotch_model->get_score($row->game_id,$team_id);
                if(!empty($game_1)){
                    if($game_1->status=="Pending"){
                        $my_score = "No scores";
                    }
                    else if($game_1->status=="Active"){
                        if($game_1->score==0){
                            $my_score = "No scores";
                        }
                        else{
                            $my_score = $game_1->score;
                        }
                    }
                }
                else{
                    $my_score = "No scores";
                }


                $other_team = $this->spotch_model->get_opponent($row->game_id,$team_id);
                if(!empty($other_team)){
                    $team = $this->spotch_model->get_teams($other_team->team);
                    
                    if($other_team->status=="Pending"){
                        $other_team->score = "No scores";
                    }
                    else{
                        if($other_team->score==0){
                            $other_team->score = "No scores";
                        }
                    }

                    if(!empty($team)){
                        $html['game_logs'] .= '<tr>';
                        $html['game_logs'] .= '<td class="expand footable-first-column">'.$game->title.'</td>';
                        $html['game_logs'] .= '<td class="expand">'.$html['team_name'].' <span style="color:red">vs</span> '.$team->team_name.'</td>';
                        $html['game_logs'] .= '<td>'.$my_score.' - '.$other_team->score.' </td>';
                        $html['game_logs'] .= '<td>'.$game->category.' </td>';
                        $html['game_logs'] .= '<td data-value="78025368997">'.date('d M Y',strtotime($game->date_of_game)).'</td>';
                       
                        if($my_score=="No scores"){
                            $html['game_logs'] .= '<td data-value="3" class="footable-last-column"><span class="label label-warning">ペンディング</span></td>';
                        }
                        else if($my_score > $other_team->score){
                            $html['game_logs'] .= '<td data-value="3" class="footable-last-column"><span class="label label-success">勝者</span></td>';
                        	$html['wins']++;
                        }
                        else if($my_score==$other_team->score){
                            $html['game_logs'] .= '<td data-value="1" class="footable-last-column"><span class="label label-primary">引き分け</span></td>';
                        }
                        else if($my_score < $other_team->score){
                            $html['game_logs'] .= '<td data-value="2" class="footable-last-column"><span class="label label-danger">敗者</span></td>';
                        	$html['loses']++;
                        }
                        $html['game_logs'] .= '</tr>';
                    }
                    else{
                        $html['game_logs'] .= '<tr>';
                        $html['game_logs'] .= '<td class="expand footable-first-column">'.$game->title.'</td>';
                        $html['game_logs'] .= '<td class="expand" class="expand">'.$html['team_name'].' <span style="color:red">vs</span> '.$other_team->team.'</td>';
                        $html['game_logs'] .= '<td>'.$my_score.' - '.$other_team->score.' </td>';
                        $html['game_logs'] .= '<td>'.$game->category.' </td>';
                        $html['game_logs'] .= '<td data-value="78025368997">'.date('d M Y',strtotime($game->date_of_game)).'</td>';
                        
                        if($my_score=="No scores"){
                            $html['game_logs'] .= '<td data-value="3" class="footable-last-column"><span class="label label-warning">ペンディング</span></td>';
                        }
                        else if($my_score > $other_team->score){
                            $html['game_logs'] .= '<td data-value="3" class="footable-last-column"><span class="label label-success">勝者</span></td>';
                        	$html['wins']++;
                        }
                        else if($my_score==$other_team->score){
                            $html['game_logs'] .= '<td data-value="1" class="footable-last-column"><span class="label label-primary">引き分け</span></td>';
                        }
                        else if($my_score < $other_team->score){
                            $html['game_logs'] .= '<td data-value="2" class="footable-last-column"><span class="label label-danger">敗者</span></td>';
                        	$html['loses']++;
                        }
                        $html['game_logs'] .= '</tr>';
                    }
                }
                else{
                    $html['game_logs'] .= '<tr>';
                    $html['game_logs'] .= '<td class="expand footable-first-column">'.$game->title.'</td>';
                    $html['game_logs'] .= '<td class="expand">'.$html['team_name'].' <span style="color:red">vs</span><i> No opponent</i></td>';
                    $html['game_logs'] .= '<td>No scores</td>';
                    $html['game_logs'] .= '<td>'.$game->category.' </td>';
                    $html['game_logs'] .= '<td data-value="78025368997">'.date('d M Y',strtotime($game->date_of_game)).'</td>';
                    
                    $html['game_logs'] .= '<td data-value="3" class="footable-last-column"><span class="label label-warning">ペンディング</span></td>';
                    
                    $html['game_logs'] .= '</tr>';
                }
                
            }
        }
        else{
            $html['game_logs'] = '';
        }

        $data = array(
            'file'=> 'team_details',
            'team_details' => $html
        );
        $this->load->view('includes/template',$data);

    }   



 	public function save_team(){

 		$id = $this->input->post("InputTeamID");

 		$name = $this->input->post("InputTeamName");

 		$prefecture = $this->input->post("SelectPrefecture");

 		$city = $this->input->post("SelectCity");

 		$location = $prefecture.'/'.$city;

 		$description = $this->input->post("InputDescription");

 		$level = $this->input->post("SelectLevel");

        $max_member = $this->input->post("InputMax");

        $today = date("Y-m-d H:i:s");

        $team_creator =  $this->session->userdata('user_id');


        $data = array(

            "team_creator"          =>      $team_creator,

            "team_name"         	=>      $name,

            "team_location"       	=>      $location,

            "description"         	=>      $description,

            "team_level"            =>      $level,

            "max_member"            =>      $max_member,

            "date_created"          =>      $today

            
        );

        $data_edit = array(

            "team_name"         	=>      $name,

            "team_location"       	=>      $location,

            "description"         	=>      $description,

            "team_level"            =>      $level,

            "max_member"            =>      $max_member

            
        );


        if($id==""){
            $id = $this->spotch_model->save_team($id,$data);  
            $data_member = array(
                "group_id"      =>      $id,
                "user_id"       =>      $this->session->userdata('user_id'),
                "position"      =>      "",
                "status"        =>      "Active",
                "date_member"	=>		$today,
                "date_join"     =>      $today,
                "type"          =>      "Team"
            );

            $id = $this->spotch_model->save_member($id,$data_member);            
        }
        else{
            $id = $this->spotch_model->save_team($id,$data_edit);
        }
        

        if (isset($_FILES['FilePicture']))

        {

            if($_FILES['FilePicture']['name']!=""){   

                $config = array(

                    'upload_path'   => './uploads/',

                    'allowed_types' => '*',

                    'max_size'      => '500000',

                    'max_width'     => '4000',

                    'max_height'    => '4000',

                    'encrypt_name'  => true,

                );



                $this->load->library('upload', $config); //upload class



                if (!$this->upload->do_upload('FilePicture')) {

                   echo $this->upload->display_errors();  

                } 

                else {

                    $upload_data = $this->upload->data();



                     $data_ary = array(

                        'Path'    => $upload_data['file_name'],

                        'Type'   => 'Image'

                    );



                    $this->load->database();

                    

                    //--insert to table media



                    $this->db->insert('tbl_media', $data_ary);

                    $image_id = $this->db->insert_id();



                    $data_img = array(

                        "media_id"      => $image_id

                    );



                    $id = $this->spotch_model->save_image($id,$data_img);

                }

            }

        }



    

        redirect("account");

 	}

    public function join_team(){
        $user_id = $this->input->post("user_id");
        $team_id = $this->input->post("team_id");

        $data_member = array(
            "group_id"      =>      $team_id,
            "user_id"       =>      $this->session->userdata('user_id'),
            "position"      =>      "",
            "date_member"	=>		$today = date("Y-m-d H:i:s"),
            "status"        =>      "Pending",
            "date_join"     =>      $today,
            "type"          =>      "Team"

        );

        $id = $this->spotch_model->save_member($team_id,$data_member);

        echo $id;
    }


    function check_member_team(){

        $user_id = $this->session->userdata('user_id');

        $result =  $this->spotch_model->check_member_team($user_id);

        $html['html'] = '';
        if(!empty($result)){
            $html['html'] = "has a team";

            $team = $this->spotch_model->get_teams($result->group_id);
            if(!empty($team)){
                $html['team_id'] = $team->team_id;
                $html['author']  = $team->team_creator;
            }
            else{
                $html['team_id'] = "";
                $html['author']  = "";
            }
        }
        else{
            $html['html'] = "no team";
            $html['team_id'] = "";
            $html['author']  = "";
        }

        echo json_encode($html);

    }

    function get_team_by_id(){
    
        $team_id = $this->input->post('id');

        $result =  $this->spotch_model->get_teams($team_id);
       
        
        if(!empty($result)){
            if($result->media_id != 0) {
                $featured_image = $this->spotch_model->get_featured($result->media_id);
                if (!empty($featured_image)) {
                    $team_image = base_url().'uploads/'.$featured_image->path;
                    $team_image = '<img src="'.$team_image.'" alt="..." class="">';
                    
           
                }   
            }else{
                $random = mt_rand(1,5);
                $team_image = base_url().'assets/img/color_500_00'.$random.'.png';
                $team_image = '<img src="'.$team_image.'" alt="..." class="">';
            }
            $html['team_id'] = $result->team_id;
            $html['team_description'] = $result->description;
            $html['author'] = $result->team_creator;
            $myloc = explode("/",$result->team_location);
        
            $loc = $myloc;

            $b = count($myloc)-1;
            
            $html['team_location'] = $myloc[1].', '.$myloc[0];
            $html['team_prefecture'] = $myloc[0];
            $html['team_city']  = $myloc[1];
            $html['team_name'] = $result->team_name;
            $html['team_maximum'] = $result->max_member;
            $html['team_image'] = $team_image;
            $html['team_level'] = $result->team_level;
            if($result->team_level=="Excellent"){
                $level_image = base_url().'assets/img/single_gold.png';
                $html['team_level_image'] = '<img src="'.$level_image.'" alt="..." class="level-image">';
            }
            elseif($result->team_level=="Intermediate"){
                $level_image = base_url().'assets/img/single_silver.png';
                $html['team_level_image'] = '<img src="'.$level_image.'" alt="..." class="level-image">';
            }
            elseif($result->team_level=="Beginner"){
                $level_image = base_url().'assets/img/single_bronze.png';
                $html['team_level_image'] = '<img src="'.$level_image.'" alt="..." class="level-image">';
            }
            $html['team_created'] = date("m/d/Y",strtotime($result->date_created));

        }
        else{
            $html['html'] = "no team";
            $html['team_id'] = "";
            $html['author']  = "";

            $random = mt_rand(1,5);
            $team_image = base_url().'assets/img/color_500_00'.$random.'.png';
            $team_image = '<img src="'.$team_image.'" alt="..." class="">';
            
            $html['team_id'] = "";
            $html['team_description'] = "";
            $html['author'] = "";
            $html['team_location'] = "";
            $html['team_prefecture'] = "";
            $html['team_city']  = "";
            $html['team_name'] = "";
            $html['team_image'] = "";
            $html['team_level'] = "";
            $html['team_level_image'] = '<img src="'.$level_image.'" alt="..." class="level-image">';
            
            $html['team_created'] = "";
        }

        echo json_encode($html);

    }

    public function send_message(){
        $team_id = $this->input->post('team_id');
        $user_id = $this->session->userdata('user_id');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        $today = date("Y-m-d H:i:s");

        $data = array(
            "team_id"   =>  $team_id,
            "from_user" =>  $user_id,
            "subject"   =>  $subject,
            "message"   =>  $message,
            "attachment"    => "",
            "date_join" => $today,
            "status"    => "Pending",
            "type"      => "Message",
            "remark"    => ""
        );

        $result = $this->spotch_model->send_message($data);

        echo $result;
    }

    public function check_name(){
        $team_name = $this->input->post('team_name');

        $result = $this->spotch_model->check_team($team_name);

        if(!empty($result)){
            echo "exists";
        }
        else{
            echo "none";
        }
    }

    

   

	

}

