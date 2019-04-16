<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>

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

<footer class="footer hero is-dark" itemscope="itemscope" itemtype="https://schema.org/SiteFooter">

    <div class="container">
        <div class="columns content">
            <div class="column is-full-mobile is-half-tablet is-half-desktop">
                <div class="content has-text-left">
                    <ul>
                        <li class="title is-4">Contact us</li>
                        <li><a href="tel:07904860702"><i class="fas fa-phone"></i><?php echo $telephone; ?></a></li>
                        <li><i class="fas fa-map-marked-alt"></i><?php echo $address; ?></li>
                        <li><a href="mailto:<?php echo $email_address; ?>?Subject=I'm%20interested" target="_blank"><i
                                    class="fas fa-envelope-open"></i><?php echo $email_address; ?></a></li>
                        <li><a href="<?php echo $twitter_url; ?>" target="blank"><i
                                    class="fab fa-twitter"></i><?php echo $twitter_handle; ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="column is-full-mobile is-half-tablet is-half-desktop">
                <div class="content has-text-right-tablet">
                    <img src="<?php echo get_theme_mod( 'logo_footer' ); ?>" alt="eZMedia" width="60" height="28">
                </div>
            </div>
        </div>

        <small class="has-text-centered is-fullwidth is-block"><?php echo $copyright; ?></small>

    </div>

    <div class="arrow bounce"><i class="fa fa-angle-down fa-5x" aria-hidden="true"></i></div>

</footer>

<?php wp_footer(); ?>

<script>
AOS.init({
    duration: 2000, // values from 0 to 3000, with step 50ms
    once: true, // whether animation should happen only once - while scrolling down
    offset: 0, // offset (in px) from the original trigger point
    delay: 0, // values from 0 to 3000, with step 50ms
});
</script>

</body>

</html>