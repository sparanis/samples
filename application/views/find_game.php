<style type="text/css">

/*body{
  background-color: #f9f9f9;
}
.team-page img{
  width: 100%;
  height: 300px;
}
.team-page .details-description{
  min-height: 150px;
}
.team-page .a-box{
  min-height: 114px;
  height:auto;
  overflow:auto;
  border: 1px solid #DDDDDD;
  border-bottom: 1px solid #DDDDDD;
  margin-bottom: 20px;
  background-color: white;
}
.team-page .a-box .a-type{
  padding: 0px;
}
.a-content h1{
    padding-bottom: 0px;
}
.a-content h1 a{
  color: #eb5e58;
  font-size: 18px;

}
.a-content p{
  color: #b4b2b2;
}
.team-page .a-box .a-type .game{
  color: black;
  display: block;
  min-height: 114px;
  text-align: center;
  vertical-align: middle;
  overflow: hidden;
  border-left: 10px solid #eb5e58;
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
  min-height: 114px;
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
.team-page .btn-danger{
   background-color: #D1CDCD;
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
*/
/*.col-md-3{
  position: fixed!important;
  width: 15% !important;
}
.col-md-9{
  margin-left: 23%;
}*/
</style>
<div class="container main-container headerOffset find-games">
	<div class="row">

		<div class="col-lg-3 col-md-3 col-sm-12">
       <?php $this->load->view('game_sidebar'); ?>

      <div class="form-group pull-right">
          <button id="search_game" class="btn btn-primary">検索</button>
      </div>
		</div>
		<div class="col-lg-9 col-md-9 col-sm-12">
			
      <div class="search-banner">
        <img class="img-responsive" src="<?php echo base_url(); ?>assets/img/banner_search.png">
      </div>
      <div class="w100 productFilter clearfix">

        <p class="pull-left"> 合計 <strong> <span id="total_games"></span> </strong>ゲームイベント</p>
        

      </div>

      <div class="categoryProduct xsResponse clearfix team-page">

        <div id="all_games" data-offset='0'></div>
        <!-- <div class="form-group">
          <button id="more" class="btn pull-right btn-primay">Load More....</button>
        </div>
 -->
        <div class="load-more-block text-center " id="more">
               <a id="more" class="btn btn-thin" href="javascript:void(0);">
               <i class="fa fa-plus-sign">+</i>  もっと見ます</a>
         </div>


        <div id="game_result_alert" style="display:none">
          これ以上のゲームが表示しないように
        </div>

        <br>
        <br>
      </div>
      <br>
      <br>
      
     

       

		</div>
		
	</div>
</div>

<div class="modal fade" id="myinqury" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Send an inquiry</h4>
      </div>
      <div class="modal-body">
          <input type="hidden" id="game_id">
          <input type="hidden" id="from">
          <label>To: <span id="author"></span></label>
          <div class="form-group">
            <textarea class="form-control" id="message"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary send_inqury">Send Inquiry</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteGame" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this game?</h4>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="game_id">
        <button type="button" class="btn btn-primary" id="close_modal" >No</button>
        <button type="button" class="btn btn-primary" id="delete_game" >Yes</button>
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
        <h4 class="modal-title" id="myModalLabel">Do you want to send a request to join this game?</h4>
      </div>
      <div class="modal-body">
        <div class="" style="display:none;text-align:center;" id="teams">
          <h5>Choose your team</h5>
          <button class="btn btn-block btn-primary" id="team_a"><i class="fa fa-bolt"></i> <br>Team A</button>
          <button class="btn btn-block btn-primary" id="team_b"><i class="fa fa-bolt"></i> <br>Team B</button>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="game_id">
        <button type="button" class="btn btn-primary" id="close_modal" >No</button>
        <button type="button" class="btn btn-primary" id="send_request" >Yes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
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


    $(document).on("click","#delete-game",function(){
      var game_id = $(this).attr("data-id");

      $("#game_id").val(game_id);

      $("#deleteGame").modal("show");

    })

    $(document).on("click","#delete_game",function(){
      var game_id = $("#game_id").val();

      alert(game_id);

      data = {
        game_id : game_id
      }
      $.ajax({
        type : "POST",
        data : data,
        url : "<?php echo base_url(); ?>games/delete_game",
        success : function(html){
          window.location = "<?php echo base_url(); ?>find_game";
        }

      })

    })

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
          alert("Request sent.");
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

  });



</script>


