<style type="text/css">
.main-container{
  min-height: 860px;
}
</style>

<div class="container main-container headerOffset">



  <div>

   
      
    <div class="breadcrumbDiv">

      <ul class="breadcrumb">

        <li> <a href="index.html">Home</a> </li>

        <li class="active"> 認証 </li>

      </ul>

    </div>

  </div>

  

  <div>

  

  

      <h1 class="section-title-inner"><span><i class="fa fa-lock"></i> 認証</span></h1>

      

      <div class="row userInfo">

      

        <div class="col-xs-12 col-sm-4">

          <h2 class="block-title-2"> アカウントを作成します </h2>

           <div class="error_register alert alert-danger"style="display:none"  role="alert">申し訳ありませんが、すでに提供電子メールが存在します。</div>
         

          <div class="success_register alert alert-success"style="display:none"  role="alert">ありがとう。あなたのメールアドレスを確認してください。</div>
         

          <form role="form" id="registerform" method="post"  action="">
            
            <div class="form-group ">

              <label >名前</label>

              <input   type="text" class="form-control" id="registration_name" name="registration_name" placeholder="名前を入力してください"  >

            </div>

            <div class="form-group">

              <label >電子メールアドレス</label>

              <input   type="email" class="form-control"  placeholder="メールアドレスを入力" id="registration_email" name="registration_email" >

            </div>

            <div class="form-group ">

              <label>パスワード</label>

              <input type="password"   class="form-control" id="registration_password" name="registration_password" placeholder="パスワードを入力します">

            </div>

            <div class="error"></div>
            
            <div class="form-group">
              <button type="submit" class="pull-right btn register btn-primary"><i class="fa fa-user"></i> アカウントを作成します</button>
            </div>

            
          </form>
            


        </div>

        <div class="col-xs-12 col-sm-4">

          <h2 class="block-title-2"><span>既に登録されていますか？</span></h2>


          <div class="invalid-alert alert alert-danger"style="display:none"  role="alert">無効なユーザー。</div>
         
          <form role="form" id="loginform" method="post"  action="">

            <div class="form-group ">

              <label>電子メールアドレス</label>

              <input  type="email" class="form-control"  placeholder="メールアドレスを入力" id="login_email" name="login_email">

            </div>

            <div class="form-group ">

              <label>パスワード</label>

              <input  type="password" class="form-control"  placeholder="パスワードを入力します" id="login_password" name="login_password">

            </div>

            

            <div class="form-group">

              <a class="pull-left" title="Recover your forgotten password" data-toggle="modal" data-target="#myPassword" href="javascript:void(0);">パスワードをお忘れですか？</a>
              <button style="margin:0" type="submit" class="pull-right btn btn-primary login"><i class="fa fa-sign-in"></i> ログイン </button>

            </div>

            
          </form>

        </div>

        <div class="col-xs-12 col-sm-4">

           <h2 class="block-title-2">FacebookやTwitterでログイン</h2>

          <div class="form-group">
              <?php if (@$user_profile):  // call var_dump($user_profile) to view all data ?>
                  <div class="row">
                      <div class="col-lg-12 text-center">
                          <img class="img-thumbnail" data-src="holder.js/140x140" alt="140x140" src="https://graph.facebook.com/<?=$user_profile['id']?>/picture?type=large" style="width: 140px; height: 140px;">
                          <h2><?=$user_profile['name']?></h2>
                          <a href="<?=$user_profile['link']?>" class="btn btn-lg btn-default btn-block" role="button">プロフィールの表示</a>
                          <a href="<?= $logout_url ?>" class="btn btn-lg btn-primary btn-block" role="button">ログアウト</a>
                      </div>
                  </div>
              <?php else: ?>
                  <a href="<?= $login_url ?>" class="btn btn-lg btn-primary btn-block" role="button"><i class="fa fa-facebook"></i> Facebookでログイン </a>
              <?php endif; ?>  

            </div>
            <div class="form-group">
               <a href="<?php echo base_url('twitter_social/auth'); ?>" class="btn btn-lg btn-primary btn-block" role="button"><i class="fa fa-twitter"></i> Twitterーでログイン </a>
            
            </div>
        </div>

      </div>

      <div class="modal fade" id="myPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">パスワードを取得</h4>
            </div>
            <form role="form" id="retrieveform" method="post"  action="">
              <div class="modal-body">

               

                  <div class="form-group">
                    <label>電子メールアドレス <span id="author"></span></label>
                  
                    <input  type="email" class="form-control"  placeholder="Email" id="email_retrieve_password" name="email_retrieve_password">

                  </div>

                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">クローズ</button>
                <button type="submit" class="btn btn-primary retrieve_password">送信</button>
              </div>
            </form>
          </div>
        </div>
      </div>


      <!--/row end--> 

      

  

    

    

  </div> <!--/row-->
