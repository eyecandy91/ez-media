            <section class="hero is-white has-text-centered slogan" <?php if( get_field('info_bg') ): ?>
                style="background-image: url(<?php the_field('info_bg'); ?>)" <?php endif; ?>>
                <div class="hero-body">
                    <div class="container small content">
                        <div data-aos="fade-down">

                            <?php if( get_field('xtra_title') ): ?>
                            <h3 class="title fancy is-3 is-size-4-mobile is-uppercase">
                                <?php the_field('xtra_title'); ?>
                            </h3>
                            <?php endif; ?>

                            <?php if( get_field('xtra_content') ): ?>
                            <div class="content has-text-centered">
                                <?php the_field('xtra_content'); ?>
                            </div>
                            <?php endif; ?>

                            <div class="intro-buttons">
                                <a href="<?php the_field('btn_link'); ?>" class="button is-primary"><span>contact
                                        us</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>