<style type="text/css">
body{
  background-color: #f9f9f9;
}
.headerOffset{
  padding-top: 0px;
}
.main-container{
  background-color: white;
}
/*.container {
 padding-right: 0px; 
 padding-left: 0px; 
}*/
/*.team-page .team-image img:first-child{
  width: 100%;
  height: 350px;
}
.team-page .team-image img.level-image{
  float: right;
  margin-right: 50px;
  position: relative;
  margin-top: -40px;
  width: 80px;
}
.team-page .details-description{
  min-height: 150px;
}
.team-page .team-image{
  max-height: 420px;
  height: 420px;
  background-color: #424b71;
  border-bottom: 20px solid #656d8d;
  margin-bottom: 30px;
  margin-top: 5%;
}
.team-page .team-image h1{
  color: white !important;
  font-weight: bold;
  font-family: "Meiryo",Arial;
  margin-top: -50px;
  padding-left: 25px;
}
.team-page .a-box{
  min-height: 200px;
  height:auto;
  overflow:auto;
  border: 1px solid #DDDDDD;
  border-bottom: 1px solid #DDDDDD;
  margin-bottom: 20px;
  border-radius: 5px;
}
.team-page .a-box .a-type{
  padding: 0px;
}
.team-page .a-box .a-type .game{
  color: white;
  display: block;
  min-height: 200px;
  text-align: center;
  vertical-align: middle;
  overflow: hidden;
}
.team-page .a-box .a-type .game h1{
  font-size: 100px;
  margin-top: 50px;
}
.team-page .a-box .a-type .game span{
  color: rgb(36, 12, 12);
}
.team-page .a-box .a-type .game h3{
  padding-bottom: 0px;
}
.team-page .a-box .a-type .public{
  background-color: rgba(191, 191, 198, 0.95) !important;
  color: white;
  display: block;
  min-height: 200px;
  text-align: center;
  vertical-align: middle;
  overflow: hidden;
}
.team-page .a-box .a-type .public h1{
  font-size: 50px;
  margin-top: 50px;
}

.team-page .btn-primary, .btn-primary, .product:hover .add-fav:hover, .product:hover .add-fav.active{
  margin-top: 20px;
}

.quotation-start, .quotation-end{
  display: block;
  margin-bottom: 15px;
}
.quotation-end{
  float: right;
}

.main-container{
  background-color: white;
}

.team-about p{
  font-size: 14px;
  font-weight: bold;
  margin-bottom: 3px;
}
.team-about h3{
  font-size: 16px;
  padding-bottom: 5px;
}
.detail-box, .stat-box{
  padding: 0px 30px 30px 30px;
  font-family:"Meiryo",Arial;
}
p.stat-label{
  color: grey;
  font-size: 12px;
  margin-bottom: 10px;
}
.team-stat h1, .team-stat p{
  text-align: center;
}
.action-box a.red{
  padding: 10px 20px;
  text-align: center;
  background-color: #eb5e5e;
  color: white;
  display: inline-block;
}
.action-box a.blue{
   padding: 10px 20px;
  text-align: center;
  background-color: #6690b9;
  color: white;
  width: 150px;
  display: inline-block;
  margin-bottom: 10px;
}
.action-box span a.grey{
  width: 180px;
  padding: 10px 20px;
  text-align: center;
  display: inline-block;
  margin-bottom: 10px;
  color: white;
  background-color: #9CA8B4;
}
#disable-link{
  cursor:default;
}

.team-page .a-box{
  min-height: 120px;
  height:auto;
  overflow:auto;
  border: 1px solid #DDDDDD;
  border-bottom: 1px solid #DDDDDD;
  margin-bottom: 20px;
  background-color: white;
  font-family: "Meiryo",Arial;
}
.team-page .a-box .a-type{
  padding: 0px;
  border-left: 10px solid #eb5e58;
}

.team-page .a-box .a-announcement{
  border-left: 10px solid #8d9fac;
}
.a-content h1{
  padding-bottom: 0px;
}
.a-content h1 a{
  color: #eb5e58;
  font-size: 18px;
  padding-bottom: 0px;
}
.a-content p{
  color: #b4b2b2;
}
.team-page .a-box .a-type .game{
  color: black;
  display: block;
  min-height:130px;
  text-align: center;
  vertical-align: middle;
  overflow: hidden;
  /*border-left: 10px solid #eb5e58;*/
