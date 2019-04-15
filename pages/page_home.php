<?php
/**
 * The template for displaying all pages
 *
 * Template Name: Home page
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

get_header(); ?>

<?php 
get_template_part( 'template-parts/content-hero' );
get_template_part( 'template-parts/content-info' );
get_template_part( 'template-parts/content-pricing' );

if( have_rows('service_packages') ): 

    while( have_rows('service_packages') ): the_row(); 
        
        // vars
        $s1_title       = get_sub_field('section_1_title');
        $s1_content     = get_sub_field('section_1_content');
        $s1_img         = get_sub_field('section_1_img');
        $s2_title       = get_sub_field('section_2_title');
        $s2_content     = get_sub_field('section_2_content');
        $s2_img         = get_sub_field('section_2_img');
        $s3_title       = get_sub_field('section_3_title');
        $s3_content     = get_sub_field('section_3_content');
        $s3_img         = get_sub_field('section_3_img');
        
        get_template_part( 'template-parts/content-section-1' );
        get_template_part( 'template-parts/content-section-2' );
        get_template_part( 'template-parts/content-section-3' );

    endwhile;

endif;

get_template_part( 'template-parts/content-section-end' );
get_footer();