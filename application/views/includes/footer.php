<footer>

  <div class="footer" id="footer">

    <div class="container">


    </div>

    <!--/.container--> 

  </div>

  <!--/.footer-->

  

  <div class="footer-bottom">

    <div class="container">

      <p class="pull-left"> &copy; SPOTCH 2014. All right reserved. </p>

      <div class="pull-right paymentMethodImg"> <img height="30" class="pull-right" src="<?php echo base_url(); ?>assets/img/site/payment/master_card.png" alt="img" > <img height="30" class="pull-right" src="<?php echo base_url(); ?>assets/img/site/payment/paypal.png" alt="img" > <img height="30" class="pull-right" src="<?php echo base_url(); ?>assets/img/site/payment/american_express_card.png" alt="img" > <img  height="30" class="pull-right" src="<?php echo base_url(); ?>assets/img/site/payment/discover_network_card.png" alt="img" > <img  height="30" class="pull-right" src="<?php echo base_url(); ?>assets/img/site/payment/google_wallet.png" alt="img" > </div>

    </div>

  </div>

  <!--/.footer-bottom--> 

</footer>

<!-- Le javascript

================================================== --> 



<!-- Placed at the end of the document so the pages load faster --> 

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery/jquery-1.10.1.min.js"></script> 

<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script> 

<script src="<?php echo base_url(); ?>assets/js/idangerous.swiper-2.1.min.js"></script> 

<!--<script src="<?php echo base_url(); ?>assets/js/location.js"></script>-->

<script>

  var mySwiper = new Swiper('.swiper-container',{

    pagination: '.box-pagination',

 keyboardControl: true,

    paginationClickable: true,

    slidesPerView: 'auto',

    autoResize:true,

    resizeReInit:true,

  })

  

     $('.prevControl').on('click', function(e){

    e.preventDefault()

    mySwiper.swipePrev()

  })

  $('.nextControl').on('click', function(e){

    e.preventDefault()

    mySwiper.swipeNext()

  })

  </script> 







<!-- include easing plugin --> 

<script src="<?php echo base_url(); ?>assets/js/jquery.easing.1.3.js"></script> 



<!-- include  parallax plugin --> 

<script type="text/javascript"  src="<?php echo base_url(); ?>assets/js/jquery.parallax-1.1.js"></script> 



<!-- optionally include helper plugins --> 

<script type="text/javascript"  src="<?php echo base_url(); ?>assets/js/helper-plugins/jquery.mousewheel.min.js"></script> 



<!-- include mCustomScrollbar plugin //Custom Scrollbar  --> 



<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.mCustomScrollbar.js"></script> 



<!-- include checkRadio plugin //Custom check & Radio  --> 

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ion-checkRadio/ion.checkRadio.min.js"></script> 



<!-- include grid.js // for equal Div height  --> 

<script src="<?php echo base_url(); ?>assets/js/grids.js"></script> 



<!-- include carousel slider plugin  --> 

<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script> 



<!-- jQuery minimalect // custom select   -->

<script src="<?php echo base_url(); ?>assets/js/jquery.minimalect.min.js"></script>



<!-- include touchspin.js // touch friendly input spinner component   --> 

<script src="<?php echo base_url(); ?>assets/js/bootstrap.touchspin.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/bootstrap-paginator.min.js"></script> 

<script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>


<!-- include custom script for only homepage

<script src="<?php //echo base_url(); ?>assets/js/home.js"></script> 

  --> 

<!-- include custom script for site  --> 

<script src="<?php echo base_url(); ?>assets/js/script.js"></script>


