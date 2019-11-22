<?php
    // ez media theme option vars
    $value              = myprefix_get_theme_option( 'input_example' );
    $copyright          = myprefix_get_theme_option( 'footer_copyright' );
    $telephone          = myprefix_get_theme_option( 'telephone' );
    $twitter_handle     = myprefix_get_theme_option( 'twitter_handle' );
    $twitter_url        = myprefix_get_theme_option( 'twitter_url' );
    $address            = myprefix_get_theme_option( 'address' );
    $email_address      = myprefix_get_theme_option( 'email_address' );
    ?>

<nav id="navbar" class="navbar is-spaced is-fixed-top navbar has-shadow is-spaced is-uppercase" itemscope="itemscope"
    itemtype="https://schema.org/SiteHeader">
    <div class="nav-extra is-hidden-touch">
        <div class="container">
            <div class="social">
                <a href="<?php echo $twitter_url; ?>"><i class="fab fa-twitter"></i></a>
            </div>
            <div class="navbar-end ">
                <ul>
                    <li><span class="contact-span contact-tel"><i class="fas fa-phone"></i> <a
                                href="tel:<?php echo $telephone; ?>"><?php echo $telephone; ?></a></span></li>
                    <li><span class="contact-span contact-email"><a
                                href="mailto:<?php echo $email_address; ?>?Subject=I'm%20interested" target="_blank"><i
                                    class="fas fa-envelope"></i>
                                <?php echo $email_address; ?></a></span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="navbar-brand">
            <span class="contact is-hidden-desktop"><a href="/contact.html"><i class="fas fa-phone is-size-4"></i>
                </a></span>
            <a class="navbar-item is-hidden-desktop" href="<?php echo get_home_url(); ?>">
                <img class="logo-main" src="<?php echo get_theme_mod( 'logo_mobile' ); ?>"
                    alt="ezmedia - Affordable Web Design in Hull" width="80" height="37">
            </a>
            <!-- <a class="navbar-item is-hidden-touch" href="<?php //echo get_home_url(); ?>"> -->
            <?php echo get_custom_logo(); ?>
            <!-- </a> -->
            <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navMenuDocumentation" class="navbar-menu">
            <div class="navbar-end ">
                <?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
								'container'      => '',
							) );
							?>
            </div>
        </div>
    </div>
</nav>