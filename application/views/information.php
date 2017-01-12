<div class="container main-container headerOffset">

  <div class="row">

    <div class="breadcrumbDiv col-lg-12">

      <ul class="breadcrumb">

        <li> <a href="<?php echo base_url(); ?>">ホーム</a> </li>

        <li> <a href="<?php echo base_url(); ?>account">マイアカウント</a> </li>

        <li class="active"> 情報 </li>

      </ul>

    </div>

  </div>
  <div class="row">
    
    <div class="col-lg-9 col-md-9 col-sm-7">

      <h1 class="section-title-inner"><span><i class="fa fa-cog"></i> 情報 </span></h1>

      <div class="row userInfo">

        <div class="col-xs-12 col-sm-12">
          <div class="form-group">
            <label>名</label>
            <input type="hidden" class="form-control" id="account_id" value="<?php echo $user_id; ?>">
            <input type="text" class="form-control" id="account_name" value="<?php echo $name; ?>">
          </div>

          <div class="form-group">
            <label>説明</label>
            <textarea class="form-control" id="description"><?php echo $description; ?></textarea>
          </div>

          <div class="form-group">
            <label>誕生日</label>
            <input type="text" class="form-control" id="birthday" value="<?php echo $birthday; ?>">
          </div>

          <div class="form-group">
            <label>ホームタウン</label>
            <textarea class="form-control" id="home_town"> <?php echo $home_town; ?></textarea>
          </div>

          <div class="form-group">
            <label>現在の位置</label>
            <textarea class="form-control" id="current_location" ><?php echo $current_location; ?></textarea>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary btnSave" id="update_information"><i class="fa fa-save"></i>更新情報</button>
          </div>


         


          <div class="clear clearfix"> </div>

        </div>

      </div>

      <!--/row end--> 

      

    </div>

    <div class="col-lg-3 col-md-3 col-sm-5"> </div>

  </div>

  <!--/row-->

  

  <div style="clear:both"></div>

</div>

<!-- /wrapper -->

<div class="gap"> </div>

