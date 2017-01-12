<style type="text/css">

body{
  background-color: #f9f9f9;
}
h2{
  color: #34495e;
  font-size: 18px;

}
.blue-box{
  background-color: #34495e;
  color: white;
  font-family: "Meiryo", Arial;
  margin-bottom: 30px;
} 
.user-greeting{
   padding: 20px;
   border-right: 1px solid white;
}
.user-greeting a{
  background-color: #6690b9;
  color: white;
  padding: 10px 20px;
  width: 188px;
}
.user-stat{
  text-align: center;
  padding: 20px;

}
.user-stat a{
  background-color: #eb5e5e;
  color: white;
  text-align: center;
  padding: 10px 50px;
}
.u-stat{
  font-size: 18px;
  padding-top: 30px;
  margin-bottom: 17px;
}
.user-stat h2{
  font-size:36px;
  color: white;
}
.myAccountList{
  margin-bottom: 30px;
}
.game-announcement{
  margin-bottom: 30px;
}
.game-announcement img{
  margin: 0 auto;
}
.game-log table{
  color: #a1a1a1;
  font-size: 14px;
  font-family: "Meiryo", Arial;
}

.team-page .a-box{
  min-height: 150px;
  height: 150px;
  height:auto;
  border: 1px solid #DDDDDD;
  border-bottom: 1px solid #DDDDDD;
  margin-bottom: 20px;
  background-color: white;
  font-family: "Meiryo",Arial;
}
.team-page .a-box .a-type{
  padding: 0px;
  border-left: 10px solid #eb5e58;
  height: 150px;
}
.team-page .a-box .a-type .game{
  height: 150px;
}
.team-page .a-box .a-type .game img{
  height: 150px;
  width: 100%;
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
}
.team-page .a-box .a-type .game h1{
  font-size: 18px;
  padding-top:30px;
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

.team-page .btn{
  padding: 12px 12px;
}

.send_inqury, .inquire{
  margin-top: 0px!important;
}
.team-page .btn-primary, .btn-primary, .product:hover .add-fav:hover, .product:hover .add-fav.active{
  margin-top: 20px;
}
.team-page .container_details .col-md-4{
  padding-left: 0px;
  padding-right: 0px;
  color: #b4b2b2;
}
#all_games h2{
  font-size: 18px;
  color: #9c9c9b;
}
</style>
<div class="container main-container headerOffset"> 
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-7">
      <div class="breadcrumbDiv">
        <ul class="breadcrumb">
          <li> <a href="<?php echo base_url(); ?>">ホーム</a> </li>
          <li> <a href="<?php echo base_url(); ?>account">マイアカウント</a> </li>
          <li class="active"> 前のゲーム </li>
        </ul>
      </div>
      <h1 class="section-title-inner"><span><i class="fa fa-unlock-alt"></i> 前のゲーム </span></h1>
      <div class="game-announcement team-page">
        <?php 
              if($previous['game_lists']==""){
                echo '<img src="'.base_url().'assets/img/no_posts.png" class="img-responsive">';
              }
              else{
                echo $previous['game_lists']; 
              }
            ?>
        
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-5">
      <h2>ゲーム機器</h2>
      <div><a href="category.html"><img src="<?php echo base_url(); ?>assets/img/ad1.jpg" class="img-responsive" alt="img" ></a></div><br>
      <div><a href="category.html"><img src="<?php echo base_url(); ?>assets/img/ad2.jpg" class="img-responsive" alt="img" ></a></div><br>
      <div><a href="category.html"><img src="<?php echo base_url(); ?>assets/img/ad3.jpg" class="img-responsive" alt="img" ></a></div><br>
      <div><a href="category.html"><img src="<?php echo base_url(); ?>assets/img/ad4.jpg" class="img-responsive" alt="img"></a></div>
      <br>
      <h2>広告スポンサー</h2>
      <a><img class="img-responsive" src="<?php echo base_url(); ?>assets/img/brand/spalding.png" alt="img" ></a><br>
      <a><img class="img-responsive" src="<?php echo base_url(); ?>assets/img/brand/spalding.png" alt="img" ></a><br>
    </div>
  </div>

  <div style="clear:both"></div>

</div>


<!-- /wrapper --> 
<div class="gap"> </div>

