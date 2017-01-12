<div class="container main-container headerOffset"> 
  <div class="row">
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li> <a href="index.html">ホーム</a> </li>
        <li> <a href="account">マイアカウント</a> </li>
        <li class="active"> 発表 </li>
      </ul>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
    	<h1 class="section-title-inner"><span><i class="fa fa-plus"></i> 発表を追加 </span></h1>
    	<div class="row userInfo">
        <div class="col-lg-12 col-xs-12">
          <h2 class="block-title-2"> アナウンスを追加するには、下記のフォームにご記入ください。 </h2>
          <p class="required"><sup>*</sup> 必須フィールド</p>
        </div>

        	<input type="text" class="form-control" name="InputAnnID" id="InputAnnID" style="display:none;">
          <div class="col-xs-12 col-sm-6">
      	    <div class="form-group required">
              <label for="InputGameTitle">発表タイトル <sup>*</sup> </label>
              <input required type="text" class="form-control" name="InputGameTitle" id="announcement_title" placeholder="">
            </div>
            <div class="form-group">
              <label for="InputDescription">内容  </label>
              <textarea rows="14" cols="26" name="InputContent" class="form-control" id="announcement_content"></textarea>
            </div>  
            
            <div class="form-group required">

              <label>アナウンスが表示されます </label>

              <div class="row">
                <div class="col-xs-6" style="width:40%;padding-right:0px;">
                  <label>から</label>
                  
                  <div class="input-group">
                    <input required type="text" id="announcement_from" name="date-from" class="form-control"/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>  
                </div>
                
                <div class="col-xs-6" style="width:40%;padding-right:0px;">
                  <label>まで</label>

                  <div class="input-group">
                    <input required type="text" id="announcement_to" name="date-to" class="form-control"/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div> 
                </div>
                
              </div>
            </div>
           
          </div>

          <div class="col-lg-12 col-xs-12 clearfix">
            <button type="submit" class="btn btn-primary btnSave" id="btnSaveAnnouncement"><i class="fa fa-save"></i> 提出する </button>
          </div>
      </div><!--/row end-->
    </div>
    
    </div><!--/row-->

  <div style="clear:both"></div>

</div>

<!-- /wrapper --> 
<div class="gap"> </div>


