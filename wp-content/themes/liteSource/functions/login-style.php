<?php
/////////////////////////////////////////////////////////////
// Login Functions
/////////////////////////////////////////////////////////////
function scs_login_logo() {
  $img = get_field('company_logo', 'options');
  if(!$img){ ?>
    <style type="text/css">
      body.login div#login h1 a {
        display:none;
      }
    </style>
  <?php
  }?>
  <style type="text/css">
    body.login{
      display:flex;
      justify-content: center;
      align-items: center;
      flex-direction: column-reverse;
      background: #170E28;
    }
    body.login div#login {
      width:100%;
      padding:0;
      display:flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }
    body.login div#login h1 {
      display:flex;
      width:100%;
      text-align: center;
    }
    body.login div#login h1 a {
      background-image: url('/wp-content/themes/liteSource/assets/img/lite-source-logo.png');
      background-position: center;
      margin-bottom:0px;
      padding:24px;
      width:320px;
      height:130px;
      background-size:contain;
      border:0;
      border-radius:0;
    }
    body.login div#login form#loginform {
      background-color:rgba(0,0,0,0);
      border:0!important;
      max-width:320px;
      box-shadow: none;
      margin-top:0!important;
    }
    body.login .loginform{
      margin-top:0!important;
    }
    body.login div#login form#loginform label {
      color:white;
    }
    body.login div#login form#loginform input {
      color:black;
      border-radius:8px!important;
      border:0!important;
    }
    body.login div#login form#loginform p.submit input#wp-submit{
      background-color:#FFBAFA!important;
      border:2px solid white;
      color:#000;
      text-shadow: none;
      border-radius: 4px!important;
      box-shadow: none;
      text-transform: uppercase;
      color:#170E28!important;
      border-radius:0;
    }
    body.login div#login form#loginform p.submit input#wp-submit:hover{
      background-color:#FFBAFA;
      color:#170E28!important;
      
    }
    body.login div#login a {
      color:#170E28!important;
    }
    body.login div#login a:hover {
      text-decoration: underline;
      color:white;
    }
    .login .wp-pwd .button.wp-hide-pw{
      background-color:#FFBAFA!important;
      color:#170E28!important;
      border:0!important;
      border-radius:0 4px 4px 0!important;
    }
    .forgetmenot{
      margin-top:6px!important;
    }
  </style>
<?php }
if( function_exists('acf_add_options_page') ) {
add_action( 'login_enqueue_scripts', 'scs_login_logo' );
}


function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
