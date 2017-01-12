<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Fav and touch icons -->

<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-144-precomposed.png">

<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-114-precomposed.png">

<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/ico/apple-touch-icon-72-precomposed.png">

<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">

<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/ico/favicon.png">

<title>Spotch</title>

<!-- jQuery Version 1.11.0 -->

<!--<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.js"></script>-->

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/map.css">

<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script> 



<!-- Bootstrap core CSS -->

<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">



<!-- styles needed by swiper slider -->

<link href="<?php echo base_url(); ?>assets/css/idangerous.swiper.css" rel="stylesheet">



<!-- Custom styles for this template -->

<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">



<link href="<?php echo base_url(); ?>assets/css/skin-11.css" rel="stylesheet">



<!-- css3 animation effect for this template -->

<link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/bootstrapValidator.min.css" rel="stylesheet">



<!-- styles needed by carousel slider -->

<link href="<?php echo base_url(); ?>assets/css/owl.carousel.css" rel="stylesheet">

<link href="<?php echo base_url(); ?>assets/css/owl.theme.css" rel="stylesheet">



<!-- styles needed by checkRadio -->

<link href="<?php echo base_url(); ?>assets/css/ion.checkRadio.css" rel="stylesheet">

<link href="<?php echo base_url(); ?>assets/css/ion.checkRadio.cloudy.css" rel="stylesheet">



<!-- styles needed by mCustomScrollbar -->

<link href="<?php echo base_url(); ?>assets/css/jquery.mCustomScrollbar.css" rel="stylesheet">



<!-- mobile css -->

<link href="<?php echo base_url(); ?>assets/css/mobile.css" rel="stylesheet">


<!-- Just for debugging purposes. -->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

<!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

<![endif]-->



<!-- include pace script for automatic web page progress bar  -->


<script>
  
    paceOptions = {

      elements: true

    };

</script>

<script src="<?php echo base_url(); ?>assets/js/pace.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/datetimepicker_css.js"></script>


</head>



