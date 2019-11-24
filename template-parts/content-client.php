<?php 
$args = array(
    'post_type'         => 'clients', 
    'posts_per_page'    => 3, 
    // 'paged'             => $paged,
    'order'             => 'ASC',
);
?>
<section class="hero">

    <div class="hero-body has-text-white">
        <div class="container content">
            <div class="column is-full has-text-centered">

                <?php if( get_field('clients_title') ): ?>
                <h3 data-aos="fade-right" class="title is-3 is-size-4-mobile is-uppercase has-text-white">
                    <?php the_field('clients_title'); ?>
                </h3>
                <?php endif; ?>

            </div>

            <div data-aos="fade-right" class="column is-full has-text-centered">
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
                    <div class="column is-full-mobile is-half-tablet is-one-third-desktop">
                        <div class="card">
                            <a class="card" href="<?php echo $url ?>">
                                <div class="card-img-top blog-img">
                                    <img src="<?php echo $image_link;?>" alt="<?php echo $image_desc;?>">
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title title is-marginless is-uppercase is-5">
                                        <?php $name; ?>
                                    </h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endwhile;?>
                </div>
            </div>

            <?php else: ?>
            <h1>No posts here!</h1>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>

        </div>

        <div data-aos="fade-down" class="intro-buttons has-text-centered">
            <a href="<?php the_field('btn_link_2'); ?>" class="button is-primary"><span>See more projects</span></a>
        </div>

    </div>
</section>