<?php
 $s3_title       = get_sub_field('section_3_title');
 $s3_content     = get_sub_field('section_3_content');
 $s3_img         = get_sub_field('section_3_img');
?>
<section class="hero is-white is-medium">
    <div class="hero-body">
        <div class="container">
            <div class="columns">

                <div data-aos="fade-left" class="column is-full-mobile is-half-tablet is-half-desktop">
                    <div class="column-is-centered content">
                        <?php if(isset($s3_title )): ?>
                            <h3 class="title fancy is-3 is-size-4-mobile is-uppercase">
                                <?php echo $s3_title  ?>
                            </h3>
                        <?php endif; ?>

                        <?php if(isset($s3_content)): ?>
                            <p>
                                <?php echo $s3_content ?>
                            </p>
                        <?php endif; ?>
                        <div class="intro-buttons">
                            <a href="<?php the_field('btn_link'); ?>" class="button is-primary">
                                Email us</span></a>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-down" class="column is-full-mobile is-half-tablet is-half-desktop">
                    <div class="img-column-is-centered">
                        <?php if(isset($s3_img )): ?>
                            <img src="<?php echo $s3_img  ?>" alt="EZ media social media marketing" width="600" height="400">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>