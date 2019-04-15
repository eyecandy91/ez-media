<section class="hero">
    <div class="fullscreen-bg pricing" <?php if( get_field('pricing_bg') ): ?>
        style="background-image: url(<?php the_field('pricing_bg'); ?>)" <?php endif; ?>>
        <div></div>
    </div>
    <div class="hero-body has-text-white">
        <div class="container content">
            <div class="column is-full has-text-centered">

                <?php if( get_field('pricing_header') ): ?>
                <h3 class="title fancy is-3 is-size-4-mobile is-uppercase has-text-white">
                    <?php the_field('pricing_header'); ?>
                </h3>
                <?php endif; ?>

            </div>

            <?php if( get_field('pricing_text') ): ?>
            <div class="column container small">
                <div class="content has-text-centered">
                    <?php the_field('pricing_text'); ?>
                </div>
            </div>
            <?php endif; ?>

            <div data-aos="fade-left" class="pricing-table">

                <?php if( have_rows('pricing_packages') ): 

                while( have_rows('pricing_packages') ): the_row(); 
                    
                    // vars
                    $pk_1_title     = get_sub_field('package_1_title');
                    $pk_1_price     = get_sub_field('package_1_price');
                    $pk_2_title     = get_sub_field('package_2_title');
                    $pk_2_price     = get_sub_field('package_2_price');
                    $pk_3_title     = get_sub_field('package_3_title');
                    $pk_3_price     = get_sub_field('package_3_price');
                    ?>

                <div class="pricing-plan">

                    <?php if(isset($pk_1_title)): ?>
                    <div class="plan-header">
                        <?php echo $pk_1_title ?>
                    </div>
                    <?php endif; ?>

                    <?php if(isset($pk_1_price)): ?>
                    <div class="plan-price">
                        <span class="plan-price-amount">
                            <span class="plan-price-currency">
                                from
                            </span>
                            £ <?php echo $pk_1_price ?>
                        </span>
                    </div>
                    <?php endif; ?>

                    <div class="plan-items">

                        <?php
                        $args = array( 'posts_per_page' => -1,
                        'category_name' => 'microsite',
                        'post_type'     => 'pricing');
                        $items = get_posts( $args );
                        foreach ( $items as $post ) : setup_postdata( $post );
                        $count++; //increment the variable by 1 each time the loop executes
                        if (!empty($items)) { ?>
                        <div class="plan-item">
                            <div><span><i class="fas fa-check-circle"></i></span>
                                <?php $imageContent = get_the_content();
                                $stripped = strip_tags($imageContent, '<p> <a>'); //replace <p> and <a> with whatever tags you want to keep after the strip
                                echo $stripped;?>
                            </div>
                        </div>

                        <?php } ?>
                        <?php  endforeach;
                        wp_reset_postdata(); ?>
                    </div>
                </div>

                <div class="pricing-plan is-active">
                    <div class="ribbon"><span>POPULAR</span></div>
                    <!-- <div class="pricing-plan"> -->

                        <?php if(isset($pk_2_title)): ?>
                        <div class="plan-header">
                            <?php echo $pk_2_title ?>
                        </div>
                        <?php endif; ?>

                        <?php if(isset($pk_2_price)): ?>
                        <div class="plan-price">
                            <span class="plan-price-amount">
                                <span class="plan-price-currency">
                                    from
                                </span>
                                £ <?php echo $pk_2_price ?>
                            </span>
                        </div>
                        <?php endif; ?>

                        <div class="plan-items">

                            <?php
                            $args = array( 'posts_per_page' => -1,
                            'category_name' => 'website',
                            'post_type'     => 'pricing');
                            $items = get_posts( $args );
                            foreach ( $items as $post ) : setup_postdata( $post );
                            $count++; //increment the variable by 1 each time the loop executes
                            if (!empty($items)) { ?>
                            <div class="plan-item">
                                <div><span><i class="fas fa-check-circle"></i></span>
                                    <?php $imageContent = get_the_content();
                                    $stripped = strip_tags($imageContent, '<p> <a>'); //replace <p> and <a> with whatever tags you want to keep after the strip
                                    echo $stripped;?>
                                </div>
                            </div>

                            <?php } ?>
                            <?php  endforeach;
                            wp_reset_postdata(); ?>
                        </div>
                    <!-- </div> -->
                </div>

                <div class="pricing-plan">

                    <?php if(isset($pk_3_title)): ?>
                    <div class="plan-header">
                        <?php echo $pk_3_title ?>
                    </div>
                    <?php endif; ?>

                    <?php if(isset($pk_3_price)): ?>
                    <div class="plan-price">
                        <span class="plan-price-amount">
                            <span class="plan-price-currency">
                                from
                            </span>
                            £ <?php echo $pk_3_price ?>
                        </span>
                    </div>
                    <?php endif; ?>

                    <div class="plan-items">
                        <?php
                        $args = array( 'posts_per_page' => -1,
                        'category_name' => 'cms',
                        'post_type'     => 'pricing');
                        $items = get_posts( $args );
                        foreach ( $items as $post ) : setup_postdata( $post );
                        $count++; //increment the variable by 1 each time the loop executes
                        if (!empty($items)) { ?>
                        <div class="plan-item">
                            <div><span><i class="fas fa-check-circle"></i></span>
                                <?php $imageContent = get_the_content();
                                $stripped = strip_tags($imageContent, '<p> <a>'); //replace <p> and <a> with whatever tags you want to keep after the strip
                                echo $stripped;?>
                            </div>
                        </div>

                        <?php } ?>
                        <?php  endforeach;
                        wp_reset_postdata(); ?>

                    </div>
                </div>
            </div>

            <?php endwhile; ?>

            <?php endif; ?>

        </div>

        <div class="intro-buttons has-text-centered">
            <a href="<?php the_field('btn_link'); ?>" class="button is-primary"><span>get
                    in touch</span></a>
        </div>

    </div>
    </div>
</section>