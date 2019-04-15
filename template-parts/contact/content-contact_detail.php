<?php
    // ez media theme option vars
    // $value              = myprefix_get_theme_option( 'input_example' );
    $copyright          = myprefix_get_theme_option( 'footer_copyright' );
    $telephone          = myprefix_get_theme_option( 'telephone' );
    $twitter_handle     = myprefix_get_theme_option( 'twitter_handle' );
    $twitter_url        = myprefix_get_theme_option( 'twitter_url' );
    $address            = myprefix_get_theme_option( 'address' );
    $email_address      = myprefix_get_theme_option( 'email_address' );
    ?>


<div class="columns is-tablet contact-phone" itemscope itemtype="http://schema.org/LocalBusiness">
    <h1 class="is-hidden-touch is-hidden-desktop" itemprop="name">EZ Media</h1>
    <div class="column is-full-mobile is-half-tablet is-half-desktop" itemprop="telephone">
        <a href="tel:<?php echo $telephone; ?>">
            <div class="content has-text-centered">
                <div class="is-rounded has-background-primary has-text-white">
                    <i class="fas fa-phone is-size-2"></i>
                </div>
                <p><?php echo $telephone; ?></p>
            </div>
        </a>
    </div>
    <div class="column is-full-mobile is-half-tablet is-half-desktop">
        <a href="mailto:<?php echo $email_address; ?>?Subject=I'm%20interested" target="_blank">
            <div class="content has-text-centered">
                <div class="is-rounded has-background-primary has-text-white">
                    <i class="fas fa-envelope is-size-2"></i>
                </div>
                <p><?php echo $email_address; ?></p>
            </div>
        </a>
    </div>
</div>