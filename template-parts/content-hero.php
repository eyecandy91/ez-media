<section class="hero main is-medium has-text-centered">
    <div class="hero-body">
        <div class="fullscreen-bg home">
            <div>
            </div>
        </div>
        <div id="main" class="container">
            <?php if( get_field('site_title') ): ?>
            <h1 class="title is-1 is-size-2-mobile is-uppercase has-text-white fade-in main-title">
                <?php the_field('site_title'); ?>
            </h1>
            <?php endif; ?>
            <?php if( get_field('site_sub_title') ): ?>
            <h2 class="subtitle has-text-white fade-in sub-title">
                <?php the_field('site_sub_title'); ?>
            </h2>
            <?php endif; ?>
            <div class="field is-grouped is-grouped-centered">
                <p class="control">
                    <div class="intro-buttons">
                        <a href="<?php the_field('btn_link'); ?>" class="button is-primary">contact
                            us</span></a>
                    </div>
                </p>
            </div>
        </div>
    </div>
</section>