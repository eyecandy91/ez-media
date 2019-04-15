<?php
/**
 * The template for displaying all pages
 *
 * Template Name: Contact page
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

get_header();

get_template_part( 'template-parts/content-hero_default' );
get_template_part( 'template-parts/contact/content-contact_info' );

get_footer();