</div>

<script type="text/javascript">
  $(document).ready(function(){

    $('#retrieveform').bootstrapValidator({
        message: 'この値は有効ではありません',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        submitHandler: function(validator, form, submitButton) {
        
            
        },
        submitButtons:'.retrieve_password',
        fields: {
         
            email_retrieve_password: {
                validators: {
                    notEmpty: {
                        message: '電子メールアドレスは必須であり、 tが空であること」をすることができます\します'
                    },
                    email_register: {
                        message: '入力が有効なメールアドレスではありません'
                    }
                    
                }
            },
           

        }
    })
    .on('success.form.bv', function(e) {
        e.preventDefault();

      email = $("#email_retrieve_password").val();

      data={
        email : email
      }

      $.ajax({
          type: 'post',
          data: data,
          url: "<?php echo base_url(); ?>login/forgot_password",
          success: function( html ) {
            alert(html);
          }
      });
    });

  



    $('#loginform').bootstrapValidator({
        message: 'この値は有効ではありません',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        submitHandler: function(validator, form, submitButton) {
        
            
        },
        submitButtons:'.login',
        fields: {
         
            login_email: {
                validators: {
                    notEmpty: {
                        message: '電子メールアドレスは必須であり、 tが空であること」をすることができます\します'
                    },
                    email_register: {
                        message: '入力が有効なメールアドレスではありません'
                    }
                    
                }
            },
            login_password: {
                validators: {
                    notEmpty: {
                            message: 'パスワードが必要とされ、空にすることはできません'
                    },
                    stringLength: {
                        min: 8,
                        message: 'パスワードは8文字以上にする必要があります。'
                    }
                }
            }


        }
    })
    .on('success.form.bv', function(e) {
        e.preventDefault();

        password = $("#login_password").val();
        email = $("#login_email").val();

        data = {
          password : password,
          email : email
        }
        $.ajax({
          type: 'post',
          data: data,
          dataType: 'json',
          url: "<?php echo base_url(); ?>login/login_user",
          success: function(html) {
            if (html.user_status == 'Invalid user') {
              $(".invalid-alert").show();
            }else{
              window.location.href = "<?php echo base_url() ?>account";
            }
           

          }
        });
    });
    set_register_validation();
  });
  function set_register_validation(){

      $('#registerform').bootstrapValidator({
        message: 'この値は有効ではありません',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        submitHandler: function(validator, form, submitButton) {
        
            
        },
        submitButtons:'.register',
        fields: {
         
            registration_email: {
                validators: {
                    notEmpty: {
                        message: '電子メールアドレスは必須であり、 tが空であること」をすることができます\します'
                    },
                    email_register: {
                        message: '入力が有効なメールアドレスではありません'
                    },
                    
                }
            },
            registration_password: {
                validators: {
                    notEmpty: {
                        message: 'パスワードが要求され、tが空であること」をすることができます\します'
                    },
                    stringLength: {
                        min: 8,
                        message: 'パスワードは8文字以上にする必要があります。'
                    }
                   
                }
            },

            registration_name: {
                validators: {
                    notEmpty: {
                        message: '名前は必須であり、 tが空であること」をすることができます\します'
                    },
                    
                   
                }
            },

           

        }
      })
      .on('success.form.bv', function(e) {
        e.preventDefault();

        username = $("#registration_name").val();
        password = $("#registration_password").val();
        email = $("#registration_email").val();

        data = {
          username : username,
          password : password,
          email : email
        }
        $.ajax({
          type: 'post',
          data: data,
          url: "<?php echo base_url(); ?>login/register_user",
          success: function(html) {
              if (html == "Exist") {
                $(".error_register").show();
                $(".success_register").hide();
              }else{
                 $(".success_register").show();
                 $(".error_register").hide();
              }
          }
        });
      });
    }


</script>