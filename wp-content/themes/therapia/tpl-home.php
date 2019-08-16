<?php
/*
 * Template Name: Home template
*/
?>

<!-- get header -->
<?php get_header(home); ?>


<div class="page-main">

    <!-- intro -->
    <section class="intro">

        <!-- decoration group images -->
        <img src="<?php echo get_template_directory_uri() . '/assets/images/common/decor-images/decor-image__1.png'; ?>" class="decor-image__intro-left">
        <div class="decor-image decor-image__intro-right"></div>

        <!-- intro content -->
        <div class="container container_intro">

            <!-- start slider -->
            <div class="slider slider_product">
                <?php while ( have_rows('product-info') ) : the_row(); ?>
                    <!-- slide -->
                    <div class="slide">
                        <div class="slide-content">
                            <div class="slide-content__wrapp">
                                <h2 class="product-slider__name"> <?php the_sub_field('intro_product_name'); ?> </h2>
                                <p class="product-slider__descr"> <?php the_sub_field('intro_product_description'); ?> </p>
                            </div>

                            <a href="<?php the_sub_field('intro_product_link'); ?>" class="btn">
                                Buy now
                                <span class="btn-icon btn-icon_right"><i class="fas fa-arrow-right"></i></span>
                            </a>

                        </div>

                        <div class="product-slider__image" style="background-image: url(' <?php the_sub_field('intro_product_image'); ?> ')"></div>
                    </div>
                <?php endwhile; ?>
            </div>
    </section>

    <!-- popular-products -->
    <section class="popular-products">

        <!-- decoration group images -->
        <div data-relative-input="true" id="scene_left" class="scene scene_left">
            <div data-depth="0.1" class="decor-image decor-image__popular-left"></div>
        </div>

        <div data-relative-input="true" id="scene_right" class="scene scene_right">
            <div data-depth="0.5" class="decor-image decor-image__popular-right"></div>
        </div>

        <!-- popular-products content -->
        <div class="container">
            <h2 class="section-title section-title_popular">Popular products</h2>

            <div class="product-wrapper">
                <?php
                $tax_query[] = array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'featured',
                    'operator' => 'IN',
                );

                $args = array(
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'posts_per_page' => 4,
                    'tax_query' => $tax_query,
                );
                $loop = new WP_Query( $args );
                $i = 0;
                if ( $loop->have_posts() ) {
                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <?php $i++; ?>
                        <div class="product-wrapper__item product-wrapper__item_intro <?php echo 'product-wrapper__item_intro-' . $i?>">
                            <a href="<?php echo get_permalink(); ?>" class="product-cart">
                                <div class="product-preview">
                                    <span class="product-image product-image_intro" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>;')"></span>
                                </div>
                                <span class="product-name"> <?php the_title(); ?> </span>
                            </a>
                        </div>
                        <?php
                    endwhile;
                } else {
                    echo __( 'No products found' );
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>

    </section>

    <!-- best-deal -->
    <section class="best-deal">
        <div class="container">

            <div class="row">
                <?php while ( have_rows('best_deal_product') ) : the_row(); ?>
                    <div class="col-lg-6 best-deal_left">
                        <img src="<?php the_sub_field('best_deal_image'); ?>" class="product-image best-deal__image">
                    </div>

                    <div class="col-lg-6 best-deal_right">
                        <h2 class="section-title section-title_best-deal"> <?php the_sub_field('best_deal_title'); ?> </h2>
                        <p class="best-deal__description"> <?php the_sub_field('best_deal_product_description'); ?> </p>
                        <a href="<?php the_sub_field('best_deal_product_link'); ?>" class="btn btn_light">
                            Buy now
                            <span class="btn-icon btn-icon_right"><i class="fas fa-arrow-right"></i></span>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- lastest-products -->
    <section class="lastest-products">

        <!-- decoration group images -->
        <div data-relative-input="true" id="scene_left-lastest" class="scene scene_left-lastest">
            <div data-depth="0.6" class="decor-image decor-image__lastest-left"></div>
        </div>

        <div data-relative-input="true" id="scene_right-lastest" class="scene scene_right-lastest">
            <div data-depth="0.2" class="decor-image decor-image__lastest-right"></div>
        </div>


        <!-- lastest-products content -->
        <div class="container">
            <h2 class="section-title section-title_lastest"> <?php the_field('latest_product_title'); ?> </h2>

            <div class="product-wrapper">
            <?php

            $args = array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'posts_per_page' => 4,
                'orderby' => 'date',
            );
            $loop = new WP_Query( $args );
            if ( $loop->have_posts() ) {
                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="product-wrapper__item">
                            <a href="<?php echo get_permalink(); ?>" class="product-cart">
                                <?php
                                    $image = get_the_post_thumbnail_url();
                                    if(!$image) : ?>

                                    <?php
                                        $uploads = content_url(). '/uploads/2019/02/';
                                        $image = $uploads . 'placeholder.jpg';
                                    ?>
                                    <?php endif;  ?>
                                <div class="product-preview">
                                    <span class="product-image product-image_lastest" style="background-image: url('<?php echo $image; ?>;')"></span>
                                </div>
                                <span class="product-name"> <?php the_title(); ?> </span>
                            </a>
                        </div>
                    </div>
                    <?php
                endwhile;
            } else {
                echo __( 'No products found' );
            }
            wp_reset_postdata();
            ?>
            </div>
        </div>
    </section>

    <!-- banner -->
    <section class="banner">
        <div class="container">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/layouts/banner/banner-image.jpg'; ?>" class="banner-image">
        </div>
    </section>

</div>


<!-- get footer -->
<?php get_footer(); ?>
