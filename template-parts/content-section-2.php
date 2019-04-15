<?php
 $s2_title       = get_sub_field('section_2_title');
 $s2_content     = get_sub_field('section_2_content');
 $s2_img         = get_sub_field('section_2_img');
?>
<section class="hero is-light dotted is-medium">
    <div class="hero-body">
        <div class="container">
            <div class="columns reverse-mobile">
                <div data-aos="fade-down" class="column is-full-mobile is-half-tablet is-half-desktop">
                    <div class="img-column-is-centered">
                        <?php if(isset($s2_img )): ?>
                            <img src="<?php echo $s2_img  ?>" alt="EZ media social media marketing" width="600" height="400">
                        <?php endif; ?>
                    </div>
                </div>
                <div data-aos="fade-right" class="column is-full-mobile is-half-tablet is-half-desktop">
                    <div class="column-is-centered content">
                        <?php if(isset($s2_title )): ?>
                            <h3 class="title fancy is-3 is-size-4-mobile is-uppercase">
                                <?php echo $s2_title  ?>
                            </h3>
                        <?php endif; ?>

                        <?php if(isset($s2_content)): ?>
                            <p>
                                <?php echo $s2_content ?>
                            </p>
                        <?php endif; ?>
                        <div class="intro-buttons">
                            <a href="<?php the_field('btn_link'); ?>" class="button is-primary">
                                get in touch</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>