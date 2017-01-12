<style type="text/css">
body{
	background-color: #f9f9f9;
}
</style>

<div class="container main-container game-page">
	<?php //echo $game_id; ?>
	<div class="col-lg-9 detail-box">
		<div class="game-header">
			<h1 class="game-title"><?php echo $html['title']; ?></h1>
			<p><?php echo $html['formatted_address']; ?></p>
		</div>
		<div class="map_canvas2">
			
		</div>
		 <form role="form" name="form_map" class="form_map"> 
              <div class="form-group" style="display:none;">
                <label>Enter Address</label>
                <input id="geocomplete2" class="form-control" type="text" placeholder="Type in an address" value="Tokyo, Japan" />
              </div>
              <!-- <a id="reset" href="#" style="display:none;">Reset Marker</a> -->
              <div style="display:none;">
                <div class="form-group">
                 <input id="find"  class="form-control" type="button" value="find" />
                </div>


                <label>Latitude</label>
                <input name="lat" id="lat" type="text" value="<?php echo (empty($html['latitude']) ? '35.6895' : $html['latitude']); ?>">
              
                <label>Longitude</label>
                <input name="lng" type="text" id="long" value="<?php echo (empty($html['longitude']) ? '139.6917' : $html['longitude']); ?>">
              
                <label>Formatted Address</label>
                <input name="formatted_address" type="text" value="">
              </div>

              <div class="pull-right form-group" style="display:none;">
                <button type="button" id="add-map" class="btn2 btn-default">Update</button>
              </div>
              <div class="clearfix"></div>  
            </form> 

	   


		<p class="map-address"><?php echo $html['address']; ?></p>
		
		<div class="description">
			<p><?php echo $html['description']; ?></p>

		</div>
		<div class="game-host">
			<h2>ゲームのホスト</h2>
			<?php echo $html['team_image']; ?>
			<h1 class="team-title"><?php echo $html['team_name']; ?></h1>
			<div class="team-level"><?php echo $html['team_level_image']; ?></div>

		</div>
		<div class="team-statistics">
			<h2>ゲームの統計</h2>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6"><h2 class="stat-count"><?php echo $html['no_games']; ?></h2><p>ゲーム</p></div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6"><h2 class="stat-count"><?php echo $html['wins']; ?></h2><p>勝</p></div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6"><h2 class="stat-count"><?php echo $html['loses']; ?></h2><p>失う</p></div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6"><h2 class="stat-count"><?php echo $html['members']; ?></h2><p>メンバー</p></div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="col-lg-3 game-stat">
		<div class="game-date">
			<h3><?php echo $html['date_of_game']; ?></h3>
			<h2><?php echo $html['time']; ?></h2>
		</div>
		<div class="game-btns">
			<?php 
              if($html['game_btns']==""){
                echo '<tr><td colspan="5"></td></tr>';
              }
              else{
                echo $html['game_btns']; 
              }
            ?>
			
		</div>
		<div class="participants">
			<h2>参加</h2>
			<?php echo $html['participant']; ?>
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


<script type="text/javascript">
	
	$(document).ready(function(){

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
	          alert("リクエストが送信されました。");
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



		$("#geocomplete2").geocomplete({
	      map: ".map_canvas2",
	      details: ".form_map",
	      markerOptions: {
	        draggable: false,
	        visible: true,
	        suppressMarkers : true,
	      },
	    });
	    var options = {
	      map: ".map_canvas2",
	    };
	    var lat_and_long = "<?php echo (empty($html['latitude']) ? '35.6895' : $html['latitude']) .',' . (empty($html['longitude']) ? '139.6917' : $html['longitude']); ?>";
	      $("#geocomplete2").geocomplete("find", lat_and_long);
	      $("#geocomplete2").geocomplete(options).one("geocode:result", function(event, result){
	      var map = $("#geocomplete2").geocomplete("map");
	      map.setZoom(14);
	      $("#geocomplete2").val("");
	      print_shop_marker(map);
	        map.setCenter();
	    });

	    

	})
</script>