<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.geocomplete.js"></script>
<?php $game_category = $this->input->get('category'); ?>
<?php $team_level = $this->input->get('level'); ?>
</body>
  <script>
      $(function() {
        
          $( "#game_date" ).datepicker({dateFormat: "yy-mm-dd"});
          $( "#date-from" ).datepicker({dateFormat: "yy-mm-dd"});
          $( "#date-to" ).datepicker({dateFormat: "yy-mm-dd"});
          $( "#birthday" ).datepicker({dateFormat: "yy-mm-dd"});
          $( "#announcement_from" ).datepicker({dateFormat: "yy-mm-dd"});
          $( "#announcement_to" ).datepicker({dateFormat: "yy-mm-dd"});
      });
  </script>


    <!-- JavaScript -->
<script type="text/javascript">

$(document).ready(function(){
  get_teams();
  get_games();
  $("#btnSaveAnnouncement").click(function(){

    announcement_title  = $("#announcement_title").val();
    announcement_content  = $("#announcement_content").val();
    announcement_from  = $("#announcement_from").val();
    announcement_to  = $("#announcement_to").val();
    author = "<?php echo $this->session->userdata('user_id'); ?>";

    data = {
      announcement_title : announcement_title,
      announcement_content : announcement_content,
      announcement_to : announcement_to,
      announcement_from : announcement_from,
      author : author
    }

    $.ajax({
        type: 'post',
        data: data,
        url: "<?php echo base_url(); ?>spotch/save_announcements",
        success: function(html) {
          location.reload();
        }
      });

    console.log(data);
  });

   $(document).on("click","#li-tab4-1", function(){
        $(".btn-primary").css("background-color","#7da7d9");
   });
   $(document).on("click","#li-tab4-2", function(){
        $(".btn-primary").css("background-color","#acd373");
   });
   $(document).on("click","#li-tab4-3", function(){
        $(".btn-primary").css("background-color","#fdc689");
   });
   $(document).on("click","#li-tab4-4", function(){
        $(".btn-primary").css("background-color","#aae1f7");
   });
   $(document).on("click","#li-tab4-5", function(){
        $(".btn-primary").css("background-color","#cdd3e9");
   });
   $(document).on("click","#li-tab4-6", function(){
        $(".btn-primary").css("background-color","#fff799");
   });

   $(".city ").click(function(){
      console.log($(this).data('city'));
      $(".city").removeClass('active_city');
      $(this).addClass('active_city');
   });
  $("#search_team").click(function(){
      search_team  = true;
      offset_team = 0;
      $("#all_teams").html("");

      get_teams();
      team_level = '';

  });


  $("#search_game").click(function(){
      search  = true;
      offset_game = 0;
      $("#all_games").html("");
      game_category = '';
      get_games();

  });

  $("#more").click(function(){
    get_games();
  });
 $("#more_teams").click(function(){
    get_teams();
  });



  $("#update_information").click(function(){

    account_id = $("#account_id").val(); 
    account_name = $("#account_name").val();
    description = $("#description").val();
    home_town = $("#home_town").val();
    current_location = $("#current_location").val();
    birthday = $("#birthday").val();

    data = {
      account_id : account_id,
      account_name : account_name,
      description : description,
      home_town : home_town,
      current_location : current_location,
      birthday : birthday
    }
 
    $.ajax({
      type: 'post',
      data: data,
      url: "<?php echo base_url(); ?>spotch/update_information",
      success: function(html) {
          location.reload();
      }
    });

  }); 


  $(".send_inqury").click(function(){
      to = $("#author").html();
      from = $("#from").val();
      message = $("#message").val();
      data = {
        to : to,
        from : from,
        message : message
      }
      $.ajax({
        type: 'post',
        data: data,
        url: "<?php echo base_url(); ?>games/send_inqury",
        success: function(html) {
            alert(html);
            location.reload();
        }
      });
  })




});

var  offset_team = 0;
var search_team = false;


