<?php 

function is_sub_lapsed(){
    $sub = get_field('subscription_status', 'admin-settings');
    if($sub == 'lapsed'){
        if(!is_scs()){?>
            <div class="subscription-lapsed-container">
                <h1>This website subscription has lapsed.</h1>
                <p>Please visit your admin console to make payment and relaunch your website. If you think this has been done in error, please contact your site admin.</p>
                <div class="powered-by">
                    
                    <p><span>Powered by</span> <a href="https://www.sourcecodestudio.co.uk"><img src="/wp-content/themes/litesource/assets/img/lite-source-logo.png"/></a></p>
                </div>
            </div>
        <?php
        }
        else{ ?>
            <div class="subscription-lapsed-admin-message">
                <div class="container">
                    <p>This website subscription has lapsed and the user is no longer able to edit this site. View <a href="#">Admin Console</a>.</p>
                </div>
            </div>
        <?php
        }
    }
}

function show_splash(){
    if(is_main_site()){
        $user = wp_get_current_user();
        $hide = false;
        if(in_array( 'editor', (array) $user->roles )){
            $hide = true;
        }
        if(!is_user_logged_in()){
            $hide = true;
        }
        if($hide){ ?>
            <div class="litesource-splash-page">
                <img src="/wp-content/themes/litesource/assets/img/lite-source-logo.png"/>
                <h3>The All-in-one Website Builder for Businesses</h3>
                <p>Helping your small businesses to dominate the digital realm in an instant with professional agency support at an affordable price.</p>
                <p class="btn"><a href="https://www.sourcecodestudio.co.uk">Find Out More</a></p>
            </div>
        <?php
        }
    }
}