<body>
<!-- Fixed navbar start -->
<div class="navbar navbar-tshop navbar-fixed-top megamenu" role="navigation">
  <div class="navbar-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
          <div class="pull-left ">
            <ul class="userMenu ">
              <li> <a href="#"> <span class="hidden-xs">HELP</span><i class="glyphicon glyphicon-info-sign hide visible-xs "></i> </a> </li>
              <li class="phone-number"> <a  href="callto:+8801680531352"> <span> <i class="glyphicon glyphicon-phone-alt "></i></span> <span class="hidden-xs" style="margin-left:5px"> 00 0000 0000 </span> </a> </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 no-margin no-padding">
          <div class="pull-right">
            <ul class="userMenu">
              <li class=""> 
                 <?php $user = $this->session->userdata('user_id'); 
                  if ($user) {
                 
                    echo '<a class="hidden-xs" href="'.base_url().'account/">';
                    echo $this->session->userdata('name');
                    echo '</a>';
                    echo '<a class="hidden-xs" href="'.base_url().'login/logout">ログアウト</a>';
                    echo '<a href="'.base_url().'account/"><i class="glyphicon glyphicon-user hide visible-xs "></i></a>';
                    echo '<a href="'.base_url().'login/logout"><i class="glyphicon glyphicon-log-out hide visible-xs "></i></a>';

                  }else{
                    echo '<a class="hidden-xs" href="'.base_url().'login/">';
                    echo 'アカウントを作成する';
                    echo '</a>';
                    echo '<a href="'.base_url().'login/"><i class="glyphicon glyphicon-log-in hide visible-xs "></i></a>';
                  }
                 ?>
                
                
              </a> </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/.navbar-top-->
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only"> Toggle navigation </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> </button>
      <a class="navbar-brand " href="<?php echo base_url(); ?>">SPOTCH</a> 
    </div>
    <!--/.navbar-cart-->
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"> <a href="#">ホーム</a> </li>
        <li> <a href="<?php echo base_url().'guide'; ?>">初めての方へ</a> </li>
        <li class="dropdown megamenu-fullwidth"> <a data-toggle="dropdown" class="dropdown-toggle" href="#">対戦チームを探す<b class="caret"> </b> </a>
          <ul class="dropdown-menu">
            <li class="megamenu-content ">
              <div class="col-lg-4  col-sm-4 col-md-4  col-xs-4">
                <a class="newProductMenuBlock" href="<?php echo base_url();?>find_team/?level=Excellent"> <img class="img-responsive" src="<?php echo base_url(); ?>assets/img/excellent.png" alt="excellent"> <span class="ProductMenuCaption"> <i class="fa fa-caret-right"> </i>上級</span> </a>
              </div>
              <div class="col-lg-4  col-sm-4 col-md-4 col-xs-4">
                <a class="newProductMenuBlock" href="<?php echo base_url();?>find_team/?level=Intermediate"> <img class="img-responsive" src="<?php echo base_url(); ?>assets/img/intermediate.png" alt="intermediate"> <span class="ProductMenuCaption"> <i class="fa fa-caret-right"> </i>中級</span> </a>
              </div>
              <div class="col-lg-4  col-sm-4 col-md-4 col-xs-4">
                <a class="newProductMenuBlock" href="<?php echo base_url();?>find_team/?level=Beginner"> <img class="img-responsive" src="<?php echo base_url(); ?>assets/img/beginner.png" alt="primary"> <span class="ProductMenuCaption"> <i class="fa fa-caret-right"> </i>初級</span> </a>
              </div>
            </li>
          </ul>
        </li>
        <!-- change width of megamenu = use class > megamenu-fullwidth, megamenu-60width, megamenu-40width -->
        <li class="dropdown megamenu-fullwidth "> <a data-toggle="dropdown" class="dropdown-toggle" href="#">ゲームを検索<b class="caret"> </b> </a>
          <ul class="dropdown-menu">
            <li class="megamenu-content ">
              <ul class="col-lg-3  col-sm-3 col-md-3 col-xs-4">
                <li> <a class="newProductMenuBlock" href="<?php echo base_url();?>find_game/?category=Men"> <img class="img-responsive" src="<?php echo base_url(); ?>assets/img/men.png" alt="product"> <span class="ProductMenuCaption"> <i class="fa fa-caret-right"> </i>人々</span> </a> </li>
              </ul>
              <ul class="col-lg-3  col-sm-3 col-md-3  col-xs-4">
                <li> <a class="newProductMenuBlock" href="<?php echo base_url();?>find_game/?category=Women"> <img class="img-responsive" src="<?php echo base_url(); ?>assets/img/women.png" alt="product"> <span class="ProductMenuCaption"> <i class="fa fa-caret-right"> </i>女性たち</span> </a> </li>
              </ul>
              <ul class="col-lg-3  col-sm-3 col-md-3 col-xs-4">
                <li> <a class="newProductMenuBlock" href="<?php echo base_url();?>find_game/?category=Mix"> <img class="img-responsive" src="<?php echo base_url(); ?>assets/img/mix.png" alt="product"> <span class="ProductMenuCaption"> <i class="fa fa-caret-right"> </i>ミックス</span> </a> </li>
              </ul>
              <ul class="col-lg-3  col-sm-3 col-md-3 col-xs-4">
                <li> <a class="newProductMenuBlock" href="<?php echo base_url();?>find_game/?category=Practice"> <img class="img-responsive" src="<?php echo base_url(); ?>assets/img/practice.png" alt="product"> <span class="ProductMenuCaption"> <i class="fa fa-caret-right"> </i>練習</span> </a> </li>
              </ul>
            </li>
          </ul>
        </li>
        <li> <a href="#">ヘルプ</a>
        </li>
      </ul>
      <!--/.navbar-nav hidden-xs--> 
    </div>
    <!--/.nav-collapse --> 
  </div>
  <!--/.container -->
  <div class="search-full text-right"> <a class="pull-right search-close"> <i class=" fa fa-times-circle"> </i> </a>
    <div class="searchInputBox pull-right">
      <input type="search"  data-searchurl="search?=" name="q" placeholder="start typing and hit enter to search" class="search-input">
      <button class="btn-nobg search-btn" type="submit"> <i class="fa fa-search"> </i> </button>
    </div>
  </div>
  <!--/.search-full--> 
</div>
<!-- /.Fixed navbar  -->



