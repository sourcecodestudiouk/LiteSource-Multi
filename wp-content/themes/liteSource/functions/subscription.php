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