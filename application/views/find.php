<style type="text/css">
  body{
    background-color: #f9f9f9;
  }
  .all-teams{
    height: 410px;
    background-color: white;
  }
  .all-teams .image{
    height: 150px;


  }
  .all-teams .image a img{
    width: 100%;
    height: 100%;
  }
  .grid-description{
    margin-top: 12px;
  }
  .team-name{
    position: absolute;
    top: 110px;
    display: block;
    width: 100%;
    text-align: left;
    padding-left: 10px !important;
    color: white !important;
    font-weight: bold;
    height: 25px;
    overflow: hidden;
    font-family: "Meiryo",Arial;
  }
  .level-image{
    margin-top: -10%;
    position: absolute;
    margin-left: 67%;
    display: block;
    text-align: right;
  }
  .team-location{
    text-align: left;
    padding: 0px;
    overflow: hidden;
    height: 60px;
  }
  .team-created{
    text-align: left;
    padding: 0px;
    overflow: hidden;
    height: 60px;
    border-bottom: 1px solid #b9b9b9;
  }
  .team-record{
    text-align: left;
    padding: 0px;
    overflow: hidden;
    height: 60px;
    padding-top: 10px;
  }
  .team-location h6, .team-created h6, .team-record h6{
    margin: 0px;
    line-height: 10px;
    color: #b9b9b9;
  }
  .team-link{
    padding: 0px;
    background-color: #2d3e50;
    height: 45px;
    text-align: left;
  }
  .team-link a{
    display: block;
    font-size: 14px;
    padding-left: 10px;
    padding-right: 10px;
    color: white;
    margin-top: 10px;
  }
  .fa-file{
    margin-top: 15px;
  }
  .search_fields{
    background: #C9C7C7;
    padding: 15px 15px 0px;
    margin: 0px 0px!important;
  }
  #search_team{
    width: 100%;
    background: #eb5e5e;
    margin-top: 0px;
  }
  .search_main_container{
    position: relative;
    margin-bottom: 30px;
  }
.fixed {
  position: fixed; 
  top: 0; 
  z-index: 1;
  top: 80px;
  margin-bottom: 50px;
  min-width: 1140px;
}
.headerOffset {
  padding-top: 81px;
}

</style>
<div class="container main-container headerOffset">
	<div class="row">

		<div class=" col-md-12 col-sm-12 search_main_container">
       
        <div class="search_container">
            <img class="img-responsive" src="<?php echo base_url() ?>assets/img/team_search.png">
        </div>

      
        <div class="search_fields">
          <label>検索フィルター</label>
          <div class="clearfix"></div>
          <div class="col-md-10" style="  padding: 0">

            <div class="form-group pull-left col-md-3 col-sm-6 col-xs-6">
              <input type="text" class="form-control" id="keyword" placeholder="キーワード">
            </div>

            <div class="form-group pull-left col-md-3 col-sm-6 col-xs-6">
              <select required name="SelectLevel" class="form-control" id="SelectLevel">
                <option value="">レベルを選択してください</option>
                <option value="Beginner">Beginner</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Excellent">Excellent</option>
              </select>
            </div>

            <div class="visible-xs clearfix"></div>

            <div class="form-group pull-left col-md-3 col-sm-6 col-xs-6" >
               <select class="form-control" id="SelectPrefecture" name="SelectPrefecture">  
                  <option value="" >州を選択してください</option> 
              </select>
            </div>


            <div class="form-group pull-left col-md-3 col-sm-6 col-xs-6">
              <select required name="SelectCity" class="form-control" id="SelectCity">
                   <option value="" >都市を選択してください</option>
              </select>
            </div>
          </div>
          <div class="col-md-2 col-sm-12 col-xs-12">
            <div class="form-group">
              <button id="search_team" class="btn btn-primary">検索</button>
            </div>
          </div>
          
          <div class="clearfix"></div>
         
        </div>
				<?php //$this->load->view('team_sidebar'); ?>

			
		</div>

    <div class="clearfix"></div>
		<div class=" col-md-12 col-sm-12">
			<?php //echo $user_id; ?>
			
          <div class="clearfix"></div>
      

      <!--/.productFilter-->

      <div class="row  categoryProduct xsResponse clearfix">

      	<div id="all_teams">
      		 
      	</div>
      	<!-- div class="clearfix"></div>
      	<button id="more_teams" class="btn pull-right btn-primay">Load More....</button>
      	<br> -->
        <div class="clearfix"></div>
        <div class="load-more-block text-center " id="more">
               <a id="more_teams" class="btn btn-thin" href="javascript:void(0);">
               <i class="fa fa-plus-sign">+</i>  もっと見ます</a>
         </div>


        <div id="team_result_alert" style="display:none">
          これ以上のチームが表示しないように
        </div>
      	<br>
       
       
      </div>
      <br>
      <br>

		</div>
		 <div class="clearfix"></div>
	</div>
</div>



<script>
   $(document).ready(function(){

      var windowWidth = window.screen.width < window.outerWidth ?
                    window.screen.width : window.outerWidth;
      var mobile = windowWidth < 500;

      if (mobile == false) {
        $(window).bind('scroll', function() {
          var navHeight = 250;
          if ($(window).scrollTop() > navHeight) {
            $('.search_fields').addClass('fixed');
            // $('.search_fields ').css("width", "84.5%");
          }
          else {
            $('.search_fields').removeClass('fixed');
            // $('.search_fields ').css("width", "92%" );
          }
        });
      }

      
  });
</script>

