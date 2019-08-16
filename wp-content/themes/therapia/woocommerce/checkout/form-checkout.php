<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout ); ?>


<div class="decor-image-wrapper">
    <div class="decor-image decor-image__page_left_checkout"></div>
    <div class="decor-image decor-image__page_right_checkout"></div>

    <div class="decor-image decor-image__page_middle-left_checkout"></div>
    <div class="decor-image decor-image__page_middle-right_checkout"></div>
</div>

<!-- open container -->
<div class="checkout-page">

    <div class="container">

        <h3 class="woocomerce-page_title"><?php the_title(); ?></h3>

        <!-- get breadcrumb -->
        <div class="cart-breadcrumbs">
            <?php woocommerce_breadcrumb(); ?>
        </div>


        <div class="container_small">
            <?php
            // If checkout registration is disabled and not logged in, the user cannot checkout.
            if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
                echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
                return;
            }
            ?>


            <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
                <?php if ( $checkout->get_checkout_fields() ) : ?>

                    <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

                    <div id="customer_details">
                        <div>
                            <?php do_action( 'woocommerce_checkout_billing' ); ?>
                        </div>

                        <div>
                            <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                        </div>
                    </div>

                    <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

                <?php endif; ?>

                <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

                <div id="order_review" class="woocommerce-checkout-review-order">
                    <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                </div>

                <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

            </form>

            <?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
        </div>

    </div>
</div>