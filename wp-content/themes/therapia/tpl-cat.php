<?php
/*
 * Template Name: Category template
*/
?>

<!-- get header -->
<?php get_header(); ?>


<section class="section-categories">
    <div class="container">
        <?php echo do_shortcode( '[product_categories]'); ?>
    </div>
</section>


    <!-- get footer -->
<?php get_footer(); ?>