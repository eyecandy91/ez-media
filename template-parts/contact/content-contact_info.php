<section class="hero is-white is-medium">
    <div class="hero-body">
        <div class="container small">
            <div class="columns">
                <div class="column">
                    <div class="content">
                        <?php if( get_field('site_sub_title') ): ?>
                        <h3 class="title is-3 is-uppercase has-text-centered">
                            <?php the_field('site_sub_title'); ?>
                        </h3>
                        <?php endif; ?>

                        <?php if( get_field('contact_info') ): ?>
                        <?php the_field('contact_info'); ?>
                        <?php endif; ?>

                        <?php get_template_part( 'template-parts/contact/content-contact_detail' ); ?>

                        <?php get_template_part( 'template-parts/contact/content-contact_form' ); ?>

                        <?php get_template_part( 'template-parts/contact/content-contact_map' ); ?>

                    </div>
                </div>

            </div>

        </div>
    </div>
</section>