/*}
.team-page .a-box .a-type .game h1{
  font-size: 18px;
}
.team-page .a-box .a-type .game span{
  color: rgb(36, 12, 12);
  font-size: 60px;
  font-weight: bold;
}
.team-page .a-box .a-type .game h3{
  padding-bottom: 0px;
}
.team-page .a-box .a-type .public{
  background-color: rgba(191, 191, 198, 0.95) !important;
  color: white;
  display: block;
  min-height: 120px;
  max-height: 140px;
  text-align: center;
  vertical-align: middle;
  overflow: hidden;
}
.team-page .a-box .a-type .public h1{
  font-size: 50px;
  margin-top: 50px;
}
.team-page h2{
  font-size: 18px;
}*/
.a-box button{
  font-size: 10px;
}
</style>
<div class="container main-container headerOffset team-page">
	<div class="row">
		<!-- left column -->
    <div class="col-lg-12 col-md-12 col-sm-12 team-img-holder">
    	<!-- product Image and Zoom -->
        <div class="team-image">
          <?php echo $team_details['team_image']; ?>
           <h1 class="product-title"><?php echo $team_details['team_name']; ?></h1>
          <?php echo $team_details['team_level_image']; ?>
        </div>
    </div><!--/ left column end -->
    <!-- right column -->
    <br>
    <div class="clearfix"></div>
      <!-- announcement box -->
      <div class="col-lg-8 col-md-8 col-sm-8 detail-box">
        <div class="action-box">
            <?php echo $team_details['team_actions']; ?>
        </div>
        <div class="clearfix"></div>
        <hr>
      <h1 style="display:inline"></h1><h1>ゲームとお知らせ</h1>
        <div class="game-announcement team-page">
          <br>
          <!-- team announcement -->
          <?php 
            if($team_details['game_lists']==""){
              echo '<img src="'.base_url().'assets/img/no_posts.png" class="img-responsive">';
            }
            else{
              echo $team_details['game_lists']; 
            }
          ?>
        </div>
        <br>
        <div class="game-log">
          <h1 style="display:inline"><h1> ゲームログ </h1>
          <table class="table">
            <thead>
              <tr>
                <th data-class="expand" data-sort-initial="true" class="footable-sortable footable-sorted footable-first-column"> <span title="table sorted by this column on load">ゲーム</span> <span class="footable-sort-indicator"></span></th>
                <th data-hide="default" class="footable-sortable"> チーム <span class="footable-sort-indicator"></span></th>
                <th data-hide="default" class="footable-sortable"> スコア <span class="footable-sort-indicator"></span></th>
                <th data-hide="default" class="footable-sortable"> カテゴリ <span class="footable-sort-indicator"></span></th>
                <th data-hide="default" data-type="numeric" class="footable-sortable"> 日付 <span class="footable-sort-indicator"></span></th>
                <th data-hide="phone" data-type="numeric" class="footable-sortable footable-last-column"> ステータス <span class="footable-sort-indicator"></span></th>
              </tr>
            </thead>
            <tbody>
              <?php 
                  if($team_details['game_logs']==""){
                    echo '<tr><td colspan="5">いいえゲームログません。</td></tr>';
                  }
                  else{
                    echo $team_details['game_logs']; 
                  }
                ?>
            </tbody>
          </table>
          </div>
          <!--/row end--> 
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 stat-box">
      <h1>このチームについて</h1>
      <img src="<?php echo base_url(); ?>assets/img/qoutation_start.png" class="quotation-start">
      <p><?php echo $team_details['description']; ?></p>
      <img src="<?php echo base_url(); ?>assets/img/qoutation_end.png" class="quotation-end">
      <div class="clearfix"></div>
      <div class="team-about">
        <p class="stat-label">場所</p>
        <h3><?php echo $team_details['team_location']; ?></h3>
      </div>
      <br>
      <div class="team-about">
        <p class="stat-label">入会</p>
        <h3><?php echo $team_details['team_created']; ?></h3>
      </div>
      <hr>
      <div class="team-stat">
        <h3>統計</h3>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
          <p>勝</p>
          <h1><?php echo $team_details['wins']; ?></h1>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
          <p>失う</p>
          <h1><?php echo $team_details['loses']; ?></h1>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
          <p>メンバー</p>
          <h1><?php echo $team_details['members']; ?></h1>
        </div>
      </div>
      <div class="clearfix"></div>
      <ul class="pager">
        <?php echo $team_details['team_actions']; ?>
      </ul>
      <!-- productFilter -->
      <div class="product-share clearfix">
        <p> シェア </p>
        <div class="socialIcon"> 
          <a href="#"> <i  class="fa fa-facebook"></i></a> 
          <a href="#"> <i  class="fa fa-twitter"></i></a> 
          <a href="#"> <i  class="fa fa-google-plus"></i></a> 
          <a href="#"> <i  class="fa fa-pinterest"></i></a>
        </div>
      </div>
      <!--/.product-share--> 
    </div><!--/ right column end -->
    <br>
    <!-- game log row -->
	</div>
