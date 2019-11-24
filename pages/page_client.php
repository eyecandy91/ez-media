<?php
/**
 * The template for displaying all pages
 *
 * Template Name: Clients page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */
$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
$args = array(
    'post_type'         => 'clients', 
    'posts_per_page'    => 10, 
    'paged'             => $paged,
    'order'             => 'ASC',
);

get_header(); ?>

<section class="hero top-spacer">
    <div class="fullscreen-bg pricing" <?php if( get_field('bg_img') ): ?>
        style="background-image: url(<?php the_field('bg_img'); ?>)" <?php endif; ?>>
        <div></div>
    </div>
    <div class="hero-body">
        <div class="container content">
            <?php if( get_field('site_title') ): ?>
            <div data-aos="fade-down" class="has-text-centered">
            <h1 class="title is-3 is-size-4-mobile is-uppercase has-text-white main-title">
                <?php the_field('site_title'); ?>
            </h1>
            </div>
            <?php endif; ?>

            <div class="column is-full has-text-centered">
                <div class="columns is-multiline">
                    <?php $loop = new WP_Query($args); ?>
                    <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
                    // vars
                    $name       = get_field('client_name');
                    $image      = get_field('client_image');
                    $url        = get_field('client_url');
                    $image_link = $image['url'];
                    $image_h    = $image['height'];
                    $image_w    = $image['width'];
                    $image_desc = $image['alt'];
                    // echo "<pre>";
                    // print_r($image );
                ?>
                    <div data-aos="fade-left" class="column is-full-mobile is-half-tablet is-one-third-desktop">
                        <div class="card">
                            <a class="card" href="<?php echo $url ?>" target="_blank">
                                <div class="card-img-top blog-img">
                                    <img src="<?php echo $image_link;?>" alt="<?php echo $image_desc;?>">
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title title is-marginless is-uppercase is-5"><?php $url; ?>
                                    </h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endwhile;?>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">

        <?php 
    if (function_exists("pagination")) {
        pagination($loop->max_num_pages);
    }
    ?>
        <?php else: ?>
        <h1>No posts here!</h1>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</div>
<?php
get_footer();