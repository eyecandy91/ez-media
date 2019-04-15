<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>

<section class="hero main is-medium has-text-centered">
    <div class="hero-body">
        <div class="fullscreen-bg" style="background-image: url('<?php echo $thumb['0'];?>')">
            <div>
            </div>
        </div>
        <div class="container">

            <?php if( get_field('site_title') ): ?>
            <h1 class="title is-1 is-size-2-mobile is-uppercase has-text-white fade-in main-title">
                <?php the_field('site_title'); ?>
            </h1>
            <?php endif; ?>

        </div>
    </div>
</section>