<div class="modal fade" id="scoreModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ゲームのスコア</h4>
      </div>
      <div class="modal-body">
          <input type="hidden" id="score_game_id">
          <input type="hidden" id="par_id">
          <input type="hidden" id="category">
          <div class="row">
            <div class="form-group col-md-6">
              <label id="team_1">Team 1</label>
              <input type="text" class="form-control" id="score_1" />
              <input type="hidden" id="score_id_1">
            </div>
            <div class="form-group col-md-6">
              <label id="team_2">Team 2</label>
              <input type="text" class="form-control" id="score_2" />
              <input type="hidden" id="score_id_2">
            </div>
         </div>

      </div>
      <div class="modal-footer">
        <button style="display:none;" type="button" class="btn btn-primary save_scores">保存スコア</button>
        <button style="display:none;" type="button" class="btn btn-primary accept_scores">スコアを受け入れます</button>
        <button style="display:none;" type="button" class="btn btn-primary decline_scores">辞退スコア</button>
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
          <label>へ： <span id="author"></span></label>
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

<script type="text/javascript">
  $(document).ready(function(){
      
      check_member_team();

      function check_member_team(){
        $.ajax({
          type : "POST",
          dataType : 'json',
          url : "<?php echo base_url(); ?>teams/check_member_team",
          success : function(html){
            
            if(html.html=="has a team"){
              
              $("#start-team-container").html('<a title="Edit team" href="<?php echo base_url(); ?>create?id='+html.team_id+'" id="start-team" data-id="edit"><i  class="fa fa-pencil"></i> 編集チーム</a>');
              if(html.author!="<?php echo $this->session->userdata('user_id'); ?>"){
                $('#start-team').click(function (e) {
                    e.preventDefault();
                    $(this).css({cursor:"default"});
                });
                $('#start-game').click(function (e) {
                  e.preventDefault();
                  $(this).css({cursor:"default"});
                });
                $(".myAccountList").append('<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center "><div class="thumbnail equalheight" id="view-team-container"> <a title="View my team" href="<?php echo base_url(); ?>team_details/?id=<?php echo $previous['myteam_id']; ?>" id="start-game" target="_blank"><i  class="fa fa-eye"></i> 私のチーム</a> </div></li>');
                $("#start-game-container").css("background-color","#F5F5F5");
                $('#start-game').css({cursor:"default"});
                $("#start-team-container").css("background-color","#F5F5F5");
                $('#start-team').css({cursor:"default"});
              }
              else{
                $(".myAccountList").append('<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center "><div class="thumbnail equalheight"> <a title="Requests" href="<?php echo base_url(); ?>request"><i class="fa fa-check"></i>  リクエスト</a> </div></li>');
                $(".myAccountList").append('<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center "><div class="thumbnail equalheight"> <a title="Announcement" href="<?php echo base_url(); ?>announcement"><i class="fa fa-bullhorn"></i>  発表</a> </div></li>');
                $(".myAccountList").append('<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center "><div class="thumbnail equalheight" id="view-team-container"> <a title="View my team" href="<?php echo base_url(); ?>team_details/?id=<?php echo $previous['myteam_id']; ?>" id="start-game" target="_blank"><i  class="fa fa-eye"></i> 私のチーム</a> </div></li>');
              }              
            }
            else{
              $('#start-game').click(function (e) {
                  e.preventDefault();
                  $(this).css({cursor:"default"});
              });
              $("#start-game-container").css("background-color","#F5F5F5");
              $('#start-game').css({cursor:"default"});
            }
            
          }
        })
      }

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

      $("#cancel_game").click(function(){
        var id = $(this).attr("data-id");
        var game_id = $(this).attr("data-game");
        var game_user = $(this).attr("data-user");
        var game_team = $(this).attr("data-team");
        var game_type = $(this).attr("data-category");

        data = {
          id : id,
          game_id : game_id,
          game_user : game_user,
          game_team : game_team,
          game_type : game_type
        }
        $.ajax({
          type : "POST",
          data : data,
          url : "<?php echo base_url(); ?>games/cancel_request",
          success : function(html){
            window.location = "<?php echo base_url(); ?>account";
          }
        })
      })

      $("#delete_game").click(function(){
        var id = $(this).attr("data-id");
        var game_id = $(this).attr("data-game");
        var game_user = $(this).attr("data-user");
        var game_team = $(this).attr("data-team");
        var game_type = $(this).attr("data-category");

        data = {
          id : id,
          game_id : game_id,
          game_user : game_user,
          game_team : game_team,
          game_type : game_type
        }
        $.ajax({
          type : "POST",
          data : data,
          url : "<?php echo base_url(); ?>games/delete_game",
          success : function(html){
            window.location = "<?php echo base_url(); ?>account";
          }
        })
      })

      $(document).on('click',"#input_scores",function(){
        $('.save_scores').show();
        $('.accept_scores').hide();
        $('.decline_scores').hide();
        $('#score_1').val('');
        $('#score_2').val('');
        $('#score_id_1').val('');
        $('#score_id_2').val('');
        $('#score_game_id').val('');
        $('#category').val('');
        $('#par_id').val('');


        var game_id = $(this).attr('data-game');
        var team_id = $(this).attr('data-team');
        var category = $(this).attr('data-category');

        $("#score_1").attr('disabled',false);
        $("#score_2").attr('disabled',false);

        data = {
          game_id : game_id,
          team_id : team_id
        }
        $.ajax({
          type : "POST",
          dataType : 'json',
          data : data,
          url : "<?php echo base_url(); ?>games/get_teams_score",
          success : function(html){
            $('#team_1').html(html.team_name+" (Your Team)");
            $('#team_2').html(html.other_team);
            $('#score_id_1').val(html.score_id_1);
            $('#score_id_2').val(html.score_id_2);
            $('#score_1').val(html.score_1);
            $('#score_2').val(html.score_2);
            $('#score_game_id').val(game_id);
            $('#category').val(category);
            $("#scoreModal").modal('show');
          }
        })

        
      })

      $('.save_scores').click(function(){
        var score_id_1 = $('#score_id_1').val();
        var score_id_2 = $('#score_id_2').val();
        var score_1 = $('#score_1').val();
        var score_2 = $('#score_2').val();
        var category = $('#category').val();
        var score_game_id = $('#score_game_id').val();

        data = {
          score_game_id : score_game_id,
          score_1 : score_1,
          score_2 : score_2,
          score_id_1 : score_id_1,
          score_id_2 : score_id_2,
          category : category
        }
        $.ajax({
          type : "POST",
          data : data,
          url : "<?php echo base_url(); ?>games/save_scores",
          success : function(html){
            alert('スコアを保存しました。');
            $("#scoreModal").modal('hide');
            window.location = "<?php echo base_url(); ?>account/";
          }
        })
      })

      $("#check_score").click(function(){
        $('.save_scores').hide();
        $('.accept_scores').show();
        $('.decline_scores').hide();
        $('#score_1').val('');
        $('#score_2').val('');
        $('#score_id_1').val('');
        $('#score_id_2').val('');
        $('#score_game_id').val('');
        $('#category').val('');
        $('#par_id').val('');


        var game_id = $(this).attr('data-game');
        var team_id = $(this).attr('data-team');
        var category = $(this).attr('data-category');
        var par_id = $(this).attr('data-par');

        if(par_id!=""){
          $('.decline_scores').show();
        }


        $("#score_1").attr('disabled',true);
        $("#score_2").attr('disabled',true);

        data = {
          game_id : game_id,
          team_id : team_id
        }
        $.ajax({
          type : "POST",
          dataType : 'json',
          data : data,
          url : "<?php echo base_url(); ?>games/get_teams_score",
          success : function(html){
            $('#team_1').html(html.team_name+" (Your Team)");
            $('#team_2').html(html.other_team);
            $('#score_id_1').val(html.score_id_1);
            $('#score_id_2').val(html.score_id_2);
            $('#score_1').val(html.score_1);
            $('#score_2').val(html.score_2);
            $('#score_game_id').val(game_id);
            $('#category').val(category);
            $('#par_id').val(par_id);
            $("#scoreModal").modal('show');
          }
        })

        
      })

      $('.accept_scores').click(function(){
        var score_id_1 = $('#score_id_1').val();
        var score_game_id = $('#score_game_id').val();
        var par_id = $('#par_id').val();

        data = {
          score_game_id : score_game_id,
          score_id_1 : score_id_1,
          par_id : par_id
        }
        $.ajax({
          type : "POST",
          data : data,
          url : "<?php echo base_url(); ?>games/accept_scores",
          success : function(html){
            alert('スコアは受け入れました。');
            $("#scoreModal").modal('hide');
            window.location = "<?php echo base_url(); ?>account/";
          }
        })
      })

      $('.decline_scores').click(function(){
        var par_id = $('#par_id').val();

        data = {
          par_id : par_id
        }
        $.ajax({
          type : "POST",
          data : data,
          url : "<?php echo base_url(); ?>games/action_score",
          success : function(html){
            alert('スコアが減少してきました。');
            $("#scoreModal").modal('hide');
            window.location = "<?php echo base_url(); ?>account/";
          }
        })
      })



  });

</script>


