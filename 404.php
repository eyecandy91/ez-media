<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package _s
 */

get_header(); ?>

<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 * 
 */

get_header();
?>

<section class="hero">
    <div class="fullscreen-bg pricing" <?php if( get_field('hero_bg', 4) ): ?>
        style="background-image: url(<?php the_field('hero_bg', 4); ?>)" <?php endif; ?>>
        <div></div>
    </div>
    <div class="hero-body has-text-white is-large">
        <div class="container content">
            <div class="column is-full has-text-centered">

                <div id="notfound">
                    <div class="notfound">
                        <div class="notfound-404">
                            <h1>404</h1>
                            <h2>Page not found</h2>
                        </div>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button is-primary"><span>back
                                home</span></a>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>
</section>

<?php
get_footer();