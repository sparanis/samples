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
          <li class="active"> リクエスト </li>
        </ul>
      </div>
      <h1 class="section-title-inner"><span><i class="fa fa-unlock-alt"></i> リクエスト </span></h1>
      <div class="game-announcement team-page">
        <?php 
          if($request['game_lists']==""){
            echo '<img src="'.base_url().'assets/img/no_posts.png" class="img-responsive">';
          }
          else{
            echo $request['game_lists']; 
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

<div class="modal fade" id="showMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">メッセージ</h4>
      </div>
      <div class="modal-body">
          <input type="hidden" id="message_id">
          <label>から: <span id="author"></span></label>
          <div class="form-group" id="from_name">
          </div>
          <label>被験者: <span id="author"></span></label>
          <div class="form-group" id="subject">
          </div>
          <label>メッセージ: <span id="author"></span></label>
          <div class="form-group" id="message">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="close_message" data-dismiss="modal">クローズ</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function(){
      $(document).on("click","#accept_request",function(){

        game_id = $(this).attr("data-id");
        id = $(this).attr("data-value");
        remark = $(this).attr("data-remark");
        team = $(this).attr("data-team");

        if(remark=="Member"){
          data = {
            id : game_id,
            user_id : id,
            remark : remark,
            team : team
          }
          $.ajax({
            type : "POST",
            data : data,
            url : "<?php echo base_url(); ?>spotch/accept_member",
            success : function(html){
              $(".team-page").html(html);
            }
          })
        }
        else{
          data = {
            game_id : game_id,
            id : id,
            remark : remark,
            team : team
          }
          $.ajax({
            type : "POST",
            data : data,
            url : "<?php echo base_url(); ?>spotch/accept_request",
            success : function(html){
              $(".team-page").html(html);
            }
          })
        }

        
      });

      $(document).on("click","#decline_request",function(){
        game_id = $(this).attr("data-id");
        id = $(this).attr("data-value");
        remark = $(this).attr("data-remark");
        team = $(this).attr("data-team");

        if(remark=="Member"){
          data = {
            id : game_id,
            user_id : id,
            remark : remark,
            team : team
          }
          $.ajax({
            type : "POST",
            data : data,
            url : "<?php echo base_url(); ?>spotch/decline_member",
            success : function(html){
              $(".team-page").html(html);
            }
          })
        }
        else{
          data = {
            game_id : game_id,
            id : id,
            remark : remark,
            team : team
          }
          $.ajax({
            type : "POST",
            data : data,
            url : "<?php echo base_url(); ?>spotch/decline_request",
            success : function(html){
              $(".team-page").html(html);
            }
          })
        }
      });

    $("#read_message").click(function(){
      var message_id = $(this).attr('data-id');
      var from_user = $(this).attr('data-value');
      var from_name = $(this).attr('data-from');
      var team_id= $(this).attr('data-team');
      var subject = $(this).attr('data-subject');
      var message = $(this).attr('data-message');

      $('#message_id').val('message_id');
      $('#from_name').html(from_name);
      $('#subject').html(subject);
      $('#message').html(message);

      $("#showMessage").modal('show');

      data = {
        message_id : message_id
      }
      $.ajax({
        type : "POST",
        data : data,
        url : "<?php echo base_url(); ?>spotch/read_message",
        success : function(html){

        }
      })
    })

    $("#close_message").click(function(){
      window.location = "<?php echo base_url(); ?>account/";
    })

  })
</script>


