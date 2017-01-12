<div class="container main-container headerOffset"> 
  <div class="row">
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li> <a href="index.html">ホーム</a> </li>
        <li> <a href="account">マイアカウント</a> </li>
        <li class="active"> ゲームを作成します </li>
      </ul>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-7">
      <h1 class="section-title-inner"><span><i class="fa fa-plus"></i> ゲームを作成します </span></h1>
      <div class="row userInfo">
        <div class="col-lg-12 col-xs-12">
          <h2 class="block-title-2"> ゲームを追加するには、下記のフォームに必要事項を記入してください。 </h2>
          <p class="required"><sup>*</sup> 必須フィールド</p>
        </div>

        <form role="form" action="<?php echo base_url();?>games/save_game" method="post" id="form-game" enctype="multipart/form-data">
          <input type="text" class="form-control" name="InputGameID" id="InputGameID" style="display:none;">
          <div class="col-xs-12 col-sm-6">
            <div class="form-group required">
              <label for="InputGameTitle">ゲームタイトル <sup>*</sup> </label>
              <input required type="text" class="form-control" name="InputGameTitle" id="InputGameTitle" placeholder="ゲームタイトル">
            </div>
            <div class="form-group">
              <label for="InputDescription">説明  </label>
              <textarea rows="14" cols="26" name="InputDescription" class="form-control" id="InputDescription"></textarea>
            </div>  
            <div class="row">  
              <div class="form-group required col-xs-12 col-sm-6">
                <label for="InputMax">オープンポジション数 <sup>*</sup> </label>
                <input required type="number" class="form-control" name="InputMax" id="InputMax" placeholder="0" min="0">
              </div>  
              <div class="form-group required col-xs-12 col-sm-6">
                <label for="SeletLevel">カテゴリ <sup>*</sup>   </label>
                <select required name="SelectCategory" class="form-control" id="SelectCategory">
                  <option value="Men">人々</option>
                  <option value="Women">女性たち</option>
                  <!-- <option value="Senior">Senior</option> -->
                  <option value="Mix">ミックス</option>
                  <option value="Practice">練習</option>
                </select>
              </div>
            </div>

            <div class="form-group required">

              <label>日付とゲームの時間</label>

              <div class="row">
                <div class="col-xs-5" style="width:40%;padding-right:0px;">
                  <input required class="form-control" type="Text" name="date-game" id="date-game" maxlength="25" size="25">
                </div>
                <div class="col-xs-1">
                  <img src="<?php echo base_url(); ?>assets/img/cal.gif" onclick="javascript:NewCssCal ('date-game','yyyyMMdd','arrow',true,'24',true,true)" style="cursor:pointer;margin-top:10px;" />
                </div>
              </div>
            </div>
            
            <div class="form-group required">

              <label>日付は、ゲームに参加することができます</label>

              <div class="row">
                <div class="col-xs-6" style="width:40%;padding-right:0px;">
                  <label>から</label>
                  
                  <div class="input-group">
                    <input required type="text" id="date-from" name="date-from" class="form-control"/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>  
                </div>


                
                
                <div class="col-xs-6" style="width:40%;padding-right:0px;">
                  <label>まで</label>

                  <div class="input-group">
                    <input required type="text" id="date-to" name="date-to" class="form-control"/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div> 
                </div>
                
              </div>
            </div>
           
          </div>

          <div class="col-xs-12 col-sm-6">
              <div class="panel-body">
                <div class="map_canvas"></div>
                <p style="padding-top:0px;">注：移動し、マップの中で最も正確な可能な位置に赤のマーカーを配置してください。</p>
               
                  <div class="form-group">
                    <label>マップアドレス</label>
                    <input id="geocomplete" name="geocomplete" class="form-control" type="text" placeholder="Type in an address" value="Tokyo, Japan" />
                  </div>
                  <div class="form-group">
                    <label>完全なアドレス</label>
                    <textarea id="geo-address" name="geo-address" class="form-control"></textarea>
                  </div>
                  <div class="form-group" style="display:none;">
                    <input id="find"  name="find" class="form-control" type="button" value="find" />
                  </div>


                  <a id="reset" href="#" name="reset" style="display:none;">リセットマーカー</a>

                  <div style="display:none;">
                    <label>Latitude</label>
                    <input name="lat" id="lat" type="text" value="">
                  
                    <label>Longitude</label>
                    <input name="lng" type="text" id="long" value="">
                  
                    <label>Formatted Address</label>
                    <input name="formatted_address" type="text" value="">
                  </div>

                  <div class="clearfix"></div>
                  <?php
                    $id = $this->input->get('ri');
                    if($id==""){
                      $rid = "";
                    }
                    else{
                      $rid = $id;
                    }
                  ?>
                 <input type="text"  value="<?php echo $rid ?>" class="form-control" name="myid" id="myid" style="display:none;">
                 <div class="form-group prefecture required" id="prefecture">
                  <label for="SelectPrefecture">県 <sup>*</sup> </label>
                  <select class="form-control" id="SelectPrefecture" name="SelectPrefecture">   
                  </select>
                </div>
                <div class="form-group required city">
                  <label for="SelectCity">街 <sup>*</sup> </label>
                  <select required name="SelectCity" class="form-control" id="SelectCity">
                       <option data-value='秋田キャピタル' value='秋田キャピタル'>秋田（首都）</option><option data-value='大山' value='大山'>大山</option><option data-value='型紙' value='型紙'>型紙</option><option data-value='鹿角' value='鹿角'>鹿角</option><option data-value='北秋田' value='北秋田'>北秋田</option><option data-value='にかほ市' value='にかほ市'>にかほ市</option><option data-value='能代' value='能代'>能代</option><option data-value='男鹿' value='男鹿'>男鹿</option><option data-value='大館' value='大館'>大館</option><option data-value='仙北市' value='仙北市'>仙北市</option><option data-value='横手' value='横手'>横手</option><option data-value='由利本荘市' value='由利本荘市'>由利本荘市</option><option data-value='湯沢' value='湯沢'>湯沢</option>
                  </select>
                </div>
              </div>

          </div>

          <div class="col-lg-12 col-xs-12 clearfix">
            <button type="submit" class="btn btn-primary btnSave" id="btnSave"><i class="fa fa-save"></i> ゲームを提出します </button>
          </div>
        </form>

        <div class="col-lg-12 col-xs-12  clearfix ">
          <ul class="pager">
            <li class="previous pull-right"><a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> SPOTCHに行きます  </a></li>
            <li class="next pull-left"><a href="account">&larr; 戻って私の口座に</a></li>
          </ul>
       </div>
      </div><!--/row end-->
    </div>
    <div class="col-lg-3 col-md-3 col-sm-5">
        
      </div>
    </div><!--/row-->

  <div style="clear:both"></div>

</div>

<!-- /wrapper --> 
<div class="gap"> </div>

<script type="text/javascript">
  $(document).ready(function(){
    $("#form-game").submit(function(e){
      var game_date = $("#date-game").val();
      var date_game = new Date(game_date);
      var today = new Date();
      var date_from = new Date($("#date-from").val());
      var date_to = new Date($("#date-to").val());

      if(date_game<today){
        alert('ゲームの無効な日付。');
        e.preventDefault();
        return false;
      }  

      if(date_game>date_from && date_game>date_to){

      } 
      else{
        alert('無効な日付。');
        e.preventDefault();
        return false;
      }

      var game_name = $("#InputGameTitle").val();
      e.preventDefault();
      data = {
        game_name : game_name
      }
      $.ajax({
        type : "POST",
        data : data,
        url : "<?php echo base_url(); ?>games/check_name",
        success : function(html){
          if(html=="exists"){
            alert('ゲームタイトルが存在します。');
            e.preventDefault();
            return false;
          }
          else{
            $("#form-game").unbind().submit();
          }
        }
      })



      
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

  })
</script>


