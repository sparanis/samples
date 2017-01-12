<style type="text/css">
body{
  background: url("assets/img/dream_ball.png");
  background-size: 100% 100%;
}

.breadcrumb li a,.section-title-inner,.userInfo, .form-group label{
  color: white!important;
}

.terms{
  border: 1px solid rgb(80, 78, 78);
  background-color: rgba(128, 128, 128, 0.17);
  color: white;
  padding: 20px;
}
.btn-primary{
  background-color: #eb5e58!important;
  color: #FFFFFF!important;
  width: 65%!important;
  height: 50px!important;
  font-size: 20px!important;
}



input[type="file"]{
  border-bottom: 0px!important;
}
input[type="text"],select, textarea,input, option {
  background-color: transparent!important;
  border-width: 0px 0px 1px 0px!important;
  border-color: white!important;
  font-size: 20px!important;
  border-radius: 0px!important;
}

</style>
<div class="container main-container headerOffset"> 
  <div class="row">
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li> <a href="<?php echo base_url(); ?>">ホーム</a> </li>
        <li> <a href="<?php echo base_url(); ?>account">マイアカウント</a> </li>
        <li class="active"> チームを開始 </li>
      </ul>
    </div>
  </div>

  <div class="row">
    
    <div class="col-lg-6 col-md-6 col-sm-6">
    	<h1 class="section-title-inner"><span><i class="fa fa-plus"></i> チームを開始 </span></h1>
    	<div class="row userInfo">
        <div class="col-lg-12 col-xs-12">
          <p class="required"><sup>*</sup> 必須フィールド</p>
        </div>

        <form role="form" action="<?php echo base_url();?>teams/save_team" method="post" id="form-team" enctype="multipart/form-data">
        	<?php $id = $this->input->get('id'); 
            if($id=="" || $id=="0"){
              $id = "";
            }
          ?>
          <input type="text" class="form-control" name="InputTeamID" id="InputTeamID" style="display:none;" value="<?php echo $id; ?>">
          <div class="col-xs-12 col-sm-12">
      	    <div class="form-group required">
              <label for="InputTeamName">チーム名 <sup>*</sup> </label>
              <input required type="text" class="form-control" name="InputTeamName" id="InputTeamName" placeholder="Team Name">
            </div>
            <div class="form-group prefecture required" id="prefecture">
              <label for="SelectPrefecture">チーム名 <sup>*</sup> </label>
              <select class="form-control" id="SelectPrefecture" name="SelectPrefecture">   
              </select>
            </div>
            <div class="form-group required city">
              <label for="SelectCity">シティ <sup>*</sup> </label>
              <select required name="SelectCity" class="form-control" id="SelectCity">
                   
              </select>
            </div>
            <div class="form-group">
              <label for="InputDescription">説明  </label>
              <textarea rows="5" cols="26" name="InputDescription" class="form-control" id="InputDescription"></textarea>
            </div>      
            <div class="form-group required">
              <label for="SeletLevel">レベル <sup>*</sup>   </label>
              <select required name="SelectLevel" class="form-control" id="SelectLevel">
                <option value="Beginner">Beginner</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Excellent">Excellent</option>
              </select>
            </div>
            <div class="form-group required">
              <label for="InputMax">メンバーの最大数 <sup>*</sup> </label>
              <input required type="number" class="form-control" name="InputMax" id="InputMax" placeholder="0" min="0" maxlength="3" pattern="\d*">
            </div>
            <div class="form-group">
              <label for="FilePicture">絵    </label>
              <input type="file" class="form-control" id="FilePicture" placeholder="Address" name="FilePicture">
            </div>
          </div>
          
          <div class="col-xs-12 col-sm-12">
          </div>


       
      </div><!--/row end-->
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
      <h1 class="section-title-inner"><span><i class="fa fa-book"></i> 利用規約</span></h1>
      
      
      <div class="terms">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        <div class="checkbox">
          <label>
            <input type="checkbox" id="checkbox-agree"> 同意します
          </label>
        </div>


       

      </div>
      <br>
      <br>
      <center><div class="col-lg-12 col-xs-12 clearfix">
        <button type="submit" class="btn btn-primary btnSave" id="btnSave" disabled><i class="fa fa-save"></i> 保存チーム </button>
      </div><center>
      </form>
        
    </div>
    
  </div><!--/row-->

  <div style="clear:both"></div>

</div>

<!-- /wrapper --> 
<div class="gap"> </div>

