<section class="hero is-white section home-space is-hidden-mobile" <?php if( get_field('spacer_bg') ): ?>
    style="background-image: url(<?php the_field('spacer_bg'); ?>)" <?php endif; ?>>
</section>

<section class="hero is-primary has-text-centered">
    <div class="hero-body">
        <div class="container">
            <?php if( get_field('xtra_content_2') ): ?>
                <h4 data-aos="zoom-down" class="title is-3 is-size-4-mobile has-text-white	">
                    <?php the_field('xtra_content_2'); ?>
                </h4>
            <?php endif; ?>
            <a href="<?php the_field('btn_link'); ?>" data-aos="fade-up" class="button is-white">Give us a call today</span></a>
        </div>
    </div>
</section>