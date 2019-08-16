<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>


<div id="product-<?php the_ID(); ?>" <?php wc_product_class(); ?>>
    <div class="single-product__wrapper">

        <div class="container_single-product">
            <!-- get product gallery -->
            <div class="product-gallery">

                <?php
                global $product;
                $id = $product->get_id();
                $attachment_ids = $product->get_gallery_attachment_ids();
                $imagesCounter = count($attachment_ids);

                ?>


                <!-- empty gallery -->
                <?php if ($imagesCounter < 1) : ?>
                    <div class="product-gallery__left-part" style="display: none"></div>

                    <!-- gallery has items -->
                <?php else : ?>

                    <div class="product-gallery__left-part">

                        <?php
                        global $product;
                        $attachment_ids = $product->get_gallery_attachment_ids();
                        $i = 0; ?>

                        <!-- start slider -->
                        <div class="gallery-slider">
                            <?php
                                $image_link_main_original = get_the_post_thumbnail_url($id, 'custom-size-large');
                                $image_link_main = get_the_post_thumbnail_url($id, 'custom-size-small');
                            ?>

                            <!-- get featured image -->
                            <div class="slide gallery-slide">
                                <img src="<?php echo $image_link_main; ?>" class="product-gallery__image" data-src="<?php echo $image_link_main_original; ?>" alt="product-gallery__image">
                            </div>

                            <!-- get gallery images  -->
                            <?php foreach( $attachment_ids as $attachment_id ) {
                                $i++;

                                $image_link = wp_get_attachment_image_url($attachment_id, 'custom-size-small');
                                $image_link_original = wp_get_attachment_image_url($attachment_id, 'custom-size-large');
                                ?>


                                <div class="slick">
                                    <img src="<?php echo $image_link ?>" class="product-gallery__image" data-src="<?php echo $image_link_original; ?>" alt="product-gallery__image">
                                </div>

                            <?php } ?>

                        </div>
                        <!-- end slider -->
                    </div>

                <?php endif; ?>

                <?php if ($imagesCounter < 1) : ?>
                    <div class="product-gallery__right-part product-gallery__right-part_empty">
                        <img id="product-gallery__image_active" src="<?php echo get_the_post_thumbnail_url($image_ID, 'custom-size-large'); ?>" class="product-gallery__image_active" alt="active image">
                    </div>

                <?php else : ?>
                    <div class="product-gallery__right-part">
                        <img id="product-gallery__image_active" src="<?php echo get_the_post_thumbnail_url($image_ID, 'custom-size-large'); ?>" class="product-gallery__image_active" alt="active image">
                    </div>
                <?php endif; ?>
            </div>

            <?php
            $is_variable = $product->is_type( 'variable' );
            $variable_class;
            if($is_variable) : ?>
                <?php $variable_class = 'entry-summary_variable'  ?>

            <?php else : ?>
                <?php $variable_class = ''  ?>
            <?php endif; ?>

            <!-- empty gallery -->
            <?php if ($imagesCounter < 1) : ?>

                    <div class="summary entry-summary entry-summary <?php echo $variable_class; ?>">
                        <?php
                        woocommerce_template_single_title();
                        woocommerce_template_single_price();
                        woocommerce_template_single_rating();
                        woocommerce_template_single_add_to_cart();
                        woocommerce_template_single_sharing();
                        ?>

                        <div class="single-product__tabs-wrapper">
                            <?php woocommerce_output_product_data_tabs(); ?>
                        </div>

                        <div class="product-share">
                            <span class="product-share__title">Share: </span>
                            <?php echo do_shortcode( '[Sassy_Social_Share]'); ?>
                        </div>
                    </div>

                <!-- gallery has items -->
            <?php else : ?>
                <div class="summary entry-summary entry-summary_full">
                    <?php
                    woocommerce_template_single_title();
                    woocommerce_template_single_price();
                    woocommerce_template_single_rating();
                    woocommerce_template_single_add_to_cart();
                    woocommerce_template_single_sharing();
                    ?>

                    <div class="single-product__tabs-wrapper">
                        <?php woocommerce_output_product_data_tabs(); ?>
                    </div>

                    <div class="product-share">
                        <span class="product-share__title">Share: </span>
                        <?php echo do_shortcode( '[Sassy_Social_Share]'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>


        <div class="single-product__tabs-wrapper">
            <?php
            /**
             * Hook: woocommerce_after_single_product_summary.
             *
             * @hooked woocommerce_output_product_data_tabs - 10
             * @hooked woocommerce_upsell_display - 15
             * @hooked woocommerce_output_related_products - 20
             */

            woocommerce_upsell_display();
            woocommerce_output_related_products();
            ?>
        </div>

    </div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
