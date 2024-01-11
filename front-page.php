<?php
get_header();
?>

	<main id="primary" class="site-main">

        <?php get_template_part('template-parts/content','hero'); ?>
        <?php get_template_part('template-parts/content','services'); ?>       
        <?php get_template_part('template-parts/content-description','section'); ?>       
        <?php get_template_part('template-parts/content','testimonials'); ?>       
        <?php get_template_part('template-parts/content-latest','posts'); ?>       

	</main><!-- #main -->

<?php
get_footer();