<script type="text/javascript">
  $(document).ready(function(){

    var user_id = "<?php echo $this->session->userdata('user_id'); ?>";
    var id = "<?php echo $this->input->get('id'); ?>";
    var ctr = 0;

    get_location("0");

    if(id!="" && id!="0"){
      get_team(id);  
    }
    

    function get_team(id){
      data = {
        id : id
      }
      $.ajax({
        type : "POST",
        data : data,
        dataType : "json",
        url : "<?php echo base_url(); ?>teams/get_team_by_id",
        success : function(html){
          
          
          $("#InputTeamName").val(html.team_name);
          /*$("#SelectPrefecture").val(html.team_prefecture).change();
          $('#SelectPrefecture option[value="'+html.team_prefecture+'"]').attr("selected","selected"); 
          
          
          $(document).on("change","#SelectPrefecture",function(){
              $('#SelectPrefecture option[value="'+html.team_prefecture+'"]').removeAttr("selected");
              var value = $("#SelectPrefecture option:selected").val();
              $('#SelectPrefecture option[value="'+value+'"]').attr("selected","selected"); 
          })
          
          $('#SelectCity').val(html.team_city);*/

          get_location(html.team_prefecture,html.team_city);
          $("#InputDescription").val(html.team_description);
          $("#SelectLevel").val(html.team_level);
          $("#InputMax").val(html.team_maximum);
          $("#checkbox-agree").attr("checked",true);
          $("#btnSave").attr("disabled",false);

        }

      })
    }

    $("#checkbox-agree").click(function(){
        if($('#checkbox-agree').is(':checked')){
          $("#btnSave").attr("disabled",false);
        }
        else{
          $("#btnSave").attr("disabled",true);
        }
      })

    $("#form-team").submit(function(e){
      var id = "<?php echo $this->input->get('id'); ?>";

      var imgpath=document.getElementById('FilePicture');
      if (!imgpath.value==""){
        var img=imgpath.files[0].size;
        var width=imgpath.files[0].width;
        var height=imgpath.files[0].height;
        var imgsize=img/1024; 
        if(imgsize>10000){
          alert('画像ファイルのサイズが大きすぎます。');
          e.preventDefault();
          return false;
        }
        else{
          if(width>4000 || height>4000){
            alert('最大画像の幅と高さが4000です。');
            e.preventDefault();
            return false;
          }
        }
      }

      e.preventDefault();
      if(id==""){
          var team_name = $("#InputTeamName").val();
          e.preventDefault();
          data = {
            team_name : team_name
          }
          $.ajax({
            type : "POST",
            data : data,
            url : "<?php echo base_url(); ?>teams/check_name",
            success : function(html){
              if(html=="exists"){
                alert('チーム名は存在しています。');
                e.preventDefault();
                return false;
              }
              else{
                $("#form-team").unbind().submit();
              }
            }
          })
        }
        else{
        	$("#form-team").unbind().submit();
        }

    })

    $("#InputMax").keyup(function(event) {
      if ( event.which == 45 || event.which == 189 ) {
          event.preventDefault();
      }
      numeric  = $.isNumeric($(this).val());
     if(!numeric){
      $(this).val('0');
     }
    });

    function get_location(pref_id,city_id){

    	$("#SelectPrefecture").empty();

    	data = {
    		pref_id: pref_id
    	}
    	$.ajax({
    		type : "POST",
    		data : data,
    		dataType : "json",
    		url : "<?php echo base_url(); ?>locations/get_prefectures",
    		success : function(html){
    			$("#SelectPrefecture").append(html.all_prefectures);
    			$('#SelectPrefecture').attr("data-id",pref_id);
    			$('#SelectPrefecture').attr("data-value",html.location_name);
    			$('#SelectPrefecture').val(html.location_name);
    			get_cities(pref_id,city_id);
    		}

       	})
    }

    function get_cities(pref_id,city_id){
    	$("#SelectCity").empty();
    	data = {
    		pref_id : pref_id,
    		city_id : city_id
    	}
    	$.ajax({
    		type : "POST",
    		data : data,
    		dataType : "json",
    		url : "<?php echo base_url(); ?>locations/get_cities",
    		success : function(html){
    			$("#SelectCity").append(html.all_cities);
    			$('#SelectCity').attr("data-id",city_id);
    			$('#SelectCity').attr("data-value",html.location_name);
    			$('#SelectCity').val(html.location_name);
    		}
    	})
    }

    $("#SelectPrefecture").change(function(){
    	$(this).attr('data-id',$("#SelectPrefecture option:selected").attr('data-id'));
    	var pref_id = $(this).attr('data-id');

    	get_cities(pref_id,'');
    })
    
  })
</script>

