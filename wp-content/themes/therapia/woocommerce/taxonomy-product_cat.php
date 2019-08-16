<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 */
?>

<!-- get custom header -->
<?php get_header(cat); ?>

<?php
function my_pagenavi() {
    global $wp_query;

    $big = 999999999; // уникальное число для замены

    $args = array(
        'base'    => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format'  => '',
        'current' => max( 1, get_query_var('paged') ),
        'total'   => $wp_query->max_num_pages,
    );

    $result = paginate_links( $args );

    // удаляем добавку к пагинации для первой страницы
    $result = preg_replace( '~/page/1/?([\'"])~', '\1', $result );

    echo $result;
}
?>

<div class="page-main">
    <!-- decoration group images -->
    <div class="decor-image decor-image__category-top_right"></div>

    <div class="shop-category__header">
        <div class="shop-category__header-image">
            <div class="shop-category__header-image_shadow"></div>
        </div>

        <div class="shop-category__header-inner">
            <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                <div class="container">
                    <h1 class="shop-category__title page-title"><?php woocommerce_page_title(); ?></h1>
                </div>
            <?php endif; ?>
        </div>
    </div>


    <main class="main">
        <div class="container">
            <?php echo woocommerce_breadcrumb(); ?>
        </div>

        <section class="shop-container__cetegory">
            <div class="decor-image decor-image__category-middle_left"></div>
            <div class="decor-image decor-image__category-middle_right"></div>

            <div class="container">
                <?php
                if ( woocommerce_product_loop() ) {

                    woocommerce_product_loop_start();

                    if ( wc_get_loop_prop( 'total' ) ) {
                        while ( have_posts() ) {
                            the_post();

                            /**
                             * Hook: woocommerce_shop_loop.
                             *
                             * @hooked WC_Structured_Data::generate_product_data() - 10
                             */
                            do_action( 'woocommerce_shop_loop' );

                            wc_get_template_part( 'content', 'product' );
                        }
                    }

                    woocommerce_product_loop_end();

                    /**
                     * Hook: woocommerce_after_shop_loop.
                     *
                     * @hooked woocommerce_pagination - 10
                     */
                    do_action( 'woocommerce_after_shop_loop' );
                } else {
                    /**
                     * Hook: woocommerce_no_products_found.
                     *
                     * @hooked wc_no_products_found - 10
                     */
                    do_action( 'woocommerce_no_products_found' );
                }
                ?>

            </div>
        </section>
    </main>

</div>

<!-- get footer -->
<?php get_footer( 'shop' ); ?>