</div>
<div class="modal fade" id="deleteGame" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">あなたはこのゲームを削除してもよろしいですか？</h4>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="game_id">
        <button type="button" class="btn btn-primary" id="close_modal" >いいえ</button>
        <button type="button" class="btn btn-primary" id="delete_game" >はい</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myinqury" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">お問い合わせを送信</h4>
      </div>
      <div class="modal-body">
          <input type="hidden" id="game_id">
          <input type="hidden" id="from">
          <label>へ: <span id="author"></span></label>
          <div class="form-group">
            <textarea class="form-control" id="message"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">クローズ</button>
        <button type="button" class="btn btn-primary send_inqury">お問い合わせを送信</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="requestGame" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <input type="hidden" id="req_game_id">
        <input type="hidden" id="game_type">
        <input type="hidden" id="game_team">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">あなたはこのゲームに参加するための要求を送信しますか？</h4>
      </div>
      <div class="modal-body">
        <div class="" style="display:none;text-align:center;" id="teams">
          <h5>あなたのチームを選択してください</h5>
          <button class="btn btn-block btn-primary" id="team_a"><i class="fa fa-bolt"></i> <br>チームA</button>
          <button class="btn btn-block btn-primary" id="team_b"><i class="fa fa-bolt"></i> <br>Bチーム</button>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="game_id">
        <button type="button" class="btn btn-primary" id="close_modal" >いいえ</button>
        <button type="button" class="btn btn-primary" id="send_request" >はい</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="askGame" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ゲームを尋ねます</h4>
      </div>
      <div class="modal-body">
          <input type="hidden" id="ask_team_id">
          <input type="hidden" id="ask_from">
          <label>被験者: <span id="author"></span></label>
          <div class="form-group">
            <input type="text" class="form-control" id="ask_subject"/>
          </div>
          <label>メッセージ: <span id="author"></span></label>
          <div class="form-group">
            <textarea class="form-control" id="ask_message" style="height:120px;"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">クローズ</button>
        <button type="button" class="btn btn-primary send_message">メッセージの送信</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){

    $('#disable-link').click(function (e) {
        e.preventDefault();
        $(this).css({cursor:"default"});
    });
    
    // Function to join a Team
    $(document).on("click","#join_team",function(){
      var user_id = "<?php echo $this->session->userdata('user_id'); ?>";
      var team_id = "<?php echo $this->input->get('id'); ?>";
      
      data = {
        user_id   : user_id,
        team_id   : team_id
      }
      $.ajax({
        type  : "POST",
        data  : data,
        url   : "<?php echo base_url(); ?>teams/join_team",
        success : function(html){
          alert("あなたはこのチームの一員であることが要求を送信しました。");
          window.location = "<?php echo base_url(); ?>team_details/?id="+team_id;
        }
      })
    });

    $("#inquire_game").click(function(){

        user = $(this).data('user');

        if (user == "") {
          window.location.href = "http://featheringrey.com/spotch/login/";
        }else{
          to = $(this).data('email');
          game_id = $(this).data('id');
          user = $(this).data('user');
          $("#game_id").val(game_id);
          $("#from").val(user);
          $("#author").html(to);
          $("#myinqury").modal('show');

        }
        
      });

    $(document).on('click','.inquire',function(){

      user = $(this).data('user');

      if (user == "") {
        window.location.href = "http://featheringrey.com/spotch/login/";
      }else{
        to = $(this).data('email');
        game_id = $(this).data('id');
        user = $(this).data('user');
        $("#game_id").val(game_id);
        $("#from").val(user);
        $("#author").html(to);

      }
      
    });

      $(document).on("click","#join_game",function(){
        var game_id = $(this).attr("data-id");
        var game_type = $(this).attr("data-value");
        $("#req_game_id").val(game_id);
        $("#game_team").val('');
        $("#game_type").val(game_type);
        if(game_type=="Senior" || game_type=="Women" || game_type=="Men"){
          $("#teams").hide();
          $("#requestGame").modal("show");
        }
        else{
          $("#teams").show();
          $("#requestGame").modal("show");
        }
        
      });

      $(document).on("click","#send_request",function(){
        var game_id = $("#req_game_id").val();
        var game_type = $("#game_type").val();
        var team_name = $("#game_team").val();

        data = {
          game_id   : game_id,
          game_type : game_type,
          team_name   : team_name
        }
        $.ajax({
          type  : "POST",
          data  : data,
          url   : "<?php echo base_url(); ?>games/join_game",
          success : function(html){
            alert("リクエスト送信.");
            window.location = "<?php echo base_url(); ?>account";
          }
        })
      });

      $("#team_a").click(function(){
          $("#game_team").val('Team A');
        })

      $("#team_b").click(function(){
        $("#game_team").val('Team B');
      })

    $("#delete-game").click(function(){
      var game_id = $(this).attr("data-id");

      $("#game_id").val(game_id);

      $("#deleteGame").modal("show");
    })

    $(document).on("click","#ask-game",function(){
      team_id = $(this).attr('data-id');

      $("#ask_team_id").val(team_id);
      $("#askGame").modal('show');

    });

    $(".send_message").click(function(){
      var team_id = $("#ask_team_id").val();
      var subject = $("#ask_subject").val();
      var message = $("#ask_message").val();

      data = {
        team_id : team_id,
        subject : subject,
        message : message
      }
      $.ajax({
        type : "POST",
        data : data,
        url : "<?php echo base_url(); ?>teams/send_message",
        success : function(html){
          alert("メッセージは送信されました。");
          window.location = "<?php echo base_url(); ?>team_details/?id="+team_id;
        }
      })

    })

  })
</script>