var offset_game = 0;
var search = false;
  

  var team_level = "<?php echo $team_level; ?>";
  function get_teams(){

    if (team_level) {
      data = {
        search : false,
        offset : offset_team,
        level : team_level
      }

    }else{
      if (search_team) {
        keyword = $("#keyword").val();
        level = $("#SelectLevel :selected").val();
        SelectPrefecture = $("#SelectPrefecture :selected").val();
        SelectCity = $("#SelectCity :selected").val();
      

        data = {
          keyword : keyword,
          level : level,
          city : SelectCity,
          prefecture: SelectPrefecture,
          offset : offset_team,
          search : true


        };
      }else{
        data = {
          search : false,
          offset : offset_team
        }
      }
    }

    

      $.ajax({
        type: 'post',
        data : data,
        dataType:'json',
        url: "<?php echo base_url(); ?>teams/get_teams",
        success: function(html) {

          if (html.html != "No records") {
            $("#all_teams").append(html.html);
            $("#total_teams").html(html.total_teams);
            offset_team =  html.offset;
          }else{
            $("#more_teams").hide();
            $("#team_result_alert").show();
          }
            

        }
      });
   }

   var game_category = "<?php echo $game_category; ?>";
   function get_games(){
      last_date = $(".game_wrapper:last-child h2").html();

      if (game_category) {
        data = {
          search : true,
          offset : offset_game,
          last_date : last_date,
          category : game_category,
          last_date : last_date
        }
      }else{
        if (search) {

          game_name = $("#game_name").val();
          no_positions = $("#no_positions").val();
          category = $("#category :selected").val();
          city = $('.active_city').data('city');
          game_date = $('#game_date').val();

          data = {
            game_name : game_name,
            no_positions : no_positions,
            category : category,
            city : city,
            game_date : game_date,
            offset : offset_game,
            search : true,
            last_date : last_date


          };
        }else{
          data = {
            search : false,
            offset : offset_game,
            last_date : last_date
          }
        }  
      }
     
      $.ajax({
        type: 'post',
        data: data,
        dataType:'json',
        url: "<?php echo base_url(); ?>games/get_games",
        success: function(html) {

            if (html.html != "No records") {
              $("#all_games").append(html.html);
              $("#total_games").html(html.total_games);
              offset_game =  html.offset;  
            }else{
              $("#more").hide();
              $("#game_result_alert").show();
            }
           
            // console.log(html.sql_query);

        }
      });
   }

</script>

<script type="text/javascript">
  
  $(document).ready(function(){
      $("#geocomplete").geocomplete({
        map: ".map_canvas",
        details: "form",
        markerOptions: {
          draggable: true,
         
        }
      });


      $("#geocomplete").bind("geocode:dragged", function(event, latLng){
        $("input[name=lat]").val(latLng.lat());
        $("input[name=lng]").val(latLng.lng());
        $("#reset").show();
      });
        
        
      $("#reset").click(function(){
        $("#geocomplete").geocomplete("resetMarker");
        $("#reset").hide();
        return false;
      });
        
      $("#find").click(function(){
        $("#geocomplete").trigger("geocode");
        }).click();
        var options = {
            map: ".map_canvas"
      };

      $("#geocomplete").geocomplete(options)
        .one("geocode:result", function(event, result){
         
          var map = $("#geocomplete").geocomplete("map");
          map.setZoom(14);

          // Optionally empty the geocomplete input field
          $("#geocomplete").val("");
      });
        
      var lat_and_long = "";
      $("#geocomplete").geocomplete("find", lat_and_long);
      $("#geocomplete").geocomplete(options).one("geocode:result", function(event, result){
        
        var map = $("#geocomplete").geocomplete("map");
        map.setZoom(14);
        $("#geocomplete").val("");
     
      });
        
        
      $("#geocomplete").bind("geocode:dragged", function(event, latLng){
        $("input[name=lat]").val(latLng.lat());
       $("input[name=lng]").val(latLng.lng());
      });
        
        
      $("#reset").click(function(){
        $("#geocomplete").geocomplete("resetMarker");
        $("#reset").hide();
        return false;
      });
        
      $("#find").click(function(){
        $("#geocomplete").trigger("geocode");
    
      }).click();

  });


</script>

</html>

